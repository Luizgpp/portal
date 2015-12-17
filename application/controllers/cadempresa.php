<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Cadempresa extends CI_Controller 
{ 

	public function __construct(){
		parent::__construct();
		$this->load->model("cadempresa_model");

	}
	function index() { 
        
        $cidade = array(
            'cidades' => $this->cadempresa_model->pegacidade()
        );
		
		$this->load->view('layout/topo');
		//var_dump($dados);

		$this->load->view('cliente/cadastroEmpresa', $cidade);
		$this->load->view('layout/rodape');
	} 
    public function cadastrar(){
        
        $this->form_validation->set_rules('cnpj', 'CNPJ', 'required|is_unique[empresas.cnpj]');
        $this->form_validation->set_rules('razaoSoci', 'Razão Social', 'required');
        $this->form_validation->set_rules('nomeFanta', 'Nome Fantasia', 'required');
        $this->form_validation->set_rules('endereco', 'endereço', 'required');
        $this->form_validation->set_rules('numero', 'Numero', 'required');
        $this->form_validation->set_rules('bairro', 'Bairro', 'required');
        $this->form_validation->set_rules('cep', 'CEP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[usuarios.email]');
        $this->form_validation->set_rules('contato', 'Contato', 'required');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        $this->form_validation->set_rules('consenha', 'Confirmar Senha', 'required|matches[senha]');
        
        $this->form_validation->set_message('is_unique', 'Campo ja cadastrado');
        $this->form_validation->set_message('matches', 'As senhas não correspondem');
        
        if($this->form_validation->run() == FALSE){
			$this->index();
        }
        else{
            
           $this->cadempresa_model->inserirCadastro();
            $this->index();
            
            
        }
    }

}

?>