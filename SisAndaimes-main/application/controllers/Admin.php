<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	protected $dados = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Estoque_model');
		$this->load->helper('funcoes_helper');
							
	}


	public function index()
	{
		
		if(!isset($_SESSION['idCliente'])) {
			$dados['title'] = "Administração de Andaimes";
			$this->load->view('components/login.php', $dados);

		} else {
			
			$dados['title'] = "Administração de Andaimes";

			$estoquetotal = $this->Estoque_model->cont_all_estoque();
			$dados['estoquetotal'] = $estoquetotal;

			$areascadastradas = $this->Estoque_model->cont_all_areas();
			$dados['areascadastradas'] = $areascadastradas;

			$montadores = $this->Estoque_model->cont_all_montadores();
			$dados['montadores'] = $montadores;

			$this->load->view('components/head.php', $dados);
			$this->load->view('components/nav.php', $dados);
			$this->load->view('adminandaimes.php', $dados);

		}

	}

}