<?php
    class Contatos extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('contatos_model');
            $this->load->helper('url_helper');
        }

        public function index()
		{
			$data['contatos'] = $this->contatos_model->get_contatos();
			$data['title'] = 'Lista de Contatos';

			$this->load->view('templates/header', $data);
			$this->load->view('contatos/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($id = NULL)
		{
			$data['contatos_item'] = $this->contatos_model->get_contatos($id);

			if (empty($data['contatos_item']))
			{
				show_404();
			}

			$data['title'] = $data['contatos_item']['nome'];

			$this->load->view('templates/header', $data);
			$this->load->view('contatos/view', $data);
			$this->load->view('templates/footer');
        }
        
        public function create()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['title'] = 'Insere um contato';

			$this->form_validation->set_rules('nome', 'Nome', 'required');
			$this->form_validation->set_rules('email', 'E-mail', 'required');

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header', $data);
				$this->load->view('contatos/create');
				$this->load->view('templates/footer');

			}
			else
			{
				$this->contatos_model->set_contatos();
				$this->load->view('contatos/success');
			}
		}
    }