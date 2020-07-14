<?php 

class Member extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Member_model');
		is_logged_in();
	}

	public function redirectFunc()
	{
		redirect('member/clients/list');
	}

	public function dashboard()
	{
		$data = [
			'title' => 'Member',
			'body' => 'nav-md'
		];
		$this->load->view('templates/header', $data);
		$this->load->view('member/index');
		$this->load->view('templates/footer');
	}

	public function clients()
	{
		$data = [
			'title' => 'Member',
			'body' => 'nav-md',
			'clients' => $this->Member_model->getAllClients()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('member/client/index', $data);
		$this->load->view('templates/footer');
	}

	public function newClients()
	{
		$data = [
			'title' => 'Add new clients',
			'body' => 'nav-md'
		];
		$this->form_validation->set_rules('project_name', 'Project Name', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('member/client/add', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Member_model->insertNewData();
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">New project created!</div>');
			redirect('member/clients/list');
		}
	}

	public function delClients()
	{
		$id = $this->uri->segment(4);
		$access_key = urldecode($this->uri->segment(5));
		$this->Member_model->deleteData($id, $access_key);
		$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Project deleted!</div>');
		redirect('member/clients/list');
	}
}