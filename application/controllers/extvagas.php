<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Extvagas extends CI_Controller 
{ 

	public function __construct(){
		parent::__construct();

		$this->load->model('extvaga_model');
	}

	public function index() { 
		$dados = array(
			'vagasNaoAprovadas' => $this->extvaga_model->consultaVagasNaoAprovadas(),
			'vagasAprovadas' => $this->extvaga_model->consultaVagasAprovadas()
			);

		//var_dump($dados['vagasAprovadas']);

		$this->load->view('layout/topoADM');
		$this->load->view('cliente/extensaoVagas', $dados);
		$this->load->view('layout/rodape');

	}

	public function aprovarVaga($idVaga){
		$this->extvaga_model->aprovarVaga($idVaga);

		redirect('extvagas','refresh');
	}

	public function excluirVaga($idVaga){
		$this->extvaga_model->excluirVaga($idVaga);

		redirect('extvagas','refresh');
	}

	public function visualizarVaga($idVaga){
		$dados = array(
			'vaga' => $this->extvaga_model->visualizarVagaExt($idVaga),
			'inscritos' => $this->extvaga_model->inscritos($idVaga)
			);

		$this->load->view('layout/topoADM');
		$this->load->view('cliente/extensaoVisVagas', $dados);
		$this->load->view('layout/rodape');
	}

	public function aprovarAluno(){

		if ($this->input->post('selecionado')) {
			$dados = array(
			'selecionado' => 1,
			);
		}else{
			$dados = array(
			'selecionado' => 0,
			);
		}

		$alunosId = $this->input->post('aluno');
		$vagasId = $this->input->post('vagaid');
		
		//var_dump($alunosId);

		$this->extvaga_model->aprovarInscrito($dados, $alunosId, $vagasId);

	}

}
?>