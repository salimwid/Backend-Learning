<?php

date_default_timezone_set('America/Toronto');

class Upload extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	public function do_upload()
	{
		$config['upload_path'] = APPPATH . 'uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			print_r('hello, file not uploaded!');
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			print_r('file is now uploaded!');
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('upload_success', $data);
		}
	}

	public function resize_image() {
		$config['image_library'] = 'gd2';
		$config['source_image']	= APPPATH . 'uploads/';
		$config['new_image']	= APPPATH . 'uploads/avatar/';
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']	= 75;
		$config['height']	= 50;
		$config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;
		$config['allowed_types'] = 'gif|jpg|jpeg|png|JPEG|JPG|PNG';

		$this->load->library('image_lib', $config); 

		if (!$this->image_lib->resize()) {
        echo $this->image_lib->display_errors();
	    }
	    // clear //
	    $this->image_lib->clear();
	}
}
?>