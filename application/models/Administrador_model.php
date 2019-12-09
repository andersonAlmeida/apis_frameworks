<?php
    class Administrador_model extends CI_Model {
        private $table_name = 'administrador';
        private $table_resetpass = 'resetar_senha';

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
                $this->db->join('funcao', 'funcao.id = ' . $this->table_name . '.id_funcao');

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
					'senha' => password_hash($this->input->post('senha'), PASSWORD_DEFAULT),
					'id_funcao' => $this->input->post('funcao')
			);

			return $this->db->insert($this->table_name, $data);
        }

        public function update_administrador()
        {
            $id = $this->input->post('id');
			$data = array(
					'nome' => $this->input->post('nome'),
					'email' => $this->input->post('email'),
					'senha' => password_hash($this->input->post('senha'), PASSWORD_DEFAULT),
					'id_funcao' => $this->input->post('funcao')
			);

			return $this->db->where('id', $id)->update($this->table_name, $data);
        }

        public function delete_administrador($id)
        {
			return $this->db->where('id', $id)->delete($this->table_name);
		}

		public function login()
		{
			$email = $this->input->post('email');
			// $senha = password_hash($this->input->post('senha'), PASSWORD_DEFAULT);

			$this->db->where('email', $email);
			// $this->db->where('senha', $senha);
			$this->db->select($this->table_name . '.*, funcao.nome as funcao');
			$this->db->from($this->table_name);
			$this->db->join('funcao', 'funcao.id = ' . $this->table_name . '.id_funcao');
			return $this->db->get();
		}

		public function saveToken($token, $email)
		{
			date_default_timezone_set('America/Sao_Paulo');
			$data = array(
				'email' => $email,
				'token' => $token,
				'criado_em' => date('Y-m-d H:i:s')
			);

			return $this->db->insert($this->table_resetpass, $data);
		}

		public function get_new_pass_token($token)
		{
			$query = $this->db->get_where($this->table_resetpass, array('token' => $token));

			return $query->row_array();
		}

		public function save_new_pass($email)
		{
			$senha = password_hash($this->input->post('senha'), PASSWORD_DEFAULT);

			$this->db->set('senha', $senha);
			$this->db->where('email', $email);
			return $this->db->update($this->table_name);
		}
    }
