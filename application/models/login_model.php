<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Author: Jorge Torres
 * Description: Login model class
 */
class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
		$this->load->database();
		$this->load->library('encrypt');
		$this->load->helper('string');

		//$this->load->model('emails/portfolio_emails');

    }
    
    public function validate($username, $password){
        // grab user input
        $salt = $this->db->query("SELECT random_salt FROM user_login WHERE user_name= '".$username."'")->result_array();
		// hash the password
        $salt = json_encode($salt);
		$password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 11, 'salt' => $salt));
		
		//$this->db->where('email', $email);
        //$this->db->where('password', $password);
        //$this->db->or_where('override',$password);
		//$query = $this->db->get('members');
		$query = $this->db->query("SELECT * FROM user_login WHERE user_name = '".$username."' AND password = '".$password."'")->result_array();
		// Let's check if there are any results
        if(!empty($query))
        {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                    'user_name' => $row->user_name
                    );
            $this->session->set_userdata($data);
			//$this->portfolio_emails->welcome_email($row->email);
			
			// Set cookies
			$this->load->helper('cookie');
			$cookie = array(
				'name'   => 'Trial Cookie',
				'value'  => 'Value',
				'expire' => '86500',
				'secure' => TRUE
			);
			$this->input->set_cookie($cookie);
			
            return 200;
        }
        // If the previous process did not validate
        // then return false.
      
		return 400;
    }

    public function create_user($postData) {
    	$salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
		$password = password_hash($postData['password'], PASSWORD_BCRYPT, array('cost' => 11, 'salt' => $salt));
    	$userArray = array(
    		'user_name' => $postData['username'],
    		'password' => $password,
    		'random_salt' => $salt
    		);
    	if ($this->db->insert('user_login',$userArray)) {
    	return 200;
    	}
    
   		return 400;
   		}
}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */