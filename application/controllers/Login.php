<?php
    class Login extends CI_Controller {
		private $expires = 3600;

        public function __construct() {
            parent::__construct();
			$this->load->model('administrador_model');
			$this->load->helper('url_helper');
		}

		public function login()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['title'] = 'Login';
			$data['login_not_found'] = FALSE;

			$this->form_validation->set_rules('email', 'E-mail', 'required');
			$this->form_validation->set_rules('senha', 'Senha', 'required');

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('login/index', $data);
			}
			else
			{
				$result = $this->administrador_model->login();

				if ( count( $result->result() ) > 0 )
				{
					$row = $result->row();

					$newsession = array(
						'nome'  => $row->nome,
						'email'     => $row->email,
						'funcao' => $row->id_funcao,
						'logado' => TRUE
					);

					$this->session->set_tempdata($newsession, NULL, $this->expires);

					redirect('/administrador', 'location');
				} else
				{
					$data['login_not_found'] = TRUE;

					$this->load->view('templates/login_header', $data);
					$this->load->view('login/index', $data);
					$this->load->view('templates/footer');
				}

			}
		}

		public function logout() {
			session_destroy();

			redirect('/login/login', 'location');
		}
    }
