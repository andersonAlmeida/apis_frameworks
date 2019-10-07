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

			$data['title'] = 'Recuperar senha';
			$data['login_not_found'] = FALSE;

			$this->form_validation->set_rules('email', 'E-mail', 'required');

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('login/recover', $data);
			}
			else
			{
				$config = Array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => 'estudos.anderson.almeida@gmail.com',
					'smtp_pass' => 'nulbrnmkiiblvvxi',
					'mailtype'  => 'html',
					'charset'   => 'utf-8'
				);
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");

				$token = bin2hex(random_bytes(50));
				$email = $this->input->post('email');

				$this->email->from('estudos.anderson.almeida@gmail.com', 'Administrador Sistema');
				$this->email->to($email);

				$this->email->subject('Recuperação de Senha');
				$this->email->message('
					<p>Você solicitou recuperar a senha para o usuário ' . $email . '.</p>
					<p>Por favor acesse o link ' . base_url() . 'login/newpass/' . $token . ' para definir uma nova senha</p>
				');

				$sent = $this->email->send();

				if ($sent)
				{
					$result = $this->administrador_model->saveToken($token, $email);

					if ($result)
					{
						redirect('/home', 'location');
					} else {
						$this->load->view('login/recover', $data);
					}
				}


			}
		}

		public function newpass($token)
		{
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('ci_uri');

			$data['title'] = 'Redefinição de Senha';
			$data['login_not_found'] = FALSE;
			$data['token'] = $this->uri->segment(3);

			$this->form_validation->set_rules('senha', 'Senha', 'required');
			$this->form_validation->set_rules('confirm-senha', 'Confirmação Senha',
				array(
					'required',
					'matches[senha]'
				)
			);

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('login/new-pass', $data);
			} else
			{
				$result = $this->administrador_model->get_new_pass_token($data['token']);

				if ($result)
				{
					if ($this->administrador_model->save_new_pass($result['email']))
					{
						redirect('/login/login', 'location');
					} else
					{
						$this->load->view('login/new-pass', $data);
					}
				}
			}
		}

		public function logout()
		{
			session_destroy();

			redirect('/login/login', 'location');
		}
    }
