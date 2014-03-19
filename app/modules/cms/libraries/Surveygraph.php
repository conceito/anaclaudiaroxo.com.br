<?php

class Surveygraph
{

    private $ci;

    /**
     * Lista das views principais
     * @var array
     */
    protected $view = array();

    /**
     * Título da janela
     * @var string
     */
    public $title = '';

    /**
     * Dados da survey
     * @var object
     */
    protected $survey;
    
    public $structure;

    /**
     * Filtros possíveis
     * @var array
     */
    public $filters = array(
        'dt1' => false, // data inicial
        'dt2' => false, // data final
    );

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    /**
     * Renderiza view completa
     * 
     * partes da view:
     * - filters    "Barra de filtros"
     * - breadcrumb "Nome do cliente e questionário"
     * - main       "Corpo da página"
     */
    public function render()
    {
        $this->view['title'] = $this->getTitle();

        $this->view['filters'] = $this->getViewFilters();
        $this->view['breadcrumb'] = $this->getViewBreadcrumb();
        $this->view['main'] = $this->getViewMain();
        $this->view['footer'] = $this->getViewFooter();

        $this->ci->load->view('cms/survey_view/main', $this->view);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setSurvey($survey)
    {
        $this->survey = $survey;
    }

    /**
     * Retorna array com todos os filtros combinados com a seleção da URI
     */
    public function getFilters()
    {
        
    }

    /**
     * Insere novo tipo de filtro
     * @param string $name
     */
    public function setFilter($name, $default = false)
    {
        $this->filters = array_merge($this->filters, array($name => $default));
    }

    /**
     * Define o conteúdo da view 'filters'
     * @param string $view
     */
    public function setViewFilters($view = '')
    {
        $this->view['filters'] = $view;
    }

    public function getViewFilters()
    {
        $view['brand'] = $this->ci->config->item('title');
        $view['surveyName'] = $this->survey['titulo'];
        return $this->ci->load->view('cms/survey_view/filters', $view, true);
    }

    public function getViewBreadcrumb()
    {
        $view['brand'] = $this->ci->config->item('title');
        $view['surveyName'] = $this->survey['titulo'];
        return $this->ci->load->view('cms/survey_view/breadcrumb', $view, true);
    }

    public function getViewFooter()
    {
        $view['brand'] = $this->ci->config->item('title');
        $view['surveyName'] = $this->survey['titulo'];
        return $this->ci->load->view('cms/survey_view/footer', $view, true);
    }

    /**
     * Define o conteúdo da view 'main'
     * @param string $view
     */
    public function getViewMain()
    {
        $view['structure'] = $this->getStructure();
        return $this->ci->load->view('cms/survey_view/structure', $view, true);
    }
    
    public function setStructure($obj)
    {
        $this->structure = $obj;
    }

    public function getStructure()
    {
        return $this->structure;
    }
}