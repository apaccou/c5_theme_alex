<?php
//http://coolcarousels.frebsite.nl/c/47/
//détection automatique des filtres par ajout de _filtre dans l'ID de l'attribut ?

//http://www.privatesportshop.com/

?>
<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<?php $this->inc('elements/header.php'); ?>

<?php
//optimisation SEO du titre
$nh = Loader::helper('navigation');
$breadcrumb = $nh->getTrailToCollection($c); 
krsort($breadcrumb); 

$titre = 'Vente de ';
$i = 0;
foreach ($breadcrumb as $bcpage) { 
	$i++;
	if ( $i == 1 ) { continue; }
     $titre .= '' . $bcpage->getCollectionName() . ' '; 
     
     } 
$titre .= $c->getCollectionName() . ' - ' . SITE;

if ( !$c->getAttribute('meta_title') ) {	
	$c->setAttribute('meta_title', $titre );		
}
?>

<div id="content-wrap" role="main">
	  
	<div id="marketing-wrap">
		<div id="marketing">
        <?php
        $a = new Area('Banner');
        $a->display($c);
        ?>
        </div>
 	</div>
  
    <div id="tools-wrap">
        <div class="container">
            <div class="row">
                <div id="compas" class="col-md-8">
                <?php $this->inc('elements/compas.php'); ?>
                </div>
                <div id="tools" class="col-md-4">
                    <a class="" href="javascript:window.print()"><i class="fa fa-print"></i><span class="sr-only"> Imprimer</span></a>                    
                </div> 
            </div>                
        </div>
    </div><!--/ .tools-wrap -->

	<div class="container">
	    <div class="row">
	    	<div class="col-md-2">
	    		
	    		<?php
				Loader::model('page_list');
				$nh = Loader::helper('navigation');
				
				$pl = new PageList();
				
				$pl->filterByParentID($c->getCollectionID());
				$pl->filterByCollectionTypeHandle('categorie');
				$pl->sortByDisplayOrder();				
				
				$pagelist = $pl->get();
				
				if ( $pl->getTotal() > 0) { 



					/*** test filtres ***/
					echo htmlspecialchars($_GET['filterbyprix']);
					$uh = Loader::helper('url');
					$variable = 'xyz';
					$url_prix_min = $uh->setVariable($variable, $value = false, $url = false);
					$variable = 'zzz';
					$url_prix_max = $uh->setVariable($variable, $value = false, $url = false);
					echo '<a href="'. $url_prix_min .'">Prix min</a>';
					echo '<a href="'. $url_prix_max .'">Prix max</a>';
					$nh = Loader::helper('navigation');
					$url = $nh->getCollectionURL($c);
					$params = array(
						'prix_minimum' => '0',
						'prix_maximum' => '500'
					);			
					$url = $uh->buildQuery($url, $params);
					echo $url;
					/*** test filtres ***/




					echo '<h2>Filtres</h2>'; 
					echo '<ul class="list-unstyled">';
					$i =0;
					foreach ($pagelist as $categorie) {					
						echo '<li>';
						$spl = new PageList();
						$spl->filterByPath($categorie->getCollectionPath());
						$spl->sortByDisplayOrder();
						//TODO : voir pour réf / ergo comment améliorer le hover sur une partie pas cliquable est pas terrible
						echo '<button type="button" class="btn btn-default"><a href="'. $nh->getLinkToCollection($categorie) .'">' . $categorie->getCollectionName() . '</a> ('. $spl->getTotal() .')</button>';
						echo '</li>';
					}
					echo '</ul>';
				}
	    		?>
	    		<h3>Attributs</h3>	    		
		    	<?php
				//liste de tous les attributs de Type Collection
				$keyslist = AttributeKey::getList('collection');
				foreach($keyslist AS $key){
				   echo "<p>{$key->akHandle}</p>";
				}
				?>
			</div>
			<div class="col-md-10">
				<div class="row">
					<?php

					Loader::model('page_list');
					$nh = Loader::helper('navigation');
					
					$pl = new PageList();
					$pl->filterByPath($c->getCollectionPath());
					$pl->filterByCollectionTypeHandle('produit');

					/*** test filtres ***/
					$pl->filterByAttribute(produit_prix, $prix_minimum, '>=');
					$pl->filterByAttribute(produit_prix, $prix_maximum, '<=');
					/*** test filtres ***/


					$pl->sortByDisplayOrder();
					
					$pagelist = $pl->get();

					echo '<p>'. $pl->getTotal() .' résultat(s) </p> ';
					
					$i =0;
					foreach ($pagelist as $produit) {
					$i++;		
						$produit_url = $nh->getLinkToCollection($produit);

						$produit_nom = $produit->getCollectionName();

						$produit_prix = $produit->getAttribute('produit_prix');
						$produit_prix_format = number_format( $produit_prix, 2, ',', ' ');

						$produit_nouveau = $produit->getAttribute('produit_nouveau');

						$produit_description = $produit->getCollectionDescription();

						$ih = Loader::helper('image');
						$produit_visuel  = $produit->getAttribute('produit_visuel');
						if (is_object($produit_visuel)) {                 
							$tmb = $ih->getThumbnail($produit_visuel, 294, 200, true);
							$tmb_url = $tmb->src;
							//$img_src = $scooter_visuel->getRelativePath();
							//$img_url = $scooter_visuel->getURL();					
						} else {
							$tmb_url = $this->getThemePath() .'/images/noimage.png';
						}

						echo '
						<div class="col-md-4">
							<a href="'. $produit_url .'">
							<div class="produit element '. $scooter_marque .' '. $scooter_tranche .' '. $scooter_type .'">						
								<img class="visuel" src="'. $tmb_url .'" alt="'. $produit_nom .'" />
								<h2 class="nom">'. $produit_nom .'</h2>
								<!--<p class="description">'. $produit_description .'</p>-->
								<p class="ribbon-right">test promo</p>
								<span class="prix">'. $produit_prix_format .' €</span>
								<p class="cta">Fiche complète</p>
								'. $scooter_nouveau .'
								'. $scooter_achat .'
								'. $scooter_promotion .'
								'. $scooter_destockage .'
								'. $scooter_affaire .'
							</div>
							</a>
						</div>
						';
						if(($i % 3) == 0) {
							echo '<div class="clearfix hidden-xs hidden-sm"></div>';
						}		
					}

				    ?>
	    		</div>
	   		</div>
		</div><!--/ .row -->

		<?php        			
		$a = new Area('Main');
		$a->display($c);        			
		?> 
	</div><!--/ .container -->           
</div><!--/ #content-wrap -->

<?php $this->inc('elements/footer.php'); ?>