<?php

class Template_test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('template_model');
	}
	public function index(){
		$data['title'] = 'Admin Panel';
		$data['panel'] = 'members';
		$data['navigation'] = 'members';
		$data['page'] = $this
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
		$this->load->view('content', $data);
		$this->load->view('footer', $data);
	}
}
