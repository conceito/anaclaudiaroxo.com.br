<?php

class Posts_m extends CI_Model
{

    protected $moduloId = 7;
    protected $categoryId;
    protected $perPage = 10;
    protected $order = 'cont.dt_ini DESC';
    protected $baseUrl = 'noticias';
    protected $activeCategory = null;

    public function __construct()
    {
        parent::__construct();
    }

    public function setModuleId($mId)
    {
        $this->moduloId = $mId;
        return $this;
    }
    
    public function mod($mId)
    {
        return $this->setModuleId($mId);
    }

    public function getModuleId()
    {
        return $this->moduloId;
    }

    public function setPerPage($int)
    {
        $this->perPage = $int;
        return $this;
    }

    public function getPerPage()
    {
        return $this->perPage;
    }

    public function setOrder($order = 'cont.dt_ini DESC')
    {
        $this->order = $order;
        return $this;
    }
    
    public function order($order)
    {
        return $this->setOrder($order);
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function setBaseUrl($base)
    {
        $this->baseUrl = $base;
        return $this;
    }
    
    public function base($base)
    {
        return $this->setBaseUrl($base);
    }

    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    public function setCategory($catSlugId)
    {
        if (is_string($catSlugId))
        {
            $this->db->where('modulo_id', $this->getModuleId());
            $this->db->where('nick', $catSlugId);
            $this->db->where('status', 1);
            $this->db->where('grupo', 0);
            $this->db->where('lang', 'pt');
            $this->db->where('tipo', 'conteudo');
            $this->db->select('id, titulo');
            $post = $this->db->get('cms_conteudo');
            $cat = $post->row_array();
            $catId = $cat['id'];
        }
        else if(is_numeric($catSlugId))
        {
            $catId = $catSlugId;
        }
        
        
        $this->categoryId = $catId;
        return $this;
        
    }
    
    public function cat($catSlugId)
    {
        return $this->setCategory($catSlugId);
    }

    public function getCategory()
    {
        return $this->categoryId;
    }

    public function getAll()
    {
        $posts = $this->cms_posts->get(array(
            'modulo_id' => $this->getModuleId(),
            'per_page' => $this->getPerPage(),
            'base_url' => $this->getBaseUrl(),
            'ordem' => $this->getOrder()
        ));

        return $posts;
    }

    public function getCategories()
    {
        $this->db->where('modulo_id', $this->getModuleId());
        $this->db->where('status', 1);
        $this->db->where('grupo', 0);
        $this->db->where('lang', 'pt');
        $this->db->where('tipo', 'conteudo');
        $this->db->order_by('ordem, titulo');
        $post = $this->db->get('cms_conteudo');
        return $this->parseCategories($post->result_array());

        return $posts;
    }
    
    public function getActiveCategory()
    {
        return $this->activeCategory;
    }


    public function setActiveCategory($catObj)
    {
        $this->activeCategory = $catObj;
    }

    public function getFromCategory()
    {
        $posts = $this->cms_posts->get(array(
            'modulo_id' => $this->getModuleId(),
            'per_page' => $this->getPerPage(),
            'base_url' => $this->getBaseUrl(),
            'ordem' => $this->getOrder(),
            'grupo_id' => $this->getCategory(),
            'campos' => 'id, nick, full_uri, titulo, resumo, txt, dt_ini, galeria, modulo_id'
        ));

        return $posts;
    }

    public function find($postId)
    {
        
    }

    public function parseCategories($array)
    {
        if (!is_array($array))
        {
            $categories = array($array);
        }
        else
        {
            $categories = $array;
        }
        $return = array();
        
        $u2 = $this->uri->segment(2);
        $u3 = $this->uri->segment(3);

        foreach ($categories as $cat)
        {
            $cat['active'] = '';
            if($u2 && $u3 && $u3 == $cat['nick'])
            {
                $cat['active'] = 'active';
                $this->setActiveCategory($cat);
            }
            $cat['full_uri'] = $this->getBaseUrl() . '/categoria/' . $cat['nick'];
            $return[] = $cat;
        }

        return $return;
    }

}