<?php
//http://www.holirun.net/
?>

<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<?php $this->inc('elements/header.php'); ?>

	<div id="btcarousel-1" class="carousel slide skin-cover" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#btcarousel-1" data-slide-to="0" class="active"></li>
			<li data-target="#btcarousel-1" data-slide-to="1"></li>
			<li data-target="#btcarousel-1" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active">
				<img src="http://www.tourisme-gravelines.fr/files/9613/6266/2768/diapo-2.jpg" alt="...">
				<div class="carousel-caption">
					<h3>test</h3>
					<p>Pargraphe test</p>
				</div>
			</div>
			<div class="item">
				<img src="http://www.tourisme-gravelines.fr/files/4014/0050/7798/bandeau_maritime.jpg" alt="...">
				<div class="carousel-caption">
					<h3>test</h3>
					<p>Pargraphe test</p>
				</div>
			</div>
			<div class="item">
				<img src="http://www.tourisme-gravelines.fr/files/9514/0050/1056/bandeau_chaussures_paarc.jpg" alt="...">
				<div class="carousel-caption">
					<h3>test</h3>
					<p>Pargraphe test</p>
				</div>
			</div>			
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#btcarousel-1" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
		</a>
		<a class="right carousel-control" href="#btcarousel-1" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
		</a>
	</div>

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
                <div class="content-col-left col-md-1">
                    <p>[content-col-left]</p>
                    <p>Liens de partage</p>
                    <p>Tester https://shareaholic.com/publishers/sharing/ </p>
                </div><!--/ .content-col-left --> 
                           
                <div class="content-col-main col-md-8">
                    <p>[content-col-main]</p>                    
                    <h1>Titre de la page h1</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <h2>Titre de la page h2</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <h3>Titre de la page h3</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>  
                    <a href="#">Lien interne</a>
                    <a href="http://www.google.fr">Lien externe</a>

				<div class="row">
					<div id="color1" class="color"></div>
					<div id="color2" class="color"></div>
					<div id="color3" class="color"></div>
					<div id="color4" class="color"></div>
					<div id="color5" class="color"></div>
					<div id="color6" class="color"></div>	
				</div>
				<div class="row">
					<div id="color7" class="color"></div>
					<div id="color8" class="color"></div>
					<div id="color9" class="color"></div>
					<div id="color10" class="color"></div>
					<div id="color11" class="color"></div>						
				</div>
				<div class="row">
					<div id="color12" class="color"></div>					
					<div id="color13" class="color"></div>
					<div id="color14" class="color"></div>
					<div id="color15" class="color"></div>
					<div id="color16" class="color"></div>	
				</div>
				<div class="row">
					<div id="color17" class="color"></div>
					<div id="color18" class="color"></div>
					<div id="color19" class="color"></div>
					<div id="color20" class="color"></div>											
				</div>


                                      
        			<?php        			
        			$a = new Area('Main');
        			$a->display($c);        			
        			?>                    
                </div><!--/ .content-col-main -->	
                			
                <div class="content-col-right col-md-3">
                    <p>[content-col-right]</p>
                    <p>Contenu annexe, navigation secondaire...</p>
        			<?php
        			$as = new Area('Sidebar');
        			$as->display($c);
        			?>

 					<h3>Facebook</h3>
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
                    </script>
                    <div class="fb-like-box" data-href="https://www.facebook.com/Camping.L.Oree.Du.Bois62" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
                    
                    <h3>Twitter</h3>
                    <!-- http://www.mareebiscuit.com/tutoriels/vos-derniers-tweets-sur-wordpress-avec-widgets-twitter/ -->
                    <a data-chrome="noheader noscrollbar nofooter noborders transparent" class="twitter-timeline" href="https://twitter.com/search?q=%23graphisme" data-widget-id="350289975096528896">Tweets concernant "#graphisme"</a>
                    
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>                    

                </div><!--/ .content-col-right -->                
            </div>

            <div class="row">
	            <div id="carousel">
		            <ul>
			            <li><img src="http://localhost/concrete563/files/6213/9971/8675/ford-mustang-2009-red-glass-burnout.jpg" alt="" /><a href="">Image1</a></li>
				        <li><img src="http://localhost/concrete563/files/6213/9971/8675/ford-mustang-2009-red-glass-burnout.jpg" alt="" /><a href="">Image2</a></li>
				        <li><img src="http://localhost/concrete563/files/6213/9971/8675/ford-mustang-2009-red-glass-burnout.jpg" alt="" /><a href="">Image3</a></li>
				        <li><img src="http://localhost/concrete563/files/6213/9971/8675/ford-mustang-2009-red-glass-burnout.jpg" alt="" /><a href="">Image1</a></li>
				        <li><img src="http://localhost/concrete563/files/6213/9971/8675/ford-mustang-2009-red-glass-burnout.jpg" alt="" /><a href="">Image2</a></li>
				        <li><img src="http://localhost/concrete563/files/6213/9971/8675/ford-mustang-2009-red-glass-burnout.jpg" alt="" /><a href="">Image3</a></li>		            	
				    </ul>

				    <div class="clearfix"></div>
				    <!-- prev and next button -->
				    <a id="prev" class="prev" href="#"><</a>
				    <a id="next" class="next" href="#">></a>
				    <!-- pagination -->
				    <div id="pager" class="pager"></div>

				</div>
            </div>

                <div class="row">                  
                  <h4>Partagez sur</h4>
                  <ul class="mod-social skin-1 list-inline">
                      <li class="facebook"><a href="http://www.facebook.com/share.php?u=<?php echo BASE_URL; ?><?php echo $this->url('/'); ?>" title="Partager sur Facebook"><i class="fa fa-facebook"></i></a></li>
                      <li class="twitter"><a href="http://twitter.com/share?url=<?php echo BASE_URL; ?>&text=" title="Partager sur Twitter"><i class="fa fa-twitter"></i></a></li>                      
                      <li class="google"><a href="https://plus.google.com/share?url=<?php echo BASE_URL; ?>&hl=fr" title="Partager sur Google+"><i class="fa fa-google-plus"></i></a></li>                      
                  </ul>
                </div>

            <div class="row">
                  <h4>Suivez-nous aussi sur</h4>
                  <ul class="mod-social skin-1 list-inline">
                      <li class="facebook"><a href="#" rel="me" title="Suivez-nous sur Facebook"><i class="fa fa-facebook"></i></a></li>
                      <li class="twitter"><a href="#" rel="me" title="Suivez-nous sur Twitter"><i class="fa fa-twitter"></i></a></li>
                      <li class="linkedin"><a href="#" rel="me" title="Suivez-nous sur LinkedIn"><i class="fa fa-linkedin"></i></a></li>
                      <li class="google"><a href="#" rel="me" title="Suivez-nous sur Google+"><i class="fa fa-google-plus"></i></a></li>
                      <li class="youtube"><a href="#" rel="me" title="Suivez-nous sur Youtube"><i class="fa fa-youtube"></i></a></li>
                      <li class="pinterest"><a href="#" rel="me" title="Suivez-nous sur Pinterest"><i class="fa fa-pinterest-square"></i></a></li>
                      <li class="flickr"><a href="#" rel="me" title="Suivez-nous sur Flickr"><i class="fa fa-flickr"></i></a></li>                    
                      <li class="rss"><a href="#" title="Suivez notre flux RSS"><i class="fa fa-rss"></i></a></li> 
                  </ul>
                </div>       
            
            </div>
                                  
        </div>
       
    
    </div><!--/ #content-wrap -->    


<?php $this->inc('elements/footer.php'); ?>