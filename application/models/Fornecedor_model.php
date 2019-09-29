<?php
class Fornecedor_model extends CI_Model
{
	private $table_name = 'fornecedor';
	private $table_telefone = 'telefone';
	private $table_endereco = 'endereco';
	private $tipo = 0;

	public function __construct()
	{
		$this->load->database();
	}

	public function get_fornecedores($id = FALSE)
	{
		$this->db->select($this->table_name . '.*, telefone.id as id_telefone, telefone.nome as nome_telefone, telefone.numero as telefone, endereco.id as id_endereco, endereco.nome as nome_endereco, cep, logradouro, endereco.numero, bairro, cidade, estado');
		$this->db->from($this->table_name);
		$this->db->join($this->table_telefone, 'telefone.id_proprietario = ' . $this->table_name . '.id AND telefone.tipo = ' . $this->tipo);
		$this->db->join($this->table_endereco, 'endereco.id_proprietario = ' . $this->table_name . '.id AND endereco.tipo = ' . $this->tipo, 'left');

		if ($id === FALSE) {
			$query = $this->db->get();
			return $query->result_array();
		}

		$this->db->where($this->table_name . '.id', $id);
		$query = $this->db->get();

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

			// se cadastrou o endereço
			if ( $this->input->post('nome_endereco') && $this->input->post('cep') )
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
		$tipo = $this->input->post('tipo');

		$data = array(
			'nome' => $this->input->post('nome'),
			'razao_social' => $this->input->post('razao_social'),
			'cnpj' => $this->input->post('cnpj')
		);

		// se cadastrou o telefone
		if ( $this->input->post('nome_telefone') && $this->input->post('numero') )
		{
			$dataTel = array(
				'nome' => $this->input->post('nome_telefone'),
				'numero' => $this->input->post('numero')
			);
			$this->db->where('id_proprietario', $id);
			$this->db->where('tipo', $tipo);
			$this->db->update($this->table_telefone, $dataTel);
		}

		// se cadastrou o endereço
		if ( $this->input->post('nome_endereco') && $this->input->post('cep') )
		{
			$dataEnd = array(
				'nome' => $this->input->post('nome_endereco'),
				'numero' => $this->input->post('numero_endereco'),
				'cep' => $this->input->post('cep'),
				'logradouro' => $this->input->post('logradouro'),
				'bairro' => $this->input->post('bairro'),
				'cidade' => $this->input->post('cidade'),
				'estado' => $this->input->post('estado')
			);

			// se tem endereco cadastrado
			if ( $this->input->post('id_endereco') )
			{
				$this->db->where('id_proprietario', $id);
				$this->db->where('tipo', $tipo);
				$this->db->update($this->table_endereco, $dataEnd);
			} else {
				$dataEnd['id_proprietario'] = $id;
				$dataEnd['tipo'] = $this->tipo;
				$this->db->insert($this->table_endereco, $dataEnd);
			}

		}


		return $this->db->where('id', $id)->update($this->table_name, $data);
	}

	public function delete_fornecedor($id)
	{
		return $this->db->where('id', $id)->delete($this->table_name);
	}
}
