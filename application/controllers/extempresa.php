<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Extempresa extends MY_Controller 
{ 

	public function __construct(){
		parent::__construct();

		$this->load->model('extvaga_model');
		$this->load->model('cadvaga_model');
	}

	public function index() { 
		$dados = array(
			'empresasNaoAprovadas' => $this->extvaga_model->consultaVagasNaoAprovadas(),
			'empresasAprovadas' => $this->extvaga_model->consultaVagasAprovadas()
			);		

		$this->load->view('layout/topoADM');
		$this->load->view('cliente/extensaoEmpresa');
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
		

		$this->extvaga_model->aprovarInscrito($dados, $alunosId, $vagasId);

	}

	public function editarVaga($idVaga){
		$vaga = array(
			'vaga' => $this->extvaga_model->editarVaga($idVaga),
			'empresas' => $this->cadvaga_model->buscaEmpresas(),
			'cursos' => $this->cadvaga_model->buscaCursos(),
			'beneficios' => $this->cadvaga_model->buscaBeneficios()
			);

		$this->load->view('layout/topoADM');
		$this->load->view('cliente/extensaoCadVagas', $vaga);
		$this->load->view('layout/rodape');
	}

	public function updateVaga(){
		$this->form_validation->set_rules('tituloVaga', 'Título Vaga', 'required');
		$this->form_validation->set_rules('numVagas', 'Número de Vagas', 'required');
		$this->form_validation->set_rules('descricao', 'Descrição', 'required');
		$this->form_validation->set_rules('requisitos', 'Requisitos', 'required');
		$this->form_validation->set_rules('empresa', 'Empresa', 'required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('cliente/extensaoVagas');
		}else{
			$dados = array(
				'titulo' => $this->input->post('tituloVaga'),
				'descricao' => $this->input->post('descricao'),
				'requisito' => $this->input->post('requisitos'),
				'remunerado' => $this->input->post('remunerado'),
				'valor_bolsa' => $this->input->post('valorRemunerado'),
				'numero_vagas' => $this->input->post('numVagas'),
				'ativo' => 1,
				'outros_beneficios' => $this->input->post('outros'),
				'empresas_id' => $this->input->post('empresa')
				);
			
			$beneficios = $this->input->post('beneficios[]');
			$cursos = $this->input->post('cursos[]');
			$vagaId = $this->input->post('vagaid');

			
			$this->extvaga_model->updateVaga($dados,$cursos,$beneficios,$vagaId);
			redirect('extvagas','refresh');
		}
	}

}
?>