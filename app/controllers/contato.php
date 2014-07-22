<?php

class Contato extends Frontend_Controller
{

    protected $pageTitle = "Contato";
    public $msg_type;
    public $msg;

    public function __construct()
    {
        parent::__construct();



        $this->load->model('contato_model', 'contato');
    }

    public function index()
    {
        $this->msg_type = $this->phpsess->get('msg_type');
        $this->msg = $this->phpsess->get('msg');
        $this->phpsess->save('msg_type', null);
        $this->phpsess->save('msg', null);

//        $this->setNewScript(array('jquery.validate', 'jquery.maskedinput', 'form'));

        $view['msg_tipo'] = $this->phpsess->flashget('msg_tipo');
        $view['msg'] = $this->phpsess->flashget('msg');

        // breadcrumb
        $this->breadcrumb->add('Contato');

        $this->title = 'Contato';
        $this->corpo = $this->load->view('contato', $view, true);


        $this->templateRender();
    }

    public function post_contato()
    {
// -- carrega classes -- //
        $this->load->library(array('form_validation'));
        $this->load->model(array('contato_model'));

        /*
         * Validação
         */
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('mensagem', 'Mensagem', 'trim|required|min_length[10]');
        $this->form_validation->set_rules('tel', 'Telefone', 'trim');
        $this->form_validation->set_rules('cel', 'Celular', 'trim');

        $this->form_validation->set_error_delimiters('<label class="error">', '</label>');

        /*
         * Não validou
         */
        if ($this->form_validation->run() == false)
        {

            // salva erro na session
            $this->phpsess->save('msg_type', 'error');
            $this->phpsess->save('msg', 'Campos incorretos.');
            $this->index();
        }
        /*
         * OK, validou
         */
        else
        {

            $ret = $this->contato->envia_contato();

            if ($ret)
            {
                $this->phpsess->save('msg_type', 'success');
                $this->phpsess->save('msg', 'Mensagem enviada com sucesso.');
            }
            else
            {
                $this->phpsess->save('msg_type', 'error');
                $this->phpsess->save('msg', 'Erro ao enviar mensagem');
            }

            redirect('contato');
        }
    }

}