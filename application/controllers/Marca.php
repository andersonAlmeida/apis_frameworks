<?php
    class Marca extends CI_Controller {
        public function __construct() {
			parent::__construct();
			check_session();
            $this->load->model('marca_model');
            $this->load->helper('url_helper');
        }

        public function index()
		{
			$data['marcas'] = $this->marca_model->get_marcas();
			$data['title'] = 'Lista de Marcas';

			$this->load->view('templates/header', $data);
			$this->load->view('marca/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($id = NULL)
		{
			$data['marca_item'] = $this->marca_model->get_marcas($id);

			if (empty($data['marca_item']))
			{
				show_404();
			}

			$data['title'] = $data['marca_item']['nome'];

			$this->load->view('templates/header', $data);
			$this->load->view('marca/view', $data);
			$this->load->view('templates/footer');
		}

		public function edit($id = NULL)
		{
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['marca_item'] = $this->marca_model->get_marcas($id);

			if (empty($data['marca_item']))
			{
				show_404();
			}

			$data['title'] = 'Editar marca ' . $data['marca_item']['nome'];

			$this->form_validation->set_rules('id', 'ID', 'required');
			$this->form_validation->set_rules('nome', 'Nome', 'required');

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header', $data);
				$this->load->view('marca/edit');
				$this->load->view('templates/footer');

			}
			else
			{
				$this->marca_model->update_marca($id);
				$this->load->view('templates/header', $data);
                $this->load->view('marca/success');
                $this->load->view('templates/footer');
			}
		}

		public function delete($id) {

			if (empty($id))
			{
				show_404();
            }

            $data['title'] = 'Marca Removida';

			$this->marca_model->delete_marca($id);
			$this->load->view('templates/header', $data);
            $this->load->view('marca/success');
            $this->load->view('templates/footer');
		}

        public function create()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['title'] = 'Insere uma nova marca';

            $this->form_validation->set_rules('nome', 'Nome', 'required');

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header', $data);
				$this->load->view('marca/create');
				$this->load->view('templates/footer');

			}
			else
			{
                $this->marca_model->set_marcas();
                $this->load->view('templates/header', $data);
                $this->load->view('marca/success');
                $this->load->view('templates/footer');
			}
		}
    }
