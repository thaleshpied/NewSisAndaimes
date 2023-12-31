<?php

 
class Estoque_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Selecionando produto por idProduto
     */
    function get_estoque($id)
    {
        return $this->db->get_where('sis_equipamentos',array('id'=>$id))->row_array();
    }
        
    /*
     * Selecionando tudo da tabela produto
     */
    function get_all_sis_equipamentos()
    {
        //$this->db->where('saldoimplantado >', 0);
        //$this->db->order_by('id', 'desc');
        //return $this->db->get('sis_equipamentos')->result_array();
    }


	/*
	 * Logando cliente
	 */
	function logar_cliente($email, $senha)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('email',$email);
		$this->db->where('senha',$senha);

		if($query=$this->db->get())
		{
			return $query->row_array();
		}
		else{
			return false;
		}
	}  
    
     /* Retorna total de produtos cadastrados */
    function cont_all_estoque(){
        return $this->db->count_all('sis_equipamentos');
    }

    /* Retorna total de areas cadastradas */
    function cont_all_areas(){
        return $this->db->count_all('sis_area');
    }

    /* Retorna total de montadores cadastrados */
    function cont_all_montadores(){
        return $this->db->count_all('sis_equipe');
    }


    /*PEGANDO TUDO DA TABELA SIS_EQUIPAMENTOS*/    
    function get_all_equipamentos()
    {   
        $this->db->order_by('equipamento');
        return $this->db->get('sis_equipamentos')->result_array();
    }

    

    /*PEGANDO TUDO DA TABELA sis_area*/    
    function get_all_areasall()
    {   
        $this->db->order_by('Area');
        return $this->db->get('sis_area')->result_array();
    }
    
    /*PEGANDO DADOS PARA GRÁFICO DE ESTOQUE GERAL EM USO, IMPLANTADO, FÍSICO DA TABELA SIS_EQUIPAMENTOS*/    
    public function saldoemuso() {
        $query = $this->db->query("SELECT 
            SUM(SALDOEMUSO) AS EMUSO,
            SUM(SALDOFISICO) AS FISICO,
            SUM(SALDOIMPLANTADO) AS IMPLANTADO
            FROM sis_equipamentos");

        return $query->row(); // Retorna uma única linha como objeto
    }

    /* SALDO IMPLANTADO */
    function sum_implantado(){
        return $this->db->select_sum('saldoimplantado');
    }







}