<?php
defined('C5_EXECUTE') or die(_("Access Denied."));
$includeAssetLibrary = true; 
$assetLibraryPassThru = array(
	'type' => 'image'
);
$al = Loader::helper('concrete/asset_library');

$bf = null;
$bfo = null;

echo '<div class="ccm-block-field-group">';
echo '<h4>'.t('Titre').'</h4>';
echo $form->text('title', $title, array('style' => 'width:550px'));
echo '</div>';

echo '<div class="ccm-block-field-group">';
echo '<h4>'.t('Date ou Sous-titre').'</h4>';
echo $form->text('subtitle', $subtitle, array('style' => 'width:550px'));
echo '</div>';

echo '<div class="ccm-block-field-group">';
echo '<h4>'.t('Visuel').'<span> 295px x 75px</span></h4>';
$al = Loader::helper('concrete/asset_library');
$bf = File::getByID($fID);
echo $al->file('ccm-b-image', 'fID', t('Choose Image'), $bf);
echo '</div>';

?>
<div class="clearfix">
	<?php echo $form->label('altText', t('Alt Text/Caption'))?>
	<div class="input">	
		<?php echo $form->text('altText', $altText, array('style' => 'width: 250px')); ?>
	</div>
</div>

<?php
echo '<div class="ccm-block-field-group">';
echo '<h4>'.t('Description').'</h4>';
echo $form->textarea('description', $description, array('style' => 'width:550px'));
echo '</div>';
?>

<div class="ccm-block-field-group">
<h4><?php echo t('Link and Caption')?></h4><br/>

<div class="clearfix">
	<?php echo $form->label('linkType', t('Image Links to:'))?>
	<div class="input">	
		<select name="linkType" id="linkType">
			<option value="0" <?php echo (empty($externalLink) && empty($internalLinkCID) ? 'selected="selected"' : '')?>><?php echo t('Nothing')?></option>
			<option value="1" <?php echo (empty($externalLink) && !empty($internalLinkCID) ? 'selected="selected"' : '')?>><?php echo t('Another Page')?></option>
			<option value="2" <?php echo (!empty($externalLink) ? 'selected="selected"' : '')?>><?php echo t('External URL')?></option>
		</select>
	</div>
</div>

<div id="linkTypePage" style="display: none;" class="clearfix">
	<?php echo $form->label('internalLinkCID', t('Choose Page:'))?>
	<div class="input">
		<?php echo Loader::helper('form/page_selector')->selectPage('internalLinkCID', $internalLinkCID); ?>
	</div>
</div>
<div id="linkTypeExternal" style="display: none;" class="clearfix">
	<?php echo $form->label('externalLink', t('URL:'))?>
	<div class="input">
	<?php echo $form->text('externalLink', $externalLink, array('style' => 'width: 250px')); ?>
	</div>
</div>