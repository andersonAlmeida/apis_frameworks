<?php
    class Administrador extends CI_Controller {
        public function __construct() {
            parent::__construct();
			check_session();
			$this->load->model('administrador_model');
            $this->load->helper('url');
        }

        public function index()
		{
			$data['title'] = 'Lista de Administradores';

			$data['admins'] = $this->administrador_model->get_administrador();

			$this->load->view('templates/header', $data);
			$this->load->view('administrador/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($id = NULL)
		{
			var_dump( $id );
			die();

			$data['administrador_item'] = $this->administrador_model->get_administrador($id);

			if (empty($data['administrador_item']))
			{
				show_404();
			}

			$data['title'] = $data['administrador_item']['nome'];

			$this->load->view('templates/header', $data);
			$this->load->view('administrador/view', $data);
			$this->load->view('templates/footer');
		}

		public function edit($id = NULL)
		{
			$this->load->model('funcao_model');
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['administrador_item'] = $this->administrador_model->get_administrador($id);

			if (empty($data['administrador_item']))
			{
				show_404();
			}

			$data['title'] = 'Edita o contato ' . $data['administrador_item']['nome'];
			$data['funcoes'] = $this->funcao_model->get_funcoes();

			$this->form_validation->set_rules('id', 'ID', 'required');
			$this->form_validation->set_rules('nome', 'Nome', 'required');
			$this->form_validation->set_rules('senha', 'Senha', 'required');
			$this->form_validation->set_rules('email', 'E-mail', 'required');
			$this->form_validation->set_rules('funcao', 'Função', 'required');

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header', $data);
				$this->load->view('administrador/edit');
				$this->load->view('templates/footer');

			}
			else
			{
				$this->administrador_model->update_administrador($id);
				$this->load->view('administrador/success');
			}
		}

		public function delete($id) {

			if (empty($id))
			{
				show_404();
			}

			$this->administrador_model->delete_administrador($id);
			$this->load->view('administrador/success');
		}

        public function create()
		{
			$this->load->model('funcao_model');
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['title'] = 'Insere um administrador';
			$data['funcoes'] = $this->funcao_model->get_funcoes();

			$this->form_validation->set_rules('nome', 'Nome', 'required');
			$this->form_validation->set_rules('email', 'E-mail', 'required');
			$this->form_validation->set_rules('senha', 'Senha', 'required');
			$this->form_validation->set_rules('funcao', 'Função', 'required');

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header', $data);
				$this->load->view('administrador/create');
				$this->load->view('templates/footer');

			}
			else
			{
				$this->administrador_model->set_administrador();
				$this->load->view('administrador/index');
			}
		}
    }
