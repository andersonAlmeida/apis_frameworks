<?php
    class Categoria extends CI_Controller {
        public function __construct() {
			parent::__construct();
			check_session();
            $this->load->model('categoria_model');
            $this->load->helper('url_helper');
        }

        public function index()
		{
			$data['categorias'] = $this->categoria_model->get_categorias();
			$data['title'] = 'Lista de Categorias';

			$this->load->view('templates/header', $data);
			$this->load->view('categoria/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($id = NULL)
		{
			$data['categorias_item'] = $this->categoria_model->get_categorias($id);

			if (empty($data['categorias_item']))
			{
				show_404();
			}

			$data['title'] = $data['categorias_item']['nome'];

			$this->load->view('templates/header', $data);
			$this->load->view('categoria/view', $data);
			$this->load->view('templates/footer');
		}

		public function edit($id = NULL)
		{
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['categorias_item'] = $this->categoria_model->get_categorias($id);

			if (empty($data['categorias_item']))
			{
				show_404();
			}

			$data['title'] = 'Editar categoria ' . $data['categorias_item']['nome'];

			$this->form_validation->set_rules('id', 'ID', 'required');
			$this->form_validation->set_rules('nome', 'Nome', 'required');

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header', $data);
				$this->load->view('categoria/edit');
				$this->load->view('templates/footer');

			}
			else
			{
				$this->categoria_model->update_categoria($id);
				$this->load->view('templates/header', $data);
                $this->load->view('categoria/success');
                $this->load->view('templates/footer');
			}
		}

		public function delete($id) {

			if (empty($id))
			{
				show_404();
            }

            $data['title'] = 'Categoria Removida';

			$this->categoria_model->delete_categoria($id);
			$this->load->view('templates/header', $data);
            $this->load->view('categoria/success');
            $this->load->view('templates/footer');
		}

        public function create()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['title'] = 'Insere uma nova categoria';

            $this->form_validation->set_rules('nome', 'Nome', 'required');

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header', $data);
				$this->load->view('categoria/create');
				$this->load->view('templates/footer');

			}
			else
			{
                $this->categoria_model->set_categorias();
                $this->load->view('templates/header', $data);
                $this->load->view('categoria/success');
                $this->load->view('templates/footer');
			}
		}
    }
