<?php
defined('C5_EXECUTE') or die(_("Access Denied."));
?>

<div id="actu<?php   echo intval($bID) ?>" class="actu">

    <div class="actu-image">
	    <?php        
        if( $controller->getFileID() ) {
        $file = $controller->getFileObject();
        $filePath = $file->getVersion()->getRelativePath();	
                
    	?>
        <img src="<?php echo $filePath; ?>" alt="<?php echo $controller->getAltText(); ?>" />
        <?php } ?>        
    </div>
    
    <div class="actu-texte">
        <h1 class="actu-titre"><?php echo $title; ?></h1>
        <h2 class="actu-soustitre"><?php echo $subtitle; ?></h2>
        <p class="actu-description">
            <?php echo $description; ?>
        </p>
        <a href="<?php echo $controller->getLinkURL(); ?>" class="ensavoirplus">En savoir plus</a>
    </div>

</div>
