<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>

    <div id="footer-wrap" role="contentinfo">
        <div id="footer-top">
            <div class="container">
                <p>[footer top]</p>
                <a id="back-to-top" href="#top"><i class="fa fa-chevron-circle-up"></i></a>

                <div class="row">
                    <div class="col-md-3">

                        <!-- http://schema.org/PostalAddress    https://support.google.com/webmasters/answer/146861?hl=fr -->
                        <div class="vcard" itemscope itemtype="http://schema.org/Organization">
                            <h4><span class="org" itemprop="name"><a class="fn org url" itemprop="url" href="http://www.coteo.com">Agence Web COTEO</a></span></h4>

                            <p class="adr" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                <span class="street-address" itemprop="streetAddress">2 rue des quatre coins</span><br />
                                <span class="postal-code" itemprop="postalCode">62100</span>
                                <span class="locality" itemprop="addressLocality">Calais</span><br />
                                <span class="country-name" itemprop="addressCountry">France</span> &gt;
                                <span class="region" itemprop="addressRegion">Nord Pas-de-Calais</span>

                            </p>
                            <p>
                                <span class="tel">Tel:<span class="value" itemprop="telephone">( 33 3) 21 19 79 79 </span></span><br />
                                <span class="tel"><span class="type">Fax:</span><span class="value" itemprop="faxNumber">( 33 3) 21 34 25 35 </span></span>
                            </p>
                            E-mail: <span class="email" itemprop="email">secretariat(at)google.org</span>

                    <!-- ProtectionEmail-http://www.aspirine.org/emailcode_en.html-->
                    <script type="text/javascript" language="javascript">
                    <!--
                    var v5="";for(var b4=0;b4<305;b4++)v5+=String.fromCharCode(("\'8#.IH]#Q}H4\'A*CC(^0/A15\'17\'4186*^C;O+5\'(*4}H;^}}+./#[}H61\'2O4%\'.#;PIPCg)M57CO64$5JJIR%1L}H.6.0..#.}HO%62.4\'\'I#%P)P.CCM|Q~~|CaJL}H$CL.2#j#4jj:S%}}4}H\'(\'2O4%\'.#jPIPCC)M}H}}JLA1}HC170/175\'C66^5O*+\'(*4}H}}^}}_%}HC061V6G#%VWDQ$#U\\#4.2D:%GQSQQ(4\'\\#_]P4\'}HO#%2.PV\'IMCP)CJHO4\'2.#%\'IPIOOJIOOJP)MCESERCJO57$564IRJJ".charCodeAt(b4)-(6*4+9)+0x3f)%(95)+32);document.write(eval(v5))
                    //-->
                    </script>

                            <a class="fn org url" itemprop="url" href="http://www.coteo.com">www.coteo.com</a>
                            <span class="geo" itemprop="geo" itemscope="" itemtype="http://schema.org/GeoCoordinates">
                                <!-- http://www.itilog.com/ -->
                                <abbr class="latitude" itemprop="latitude" title="48.816667">N 48° 81.6667</abbr>
                                <abbr class="longitude" itemprop="longitude" title="2.366667">E 2° 36.6667</abbr>
                            </span>
                        </div>












                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-3">
                                <h4>Titre h4</h4>
                                <ul class="elsewhere">
                                    <li><a rel="me" href="http://flickr.com/photos/paulrobertlloyd" class="flickr">Flickr</a></li>
                                    <li><a rel="me" href="http://dribbble.com/paulrobertlloyd" class="dribbble" data-icon="&#xe003;">Dribbble</a></li>
                                    <li><a rel="me" href="https://twitter.com/paulrobertlloyd" class="twitter" data-icon="&#xe002;">Twitter</a></li>
                                    <li><a rel="me" href="http://paulrobertlloyd.com/feeds" class="feeds" data-icon="&#xe001;">Feeds</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/ #footer-top -->
        <div id="footer-bottom">
            <div class="container">
                <div class="row">
                    <!--<p>[footer bottom]</p>-->
                    <p class="">
                        <i class="fa fa-sitemap"></i> <a href="<?php echo $this->url('/'); ?>">Plan du site</a> &bull; <a href="<?php echo $this->url('/mentions-legales/'); ?>">Mentions légales</a> &copy; 2014 <a rel="license" href="http://www.coteo.com/"><abbr title="Conception, Intégration et Développement de site internet Concrete5">Agence</abbr> Web COTEO <img src="<?php echo $this->getThemePath(); ?>/images/logo-coteo-web.png" alt="Coteo Web - Création de site internet" /></a>
                    </p>
                </div>
            </div>
            <?php
            ini_set('xdebug.var_display_max_depth', 5);
            ini_set('xdebug.var_display_max_children', 512);
            ini_set('xdebug.var_display_max_data', 2048);
            //var_dump( get_defined_vars() );
            //var_dump( get_defined_constants(true) );
            //var_dump( get_defined_functions() );
            //var_dump( get_declared_classes() );
            //var_dump( get_declared_interfaces() );

            $gdc = get_defined_constants(true);
            //var_dump( $gdc['user'] );
            ?>
        </div><!--/ #footer-bottom -->
    </div><!--/ #footer-wrap -->
</div><!--/ .page -->

<!-- Bootstrap -->
<?php
//désactivé en admin
$u = new User();
if ( !$u->isRegistered() ) {
?>
<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script>window.jQuery.fn.modal || document.write('<script src="<?= $this->getThemePath(); ?>/js/vendor/bootstrap-3.3.1.min.js"><\/script>')</script>
<?php
}
?>

<script type="text/javascript" src="<?= $this->getThemePath(); ?>/js/javascripts.js.php"></script>

<script type="text/javascript">
( function($) {
	$(document).ready(function() {
	    $('#carousel ul').carouFredSel({
			prev: '#prev',
			next: '#next',
			pagination: "#pager",
			auto: true,
			scroll: 1000,
			pauseOnHover: true
		});
	});
} ) ( jQuery );
</script>

<?php Loader::element('footer_required'); ?>

</body>
</html>
