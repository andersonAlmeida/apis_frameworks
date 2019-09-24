<?php
    class Administrador_model extends CI_Model {
        private $table_name = 'administrador';
        
        public function __construct()
        {
                $this->load->database();
        }

        public function get_administrador($id = FALSE)
        {
            if ($id === FALSE)
            {
                $this->db->select($this->table_name . '.*, funcao.nome as funcao_nome');
                $this->db->from($this->table_name);
                $this->db->join('funcao', 'funcao.id = ' . $this->table_name . '.funcao');

                $query = $this->db->get();
                return $query->result_array();
            }

            $query = $this->db->get_where($this->table_name, array('id' => $id));
            return $query->row_array();
        }

        public function set_administrador()
        {
			$data = array(
					'nome' => $this->input->post('nome'),
					'email' => $this->input->post('email'),
					'senha' => $this->input->post('senha'),
					'funcao' => $this->input->post('funcao')
			);

			return $this->db->insert($this->table_name, $data);
        }

        public function update_administrador()
        {
            $id = $this->input->post('id');
			$data = array(
					'nome' => $this->input->post('nome'),
					'email' => $this->input->post('email'),
					'senha' => $this->input->post('senha'),
					'funcao' => $this->input->post('funcao')
			);

			return $this->db->where('id', $id)->update($this->table_name, $data);
        }

        public function delete_administrador($id) 
        {
			return $this->db->where('id', $id)->delete($this->table_name);
        }
    }