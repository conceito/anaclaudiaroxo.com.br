<?php
/*
 * CONFIGURAÇÕES GERAIS
 */
$config['title'] = "Ana Claudia Roxo";
$config['email1'] = "dev@conceito-online.com.br";// comunicação oficial
$config['email_debug'] = "dev@conceito-online.com.br";// para debug do sistema
$config['description'] = ''; // descrição para as metatags
$config['keywords'] = 'palavras, chaves'; // palavras-chave pata metatags
$config['instalation_folder'] = '';

/*
 * DADOS DE AUTENTICAÇÃO DE EMAIL
 */
if(ENVIRONMENT == 'development'){
    $config['smtp_host'] = "smtp.conceito-online.com.br";// em branco desativa
    $config['smtp_user'] = 'dev@conceito-online.com.br';
    $config['smtp_pass'] = "conceito";
    $config['smtp_erro'] = 'dev@conceito-online.com.br'; // receberá retorno de erros
    $config['smtp_encr'] = "";// TLS (google), SSL, "" (locaweb)
    $config['smtp_port'] = 587; // 25 (default) || 587
} else {
    $config['smtp_host'] = "smtp.conceito-online.com.br";// em branco desativa
    $config['smtp_user'] = 'dev@conceito-online.com.br';
    $config['smtp_pass'] = "conceito";
    $config['smtp_erro'] = 'dev@conceito-online.com.br'; // receberá retorno de erros
    $config['smtp_encr'] = "";// TLS (google), SSL, "" (locaweb)
    $config['smtp_port'] = 587; // 25 (default) || 587
}


/*
 * CONFIGURAÇÕES DO CMS
 */
$config['cms_ver'] = '4.43';
$config['upl_imgs'] = $config['instalation_folder'] . 'upl/imgs';
$config['upl_arqs'] = $config['instalation_folder'] . 'upl/arqs';



/***************************************
 * configurações dinâmicas dos módulos *
 **************************************/
include_once APPPATH . "cache/config/modulos.php";
?>