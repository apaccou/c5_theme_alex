<?php
//http://schema.org/Product
//Taille image minimum pour un jour déployer dans google shopping : https://support.google.com/merchants/answer/188494?hl=fr
//http://www.insidedaweb.com/ecommerce-2/15-erreurs-a-ne-pas-commettre-sur-un-site-de-e-commerce/
//http://www.skeelbox.com/optimiser-fiche-produit-ecommerce/ ===> pour seconde fiche produit
//http://www.skeelbox.com/la-fiche-produit-du-futur/
//http://coolcarousels.frebsite.nl/c/65/
//http://coolcarousels.frebsite.nl/c/26/
//http://coolcarousels.frebsite.nl/c/57/
//http://placehold.it/

//http://www.skeelbox.com/la-fiche-produit-du-futur/
//http://blog.kaliop.com/blog/2012/03/19/la-photo-du-produit-atout-essentiel-de-votre-site-e-commerce/
//http://blog.kaliop.com/blog/2013/09/09/ecommerce-accessible/
//
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
    if ( $i == 2 ) { $titre .= $c->getCollectionName(); }     
} 
$titre .= ' - ' . SITE;

if ( !$c->getAttribute('meta_title') ) {	
	$c->setAttribute('meta_title', $titre );
	//echo $titre;		
}
?>

<div class="container">
    <div class="row">

		<div id="produit" itemscope itemtype="http://schema.org/Product">
			<div class="col-md-5">

				<a href="http://placehold.it/800x800" data-lightbox="product_zoom" data-title="My caption" class="clearfix">
					<img src="http://placehold.it/400x400" alt="Kenmore 17 Microwave" class="img-thumbnail" />
				</a>
				
				<p>+ de photos</p>

				<div class="clearfix">
					<a href="http://placehold.it/800x800" data-lightbox="product_zoom" data-title="My caption" class="">
						<img src="http://placehold.it/110x110" alt="Kenmore 17 Microwave" class="img-thumbnail" />
					</a>
					<a href="http://placehold.it/800x800" data-lightbox="product_zoom" data-title="My caption" class="">
						<img src="http://placehold.it/110x110" alt="Kenmore 17 Microwave" class="img-thumbnail" />
					</a>
					<a href="http://placehold.it/800x800" data-lightbox="product_zoom" data-title="My caption" class="">
						<img src="http://placehold.it/110x110" alt="Kenmore 17 Microwave" class="img-thumbnail" />
					</a>
				</div>

				<p>Voir la vidéo</p>

				<a href="http://placehold.it/800x800" data-lightbox="product_zoom" data-title="My caption" class="">
					<img src="http://placehold.it/200x110" alt="Kenmore 17 Microwave" class="img-thumbnail" />
				</a>				

			</div>
			<div class="col-md-7">

				<h1 itemprop="name" class="nom"><?php echo $c->getCollectionName(); ?> Kenmore White 17" Microwave</h1>
				<div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="offre">
					<span itemprop="price" class="prix">55,00 €</span>
					<span class="stock">
						<link itemprop="availability" href="http://schema.org/InStoreOnly" />
					</span>
					<a href="#" class="btn btn-default cta">Acheter</a>
					<span class="rassurance">Livraison gratuite</span>
				</div>				  
				<p itemprop="description" class="description">0.7 cubic feet countertop microwave.
				  Has six preset cooking categories and convenience features like
				  Add-A-Minute and Child Lock.</p>
				<p class="emotional">Make your foot happy with this shoes</p>

				<p itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating" class="evaluation_moyenne">
					Note <span itemprop="ratingValue">3.5</span>/5
					basé sur <span itemprop="reviewCount">11</span> avis clients
				</p>				

			</div>
  
  
 			

			Avis clients:
			<div itemprop="review" itemscope itemtype="http://schema.org/Review">
				<span itemprop="name">Not a happy camper</span> - by <span itemprop="author">Ellie</span>,
				<meta itemprop="datePublished" content="2011-04-01">April 1, 2011
				<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
					<meta itemprop="worstRating" content = "1">
					<span itemprop="ratingValue">1</span>/
					<span itemprop="bestRating">5</span>stars


					<p> Test : <br/>
					<?php
					//http://stackoverflow.com/questions/12762995/how-to-use-star-rating-of-font-awesome-with-django
					$rh = Loader::helper('rating');
					$html = $rh->outputDisplay(50);
					echo $html;
					?>
					</p>

					<div class="star-rating"> 
						<span class="fa fa-star-o" data-rating="1"></span>
						<span class="fa fa-star-o" data-rating="2"></span>
						<span class="fa fa-star-o" data-rating="3"></span>
						<span class="fa fa-star-o" data-rating="4"></span>
						<span class="fa fa-star-o" data-rating="5"></span>
						<input type="hidden" name="whatever" class="rating-value" value="3">
					</div>



				</div>
				<span itemprop="description">The lamp burned out and now I have to replace it. </span>
			</div>
			<div itemprop="review" itemscope itemtype="http://schema.org/Review">
				<span itemprop="name">Value purchase</span> - by <span itemprop="author">Lucas</span>,
				<meta itemprop="datePublished" content="2011-03-25">March 25, 2011
				<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
					<meta itemprop="worstRating" content = "1"/>
					<span itemprop="ratingValue">4</span>/
					<span itemprop="bestRating">5</span>stars
				</div>
				<span itemprop="description">Great microwave for the price. It is small and fits in my apartment.</span>
			</div>
			...
		</div>

		
		<ul class="mod-social skin-1 list-inline">
			<li>Partagez sur</li>
			<li class="facebook"><a href="#" rel="me" title="Partager sur Facebook"><i class="fa fa-facebook"></i></a></li>
			<li class="twitter"><a href="#" rel="me" title="Partager sur Twitter"><i class="fa fa-twitter"></i></a></li>     
			<li class="google"><a href="#" rel="me" title="Partager sur Google+"><i class="fa fa-google-plus"></i></a></li>          
			<li class="pinterest"><a href="#" rel="me" title="Partager sur Pinterest"><i class="fa fa-pinterest-square"></i></a></li>
		</ul>

    </div>
    <div class="row">
    	<p>Produits similaires</p>

		<div class="clearfix">
			<a href="http://placehold.it/800x800" data-lightbox="product_zoom" data-title="My caption" class="">
				<img src="http://placehold.it/110x110" alt="Kenmore 17 Microwave" class="img-thumbnail" />
			</a>
			<a href="http://placehold.it/800x800" data-lightbox="product_zoom" data-title="My caption" class="">
				<img src="http://placehold.it/110x110" alt="Kenmore 17 Microwave" class="img-thumbnail" />
			</a>
			<a href="http://placehold.it/800x800" data-lightbox="product_zoom" data-title="My caption" class="">
				<img src="http://placehold.it/110x110" alt="Kenmore 17 Microwave" class="img-thumbnail" />
			</a>
			<a href="http://placehold.it/800x800" data-lightbox="product_zoom" data-title="My caption" class="">
				<img src="http://placehold.it/110x110" alt="Kenmore 17 Microwave" class="img-thumbnail" />
			</a>
			<a href="http://placehold.it/800x800" data-lightbox="product_zoom" data-title="My caption" class="">
				<img src="http://placehold.it/110x110" alt="Kenmore 17 Microwave" class="img-thumbnail" />
			</a>
			<a href="http://placehold.it/800x800" data-lightbox="product_zoom" data-title="My caption" class="">
				<img src="http://placehold.it/110x110" alt="Kenmore 17 Microwave" class="img-thumbnail" />
			</a>
			<a href="http://placehold.it/800x800" data-lightbox="product_zoom" data-title="My caption" class="">
				<img src="http://placehold.it/110x110" alt="Kenmore 17 Microwave" class="img-thumbnail" />
			</a>
			<a href="http://placehold.it/800x800" data-lightbox="product_zoom" data-title="My caption" class="">
				<img src="http://placehold.it/110x110" alt="Kenmore 17 Microwave" class="img-thumbnail" />
			</a>
			<a href="http://placehold.it/800x800" data-lightbox="product_zoom" data-title="My caption" class="">
				<img src="http://placehold.it/110x110" alt="Kenmore 17 Microwave" class="img-thumbnail" />
			</a>
		</div>

    </div>
</div>

<script type="text/javascript">
$('.img-thumbnail').css( "background-color", "red" );
</script>
<?php $this->inc('elements/footer.php'); ?>