<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Cadvaga_model extends CI_Model 
{ 
	public function buscaCursos(){
		$query = $this->db->get('cursos');
		return $query->result();
	}

	public function buscaEmpresas(){
		$this->db->select('id,nome_fantasia');
		$query = $this->db->get('empresas');
		return $query->result();
	}

	public function buscaBeneficios(){
		$query = $this->db->get('beneficios');
		return $query->result();
	}
	
	public function inserirVaga($vaga,$cursos,$beneficios = NULL){
		//inserindo vaga
		$this->db->insert('vagas',$vaga);
		$vagaId = $this->db->insert_id();

		//inserindo cursos
		$dadosCurso = array();
		foreach ($cursos as $curso) {
			$dados = array(
				'vagas_id' => $vagaId,
				'cursos_id' => $curso
				
				);
			array_push($dadosCurso, $dados);
		}

		$this->db->insert_batch('cursos_vagas',$dadosCurso);

		//Inserindo beneficios
		$dadosBeneficio = array();
		foreach ($beneficios as $beneficio) {
			$dados1 = array(
				'vagas_id' => $vagaId,
				'beneficios_id' => $beneficio
				);
			array_push($dadosBeneficio, $dados1);
		}

		$this->db->insert_batch('vagas_beneficios',$dadosBeneficio);
	}


}

?>