<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Controller principal INDEX
 */

class Inicio extends Frontend_Controller
{

    function __construct()
    {
        parent::__construct();
//        $this->output->enable_profiler(true);

        /*
         * Ativar função em caso de site multilingue
         * Ver core/Multilang_Controller.
         */
//        $this->setLang();
    }

    function index()
    {

        $this->setNewPlugin('swiper');
        $this->setNewScript(array('jquery.nivo.slider.pack', 'page.home'));

        $this->title = '';
        $this->corpo = $this->load->view('home', '', true);

        $this->templateRender();
    }

    // -------------------------------------------------------------------------
    /**
     * Redireciona para endereço do banner e soma 1 click.
     * Caso não exita, redireciona para home.
     * @param int $banner_id
     */
    public function redirect($banner_id)
    {

        $this->load->library('cms_banner');
        if (!$this->cms_banner->redirect($banner_id))
        {
            redirect('');
        }
    }

    public function user()
    {

        $this->load->library(array('cms_usuario'));

        // recupera infos da inscrição
        $ins = $this->cms_usuario->get_inscription(2);

        // inscreve usuário no conteúdo
//        $this->cms_usuario->inscribe(array(
//            'conteudo_id' => 10,
//            'comentario'  => 'novo comment',
//            'user_id'     => 8,
//            'status'      => 1
//        ), false, true);

        $view['user'] = $this->cms_usuario->get(9);

        // insere novo usuário
//        $this->cms_usuario->insert(array(
//           'nome' => 'meu nome',
//            'email' => 'email@email.com.br',
//            'status' => 2
//        ));
        # insere ou atualiza
//        $user_id = $this->cms_usuario->insert_update(array(
//           'nome' => 'Nome do usuário',
//            'email' => 'bruno@brunobarros.com',
//            'status' => 1
//        ), 'email');
//mybug($ins);

        $this->title = $view['user']['nome'];
        $this->corpo = $this->load->view('site_add/user', $view, true);

        $this->templateRender();
    }

}