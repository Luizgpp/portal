<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller 
{ 

	public function __construct(){
		parent::__construct();

		$this->load->model("login_model");
		$this->load->model("Principal_model","p");
	}

	function logar(){
		$email = $this->input->post('email');
		// $senha = md5(md5($this->input->post('senha')));
		$senha = $this->input->post('senha');

		if($this->login_model->login($email,$senha)){
			$this->session->set_userdata("logado",1);

			$usuario = $this->login_model->dadosUsuario($email);
			$this->session->set_userdata("email", $usuario->email);
			$this->session->set_userdata("nome", $usuario->nome);
			$this->session->set_userdata("tipo", $usuario->tipo);

			redirect('principal','refresh');

		}else{

			$dados = array(	'vagas' => $this->p->consultaTodasVagas(),
							'error' => 'Email/Senha Inválido');


			$this->load->view('layout/topo');
			$this->load->view('cliente/principal',$dados);
			$this->load->view('layout/rodape');
		}

	}

	function logout(){
		$this->session->unset_userdata("logado");
		$this->session->unset_userdata("conta");
		redirect(base_url());
	}
}

?>