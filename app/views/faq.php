<div id="page"class="clearfix">
	<div class="container">
		<div class="row">

			<div class="span3 sidebar">
				
				<h2 class="page-title">
					DÚVIDAS FREQUENTES
					<div class="clearfix"></div>
					<i class="sprt arrow-wb-r"></i>
				</h2>

				<ul class="unstyled sub-menu">
					<?php 
					if(isset($cats) && $cats):
						foreach ($cats as $c):
					?>
					<li class="<?php echo $c['active'] ?>">
						<a href="<?php echo site_url($c['full_uri'])?>"><?php echo $c['titulo'] ?></a>
					</li>
					<?php 
						endforeach;
					endif;
					?>
				</ul>

			</div><!-- span -->

			<div class="span9 main" role="main">

				<div class="content">
					
					<div class="header-deco"></div>
					<h1 class="content-title">
						<?php echo ($active) ? '<span class="light">Sobre </span>' . $active['titulo'] : 'Dúvidas frequentes' ?>
					</h1>


					<div class="accordion" id="FAQ">

						<?php 
						if(isset($posts) && $posts):
							$i = 0;
							foreach ($posts as $p):
						?>
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#FAQ" href="#collapse-<?php echo $i?>">
									<i class="sprt arrow-gm-b"></i> <?php echo $p['titulo'] ?>
								</a>
							</div>
							<div id="collapse-<?php echo $i?>" class="accordion-body collapse <?php echo ($i==0)?'in':'' ?>">
								<div class="accordion-inner">
									<?php echo $p['txt'] ?>
								</div>
							</div>
						</div>
						<?php 
							$i++;
							endforeach;
						else:
						?>
						<p>Nenhum conteúdo encontrado.</p>
						<?php endif; ?>
					</div>

					

					<div class="to-top-wrapper">
						<a href="#topo" class="to-top"> <i class="sprt arrow-gs-t"></i>MENU</a>
					</div>
				</div><!-- content -->

				
			</div><!-- span -->

		</div><!-- row -->
	</div><!-- container -->
</div><!-- page -->