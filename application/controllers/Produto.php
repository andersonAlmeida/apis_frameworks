<?php
class Produto extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		check_session();
		$this->load->model('produto_model');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$data['produtos'] = $this->produto_model->get_produtos();
		$data['title'] = 'Lista de produtos';

		$this->load->view('templates/header', $data);
		$this->load->view('produto/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($id = NULL)
	{
		$data['produto_item'] = $this->produto_model->get_produtos($id);

		if (empty($data['produto_item'])) {
			show_404();
		}

		$data['title'] = $data['produto_item']['nome'];

		$this->load->view('templates/header', $data);
		$this->load->view('produto/view', $data);
		$this->load->view('templates/footer');
	}

	public function edit($id = NULL)
	{
		$data['produto_item'] = $this->produto_model->get_produtos($id);

		if (empty($data['produto_item'])) {
			show_404();
		}

		$data['title'] = 'Editar produto ' . $data['produto_item']['nome'];
		$this->load->model('marca_model');
		$this->load->model('categoria_model');
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['marcas'] = $this->marca_model->get_marcas();
		$data['categorias'] = $this->categoria_model->get_categorias();

		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('descricao', 'Descrição', 'required');
		$this->form_validation->set_rules('preco', 'Preço', 'required');
		$this->form_validation->set_rules('categoria', 'Categoria', 'required');
		$this->form_validation->set_rules('marca', 'Marca', 'required');
		$this->form_validation->set_rules('estoque', 'Estoque', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('produto/edit');
			$this->load->view('templates/footer');
		} else {

			// configuração de upload
			$path = $_FILES['imagem']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$image = "produto-" . time() . '.' . $ext;
			$config['upload_path']          = base_url() . '/_assets/uploads/';
			$config['allowed_types']        = 'jpg|png';
			$config['max_size']             = 300;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;
			$config['file_name']            = $image;
			$this->load->library('upload', $config);
			// fim da configuração de upload

			if (!$this->upload->do_upload('imagem')) {
				// var_dump($this->upload->data());
				// die();
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('templates/header', $data);
				$this->load->view('produto/edit', $error);
				$this->load->view('templates/footer');
			} else {
				$uploaded = $this->upload->data('file_name');

				$this->produto_model->update_produto($id, $uploaded);
				$this->load->view('templates/header', $data);
				$this->load->view('produto/success');
				$this->load->view('templates/footer');
			}
		}
	}

	public function delete($id)
	{

		if (empty($id)) {
			show_404();
		}

		$data['title'] = 'Produto Removido';

		$this->produto_model->delete_produto($id);
		$this->load->view('templates/header', $data);
		$this->load->view('produto/success');
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$this->load->model('marca_model');
		$this->load->model('categoria_model');
		$this->load->library('form_validation');

		$data['title'] = 'Insere um novo produto';
		$data['marcas'] = $this->marca_model->get_marcas();
		$data['categorias'] = $this->categoria_model->get_categorias();

		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('descricao', 'Descrição', 'required');
		$this->form_validation->set_rules('preco', 'Preço', 'required');
		$this->form_validation->set_rules('categoria', 'Categoria', 'required');
		$this->form_validation->set_rules('marca', 'Marca', 'required');
		$this->form_validation->set_rules('estoque', 'Estoque', 'required');
		// $this->form_validation->set_rules('imagem', 'Imagem', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('produto/create');
			$this->load->view('templates/footer');
		} else {

			// configuração de upload
			$path = $_FILES['imagem']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$image = "produto-" . time() . '.' . $ext;
			$config['upload_path']          = base_url() . '/_assets/uploads/';
			$config['allowed_types']        = 'jpg|png';
			$config['max_size']             = 300;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;
			$config['file_name']            = $image;
			$this->load->library('upload', $config);
			// fim da configuração de upload

			if (!$this->upload->do_upload('imagem')) {
				// var_dump($this->upload->data());
				// die();
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('templates/header', $data);
				$this->load->view('produto/create', $error);
				$this->load->view('templates/footer');
			} else {
				$uploaded = $this->upload->data('file_name');

				$this->produto_model->set_produtos($uploaded);
				$this->load->view('templates/header', $data);
				$this->load->view('produto/success');
				$this->load->view('templates/footer');
			}
		}
	}

	public function delete_img($id, $idProduto)
	{
		$this->load->helper('file');
		if (empty($id)) {
			show_404();
		}

		$imagem = $this->produto_model->get_img($id);

		if ($this->produto_model->delete_img($id))
		{
			unlink("./_assets/uploads/" . $imagem['imagem']);

			redirect('produto/edit/' . $idProduto);
		}
	}
}
