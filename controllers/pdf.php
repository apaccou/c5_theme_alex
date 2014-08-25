<?php
defined('C5_EXECUTE') or die("Access Denied.");

class PdfController extends Controller {

	private $default_page_ID = 1;

	public function view($page_ID = 193) {

    	$page = Page::getByID($page_ID, 'ACTIVE');
    	if($page->isError()) {
    		$page = Page::getByID($this->default_page_ID, 'ACTIVE');
    		$page_ID = $this->default_page_ID;
    	}
    	$blocksInArea = $page->getBlocks('Main');
    	$blocksInArea_2 = $page->getBlocks('Main_deux');
    	$blocksInArea_3 = $page->getBlocks('Main_trois');
    	$blocksInArea = array_merge($blocksInArea, $blocksInArea_2, $blocksInArea_3);
    	
    	$blocksInLayout = array();
		$area = new Area('Main');
		$layouts = $area->getAreaLayouts($page); //returns empty array if no layouts
		if ($layouts) {
		   foreach ($layouts as $l) {
		      $maxCell = $l->getMaxCellNumber();
		      for ($i=1; $i<=$maxCell; $i++) {
		         $aName = $l->getCellAreaHandle($i);
		         $cellBlocks = $page->getBlocks($aName);
		         $blocksInLayout = array_merge($blocksInLayout, $cellBlocks);
		      }
		   }
		}

		$blocks = array_merge($blocksInLayout, $blocksInArea);
		
		ob_start();
    	foreach($blocks as $block) {
    		if( is_object($block) ) $block->display();
    	}
        $htmlToSave = ob_get_clean();              

        if ( isset($htmlToSave) ) {

          Loader::library('mpdf/mpdf');
          
          /* EXPORT PDF */
          $mpdf=new mPDF();
          $mpdf->SetTitle($page->getCollectionName());
          $mpdf->SetDisplayMode('fullpage');
         
          $mpdf->allow_charset_conversion = false; //prevent 'HTML contains invalid UTF-8 character(s)'

          $mpdf->SetHeader($page->getCollectionName() .' ||www.ofdt.fr');         
          $mpdf->SetFooter('Copyright © Observatoire Français des Drogues et des Toxicomanies - {DATE j-m-Y} ||{PAGENO}');
          
          $mpdf->WriteHTML('<img src="http://dev.ofdt.fr/ofdt/themes/ofdt/images/logo.png" width="100" />');

          $mpdf->WriteHTML($htmlToSave); 

          $mpdf->Output(t($page->getCollectionHandle().".pdf"), "D");
        } else {
          $this->set('pdfError',t('Failed to create PDF.'));
        }
	}
}