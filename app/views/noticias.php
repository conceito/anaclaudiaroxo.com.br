<div id="page"class="clearfix">
	<div class="container">
		<div class="row">

			<div class="span3 sidebar">
				
				<h1 class="page-title">
					Notícias
					<div class="clearfix"></div>
					<i class="sprt arrow-wb-r"></i>
				</h1>

			</div><!-- span -->

			<div class="span9 main" role="main">

				<div class="content">
					
					<div class="header-deco"></div>
						
					<ul class="unstyled post-list">
						
					<?php 
					/** ========================================================================
					 * 	looping pelas notícias
					 * ------------------------------------------------------------------------
					 */	
					if(isset($posts) && $posts):
						foreach ($posts as $p):
					?>
					<li>
						<a href="<?php echo site_url($p['full_uri']) ?>" class="post-item">
							<i class="sprt arrow-gm-r"></i> <strong><?php echo $p['titulo']?></strong>
							<span class="small"><?php echo $p['dt_ini']?></span>
						</a>
					</li>
					<?php
						endforeach;
					endif; 
					?>

					</ul>

					<?php echo $pagination; ?>
					

					<div class="to-top-wrapper">
						<a href="#topo" class="to-top"> <i class="sprt arrow-gs-t"></i>MENU</a>
					</div>
				</div><!-- content -->

				
			</div><!-- span -->

		</div><!-- row -->
	</div><!-- container -->
</div><!-- page -->