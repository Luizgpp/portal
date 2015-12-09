<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Extvaga_model extends CI_Model 
{ 
	public function consultaVagasNaoAprovadas(){

		$this->db->select('v.id, titulo, numero_vagas, group_concat(c.sigla) AS "sigla_curso", ci.nome as cidade, u.sigla');
		$this->db->from('vagas v');
		$this->db->join('cursos_vagas cv', 'v.id = cv.vagas_id');
		$this->db->join('cursos c', 'c.id = cv.cursos_id');
		$this->db->join('empresas e', 'e.id = v.empresas_id');
		$this->db->join('cidade ci', 'ci.id = e.cidade_id');
		$this->db->join('uf u', 'u.id = ci.uf_id');
		$this->db->where('v.aprovado=', 0);
		$this->db->where('v.ativo=', 1);
		$this->db->group_by('v.id');
		$query1 = $this->db->get();



		return $query1->result();	
	}

	public function consultaVagasAprovadas(){
		$this->db->distinct();
		$this->db->select('v.id, titulo, numero_vagas, group_concat(c.sigla) AS "sigla_curso", ci.nome as cidade, u.sigla');
		$this->db->from('vagas v');
		$this->db->join('cursos_vagas cv', 'v.id = cv.vagas_id');
		$this->db->join('cursos c', 'c.id = cv.cursos_id');
		$this->db->join('empresas e', 'e.id = v.empresas_id');
		$this->db->join('cidade ci', 'ci.id = e.cidade_id');
		$this->db->join('uf u', 'u.id = ci.uf_id');
		$this->db->where('v.aprovado=', 1);
		$this->db->where('v.ativo=', 1);
		$this->db->group_by('v.id');
		$query1 = $this->db->get();
		$vagas = $query1->result();

		$this->db->select('vagas_id,count(vagas_id) as "numero_inscritos"');
		$this->db->from('vagas_alunos');
		$this->db->join('vagas','vagas.id = vagas_alunos.vagas_id');
		$this->db->where('vagas.aprovado=', 1);
		$this->db->where('vagas.ativo=', 1);
		$this->db->group_by('vagas_id');
		$query2 = $this->db->get();
		$num_inscritos = $query2->result_array();



		$i = 0;
		foreach ($vagas as $vaga) {
			if($i < count($num_inscritos)){
				if($vaga->id == $num_inscritos[$i]['vagas_id']){
					$vaga->numero_inscritos =  $num_inscritos[$i]['numero_inscritos'];
				}
			}else{
				$vaga->numero_inscritos = 0;
			}
			$i++;
		}

		return $vagas;
	}

	public function aprovarVaga($idVaga){

		$dados = array(
			'aprovado' => 1 
			);
		$this->db->where('id', $idVaga);
		$this->db->update('vagas', $dados);
	}

	public function excluirVaga($idVaga){

		$dados = array(
			'ativo' => 0
			);
		$this->db->where('id', $idVaga);
		$this->db->update('vagas', $dados);
	}

	public function visualizarVagaExt($idVaga){
		//$this->db->distinct();
		$this->db->select('v.id, titulo, v.descricao, requisito, remunerado, valor_bolsa, outros_beneficios, numero_vagas, group_concat(distinct c.sigla) AS "sigla_curso", ci.nome as cidade, u.sigla, group_concat(distinct vb.beneficios_id) AS "beneficios_id"');
		$this->db->from('vagas v');
		$this->db->join('cursos_vagas cv', 'v.id = cv.vagas_id');
		$this->db->join('cursos c', 'c.id = cv.cursos_id');
		$this->db->join('empresas e', 'e.id = v.empresas_id');
		$this->db->join('cidade ci', 'ci.id = e.cidade_id');
		$this->db->join('uf u', 'u.id = ci.uf_id');
		$this->db->join('vagas_beneficios vb', 'vb.vagas_id = v.id');
		$this->db->join('beneficios b', 'b.id = vb.beneficios_id');
		$this->db->where('v.aprovado=', 1);
		$this->db->where('v.ativo=', 1);
		$this->db->where('v.id=', $idVaga);
		$this->db->group_by('v.id');
		$query1 = $this->db->get();
		$vagas = $query1->result();

		$this->db->select('vagas_id,count(vagas_id) as "numero_inscritos"');
		$this->db->from('vagas_alunos');
		$this->db->join('vagas','vagas.id = vagas_alunos.vagas_id');
		$this->db->where('vagas.aprovado=', 1);
		$this->db->where('vagas.ativo=', 1);
		$this->db->group_by('vagas_id');
		$query2 = $this->db->get();
		$num_inscritos = $query2->result_array();



		$i = 0;
		foreach ($vagas as $vaga) {
			if($i < count($num_inscritos)){
				if($vaga->id == $num_inscritos[$i]['vagas_id']){
					$vaga->numero_inscritos =  $num_inscritos[$i]['numero_inscritos'];
				}
			}else{
				$vaga->numero_inscritos = 0;
			}
			$i++;
		}

		return $vagas;
	}

	public function inscritos($idVaga){
		$this->db->select('va.vagas_id, va.alunos_id, va.selecionado, a.prontuario, a.nome, c.sigla');
		$this->db->from('vagas_alunos va');
		$this->db->join('alunos a', 'va.alunos_id = a.id');
		$this->db->join('cursos c', 'c.id = a.cursos_id');
		$this->db->where('vagas_id', $idVaga);
		$this->db->order_by('a.prontuario');

		$query1 = $this->db->get();
		$inscritos = $query1->result();

		return $inscritos;
	}

	public function aprovarInscrito($dados, $alunosId, $vagasId){
		$this->db->where('alunos_id', $alunosId);
		$this->db->where('vagas_id', $vagasId);
		
		$this->db->update('vagas_alunos', $dados);
	}

}

?>