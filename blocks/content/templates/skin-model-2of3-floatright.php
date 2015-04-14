<?php 
	defined('C5_EXECUTE') or die("Access Denied.");
	$content = $controller->getContent();
    echo '<div class="skin-model skin-model-2of3-floatright">';
	print $content;
    echo '</div>';
?>