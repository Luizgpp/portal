<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Principal extends CI_Controller 
{ 

	public function __construct(){
		parent::__construct();
		$this->load->model("Principal_model","p");

	}
	function index() { 
		
		$this->load->view('layout/topo');
		$dados = array('vagas' => $this->p->consultaTodasVagas());
		//var_dump($dados);

		$this->load->view('cliente/principal', $dados);
		$this->load->view('layout/rodape');
	} 

	function pesquisa(){

		$this->load->view('layout/topo');
		$dados = array('curso' => $this->input->post('cursos'),
			'pesq' => $this->input->post('pesquisa'));
		$pesquisa = array('vagas' => $this->p->consultaForm($dados));
		$this->load->view('cliente/principal',$pesquisa);
		$this->load->view('layout/rodape');
	}
}


?>