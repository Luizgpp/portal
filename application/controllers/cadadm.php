<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Cadadm extends MY_Controller 
{ 

	public function __construct(){
		parent::__construct();
		$this->load->model("cadadm_model");

	}
	function index() { 


		$this->load->view('layout/topoAdm');

		$this->load->view('cliente/extensaoCadAdm');
		$this->load->view('layout/rodape');
	} 
    function cadastrarAdm() {
        $this->form_validation->set_rules('prontuario', 'Prontuario', 'required|is_unique[administradores.prontuario]');
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[usuarios.email]');
        
        $this->form_validation->set_message('is_unique', 'Campo ja cadastrado');
        
        if($this->form_validation->run() == FALSE){

            $this->index();
        }
        else{

            $this->cadadm_model->cadastrarAdm();
            $this->index();
        }
    }
}
?>
