<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users/Usermodel');
	}
	
	public function index()
	{
		$this->load->view('login');
	}

	function forget_password(){
		$this->load->view('forget_password');
	}

	function user_login(){
		$username = $this ->input->post('username');
		$password = $this ->input->post('password');

		
		$user='';
		$upass='';
		
		$result = $this->Usermodel->get_user($username);

		foreach($result as $rowww):

			$user = $rowww->user_name;
			$upass = $rowww->password;
		
		endforeach;

		if($user == $username &&  $upass == $password){
			$message = array("status"=>"success", "message"=>"success : $user, $upass");
		}else{
			$message = array("status"=>"error", "message"=>"Username or password incorrect");
		}

		//this is a php array , if we want to transfer these data to the login.php scipt content you have to convert it into js data

		//So, we have to encode these in json format

		echo json_encode($message);
				
	}
}
