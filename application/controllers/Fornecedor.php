<?php
    class Fornecedor extends CI_Controller {
        public function __construct() {
			parent::__construct();
			check_session();
            $this->load->model('fornecedor_model');
            $this->load->helper('url_helper');
        }

        public function index()
		{
			$data['fornecedores'] = $this->fornecedor_model->get_fornecedores();
			$data['title'] = 'Lista de fornecedores';

			$this->load->view('templates/header', $data);
			$this->load->view('fornecedor/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($id = NULL)
		{
			$data['fornecedor_item'] = $this->fornecedor_model->get_fornecedores($id);

			if (empty($data['fornecedor_item']))
			{
				show_404();
			}

			$data['title'] = $data['fornecedor_item']['nome'];

			$this->load->view('templates/header', $data);
			$this->load->view('fornecedor/view', $data);
			$this->load->view('templates/footer');
		}

		public function edit($id = NULL)
		{
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['fornecedor_item'] = $this->fornecedor_model->get_fornecedores($id);

			if (empty($data['fornecedor_item']))
			{
				show_404();
			}

			$data['title'] = 'Editar fornecedor ' . $data['fornecedor_item']['nome'];

			$this->form_validation->set_rules('id', 'ID', 'required');
			$this->form_validation->set_rules('nome', 'Nome', 'required');

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header', $data);
				$this->load->view('fornecedor/edit');
				$this->load->view('templates/footer');

			}
			else
			{
				$this->fornecedor_model->update_fornecedor($id);
				$this->load->view('templates/header', $data);
                $this->load->view('fornecedor/success');
                $this->load->view('templates/footer');
			}
		}

		public function delete($id) {

			if (empty($id))
			{
				show_404();
            }

            $data['title'] = 'Fornecedor Removido';

			$this->fornecedor_model->delete_fornecedor($id);
			$this->load->view('templates/header', $data);
            $this->load->view('fornecedor/success');
            $this->load->view('templates/footer');
		}

        public function create()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['title'] = 'Insere um novo fornecedor';

            $this->form_validation->set_rules('nome', 'Nome', 'required');
            $this->form_validation->set_rules('cnpj', 'CNPJ', 'required');
            $this->form_validation->set_rules('razao_social', 'Razão Social', 'required');
            $this->form_validation->set_rules('nome_telefone', 'Identificação do Telefone', 'required');
            $this->form_validation->set_rules('numero', 'Número', 'required');

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header', $data);
				$this->load->view('fornecedor/create');
				$this->load->view('templates/footer');

			}
			else
			{
                $this->fornecedor_model->set_fornecedores();
                $this->load->view('templates/header', $data);
                $this->load->view('fornecedor/success');
                $this->load->view('templates/footer');
			}
		}
    }
