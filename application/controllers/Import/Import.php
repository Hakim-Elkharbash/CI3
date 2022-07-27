<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
//use PhpOffice\PhpSpreadsheet\Writer\Xlsx; // to create excel

class Import extends CI_Controller {
	
	private $excelFile;

	public function index()
	{
		$this->load->view('header');
		$this->load->model('ImportModal');
		$data['import'] = $this->ImportModal->showData();
		$this->load->view('import/view', $data);
		$this->load->view('footer');
	}

    public function add()
	{
		$this->load->view('header');
		$this->load->view('import/add');
		$this->load->view('footer');
	}	


    public function read()
	{	
		$excelFile = $_FILES['uploadedExcelFile']['tmp_name']; // to show file details
		// var_dump($_FILES['uploadedExcelFile']);
		// echo $excelFile;
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($excelFile);
		$dataSheet = $spreadsheet->getActiveSheet()->toArray()[0];
		//$this->load->view('import/add', $dataSheet);
		echo json_encode($dataSheet);

		//to creat excel file
			// $spreadsheet = new Spreadsheet();
			// $sheet = $spreadsheet->getActiveSheet();
			// $sheet->setCellValue('A1', 'Hello World !');
			// $writer = new Xlsx($spreadsheet);
			// $writer->save(FCPATH.'uploads/hello worldTest.xlsx');
	}

	public function update()
	{	
		//-------- setup table
		$setupTable = explode (",", $_POST['selectedField']);
		//print_r($setupTable);
		$this->load->model('ImportModal');
		$this->ImportModal->setupTable($setupTable);

		//-------- add selected fialds to the table
		//newData[][];
		$excelFile = $_FILES['uploadedExcelFile']['tmp_name']; // to show file details
		 //var_dump($_FILES['uploadedExcelFile']);
		 //echo $excelFile;
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($excelFile);
		$dataSheet = $spreadsheet->getActiveSheet()->toArray();

		for($row = 1; $row <= count($dataSheet)-1; $row++) {
			for($col = 0; $col <= count($dataSheet[$row])-1; $col++){
				if (in_array($dataSheet[0][$col], $setupTable)){
					//$newData[$row][$col] = $dataSheet[$row][$col];
					$newData[$row][$dataSheet[0][$col]] = strval($dataSheet[$row][$col]);		
				}
			}
		}
		//print_r($newData);
		$this->load->model('ImportModal');
		$this->ImportModal->saveData($newData);		
	}
}