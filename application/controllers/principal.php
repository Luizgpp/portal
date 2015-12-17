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

	function modal(){
		$id = $this->input->post('idvaga');
		$dados = $this->p->consultaId($id);

		echo json_encode($dados, JSON_UNESCAPED_UNICODE);

	}
	function candidatar(){
		$idvaga = $this->uri->segment(3);
		$idusuario = $this->uri->segment(4);
		$controle = $this->p->candidatar($idvaga, $idusuario);
		echo "<script> alert('Inscrição feita com sucesso! um email será enviado com mais detalhes de sua inscrição'); </script>";
		//redirect('Principal/index');
		/*if($controle){

			echo "<script> alert('Inscrição feita com sucesso! um email será enviado com mais detalhes de sua inscrição'); </script>";
			$aluno = $this->p->consultarAluno($idaluno);
			var_dump($aluno);
			$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'natan.greghi@gmail.com', // change it to yours
				'smtp_pass' => 'jamanta@1406', // change it to yours
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
				);

			$this->load->library('email',$config);
			$this->email->from('natan.greghi@gmail.com', 'Natan Greghi');
			$this->email->to('luizgpp@gmail.com');
			$this->email->subject('Inscrição da Vaga');
			$this->email->message('Olá sua inscrição na vaga foi efetuada com sucesso, e será avaliada pela coordenadoria de extensão. Aguarde o email de aprovação.');
			$this->email->send();
			echo $this->email->print_debugger();
		}*/
	}	
}



?>