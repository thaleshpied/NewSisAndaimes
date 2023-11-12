<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina extends CI_Controller {

	
	protected $dados = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Estoque_model');
		$this->load->helper('funcoes_helper');
							
	}


	public function index()
	{
		/*$dados['title'] = "Sis";
		//$estoque = $this->Estoque_model->get_all_sis_equipamentos();
		$this->load->view('index.php', $dados);*/

		if(!isset($_SESSION['idCliente'])) {
			$dados['title'] = "Sis Andaimes";
			$this->load->view('components/head.php', $dados);
			$this->load->view('components/login.php', $dados);

		} else {
			$dados['title'] = "Sis Andaimes";

			$estoquetotal = $this->Estoque_model->cont_all_estoque();
			$dados['estoquetotal'] = $estoquetotal;

			$areascadastradas = $this->Estoque_model->cont_all_areas();
			$dados['areascadastradas'] = $areascadastradas;

			$montadores = $this->Estoque_model->cont_all_montadores();
			$dados['montadores'] = $montadores;

			$this->load->view('components/head.php', $dados);
			$this->load->view('components/nav.php', $dados);
			$this->load->view('index.php', $dados);

		}
	}

	/* Logando usuario
	 Verificando se o usuario esta cadastrado, caso esteja cadastrado o login é realizado salvando os dados da sessão */
	 public function login()
	{

		$cliente = array(
			'email' => $this->input->post('inputEmailLogin'),
			'senha' => md5($this->input->post('inputSenhaLogin'))
		);

		$logando = $this->Estoque_model->logar_cliente($cliente['email'],$cliente['senha']);

		if ($logando['status'] == 'ativo') {

			$this->session->set_userdata('idCliente',$logando['idCliente']);
			$this->session->set_userdata('nome',$logando['nome']);
			$this->session->set_userdata('telefone',$logando['telefone']);
			$this->session->set_userdata('email',$logando['email']);

			$this->index();


		} elseif ($logando['status'] == 'bloqueado') {

			$mensagem = 'Usuário inativo ou bloqueado. Por favor, entre em contato com o suporte.';
			echo json_encode($mensagem);
			return true;

		} else {

			$mensagem = 'Email ou senha incorretos!';
			echo json_encode($mensagem);
			return true;

		}
	}

	/* Deslogando Usuário */
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}