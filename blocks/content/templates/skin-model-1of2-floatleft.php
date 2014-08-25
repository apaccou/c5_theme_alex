<?php 
	defined('C5_EXECUTE') or die("Access Denied.");
	$content = $controller->getContent();
    echo '<div class="skin-model skin-model-1of2-floatleft">';
	print $content;
    echo '</div>';
?>