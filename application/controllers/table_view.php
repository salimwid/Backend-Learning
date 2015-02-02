<?php

class Table_view extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('table_model');
	}
	public function index(){
		$data['table_data'] = $this->table_model->get_table();
		$this->load->view('table_view', $data);
	}
}
