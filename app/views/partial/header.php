<header id="header" class="clearfix">
	<div class="container">
		<div class="row">
			<div class="span12">
				<div class="logo">
					<a href="<?php echo site_url()?>"> <img src="<?php echo img()?>logo.png" alt="Ana Claudia Roxo"></a>
				</div>
			</div>
		</div><!-- row -->
	</div>
	<nav class="header-menu">
		<div class="container">
			<div class="row">
				<div class="span12">
					
					<ul class="unstyled">
						<li class="<?php echo (is_home())?'active':''?>"><a href="<?php echo site_url()?>">HOME</a></li>
						<li class="<?php echo (is_page('ana-claudia-roxo'))?'active':''?>"><a href="<?php echo site_url('ana-claudia-roxo')?>">ANA CLAUDIA ROXO</a></li>
						<li class="<?php echo (is_page('procedimentos'))?'active':''?>"><a href="<?php echo site_url('procedimentos')?>">PROCEDIMENTOS</a></li>
						<li class="<?php echo (is_page('duvidas-frequentes'))?'active':''?>"><a href="<?php echo site_url('duvidas-frequentes')?>">DÚVIDAS FREQUENTES</a></li>
						<li class="<?php echo (is_page('links'))?'active':''?>"><a href="<?php echo site_url('links')?>">LINKS</a></li>
						<li class="<?php echo (is_page('noticias'))?'active':''?>"><a href="<?php echo site_url('noticias')?>">NOTÍCIAS</a></li>
						<li class="<?php echo (is_page('contato'))?'active':''?>"><a href="<?php echo site_url('contato')?>">CONTATO</a></li>
					</ul>
				</div><!-- span -->
			</div><!-- row -->
		</div><!-- container -->
	</nav>
</header>