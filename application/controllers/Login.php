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
					// $row = $result->row();

					foreach($result->result() as $row)
					{
						if (password_verify($this->input->post('senha'), $row->senha))
						{
							$newsession = array(
								'nome'  => $row->nome,
								'email'     => $row->email,
								'funcao' => $row->id_funcao,
								'funcao_nome' => $row->funcao,
								'logado' => TRUE
							);

							$this->session->set_tempdata($newsession, NULL, $this->expires);

							redirect('/home', 'location');
						}
					}
					$data['login_not_found'] = TRUE;
					$this->load->view('login/index', $data);
				} else
				{
					$data['login_not_found'] = TRUE;
					$this->load->view('login/index', $data);
				}

			}
		}

		public function recover()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('email');

			$data['title'] = 'Recuperar senha';
			$data['login_not_found'] = FALSE;

			$this->form_validation->set_rules('email', 'E-mail', 'required');

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('login/recover', $data);
			}
			else
			{
				$token = bin2hex(random_bytes(50));
				$email = $this->input->post('email');

				$this->email->from('apis@senac.com.br', 'Administrador Sistema');
				$this->email->to($email);

				$this->email->subject('Recuperação de Senha');
				$this->email->message('
					<p>Você solicitou recuperar a senha para o usuário ' . $email . '.</p>
					<p>Por favor acesse o link ' . base_url() . '/' . $token . ' para definir uma nova senha</p>
				');

				$this->email->send();
				$result = $this->administrador_model->saveToken($token, $email);

				if ($result)
				{
					redirect('/home', 'location');
				} else {
					$this->load->view('login/recover', $data);
				}

			}
		}

		public function logout()
		{
			session_destroy();

			redirect('/login/login', 'location');
		}
    }
