<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Control extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('usermanagement/Login_model');
        $this->load->library(array('form_validation','session'));
		$this->load->helper(array('url','html','form'));
		$this->load->model('usermanagement/Permission_model');
	}
	public function index()
	{
		
		$this->load->view('usermanagement/login');
	}

	public function userhome()
	{
		$user_id=	$this->session->userdata('user_id');
		$res = $this->Permission_model->userdetails($user_id);
		$result['roles']=$this->Login_model->userdetails($user_id);
		$user_image['values']=$res[0]->user_image;
		$result['permission']=$this->Login_model->select_all_menu($user_id);
		$this->load->view('includes/header',$user_image);
		$this->load->view('includes/navigation',$result,$user_image);
		$this->load->view('includes/home');
		 $this->load->view('includes/footer');
	}
  
	public function login()
	{
	
	
		$Email=$this->input->post('Email');
		$Password=$this->input->post('Password');
		
	 	$res=$this->Login_model->login_check($Email,$Password);
	
		  if($res==0)
		 	{
		 		$message= array(
					'username' => $Email,
					'password' => $Password,
		 		'title' => 'invalid email or password',
		 		'heading' => 'My Heading',
				 'message' => 'My Message');
			
		 		$this->session->set_userdata('invalid_admin_login',$message);
				 echo "invalid Email or Password.....!";
				 $this->load->view('usermanagement/login');
		 	}
		 	else
		 	 {
			 $user_id=$res[0]->id;
			$user_name=$res[0]->user_name;
			$user_image['values']=$res[0]->user_image;
		
			$this->session->set_userdata('user_id',$user_id);
			$this->session->set_userdata('user_name',$user_name);
		    $this->session->set_userdata('user_image',$user_image);
			// 	var_dump($resultt);
			// die();
				
		   
			$_SESSION['user']=$_POST['Email'];
			$result['roles']=$this->Login_model->userdetails($user_id);
			$user_id=	$this->session->userdata('user_id');
			$result['permission']=$this->Login_model->select_all_menu($user_id);
	
			$this->load->view('includes/header',$user_image);
			$this->load->view('includes/navigation',$result,$user_image);
			$this->load->view('includes/home');
			$this->load->view('includes/footer');
	}
	}
	public function logout()
	{
		$this->session->unset_userdata('exampleInputEmail1');
		$this->session->sess_destroy();
		$this->load->view('usermanagement/login');
	}
	public function viewforgotpassword()
	{
		
		$this->load->view('usermanagement/forgotpassword');
	}

	public function forgot_password()
	{
		$email = $this->input->post('email');      
		$findemail = $this->Login_model->ForgotPassword($email);  
		if($findemail){
		 $this->Login_model->send_mail($findemail);  
		 $this->load->view('usermanagement/newpassword');      
		  }else{
		 $this->session->set_flashdata('msg',' Email not found!');
		 redirect(base_url().'Home','refresh');
	 
	}    
	}
	public function newpassword()
	{
	
		$randomkey = $_POST['randomkey'];
		$newpassword = $_POST['newpassword'];
		$cpassword = $_POST['confirmpassword'];
		if($newpassword != $cpassword)
		{
			$this->load->view('usermanagement/newpassword'); 
		}  
		else{
			$this->load->model('Login_Model');
			$result= $this->Login_model->newpassword($randomkey);
			redirect('Home'); 
			     
		}
	}
}
