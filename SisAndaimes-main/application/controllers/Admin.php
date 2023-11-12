<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	protected $dados = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('funcoes_helper');
							
	}


	public function index()
	{
		
		if(!isset($_SESSION['idCliente'])) {
			$dados['title'] = "Administração de Andaimes";
			$this->load->view('components/login.php', $dados);

		} else {
			$dados['title'] = "Administração de Andaimes";
			$this->load->view('adminandaimes.php', $dados);

		}

	}

}