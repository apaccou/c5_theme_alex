<?php 
	defined('C5_EXECUTE') or die("Access Denied.");
	$content = $controller->getContent();
    echo '<div class="skin-model skin-model-3colonnes">';
	print $content;
    echo '</div>';
?>