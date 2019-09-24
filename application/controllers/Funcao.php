<?php
    class Funcao extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('funcao_model');
            $this->load->helper('url_helper');
        }

        public function index()
		{
			$data['funcoes'] = $this->funcao_model->get_funcoes();
			$data['title'] = 'Lista de Funções';

			$this->load->view('templates/header', $data);
			$this->load->view('funcao/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($id = NULL)
		{
			$data['funcoes_item'] = $this->funcao_model->get_funcoes($id);

			if (empty($data['funcoes_item']))
			{
				show_404();
			}

			$data['title'] = $data['funcoes_item']['nome'];

			$this->load->view('templates/header', $data);
			$this->load->view('funcao/view', $data);
			$this->load->view('templates/footer');
		}
		
		public function edit($id = NULL)
		{
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$data['funcoes_item'] = $this->funcao_model->get_funcoes($id);

			if (empty($data['funcoes_item']))
			{
				show_404();
			}

			$data['title'] = 'Editar função ' . $data['funcoes_item']['nome'];

			$this->form_validation->set_rules('id', 'ID', 'required');
			$this->form_validation->set_rules('nome', 'Nome', 'required');
			$this->form_validation->set_rules('nivel', 'Nível', 'required');

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header', $data);
				$this->load->view('funcao/edit');
				$this->load->view('templates/footer');

			}
			else
			{
				$this->funcao_model->update_funcao($id);
				$this->load->view('templates/header', $data);
                $this->load->view('funcao/success');
                $this->load->view('templates/footer');
			}
		}
		
		public function delete($id) {
			
			if (empty($id))
			{
				show_404();
            }
            
            $data['title'] = 'Função Removida';

			$this->funcao_model->delete_contato($id);
			$this->load->view('templates/header', $data);
            $this->load->view('funcao/success');
            $this->load->view('templates/footer');
		}
        
        public function create()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['title'] = 'Insere uma nova função';

            $this->form_validation->set_rules('nome', 'Nome', 'required');
            $this->form_validation->set_rules('nivel', 'Nível', 'required');

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header', $data);
				$this->load->view('funcao/create');
				$this->load->view('templates/footer');

			}
			else
			{
                $this->funcao_model->set_funcoes();
                $this->load->view('templates/header', $data);
                $this->load->view('funcao/success');
                $this->load->view('templates/footer');
			}
		}
    }