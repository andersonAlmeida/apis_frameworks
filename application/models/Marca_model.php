<?php
class Marca_model extends CI_Model
{
	private $table_name = 'marca';

	public function __construct()
	{
		$this->load->database();
	}

	public function get_marcas($id = FALSE)
	{
		if ($id === FALSE) {
			$query = $this->db->get($this->table_name);
			return $query->result_array();
		}

		$query = $this->db->get_where($this->table_name, array('id' => $id));
		return $query->row_array();
	}

	public function set_marcas()
	{
		$data = array(
			'nome' => $this->input->post('nome')
		);

		return $this->db->insert($this->table_name, $data);
	}

	public function update_marca()
	{
		$id = $this->input->post('id');
		$data = array(
			'nome' => $this->input->post('nome')
		);

		return $this->db->where('id', $id)->update($this->table_name, $data);
	}

	public function delete_marca($id)
	{
		return $this->db->where('id', $id)->delete($this->table_name);
	}
}
