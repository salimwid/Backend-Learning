<?php

date_default_timezone_set('America/Toronto');

class Template_test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('template_model');
		$this->load->helper('url');
	}
	public function index(){
		$data['title'] = 'Admin Panel';
		$data['panel'] = 'members';
		$data['navigation'] = 'members';
		$data['page'] = 'haaai';
		$data['template_data'] = $this->template_model->get_template();

		$data['meta'] = '
				<meta name="description" content="Founder-friendly coworking in downtown Toronto. Perfect for startups, freelancers and everything in between. Schedule a tour today!" />';
		$data['f_meta'] = '
			<meta property="og:locale" content="en_US" />
			<meta property="og:type" content="article" />
			<meta property="og:title" content="Project: SPACES | Coworking in downtown Toronto" />
			<meta property="description" content="Founder-friendly coworking in downtown Toronto. Our open-concept spaces are home to bad ass businesses and the founders that fuel them. Schedule a tour today!" />
			<meta property="og:image" content="https://s3.amazonaws.com/projectspaces/web-meta-img.jpg" />
			<meta property="og:url" content="http://www.projectspac.es/" />
			<meta property="og:site_name" content="Project: SPACES" />';

		$this->load->view('header', $data);
		$this->load->view('stripe_test_form_1', $data);
		$this->load->view('footer', $data);
	}

	public function search_names($name) {
		$query = $this->db->query('SELECT nameId,first,last FROM name_list WHERE first LIKE "'.$name.'%" OR last LIKE "'.$name.'%" LIMIT 0,5')->result_array();
		echo json_encode($query);
	}

	public function posting_form(){
		$postData = $this->input->post(null,true);
		
		$dataArray = array(
			'first' => $postData['first_name'],
			'last' => $postData['last_name'],
			);

		echo ($this->db->insert('name_registration',$dataArray)) ? 200:400;
	}

	public function payment_stripe(){
		$postData = $this->input->post(null,true);
		Stripe::setApiKey("sk_test_7LxIg6xbmmSeRfAVBubrapgU");

		// Get the credit card details submitted by the form
		$token = $postData['stripeToken'];

		// Create the charge on Stripe's servers - this will charge the user's card
		try {
		$charge = Stripe_Charge::create(array(
		  "amount" => 1000, // amount in cents, again
		  "currency" => "cad",
		  "card" => $token,
		  "description" => "payinguser@example.com")
		);
		} 

		if catch(Stripe_CardError $e) {
			$response['status'] = 400;
			$response['alert'] = "Card has been Declined";
		}

		else {
			$response['status'] = 200;
			$response['alert'] = "Charge has been Received"
		}

		$this->load->view('stripe_test_form_1', $response);
	}


}
