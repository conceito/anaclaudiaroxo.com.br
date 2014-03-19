<?php
class Procedimentos_m extends CI_Model{
    
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('posts_m', 'post');
    }
    
    
    public function getCategories()
    {
        return $this->post->mod(66)->base('procedimentos')->getCategories();
    }


    public function getPostsFromCategories($cat)
    {
        $posts = $this->cms_posts->get(array(
            'modulo_id' => 66,
            'base_url' => 'procedimentos',
            'ordem' => 'cont.ordem',
            'grupo_id' => $cat['id'],
            'gallery_tag' => false,
            'per_page' => 99
        ));
        
        return $posts;
    }
    
    public function groupPostsFromCategories($cats)
    {
        if(!is_array($cats))
        {
            return false;
        }
        
        $return = array();
        
        foreach ($cats as $cat)
        {
            $cat['posts'] = $this->getPostsFromCategories($cat);
            $return[] = $cat;
        }
        
        return $return;
    }
}