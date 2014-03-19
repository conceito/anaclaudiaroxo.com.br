<div id="page"class="clearfix">
	<div class="container">
		<div class="row">
			
			

			<div class="span3 sidebar">
				
				<h1 class="page-title">
					<?php echo $this->pagina['titulo'] ?>
					<div class="clearfix"></div>
					<i class="sprt arrow-wb-r"></i>
				</h1>

			</div><!-- span -->

			<div class="span9 main" role="main">
				<?php if($this->pagina['adminbar']): ?>
				<div <?php echo $this->pagina['adminbar'] ?>></div>
				<?php endif; ?>

				<div class="content">
					<div class="header-deco"></div>
				<?php echo $this->pagina['txt'] ?>
					

					<div class="to-top-wrapper">
						<a href="#topo" class="to-top"> <i class="sprt arrow-gs-t"></i>MENU</a>
					</div>
				</div><!-- content -->

				
			</div><!-- span -->

		</div><!-- row -->
	</div><!-- container -->
</div><!-- page -->