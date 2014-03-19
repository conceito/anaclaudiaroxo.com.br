<?php

class SurveyView extends Cms_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('cms/survey_model', 'survey');
        $this->load->model('cms/survey_view_model', 'surveyView');
        $this->load->library(array('cms/surveygraph', 'cms_survey'));

        /*
         * Permite separar os arquivos de VIEW para personalizalos
         */
        $this->viewFolder = "survey_view/"; // ao preencher usar "/" após a string
    }
    
    /**
     * Exibição inicial.
     * - grafico de respostas
     * - botões de filtros personalizados
     * @param type $surveyId
     */
    public function index($surveyId = null)
    {
        $survey = $this->survey->retrieve($surveyId);
        
        $surveyStructure = $this->surveyView->getStructure($surveyId);
        
        $answers = $this->surveyView->getAsnwers();
        
//        dd($survey);
//        dd($surveyStructure);
        
        $this->surveygraph->setSurvey($survey);
        $this->surveygraph->setStructure($surveyStructure);
        
        $this->surveygraph->title = "Relatório";
        
        
        $this->surveygraph->render();
    }
    
    /**
     * 
     * @param type $surveyId
     */
    public function sheet($surveyId = null)
    {
        $survey = $this->survey->retrieve($surveyId);
        
        $surveyStructure = $this->surveyView->getStructure($surveyId);
        
        $answers = $this->surveyView->getAsnwers();
        
//        dd($survey);
//        dd($surveyStructure);
        
        $this->surveygraph->setSurvey($survey);
        $this->surveygraph->setStructure($surveyStructure);
        
        $this->surveygraph->title = "Relatório";
        
        
        $this->surveygraph->render();
    }
}