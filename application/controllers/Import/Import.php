<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller {

	public function index()
	{
        $data["import"]="Import";
		$this->load->view('header');
		$this->load->view('import/view', $data);
		$this->load->view('footer');
	}

    public function add()
	{
		$this->load->view('header');
		$this->load->view('import/add');
		$this->load->view('footer');
	}	


    public function import()
	{
		print_r($_FILES['uploadedExcelFile']); // to show file details
		
		/* if (!$this->upload->do_upload('uploadedFile')){
				$error = array('error' => $this->upload->display_errors());
				header('HTTP/1.1 500 Internal Server');
        		header('Content-Type: application/json; charset=UTF-8');
        		die(json_encode(array('error' => $error)));
				//print_r($error);
		}
		else{
				$data = array('upload_data' => $this->upload->data());
				print_r($data);
		}	 */
	}


}