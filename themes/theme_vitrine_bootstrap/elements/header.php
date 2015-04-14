<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<?php
$nh = Loader::helper('navigation');
$url = $nh->getCollectionURL($c);
//test si page d'accueil
$p = Page::getCurrentPage();
if(is_object($p) && $p instanceof Page && !$p->isError() && $p->getCollectionID() == HOME_CID) {
	$accueil = 1;
}
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="fr" dir="ltr" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="fr" dir="ltr" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="fr" dir="ltr" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="fr" dir="ltr" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="fr-FR" dir="ltr" class="no-js"> <!--<![endif]-->
<head>	
	<?php Loader::element('header_required', array('pageTitle' => $pageTitle)); ?>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="canonical" href="<?php echo $url; ?>" />

	<!-- Décommenter pour utiliser Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css"  />

	<link rel="stylesheet" href="<?php echo $this->getThemePath(); ?>/css/styles.css.php" type="text/css" media="screen,projection" />

	<!-- feuille de style pour les règles administrables en admin et les règles à inclure dans TinyMCE
	<link rel="stylesheet" href="<?php echo $this->getThemePath(); ?>/typography.css" type="text/css" media="screen,projection" />
	-->

    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <link rel="stylesheet" href="<?php echo $this->getThemePath(); ?>/css/print.css" type="text/css" media="print" />
    <![endif]-->

	<!-- jQuery chargé par header_required.php lorsque loggué pour éviter boggues avec v.1.11.0 -->
	<?php global $u; if (!$u->isRegistered()) { ?>
	<!--<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="<?= $this->getThemePath(); ?>/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>-->
	<?php } ?>
	<!--<script type="text/javascript" src="<?= $this->getThemePath(); ?>/js/javascripts.js.php"></script> inclus en bas de page -->

	<?php
	//Pour l'utilisation d'un background paramétrable en admin

	/* Ajouter manuellement l'attribut de page dans http://nddduclient.vega.coteo.com/dashboard/pages/attributes/ au format Image/File avec Identifiant unique = bg_image
	/* le nom peut changer (mettre par défaut: Background Paramétrable) et décocher les deux cases en-dessous
	/* Ajouter dans la balise souhaitée : style="background-image: url('<?php  echo $bg_image;?>');"

	//si la page en cours a une image de background paramétrée on l'utilise
	if ($c->getAttribute('bg_image')) {
		$bg_image = $c->getAttribute('bg_image')->getVersion()->getRelativePath();
	}
	//sinon on utilise l'image de background par défault
	else {
		$bg_image = $this->getThemePath().'/images/bg_default.jpg';
	}
	*/
	?>


</head>

<body id="pageid_<?php echo $c->getCollectionID() ?>" class="<?php if($accueil) {echo home . ' ';} ?>tpl-wrapper <?php echo 'tpl-'.$c->getCollectionTypeHandle(); if ( $u->isRegistered() ) { echo ' edition';} ?>" role="document" itemscope="itemscope" itemtype="http://schema.org/WebPage">

    <!--[if lt IE 8]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

<div class="page"><!-- cette classe n'inclue pas l'éditeur en admin contrairement à celles dans body -->
    <div id="header-wrap" role="banner">
		<div id="header-top">
			<div class="container">
				<?php
					$stack = Stack::getByName('Alerte');
					if($stack) {
						$stack->display();
					}
					if( $u->isRegistered() ) {
						echo '<p>Pour ajouter ou modifier une alerte, <a href="' . $this->url('/dashboard/blocks/stacks/') . '">cliquez ici</a></p>';
					}
				?>
				<ul id="" class="list-inline pull-left">
					<li><i class="fa fa-phone"></i> 03 20 XX XX XX</li>
					<li><a href="#" class="btn btn-default">Action 1</a></li>
					<li><a href="#" class="btn btn-default">Action 2</a></li>
				</ul>

				<ul id="" class="list-inline pull-right">
					<li class="hidden-xs">
						<form action="<?php echo View::url('/recherche'); ?>" method="get" role="search" id="search">
							<input name="search_paths[]" type="hidden" value="">
		           			<input name="query" type="text" value="" class="text" placeholder="Rechercher">
					        <button type="submit" class="search"><i class="fa fa-search"></i><span class="sr-only">Ok</span></button>
					    </form>
				    </li>
					<li><a href="#" class="">FR</a></li>
					<li><a href="#" class="">EN</a></li>
				</ul>

			</div>
		</div><!--/ #header-top -->
		<div id="header-main">


		<nav class="navbar" role="navigation">
  			<div class="container">
    			<!-- Brand and toggle get grouped for better mobile display -->
    				<div class="navbar-header">
      					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
      					</button>
      					<a class="navbar-brand" href="#"><img id="" class="" width="78" height="105" alt="<?php echo SITE; ?>" src="http://www.teslamotors.com/sites/all/themes/tesla/images/tesla_flag.png" /></a>
    				</div>

    				<!-- Collect the nav links, forms, and other content for toggling -->
    				<div class="collapse navbar-collapse" role="navigation">

					<?php
		            $nav = BlockType::getByHandle('autonav');
		            $nav->controller->orderBy = 'display_asc';
		            $nav->controller->displayPages = 'top';
		            $nav->controller->displaySubPages = 'all';
		            $nav->controller->displaySubPageLevels = 'custom';
		            $nav->controller->displaySubPageLevelsNum = 1;
		            $nav->render('templates/bootstrap_menu');
		            ?>

      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>




	        <div class="container">
	        	<div class="row">
	        		<div class="col-md-3">
	            <div class="navbar" role="navigation">
	                <div class="navbar-header">
	                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                        <span class="sr-only">Afficher le menu</span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                    </button>
	                    <?php
	                    //test si page accueil pour optimisation SEO
	                    if($accueil)
	                    {
	                    ?>
	                    <h1 id="logo-site" class="navbar-brand">
	                        <img id="" class="" width="50" height="50" alt="<?php echo SITE; ?>" src="<?php echo $this->getThemePath(); ?>/images/logo-coteo-web.png" />
	                    </h1>
	                    <?php
	                    } else {
	                    ?>
	                    <a href="<?php echo BASE_URL; ?><? echo $this->url('/') ?>" id="logo-site" class="navbar-brand" title="Retour à l'accueil - <?php echo SITE; ?>">
	                        <img id="" class="" width="50" height="50" alt="<?php echo SITE; ?>" src="<?php echo $this->getThemePath(); ?>/images/logo-coteo-web.png" />
	                    </a>
	                    <?php
	                    }
	                    ?>
	                </div> <!--/.navbar-header -->
	            </div><!--/.navbar -->

	            	</div>
	            	<div class="col-md-9">
	            		<h2>Titre activité</h2>
	            		<p class="lead">Description de l'activité</p>
	            	</div>
	            </div>
	        </div><!--/.container -->
	    </div><!--/ #header-main -->
	    <div id="header-bottom">
	        <div class="container">
	        	<nav class="collapse navbar-collapse" role="navigation">

	            <?php
	            $nav = BlockType::getByHandle('autonav');
	            $nav->controller->orderBy = 'display_asc';
	            $nav->controller->displayPages = 'top';
	            $nav->controller->displaySubPages = 'all';
	            $nav->controller->displaySubPageLevels = 'custom';
	            $nav->controller->displaySubPageLevelsNum = 4;
	            $nav->render('templates/bootstrap_menu');
	            ?>

				</nav>
	        </div><!--/.container -->
		</div><!--/ #header-bottom -->
    </div><!--/ #header-wrap -->
