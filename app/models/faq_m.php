<?php

class Faq_m extends CI_Model
{

    protected $model;

    protected $categories = null;

    protected $othersCategories = array('anestesia');

    function __construct()
    {
        parent::__construct();

        $this->model = $this->post->mod(70);
    }

    public function getCategories()
    {
        if ($this->categories === null || empty($this->categories)) {
            $cats = $this->model->base('duvidas-frequentes')->getCategories();
        } else {
            $cats = $this->categories;
        }

        return $cats;
    }

    public function getPostFromCategory($catSlug)
    {

        $posts = $this->model->base('duvidas-frequentes')->cat($catSlug)->order('cont.ordem')
            ->setPerPage(999)->getFromCategory();

        return $posts;
    }

    public function getProcedimentosCategories()
    {
        $cats     = $this->getCategories();
        $returned = array();

        if (empty($cats)) {
            return null;
        }

        foreach ($cats as $c) {
            if (in_array($c['nick'], $this->othersCategories)) {
                continue;
            }
            $returned[] = $c;
        }

        return $returned;
    }

    public function getOtherCategories()
    {
        $cats     = $this->getCategories();
        $returned = array();

        if (empty($cats)) {
            return null;
        }

        foreach ($cats as $c) {
            if (in_array($c['nick'], $this->othersCategories)) {
                $returned[] = $c;
            }
        }

        return $returned;
    }

    public function getActiveCategory()
    {

        $activeCat = $this->model->getActiveCategory();

        return $activeCat;
    }

}