<div id="page"class="clearfix">
    <div class="container">
        <div class="row">
            

            <div class="span3 sidebar">
                
                <h1 class="page-title">
                    CONTATO
                    <div class="clearfix"></div>
                    <i class="sprt arrow-wb-r"></i>
                </h1>

            </div><!-- span -->

            <div class="span9 main" role="main">

                <div class="content">
                    <div class="header-deco"></div>

                    <?php if($this->msg): ?>
                    <div class="alert alert-<?php echo $this->msg_type?>">
                        <?php echo $this->msg?>
                    </div>
                    <?php endif; ?>

                    <p></p>

                    <p>Envie sua mensagem pelo formulário abaixo.</p>

                    <form action="<?php echo site_url('contato/post_contato');?>" method="post" id="frm_contato">
                

                    <div class="control-group">
                        <label class="control-label" for="field_nome">Nome</label>
                        <div class="controls">
                            <input id="field_nome" name="nome" type="text" value="<?php echo set_value('nome');?>" class="input-xlarge required" />
                            <?php echo form_error('nome')?>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="field_email">E-mail</label>
                        <div class="controls">
                            <input id="field_email" name="email" type="text" value="<?php echo set_value('email');?>" class="input-xlarge required" />
                            <?php echo form_error('email')?>
                        </div>
                    </div>

                    <div class="control-group clearfix" style="width:86%">
                        <div class="control-col-1-2">
                            <label class="control-label" for="field_tel">Telefone</label>
                            <div class="controls">
                                <input id="field_tel" name="tel" type="text" value="<?php echo set_value('tel');?>" class="input-xlarge" placeholder="(xx) xxxx-xxxx" />
                                <?php echo form_error('tel')?>
                            </div>                    
                        </div>
                        <div class="control-col-1-2">
                            <label class="control-label" for="field_cel">Celular</label>
                            <div class="controls">
                                <input id="field_cel" name="cel" type="text" value="<?php echo set_value('cel');?>" class="input-xlarge" placeholder="(xx) xxxxx-xxxx" />
                                <?php echo form_error('cel')?>
                            </div>                    
                        </div>
                    </div>
       
                    <div class="control-group">
                        <label class="control-label" for="field_mensagem">Mensagem</label>
                        <div class="controls">
                            <textarea id="field_mensagem" name="mensagem" cols="" rows="6" class="input-xxlarge required"><?php echo set_value('mensagem');?></textarea>
                            <?php echo form_error('mensagem')?>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-round">Enviar mensagem</button>
                    
                  </form>


                    <hr>

                    <div class="google-maps">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3673.8192924792643!2d-43.35652505!3d-22.956881349999996!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9bd997c34f1135%3A0xc8af6e729a9cb1dc!2sAvenida+Ayrton+Senna%2C+1850+-+Jacarepagu%C3%A1!5e0!3m2!1spt-BR!2sbr!4v1394737236155" width="100%" height="98%" frameborder="0" style="border:0"></iframe>

                        <a href="https://www.google.com.br/maps/place/Avenida+Ayrton+Senna,+1850+-+Jacarepagu%C3%A1/@-22.9568813,-43.3565251,17z/data=!3m1!4b1!4m2!3m1!1s0x9bd997c34f1135:0xc8af6e729a9cb1dc" class="gml">ver no Google Maps</a>
                    </div>

                    <address>
                        Barra Plaza – Avenida Ayrton Senna, 1850, sala 352 <br>
                        Barra da Tijuca – Rio de Janeiro - RJ - CEP: 22775003 <br>
                        Tel: (21) 2430-3421 – Fax: (21)2430-3422 <br>
                        E-mail: <a href="mailto:contato@anaclaudiaroxo.com.br">contato@anaclaudiaroxo.com.br</a>
                    </address>





                    <div class="to-top-wrapper">
                        <a href="#topo" class="to-top"> <i class="sprt arrow-gs-t"></i>MENU</a>
                    </div>
                </div><!-- content -->

                
            </div><!-- span -->

        </div><!-- row -->
    </div><!-- container -->
</div><!-- page -->

