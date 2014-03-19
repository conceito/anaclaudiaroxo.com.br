<?php

class Subscriptions_options_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retorna todos paginados
     * 
     * @param type $param
     */
    public function getAll($params)
    {
        /*
         * Variáveis de paginação
         */
        $pps = $this->config->item('pagination_limits');
        $pp = ($params['pp'] == '') ? $pps[0] : $params['pp']; // por página

        $pag = $this->uri->to_array('pag');
        if ($pag['pag'] == '')
        {
            $offset = 0;
        }
        else
        {
            $offset = ($pag['pag'] - 1) * $pp;
        }


        /*
         * opções de filtro
         */
        $uri_filters = $this->set_posts_filters();

        /*
         * main query
         */
        $this->db->limit($pp, $offset);

        $this->db->order_by('dt_ini desc, titulo');

        $this->db->where('modulo_id', $params['co']);

//        $this->db->where('grupo >', 0);
        $this->db->where('tipo', "subscription_options");

        $this->db->where('lang', get_lang());

        $this->db->select('SQL_CALC_FOUND_ROWS *', false);
        $sql = $this->db->get('cms_conteudo');


        /*
         * pega o Total de registros 
         */
        $query = $this->db->query('SELECT FOUND_ROWS() AS `Count`');
        $ttl_rows = $query->row()->Count;

        // paginação
        $this->load->library('pagination');
        $config['base_url'] = cms_url('cms/calendario/subscriptions_options/co:' . $params['co'] . $uri_filters);
        $config['total_rows'] = $ttl_rows;
        $config['per_page'] = $pp;
        $config['uri_segment'] = 11; // segmentos + 1
        $config['num_links'] = 4; // quantas páginas são mstradas antes de depois na paginação
        $config['num_tag_open'] = '<span class="pagnation_number">';
        $config['num_tag_close'] = '</span>';
        $config['cur_tag_open'] = '<span class="pagnation_current">';
        $config['cur_tag_close'] = '</span>';
        $this->pagination->initialize($config);

        $saida = array(
            'ttl_rows' => $ttl_rows,
            'rows' => $sql->result_array()
        );

        return $saida;
    }

    /**
     * Retorna um
     * 
     * @param type $id
     */
    public function find($id)
    {
        $this->db->where('id', $id);
        $this->db->select('id, titulo, resumo, txt, rel');
        $query = $this->db->get('cms_conteudo');

        if ($query->num_rows() == 0)
        {
            return false;
        }

        return $this->prepOption($query->row_array());
    }

    public function prepOption($row)
    {
        return $row;
    }

    /**
     * Insere novo objeti no DB
     * 
     * @param type $var
     */
    public function save_new($var)
    {
        $rel = $this->input->post('rel');
        $titulo = trim($this->input->post('titulo'));

        
        $dados['tipo'] = 'subscription_options';
        $dados['autor'] = $this->phpsess->get('admin_id', 'cms');
        $dados['lang'] = get_lang();
        $dados['titulo'] = $titulo;        
        $dados['dt_ini'] = date("Y-m-d");
        $dados['dt_fim'] = date("Y-m-d");
        $dados['hr_ini'] = date("H:i:s");
        $dados['hr_fim'] = date("H:i:s");
        $dados['grupo'] = 0;
        $dados['modulo_id'] = $var['co'];
        $dados['status'] = 1;        
        $dados['rel'] =  $rel;
        $dados['atualizado'] = date("Y-m-d H:i:s");

        $sql = $this->db->insert('cms_conteudo', $dados);
        $esteid = $this->db->insert_id();
        // -- >> LOG << -- //
        $oque = "Novas opções: <a href=\"" . cms_url('cms/calendario/subscriptions_options_edit/co:' . $var['co'] . '/id:' . $esteid) . "\">" . $titulo . "</a>";
        $this->cms_libs->faz_log_atividade($oque);
        
        return $esteid;
    }

    /**
     * Salva um objeto
     * 
     * @param type $id
     * @param type $options
     */
    public function save($id, $options)
    {
        
    }

    /**
     * Retorna um array com os conteúdos do módulo, que serão decorados com
     * as opções de insrição;
     * 
     * @param int $co
     * @param string $output
     * @return boolean|array
     */
    public function getRelatedContents($co, $selected = null, $output = 'array')
    {
        $this->db->where('modulo_id', $co);
        $this->db->where('tipo', 'conteudo');
        $this->db->where('grupo >', 0);
        $this->db->where('lang', get_lang());
        $this->db->order_by('dt_ini DESC, titulo');
        $this->db->select('id, titulo, status');
        $query = $this->db->get('cms_conteudo');

        if ($query->num_rows() == 0)
        {
            return false;
        }
        
//        dd($selected);

        $options = $query->result_array();

        if ($output == 'combobox')
        {
            $cb = array();
            foreach ($options as $o)
            {
                $cb[$o['id']] = $o['titulo'];
            }
            return form_dropdown('rel', $cb, $selected, 'class="input-combo " id="rel" style="width:100%"');
        }
        else
        {
            return $options;
        }
    }

    /**
     * Parseia $_POST e URI para saber se existem filtros ativos
     * Retorna URI para paginação.
     * 
     * @return string
     */
    private function set_posts_filters()
    {

        // define os campos que serão usados no filtro
        $campos_usados[] = array('campo' => 'titulo', 'type' => 'like');
//        $campos_usados[] = array('campo' => 'grupo', 'type' => 'text');
//        $campos_usados[] = array('campo' => 'destaque', 'type' => 'int');
        $campos_usados[] = array('campo' => 'dt_ini', 'type' => 'date');
        $campos_usados[] = array('campo' => 'dt_fim', 'type' => 'date');
        $campos_usados[] = array('campo' => 'status', 'type' => 'int');
        $campos_valorados = array();

//        mybug($this->input->post());
        // uri de filtros para paginação
        $return = '';

        // verifica se veio pelo POST ou URI
        foreach ($campos_usados as $row)
        {

            $campo = $row['campo'];
            $type = $row['type'];
            $uri = $this->uri->to_array('filter_' . $campo);

            // tem post?
            if (isset($_POST['filter_' . $campo]))
            {
                $valor = $_POST['filter_' . $campo];
            }
            // tem na URI
            else if ($uri['filter_' . $campo] != '')
            {
                $valor = $uri['filter_' . $campo];
            }
            else
            {
                $valor = '';
            }

            // acrescenta o valor
            $row['valor'] = $valor;
            $campos_valorados[] = $row;
        }

        // faz pesquisa
        foreach ($campos_valorados as $row)
        {

            if ($row['valor'] != '')
            {

                $campo = $row['campo'];
                $type = $row['type'];
                $valor = $row['valor'];

                // se for data
                if ($type == 'date' && strlen($valor) == 10)
                {
                    $valor = formaSQL($valor);
                }

                if ($type == 'like')
                {
                    $this->db->like('' . $campo, $valor);
                }
                else
                {
                    $this->db->where('' . $campo, $valor);
                }

                // incrementa uri
                $return .= '/filter_' . $campo . ':' . $valor;
            }
        }


//        mybug($return);
        return $return;
    }

}