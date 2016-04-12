<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model("login_model");
		$logado = $this->session->userdata('logado');

		if($logado != 1){
			redirect('principal','refresh');
		}else{
			$usuario = $this->login_model->dadosUsuario($this->session->email);
			$this->session->set_userdata("conta", $usuario);			
			
			if($this->session->tipo == 2){
				redirect('principal','refresh');
			}
		}
	}
}
?>
