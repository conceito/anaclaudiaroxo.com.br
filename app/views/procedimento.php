<div id="page"class="clearfix">
	<div class="container">
		<div class="row">

			<div class="span3 sidebar">
				
				<h2 class="page-title">
					PROCEDIMENTOS
					<div class="clearfix"></div>
					<i class="sprt arrow-wb-r"></i>
				</h2>
				<a href="<?php echo site_url('procedimentos') ?>" class="page-back">&lt; voltar</a>

			</div><!-- span -->

			<div class="span9 main" role="main">

				<div class="content">
					
					<div class="header-deco"></div>
					<h1 class="content-title"> <?php echo $this->pagina['titulo'] ?></h1>

					

					<?php echo $this->pagina['txt'] ?>
					

					<div class="to-top-wrapper">
						<a href="#topo" class="to-top"> <i class="sprt arrow-gs-t"></i>MENU</a>
					</div>
				</div><!-- content -->

				
			</div><!-- span -->

		</div><!-- row -->
	</div><!-- container -->
</div><!-- page -->

<script type="text/javascript">
$(function(){
$('.page-featured-img img').imageScale();
});
</script>