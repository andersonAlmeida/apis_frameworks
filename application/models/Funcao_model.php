<?php
    class Funcao_model extends CI_Model {
        private $table_name = 'funcao';
        
        public function __construct()
        {
                $this->load->database();
        }

        public function get_funcoes($id = FALSE)
        {
            if ($id === FALSE)
            {
                    $query = $this->db->get($this->table_name);
                    return $query->result_array();
            }

            $query = $this->db->get_where($this->table_name, array('id' => $id));
            return $query->row_array();
        }

        public function set_funcoes()
        {
			$data = array(
					'nome' => $this->input->post('nome'),
					'nivel' => $this->input->post('nivel')
			);

			return $this->db->insert($this->table_name, $data);
        }

        public function update_funcao()
        {
            $id = $this->input->post('id');
			$data = array(
					'nome' => $this->input->post('nome'),
					'nivel' => $this->input->post('nivel')
			);

			return $this->db->where('id', $id)->update($this->table_name, $data);
        }

        public function delete_contato($id) 
        {
			return $this->db->where('id', $id)->delete($this->table_name);
        }
    }