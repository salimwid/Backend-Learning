<?php

date_default_timezone_set('America/Toronto');
require_once('application/assets/php/stripe/lib/Stripe.php');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->helper('url');
	}
	public function index(){
		if($this->session->userdata('user_name')){
			redirect(base_url().$this->session->userdata('user_name'));
		}
		$this->view();
	}

	public function view($msg = NULL){
		$data['msg'] = $msg;
		$data['page'] = 'login';
		$data['title'] = 'Trying to Save Cookies';
		$this->load->view('header');
		$this->load->view('login_form',$data);
		$this->load->view('footer');
	}

	public function login_process(){
		$postData = $this->input->post(null,true);
		$result = $this->login_model->validate($postData['username'], $postData['password']);
		if ($result == 400) {
			$msg = '<p class="errLogMess">Invalid Username or Password.</p>br />';
			$this->view($msg);
		}
		else {
			redirect(base_url().'member_page');
		}
	}

	public function create_login(){
		$postData = $this->input->post(null,true);
		$result['status'] = $this->login_model->create_user($postData);
		$result['msg'] = 'Login not Created';
		if ($result['status'] == 200) {
			$result['msg'] = 'Login Info Created';
		}
		return json_encode($result);
	}

}
