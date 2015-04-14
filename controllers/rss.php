<?php
defined('C5_EXECUTE') or die("Access Denied.");

class RssController extends Controller {

	private $default_page_ID = 154;

	public function view($page_ID = 154) {

		$nh = Loader::helper('navigation');

    	$page = Page::getByID($page_ID, 'ACTIVE');
    	if($page->isError()) {
    		$page = Page::getByID($this->default_page_ID, 'ACTIVE');
    		$page_ID = $this->default_page_ID;
    	}
    	$blocksInArea = $page->getBlocks('Main');

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



	    $xml  = '<?xml version="1.0" encoding="UTF-8"?>';
	    $xml .= '   <rss version="2.0">';
	    $xml .= '       <channel>';
	    $xml .= '           <title>OFDT - '. $page->getCollectionName() .'</title>';
	    $xml .= '           <description><![CDATA[Fil des informations mises en ligne sur le site de l\'Observatoire Français des Drogues et des Toxicomanies]]></description>';
	    $xml .= '           <link>'. BASE_URL . DIR_REL .'/rss/'. $page_ID .'</link>';
	    $xml .= '           <lastBuildDate>'. date(DATE_RFC2822) .'</lastBuildDate>';
	    $xml .= '           <language>fr-fr</language>';

	    foreach($blocks as $block) {

	       $block = Block::getByID($block->bID);

	       //charge uniquement dans le flux les blocs de type 'Actualite'
	       if( $block->getBlockTypeName() == 'Actualite') {
	            $xml .= '<item>';
	            $xml .= '   <title>'. htmlspecialchars($block->getInstance()->title) .'</title>';
	            $xml .= '   <link>'. BASE_URL . $nh->getLinkToCollection($page) .'</link>';
							$xml .= '   <description><![CDATA['. $block->getInstance()->description .']]></description>';//pour affichage HTML
	            //$xml .= '   <description><![CDATA['. htmlspecialchars($block->getInstance()->description) .']]></description>';plus sur si le flux ne doit pas contenir de HTML
	            $xml .= '   <pubDate>'. date('r', strtotime($block->bDateModified)) .'</pubDate>';
	            $xml .= '   <guid isPermaLink="false">OfdtUniqueGuid'. $block->bID .'</guid>';
	            $xml .= '</item>';
	       }

	    }

	    $xml .= '       </channel>';
	    $xml .= '   </rss>';

	    header('Content-type: text/xml; charset=utf-8');
	    echo $xml;
	    exit;

	}

}
?>
