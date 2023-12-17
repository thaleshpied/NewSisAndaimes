<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina extends CI_Controller {

	
	protected $dados = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Estoque_model');
		$this->load->helper('funcoes_helper');
		if (!isset($_SESSION['andaimes'])) {
			$_SESSION['andaimes'] = array();
		}

							
	}


	public function index()
		{
			if (!isset($_SESSION['idCliente'])) {
				$dados['title'] = "Sis Andaimes";
				$this->load->view('components/head.php', $dados); 
				$this->load->view('components/login.php', $dados);
			} else {
				$dados['title'] = "Sis Andaimes";
				$emuso = $this->Estoque_model->saldoemuso();
				$dados['emuso'] = $emuso;

				$estoquetotal = $this->Estoque_model->cont_all_estoque();
				$dados['estoquetotal'] = $estoquetotal;

				$saldoimplantado = $this->Estoque_model->sum_implantado();
				$dados ['saldoimplantado'] = $saldoimplantado;

				$areascadastradas = $this->Estoque_model->cont_all_areas();
				$dados['areascadastradas'] = $areascadastradas;

				$montadores = $this->Estoque_model->cont_all_montadores();
				$dados['montadores'] = $montadores;

				$dados['andaimes'] = array();

				foreach ($_SESSION['andaimes'] as $andaime => $quantidade) {
					$dados['andaimes'][] = array('andaime' => $andaime, 'quantidade' => $quantidade);
				}

				$this->load->view('components/head.php', $dados);
				$this->load->view('components/nav.php', $dados);
				$this->load->view('index.php', $dados);
			}
		}




	public function off()
	{

		
		if(!isset($_SESSION['idCliente'])) {
			$dados['title'] = "Sis Andaimes";
			$this->load->view('components/head.php', $dados); 
			$this->load->view('components/login.php', $dados);

		} else {

			$dados['title'] = "Sis Andaimes";

			$emuso = $this->Estoque_model->saldoemuso();
			$dados['emuso'] = $emuso;

			$estoquetotal = $this->Estoque_model->cont_all_estoque();
			$dados['estoquetotal'] = $estoquetotal;

			$saldoimplantado = $this->Estoque_model->sum_implantado();
			$dados ['saldoimplantado'] = $saldoimplantado;

			$areascadastradas = $this->Estoque_model->cont_all_areas();
			$dados['areascadastradas'] = $areascadastradas;

			$montadores = $this->Estoque_model->cont_all_montadores();
			$dados['montadores'] = $montadores;

			/*foreach ($_SESSION['andaimes'] as $andaime => $i) {
				$dados['andaimes']['andaime'][$andaime]['andaime'] = $i;
			}*/

			foreach ($_SESSION['andaimes'] as $andaime => $i) {
				$dados['andaimes'] = $i;
			}
			
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

	/* Adicionando andaime a sessao */
	public function add()
	{
		$andaime = $this->input->post('andaime');

		if (!isset($_SESSION['andaimes'][$andaime])) {
			$_SESSION['andaimes'][$andaime] = 1; // Se o andaime não existir na sessão, adiciona com quantidade 1
		} else {
			$_SESSION['andaimes'][$andaime]++; // Se o andaime já existir na sessão, incrementa a quantidade
		}

		echo json_encode(['message' => 'Andaime adicionado localmente!', 'success' => true]);
	}

	/* Removendo o andaime da sessão */
	public function removerCarrinho()
	{
		$idProduto = $this->input->post('idProduto');

		unset($_SESSION['carrinho'][$idProduto]);

		echo json_encode('Produto removido do carrinho!');
	}

}