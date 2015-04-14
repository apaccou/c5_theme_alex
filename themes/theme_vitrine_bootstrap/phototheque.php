<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<?php $this->inc('elements/header.php'); ?>
<div class="container">
<h1>Photothèque</h1>
<p>
  https://www.concrete5.org/documentation/developers/5.6/files/grouping-files-with-sets
  <br/>
  Gérer l'ordre ????
</p>


<ul class="isotope list-galerie list-unstyled">
<?php
Loader::model('file_list');
$fl = new FileList();
$fs = FileSet::getByName('phototheque');
$fl->filterBySet($fs);
//penser à filtrer seulement sur les images ?
$files = $fl->get();

$ih = Loader::helper('image');
foreach ($files as $visuel) {
  if (is_object($visuel)) {
    $thumb = $ih->getThumbnail($visuel, 250, 500, false);
    $thumb_url = $thumb->src;
    //$thumb_src = $visuel->getRelativePath();
    //$thumb_url = $visuel->getURL();
  } else {
    $thumb_url = $this->getThemePath() .'/images/noimage.png';
  }
  echo '<li class="item"><a href="'. $visuel->getPath() .'"><img src="'. $visuel->getURL() .'"/></a></li>';
}
?>
</ul>

<br/>

<script type="text/javascript">
$( function() {

  $('.isotope').isotope({
    itemSelector: '.item',
    masonry: {

    }
  });

});
</script>

</div>
<?php $this->inc('elements/footer.php'); ?>
