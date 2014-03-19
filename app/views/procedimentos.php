<div id="page"class="clearfix">
	<div class="container">
		<div class="row">

			<div class="span12" role="main">
		
				
			<?php 
			/** ========================================================================
			 * 	loopig pelos procedimentos
			 * ------------------------------------------------------------------------
			 */
			if(isset($procedimentos) && $procedimentos):
				foreach ($procedimentos as $procedimento):
			?>

				<div class="procedimentos-swiper <?php echo $procedimento['nick'] ?>-swiper">

					<div class="block master">
						<h2><?php echo $procedimento['titulo'] ?></h2>
					</div><!-- block -->
					
					<a class="arrow-left" href="#"><i class="sprt arrow-gb-l"></i></a> 
    				<a class="arrow-right" href="#"><i class="sprt arrow-gb-r"></i></a>

					<div class="swiper-container">
						<div class="swiper-wrapper">
							
							<?php 
							foreach ($procedimento['posts'] as $p):
							?>
							<div class="swiper-slide">
								<a class="block" href="<?php echo site_url($p['full_uri'])?>">
									<div class="figure">
										<?php if(firstImg($p['galeria'])): ?>
										<img src="<?php echo firstImg($p['galeria'])?>" alt="">
										<?php endif; ?>
									</div>
									<div class="desc">
										<h2><?php echo $p['titulo']?></h2>
									</div>
								</a><!-- block -->
							</div>

							<?php 
							endforeach;
							?>



						</div><!-- swiper-wrapper -->
					</div><!-- swiper-container -->

				</div><!-- home-swiper -->

			<?php 
				endforeach;
			endif;
			?>











			</div><!-- span -->

		</div><!-- row -->
	</div><!-- container -->
</div><!-- page -->