<?php
    class Contatos_model extends CI_Model {
        public function __construct()
        {
                $this->load->database();
        }

        public function get_contatos($id = FALSE)
        {
            if ($id === FALSE)
            {
                    $query = $this->db->get('contato');
                    return $query->result_array();
            }

            $query = $this->db->get_where('contato', array('id' => $id));
            return $query->row_array();
        }

        public function set_contatos()
        {
			$data = array(
					'nome' => $this->input->post('nome'),
					'telefone' => $this->input->post('telefone'),
					'email' => $this->input->post('email')
			);

			return $this->db->insert('contato', $data);
        }
    }