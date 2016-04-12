<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Cadvaga extends MY_Controller 
{ 

	public function __construct(){
		parent::__construct();

		$this->load->model('cadvaga_model');
	}

	public function index() { 
		$dados = array(
			'cursos' => $this->cadvaga_model->buscaCursos(),
			'empresas' => $this->cadvaga_model->buscaEmpresas(),
			'beneficios' => $this->cadvaga_model->buscaBeneficios()
			);

		$this->load->view('layout/topoADM');
		$this->load->view('cliente/extensaoCadVagas', $dados);
		$this->load->view('layout/rodape');
	}

	public function	cadastrar(){
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


			$this->cadvaga_model->inserirVaga($dados,$cursos,$beneficios);
			redirect('cadvaga','refresh');
		}
	}


}

?>