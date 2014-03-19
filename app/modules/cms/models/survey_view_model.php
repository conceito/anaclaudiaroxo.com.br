<?php

class Survey_view_model extends CI_Model
{

    /**
     * ID da survey para consultas
     * @var int
     */
    public $surveyId;
    /**
     * Memória de todos os registros da survey (step, group, query)
     * @var array
     */
    public $structure;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retorna um objeto da survey com os objetos dependentes
     * 
     * <code>
     * //
     * $struc = $this->survey->structure($is);
     * // passos
     * $steps = $struc->steps(); 
     * // questões de um passo
     * $querys = $steps[0]->querys();
     * // grupos de um passo
     * $groups = $steps[0]->groups();
     * // questões de um grupo
     * $groupsQ = $groups[0]->querys();
     * </code>
     * 
     * @param type $id
     */
    public function getStructure($id)
    {
        $this->surveyId = $id;
        
        $query = $this->db->where('rel', $id)
                ->order_by('ordem, id')
                ->select('id, ordem, titulo, resumo, txtmulti, tags, grupo, rel, modulo_id, tipo')
                ->get('cms_conteudo');

        $this->structure = $query->result();

        return $this;
    }

    /**
     * Itera pela estrutura e retorna os passos
     * @return array
     */
    public function steps()
    {
        $steps = array();

        foreach ($this->structure as $c => $obj)
        {
            if ($obj->tipo == 'survey_step')
            {
                $steps[] = $obj;
            }
        }
        return $steps;
    }

    /**
     * Itera pela estrutura e retorna os grupos relacionados ao ID
     * passado como argumento
     * @param int $stepId
     * @return array
     */
    public function groups($stepId)
    {
        $groups = array();

        foreach ($this->structure as $c => $obj)
        {
            if ($obj->tipo == 'survey_group' && $obj->grupo == $stepId)
            {
                $groups[] = $obj;
            }
        }
        return $groups;
    }

    /**
     * Itera pela estrutura e retorna as questões do grupo/passo com 
     * o ID passado
     * @param int   $parentId   ID do step ou group
     * @return array
     */
    public function queries($parentId)
    {
        $queries = array();

        foreach ($this->structure as $c => $obj)
        {
            if ($obj->tipo == 'survey_query' && $obj->grupo == $parentId)
            {
                $queries[] = $obj;
            }
        }
        return $queries;
    }
    
    public function getAsnwers()
    {
        return '';
    }

}