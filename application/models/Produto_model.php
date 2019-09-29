<?php
class Produto_model extends CI_Model
{
	private $table_name = 'produto';
	private $table_imagem = 'imagem';

	public function __construct()
	{
		$this->load->database();
	}

	public function get_produtos($id = FALSE)
	{
		if ($id === FALSE) {
			$query = $this->db->get($this->table_name);
			return $query->result_array();
		}

		$query = $this->db->get_where($this->table_name, array('id' => $id));
		return $query->row_array();
	}

	public function set_produtos($imagem = NULL)
	{
		$data = array(
			'nome' => $this->input->post('nome'),
			'descricao' => $this->input->post('descricao'),
			'preco' => floatval($this->input->post('preco')),
			'desconto' => floatval($this->input->post('desconto')),
			'estoque' => $this->input->post('estoque'),
			'id_categoria' => $this->input->post('categoria'),
			'id_marca' => $this->input->post('marca')
		);

		if ( $this->db->insert($this->table_name, $data) )
		{

			if ($imagem)
			{
				$id = $this->db->insert_id();
				$dataImg = array(
					'titulo' => null,
					'descricao' => null,
					'thumb' => null,
					'imagem' => $imagem,
					'id_produto' => $id
				);
				$this->db->insert($this->table_imagem, $dataImg);
			}
		}

		return true;
	}

	public function update_produto()
	{
		$id = $this->input->post('id');
		$data = array(
			'nome' => $this->input->post('nome')
		);

		return $this->db->where('id', $id)->update($this->table_name, $data);
	}

	public function delete_produto($id)
	{
		return $this->db->where('id', $id)->delete($this->table_name);
	}
}
