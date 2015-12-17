<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Cadempresa_model extends CI_Model {
    
    function inserirCadastro(){
        $usuario = array(
            'ativo' => 1,
            'tipo' => 3,
            'email' => $this->input->post('email'),
            'senha' => md5(md5($this->input->post('conSenha')))
            );
        
        $this->db->insert('usuarios', $usuario);
        $usuarioId = $this->db->insert_id();

        $empresa = array(
            'cnpj' => preg_replace("/\D+/","",$this->input->post('cnpj')),
            'razao_social' => $this->input->post('razaoSoci'),
            'nome_fantasia' => $this->input->post('nomeFanta'),
            'endereco' => $this->input->post('endereco').$this->input->post('numero').$this->input->post('bairro').$this->input->post('complemento'),
            'cidade_id' => $this->input->post('cidade'),
            'cep' => preg_replace("/\D+/","",$this->input->post('cep')),
            'nome_contato' => $this->input->post('contato'),
            'telefone' => preg_replace("/\D+/","",$this->input->post('telefone')),
            'senha' => md5(md5($this->input->post('conSenha'))),
            'usuarios_id' => $usuarioId
            
            );   
        $this->db->insert('empresas', $empresa);
        
    }
    
    function pegacidade(){
        $this->db->from('cidade');
        $query = $this->db->get();
        return $query->result();
    }
}
?>