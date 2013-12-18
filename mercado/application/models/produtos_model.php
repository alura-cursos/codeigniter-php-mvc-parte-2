<?php
class Produtos_model extends CI_Model {
	
	public function buscaVendidos($usuario) {
		$id = $usuario["id"];
		$this->db->select("produtos.*, vendas.data_de_entrega");
		$this->db->from("produtos");
		$this->db->join("vendas", "vendas.produto_id = produtos.id");
		$this->db->where("vendido", true);
		$this->db->where("usuario_id", $id);
		return $this->db->get()->result_array();
	}
	
	public function busca($id) {
		return $this->db->get_where("produtos", array(
			"id" => $id
		))->row_array();
	}
	
	public function buscaTodos() {
		$this->db->where("vendido", false);
		return $this->db->get("produtos")->result_array();
	}
	
	public function salva($produto) {
		$this->db->insert("produtos", $produto);
	}
	
}