<?php

date_default_timezone_set('America/Toronto');
require_once('application/assets/php/stripe/lib/Stripe.php');

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


		$this->load->view('header', $data);
		$this->load->view('mail_form', $data);
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

	public function member_page(){
		$data['logged_in'] = 'You are logged in!';
		$this->load->view('header',$data);
		$this->load->view('logged_in',$data);
		$this->load->view('footer',$data);
	}
	

	public function payment_stripe(){
		$errCode = 200;
		$postData = $this->input->post(null,true);
		Stripe::setApiKey("sk_test_7LxIg6xbmmSeRfAVBubrapgU");

		// Get the credit card details submitted by the form
		$token = $postData['stripeToken'];
		$customerID = '';
		


		//print("token printed");

		// Create the charge on Stripe's servers - this will charge the user's card
		try {


		// Create a Customer

		// $plan = Stripe_Plan::create(array(
		//   "amount" => 2000,
		//   "interval" => "month",
		//   "name" => "Amazing Gold Plan",
		//   "currency" => "cad",
		//   "id" => "gold")
		// );
		$customer = Stripe_Customer::create(array(
		  "card" => $token,
		  "plan" => $postData['subscription'],
		  "description" => $postData['description'])
		);

		$customerID = $customer->id;


		$charge = Stripe_Charge::create(array(
		  "amount" => 1000, // amount in cents, again
		  "currency" => "cad",
		  "customer" => $customerID
		  ));

		} 

		catch(Stripe_CardError $e){
			$errCode=777;

			$body = $e->getJsonBody();
		  	$err  = $body['error'];

			$errCode = $err['code'];

		}catch (Stripe_InvalidRequestError $e) {
		  // Invalid parameters were supplied to Stripe's API
			$errCode=712;
		} catch (Stripe_AuthenticationError $e) {
		  // Authentication with Stripe's API failed
		  // (maybe you changed API keys recently)
			$errCode=712;
		} catch (Stripe_ApiConnectionError $e) {
		  // Network communication with Stripe failed
			$errCode=712;
		} catch (Stripe_Error $e) {
		  // Display a very generic error to the user, and maybe send
		  // yourself an email
			$errCode=712;
		} catch (Exception $e) {
		  // Something else happened, completely unrelated to Stripe
			$errCode=712;
		}
		echo $errCode;
		$dataArray = array(
			'card_token' => $token,
			'customerID' => $customerID,
			'subscription' => $postData['subscription'],
			'description' => $postData['description']
		);
		$this->db->insert('customer_info',$dataArray);

	}

}
