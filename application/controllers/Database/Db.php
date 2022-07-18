<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->model('DbModel');
		$data['users'] = $this->DbModel->showUsers();
		$this->load->view('database/view', $data);
		$this->load->view('footer');
	}

	public function add()
	{
		$this->load->view('header');
		$this->load->view('database/add');
		$this->load->view('footer');
	}

	public function save()
	{
		// $this->form_validation->set_rules('fullName', 'Full Name', 'required');
		// $this->form_validation->set_rules('phone', 'Phone', 'required');
		// $this->form_validation->set_rules('email', 'Email', 'required');
		// $this->form_validation->set_rules('note', 'Note', 'required');
		// if ($this->form_validation->run()){
		// $data=[
		//		'name' => $this->input->post('fullName'),
		//		'phone' => $this->input->post('phone'),
		//		'email' => $this->input->post('email'),
		//		'note' => $this->input->post('note'),
		//	];
			
		//	$this->load->model('DbModel');
		//	$this->DbModel->saveUser($data);
		//	redirect(base_url('db'));
		// }else{
		// 	$this->add();
		// }	

		$data=[
			'name' => $this->input->post('name'),
			'phone' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
			'note' => $this->input->post('note'),
		];
		
		$this->load->model('DbModel');
		$this->DbModel->saveUser($data);	
	}


	public function delAll()
	{	
		$this->load->model('DbModel');
		$this->DbModel->delAllUsers();
	}
}
?>
