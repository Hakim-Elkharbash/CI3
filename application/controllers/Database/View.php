<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('database/view');
		$this->load->view('footer');
	}
}
?>
