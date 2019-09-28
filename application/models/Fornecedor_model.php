<?php
class Fornecedor_model extends CI_Model
{
	private $table_name = 'fornecedor';
	private $table_telefone = 'telefone';
	private $table_endereco = 'endereco';

	public function __construct()
	{
		$this->load->database();
	}

	public function get_fornecedores($id = FALSE)
	{
		if ($id === FALSE) {
			$this->db->where('telefone.tipo'); // WHERE para continuar
			$this->db->select($this->table_name . '.*, telefone.nome as nome_telefone, telefone.numero as telefone, endereco.nome as nome_endereco');
			$this->db->from($this->table_name);
			$this->db->join($this->table_telefone, 'telefone.id_proprietario = ' . $this->table_name . '.id');
			$this->db->join($this->table_endereco, 'endereco.id_proprietario = ' . $this->table_name . '.id');

			$query = $this->db->get();

			var_dump( $query->result_array() );
			die();

			return $query->result_array();
		}

		$query = $this->db->get_where($this->table_name, array('id' => $id));
		return $query->row_array();
	}

	public function set_fornecedores()
	{
		$data = array(
			'nome' => $this->input->post('nome'),
			'razao_social' => $this->input->post('razao_social'),
			'cnpj' => $this->input->post('cnpj')
		);

		if ($this->db->insert($this->table_name, $data))
		{
			$id = $this->db->insert_id();

			// se cadastrou o telefone
			if ( $this->input->post('nome_telefone') && $this->input->post('numero') )
			{
				$dataTel = array(
					'nome' => $this->input->post('nome_telefone'),
					'numero' => $this->input->post('numero'),
					'id_proprietario' => $id,
					'tipo' => $this->input->post('tipo')
				);
				$this->db->insert($this->table_telefone, $dataTel);
			}
		}

		return true;
	}

	public function update_fornecedor()
	{
		$id = $this->input->post('id');
		$data = array(
			'nome' => $this->input->post('nome')
		);

		return $this->db->where('id', $id)->update($this->table_name, $data);
	}

	public function delete_fornecedor($id)
	{
		return $this->db->where('id', $id)->delete($this->table_name);
	}
}
