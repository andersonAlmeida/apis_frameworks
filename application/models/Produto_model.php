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
		if ($id != FALSE)
		{
			$this->db->where($this->table_name . '.id', $id);
		}

		$this->db->select($this->table_name . '.*, categoria.nome as categoria, marca.nome as marca, imagem, imagem.id as id_imagem');
		$this->db->from($this->table_name);
		$this->db->join('categoria', 'categoria.id = ' . $this->table_name . ".id_categoria");
		$this->db->join('marca', 'marca.id = ' . $this->table_name . ".id_marca");
		$this->db->join('imagem', 'imagem.id_produto = ' . $this->table_name . ".id", 'left');

		if ($id === FALSE) {
			$query = $this->db->get();

			return $query->result_array();
		}

		$query = $this->db->get();

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

	public function update_produto($id, $img = FALSE)
	{
		$data = array(
			'nome' => $this->input->post('nome'),
			'descricao' => $this->input->post('descricao'),
			'preco' => floatval($this->input->post('preco')),
			'desconto' => floatval($this->input->post('desconto')),
			'estoque' => intval($this->input->post('estoque')),
			'id_categoria' => $this->input->post('categoria'),
			'id_marca' => $this->input->post('marca')
		);

		if ($img != FALSE)
		{
			$dataImg = array(
				'titulo' => null,
				'descricao' => null,
				'thumb' => null,
				'imagem' => $img,
				'id_produto' => $id
			);
			$this->db->insert($this->table_imagem, $dataImg);
		}

		return $this->db->where('id', $id)->update($this->table_name, $data);
	}

	public function delete_produto($id)
	{
		$queryImg = $this->db->where('id_produto', $id)->get($this->table_imagem);
		$imagem = $queryImg->row_array();

		unlink("./_assets/uploads/" . $imagem['imagem']);

		$this->db->where('id_produto', $id)->delete($this->table_imagem);
		return $this->db->where('id', $id)->delete($this->table_name);
	}

	public function get_img($id)
	{
		$query = $this->db->where('id', $id)->get($this->table_imagem);
		return $query->row_array();
	}

	public function delete_img($id)
	{
		return $this->db->where('id', $id)->delete($this->table_imagem);
	}
}
