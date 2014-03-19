<?php
class Faq extends Frontend_Controller{
    
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('posts_m', 'post');
    }
    
    public function index()
    {
         $this->db->where('modulo_id', 70);
        $this->db->where('status', 1);
        $this->db->where('grupo', 0);
        $this->db->where('lang', 'pt');
        $this->db->where('tipo', 'conteudo');
        $this->db->order_by('ordem, titulo');
        $this->db->limit(1);
        $post = $this->db->get('cms_conteudo');
        $cat = $post->row_array();
        
//        dd($cat);
        
        
        redirect('duvidas-frequentes/categoria/' . $cat['nick']);
  
    }
    
    
    public function categoria($catSlug = '')
    {
        $cats = $this->post->mod(70)->base('duvidas-frequentes')->getCategories();
        $posts = $this->post->mod(70)->base('duvidas-frequentes')->cat($catSlug)->order('cont.ordem')->getFromCategory();
        $activeCat = $this->post->getActiveCategory();
//        dd($posts);
        
        $v['cats'] = $cats;
        $v['active'] = $activeCat;
        $v['posts'] = $posts;
        
        $this->title = 'Dúvidas frequentes';
        $this->corpo = $this->load->view('faq', $v, true);

        $this->templateRender();
    }
    
    
}