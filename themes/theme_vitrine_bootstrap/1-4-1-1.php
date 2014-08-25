<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<?php $this->inc('elements/header.php'); ?>

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

	            <div class="col-md-12">
	            	<?php        			
	    			$a = new Area('Main');
	    			$a->display($c);        			
	    			?> 
	            </div>

	            <div class="col-md-3">
					<?php        			
	    			$a = new Area('Zone-a');
	    			$a->display($c);        			
	    			?> 
	            </div>
	            <div class="col-md-3">
					<?php        			
	    			$a = new Area('Zone-b');
	    			$a->display($c);        			
	    			?>             	
	            </div>
				<div class="col-md-3">
	            	<?php        			
	    			$a = new Area('Zone-c');
	    			$a->display($c);        			
	    			?> 
	            </div>
	            <div class="col-md-3">
					<?php        			
	    			$a = new Area('Zone-d');
	    			$a->display($c);        			
	    			?> 
	            </div>

	            <div class="col-md-12">
					<?php        			
	    			$a = new Area('Zone-e');
	    			$a->display($c);        			
	    			?>             	
	            </div>

	        	<div class="col-md-12">
	            	<?php        			
	    			$a = new Area('Zone-f');
	    			$a->display($c);        			
	    			?> 
	            </div>

            </div><!--/ .row -->                                  
        </div><!--/ .container -->

    </div><!--/ #content-wrap --> 

<?php $this->inc('elements/footer.php'); ?>