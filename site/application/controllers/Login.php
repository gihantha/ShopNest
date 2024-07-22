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

	// function user_login(){
	// 	$username = $this ->input->post('username');
	// 	$password = $this ->input->post('password');

		
	// 	$user='';
	// 	$upass='';
		
	// 	$result = $this->Usermodel->get_user($username);

	// 	foreach($result as $rowww):

	// 		$user = $rowww->user_name;
	// 		$upass = $rowww->password;
		
	// 	endforeach;

	// 	if($user == $username &&  $upass == $password){
	// 		$message = array("status"=>"success", "message"=>"success : $user, $upass");
	// 	}else{
	// 		$message = array("status"=>"error", "message"=>"Username or password incorrect");
	// 	}

	// 	//this is a php array , if we want to transfer these data to the login.php scipt content you have to convert it into js data

	// 	//So, we have to encode these in json format

	// 	echo json_encode($message);
				
	// }
	function saveRegisterDt(){
		$this->load->helper('security');
		$this->load->helper('string');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('frist_name', 'Frist Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('contact_no', 'Contact No', 'required|numeric');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('mail', 'Mail Address', 'trim|required|valid_email|xss_clean|callback_validateRegmail');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
		if ($this->form_validation->run() == FALSE) {
			$st = array('status' => 0, 'message' => validation_errors());
		}else{
			$tbPrimaryDt = json_decode(tablePrimaryKey('client','id'));
			if($tbPrimaryDt->status==200){
				$activationUrl = random_string('alnum', 16).date('YmdHis');
				$clientDt = array(
					'id'=>$tbPrimaryDt->data,
					'frist_name'=>$this->security->xss_clean($this->input->post('frist_name')),	
					'last_name'=>$this->security->xss_clean($this->input->post('last_name')),	
					'address'=>$this->security->xss_clean($this->input->post('address')),
					'mail'=>$this->security->xss_clean($this->input->post('mail')),	
					'contact_no'=>$this->security->xss_clean($this->input->post('contact_no')),	
					'username'=>$this->security->xss_clean($this->input->post('mail')),	
					'password'=>$this->security->xss_clean($this->input->post('password')),	
					'status'=>0,
					'uLink'=>$activationUrl
				);	
				$subcriptionDt = json_decode(subcriptionDtById($this->input->post('id')));
				if($subcriptionDt->status==200){
					($subcriptionDt->data->time_type=='monthly')? $timeType = 'months' : $timeType ='years';
					$subStartDate = date('Y-m-d');
					$subEndDate = date('Y-m-d',strtotime($subStartDate."+ ".$subcriptionDt->data->count.$timeType));
					$subcribeDt = array(
						'subPlan_id'=>$this->input->post('id'),
						'client_id'=>$tbPrimaryDt->data,	
						'start_date'=>$subStartDate,
						'end_date'=>$subEndDate,
						'subUserCt'=>$subcriptionDt->data->subUserCt,
						'status'=> 1
					);
					$sveSt=json_decode(saveClientRegDt($clientDt,$subcribeDt));
					if($sveSt->status == 200){
						$st = array("status"=>1,"message"=>"Check Your Mail In Box");
					} else {
						print_r('sdsad');
						$st = array("status"=>0,"message"=>"You have encountered an error");
					}
				}else{
					$st = array("status"=>0,"message"=>"You have encountered an error");
				}
			}else{
				$st = array("status"=>0,"message"=>"You have encountered an error");
			}
		}
		echo json_encode($st);
	}
}
