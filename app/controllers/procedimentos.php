<?php
class Procedimentos extends Frontend_Controller{
    
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('posts_m', 'post');
        $this->load->model('procedimentos_m', 'procedimentos');
    }
    
    public function index()
    {
        $this->setNewPlugin('swiper');
        $this->setNewScript(array('page.procedimentos'));
        
        $cats = $this->procedimentos->getCategories();
        $procedimentos = $this->procedimentos->groupPostsFromCategories($cats);
        
//        dd($procedimentos[0]['posts']);
        
        $v['cats'] = $cats;
        $v['procedimentos'] = $procedimentos;
        
        $this->title = 'Procedimentos';
        $this->corpo = $this->load->view('procedimentos', $v, true);

        $this->templateRender();
    }
    
    
    /**
     *  Método padrão para exibir módulo "páginas"
     * @param int $page_id
     */
    public function display($cat = '', $page_id = ''){
        
//        dd('display');
        
        // shortcodes devem ser inicializados primeiro
        $this->cms_conteudo->shortcode_reg(array('slide', 'page_featured_img'));
        
        // breadcrumb
        // $this->load->library('breadcrumb'); // autoload        
        
        $this->setNewScript(array('jquery.image-scale'));
        
        
        // retorna dados da tabela cms_conteudo parseado
        $this->pagina = $this->cms_conteudo->get_page($page_id);
        
        if($this->pagina === FALSE){
            redirect();
        }
        
        // retorna galeria
        $this->pagina['galeria'] = $this->cms_conteudo->get_page_gallery();
        // retorna os arquivos anexos
        $this->pagina['anexos'] = $this->cms_conteudo->get_page_attachments();
        // retorna dados do módulo
        $this->pagina['modulo'] = $this->cms_conteudo->set_get_modulo();
        // retorna as páginas filhas
        $this->pagina['children'] = $this->cms_conteudo->get_children(true, array('html' => true));
        // retorna as páginas, ou grupos a que pertencem para breadcrumb
        $this->pagina['hierarchy'] = $this->cms_conteudo->get_hierarchy();
        
        
        
        // breadcrumb
        $this->breadcrumb->add($this->pagina['hierarchy']);
        
        $view['post'] = '';        

        $this->title = $this->pagina['titulo'];
        $this->corpo = $this->load->view('procedimento', $view, true);

        $this->templateRender();
    }
}