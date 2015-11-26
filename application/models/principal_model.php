
<?php

class Principal_model extends CI_Model{

	/*SELECT titulo, numero_vagas, c.sigla, ci.nome, u.sigla FROM vagas v JOIN cursos_vagas cv ON v.id = cv.vagas_id
 JOIN cursos c ON c.id = cv.cursos_id JOIN empresas e ON e.id = v.empresas_id JOIN cidade ci ON ci.id = e.cidade_id 
 JOIN uf u ON u.id = ci.uf_id */


 public function consultaTodasVagas(){

 	$this->db->select('v.id, titulo, v.numero_vagas, group_concat(c.sigla) AS "Sigla_Curso", ci.nome, u.sigla');
 	$this->db->from("vagas v");
 	$this->db->join('cursos_vagas cv', 'v.id = cv.vagas_id');
 	$this->db->join('cursos c', 'c.id = cv.cursos_id');
 	$this->db->join('empresas e', 'e.id = v.empresas_id');
 	$this->db->join('cidade ci', 'ci.id = e.cidade_id');
 	$this->db->join('uf u', 'u.id = ci.uf_id');
 	$this->db->group_by('v.id');
 	$this->db->limit(8);
 	$query = $this->db->get();
 	return $query->result_array();
 }
 public function consultaForm($dados){
 	if($dados['curso'] != 0 && $dados['pesq'] != null)
 	{
 		$this->db->select('v.id, titulo, v.numero_vagas, group_concat(c.sigla) AS "Sigla_Curso", ci.nome, u.sigla');
 		$this->db->from("vagas v");
 		$this->db->join('cursos_vagas cv', 'v.id = cv.vagas_id');
 		$this->db->join('cursos c', 'c.id = cv.cursos_id');
 		$this->db->join('empresas e', 'e.id = v.empresas_id');
 		$this->db->join('cidade ci', 'ci.id = e.cidade_id');
 		$this->db->join('uf u', 'u.id = ci.uf_id');
 		$this->db->where('c.id =', $dados['curso']);
 		$this->db->like('titulo', $dados['pesq']);
 		$this->db->group_by('v.id');
 		$this->db->order_by('titulo','asc');
 		$this->db->limit(8);
 		$query = $this->db->get();
 		return $query->result_array();
 	}
 	else if($dados['curso'] == 0 && $dados['pesq'] != null)
 	{
 		$this->db->select('v.id, titulo, v.numero_vagas,group_concat(c.sigla) AS "Sigla_Curso", ci.nome, u.sigla');
 		$this->db->from("vagas v");
 		$this->db->join('cursos_vagas cv', 'v.id = cv.vagas_id');
 		$this->db->join('cursos c', 'c.id = cv.cursos_id');
 		$this->db->join('empresas e', 'e.id = v.empresas_id');
 		$this->db->join('cidade ci', 'ci.id = e.cidade_id');
 		$this->db->join('uf u', 'u.id = ci.uf_id');
 		$this->db->like('titulo', $dados['pesq']);
 		$this->db->group_by('v.id');
 		$this->db->order_by('titulo','asc');
 		$this->db->limit(8);
 		$query = $this->db->get();
 		return $query->result_array();
 	}
 	else if($dados['curso'] != 0 && $dados['pesq'] == null){
 		
 		$this->db->select('v.id, titulo, v.numero_vagas, group_concat(c.sigla) AS "Sigla_Curso", ci.nome, u.sigla');
 		$this->db->from("vagas v");
 		$this->db->join('cursos_vagas cv', 'v.id = cv.vagas_id');
 		$this->db->join('cursos c', 'c.id = cv.cursos_id');
 		$this->db->join('empresas e', 'e.id = v.empresas_id');
 		$this->db->join('cidade ci', 'ci.id = e.cidade_id');
 		$this->db->join('uf u', 'u.id = ci.uf_id');
 		$this->db->where('c.id =', $dados['curso']);
 		$this->db->group_by('v.id');
 		$this->db->order_by('titulo','asc');
 		$this->db->limit(8);
 		$query = $this->db->get();
 		return $query->result_array();
 	}
 	else
 	{

 		$this->db->select('v.id, titulo, v.numero_vagas, group_concat(c.sigla) AS "Sigla_Curso", ci.nome, u.sigla');
 		$this->db->from("vagas v");
 		$this->db->join('cursos_vagas cv', 'v.id = cv.vagas_id');
 		$this->db->join('cursos c', 'c.id = cv.cursos_id');
 		$this->db->join('empresas e', 'e.id = v.empresas_id');
 		$this->db->join('cidade ci', 'ci.id = e.cidade_id');
 		$this->db->join('uf u', 'u.id = ci.uf_id');
 		$this->db->group_by('v.id');
 		$this->db->limit(8);
 		$query = $this->db->get();
 		return $query->result_array();
 	}
 }
}