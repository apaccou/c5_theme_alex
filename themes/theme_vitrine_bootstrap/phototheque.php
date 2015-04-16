<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<?php $this->inc('elements/header.php'); ?>
<div class="container">
<h1>Photothèque</h1>
<p>
  https://www.concrete5.org/documentation/developers/5.6/files/grouping-files-with-sets
  <br />
  http://www.concrete5.org/documentation/developers/5.6/files/searching-and/
  <br />
  http://www.concrete5.org/documentation/developers/5.6/files/files-and-file-versions/
  <br />
  http://www.concrete5.org/documentation/developers/5.6/files/helpers/
  <br />
  http://www.frescojs.com/
</p>


<ul class="isotope list-galerie list-unstyled">
<?php

Loader::model('file_list');
$fl = new FileList();

  // Création du FileSet s'il n'existe pas encore

  $attr_set = AttributeSet::getByHandle('phototheque');
  if( !is_object($attr_set) ) {
  	$akCat = AttributeKeyCategory::getByHandle('collection');
  	$akCat->setAllowAttributeSets(AttributeKeyCategory::ASET_ALLOW_SINGLE);
  	$akCatSet = $akCat->addSet('phototheque', t('Photothèque'), $pkg);
  }

$fs = FileSet::getByName('phototheque');
$fl->filterBySet($fs);
//filtre sur les images. Penser à développer la gestion des vidéos et autres types de doc //$thumb_src = $this->getThemePath() .'/images/noimage.png';
$fl->filterByType(FileType::T_IMAGE);
//  Gérer l'ordre ????
//$fl->sortByFileSetDisplayOrder();
$files = $fl->get();

$ih = Loader::helper('image');
foreach ($files as $f) {

  if (is_object($f)) {
    $fv = $f->getRecentVersion();
    $level = 2;
    if( $fv->getThumbnail($level) ) {
      $thumb_src = $fv->getThumbnailSRC($level);
    } else {
      $thumb = $ih->getThumbnail($visuel, 250, 250, false);
      $thumb_src = $thumb->src;
    }
  }
  echo '<li class="item"><a href="'. $fv->getRelativePath() .'"><img src="'. $thumb_src .'" alt="'. $fv->getDescription() .'" /></a></li>';
  //echo '<li class="item"><a href="'. $fv->getPath() .'"><img src="'. $fv->getURL() .'"/></a></li>';
}
?>
</ul>

<br/>

<script type="text/javascript">
$( function() {

  $('.isotope').isotope({
    masonry: {
      gutter: 15
    },
    itemSelector: '.item',
  });

});
</script>

</div>
<?php $this->inc('elements/footer.php'); ?>
