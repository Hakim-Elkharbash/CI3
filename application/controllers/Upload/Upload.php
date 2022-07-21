<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		//$this->load->model('UploadModel'); // no DB for now
		//$data['files'] = $this->UploadModel->showFiles();
		chdir("./uploads/");
		array_multisort(array_map('filemtime', ($files = glob("*.*"))), SORT_DESC, $files);
		$data['files'] = $files;
		$this->load->view('upload/view', $data);
		$this->load->view('footer');
	}

	public function add()
	{
		$this->load->view('header');
		$this->load->view('upload/add');
		$this->load->view('footer');
	}

	public function upload()
	{
		//print_r($_FILES['uploadedFile']); // to show file details
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|pdf|txt|xlsx';
		$config['max_size']             = 10000;
		//$config['max_width']            = 1024;
		//$config['max_height']           = 768;

		//$this->load->library('upload', $config);
		$this->upload->initialize($config); // $config Should set as this line becuase we have add "upload" in the public space via config/autoload 
		
		if (!$this->upload->do_upload('uploadedFile')){
				$error = array('error' => $this->upload->display_errors());
				header('HTTP/1.1 500 Internal Server');
        		header('Content-Type: application/json; charset=UTF-8');
        		die(json_encode(array('error' => $error)));
				//print_r($error);
		}
		else{
				$data = array('upload_data' => $this->upload->data());
				print_r($data);
		}	
	}

	public function del()
	{
		unlink("./uploads/".$this->input->post('fileName'));
	}
}