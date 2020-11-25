<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Core_model extends CI_Model {
	public function get_all($tabela = NULL, $condicoes = NULL) {
		if ($tabela && $this->db->table_exists($tabela)) {
			if (is_array($condicoes)) {
				$this->db->where($condicoes);
			}
			return $this->db->get($tabela)->result();
		} else {
			return false;
		}
	}

	public function get_by_id($tabela = NULL, $condicoes = NULL) {
		if ($tabela && $this->db->table_exists($tabela) && is_array($condicoes)) {
			
				$this->db->where($condicoes);
				$this->db->limit(1);
			
			return $this->db->get($tabela)->row();
		} else {
			return false;
		}
	}

	public function insert($tabela = NULL, $data = NULL, $get_last_id = NULL) {
		if ($tabela && $this->db->table_exists($tabela) && is_array($data)) {
			//Insere na sessão o ultimo ID inserido na base de dados
			if ($get_last_id) {
				$this->session->set_userdata('last_id', $this->db->insert_id());
			}

			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
			} else {
				$this->session->set_flashdata('erro', 'Não foi possível salvar os dados');
			}
	
		} else {
			return false;
		}		
	} 

	public function update($tabela = NULL, $data = NULL, $condicoes = NULL) {
		if ($tabela && $this->db->table_exists($tabela) && is_array($data) && is_array($condicoes)) {
			if($this->db->update($tabela, $data, $condicoes)) {
				$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
			}else{
				$this->session->set_flashdata('erro', 'Não foi possível salvar os dados');
			}

		}else{
			return false;
		}

	}

	public function delete($tabela = NULL, $condicoes = NULL) {
		if ($tabela && $this->db->table_exists($tabela) && is_array($condicoes)) {

			if($this->db->delete($tabela, $condicoes)) {
				$this->session->set_flashdata('sucesso', 'Registro excluído com sucesso!');
			}else{
				$this->session->set_flashdata('erro', 'Não foi possível excluir o registro');
			}

		}else{
			return false;
		}
	}

}