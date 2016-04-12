
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model{

	function login($email, $senha){

		$this->db->select("email,senha,tipo,ativo");
		$this->db->from("usuarios");    
		$this->db->where("email",$email);
		$this->db->where("senha", $senha);
		$this->db->where("ativo",1);
		$this->db->limit(1);
		$query = $this->db->get();

		if($query->num_rows() === 1){
			return true;
		}else{
			return false;
		}
	}

	function dadosUsuario($email){
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where("usuarios.email",$email);
		$this->db->join('alunos', 'alunos.usuarios_id = usuarios.id');
		$query = $this->db->get();


		return $query->row();
	}

}
?>