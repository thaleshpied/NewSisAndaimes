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

}