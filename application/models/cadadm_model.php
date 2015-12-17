<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Cadadm_model extends CI_Model {
    
    function cadastrarAdm(){
        
        $campousuario = array (
            'tipo' => 2,
            'ativo' => 1,
            'email' =>$this->input->post('email')
        );
        $this->db->insert('usuarios', $campousuario);
        $campousuarioId = $this->db->insert_id();
        
        
        $campodados = array (
            'prontuario' =>$this->input->post('prontuario'),
            'nome' =>$this->input->post('nome'),
            'usuarios_id' => $campousuarioId
        );
        $this->db->insert('administradores', $campodados);
        

    }
    
    
    
}
?>