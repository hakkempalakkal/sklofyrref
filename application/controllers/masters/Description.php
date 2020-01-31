<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Description extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('usermanagement/User_model');
		$this->load->model('usermanagement/Login_model');
		$this->load->model('usermanagement/Permission_model');
		$this->load->library(array('form_validation','session','upload'));
		$this->load->helper(array('url','html','form'));
		$this->load->library('pagination');
         $this->load->database(); 
		 $this->load->library('session');
		 $this->load->helper('url');
        
        $this->load->model('masters/Description_model');
	}

	
	public function index()
	{
		 $user_id=	$this->session->userdata('user_id');
	
		// var_dump($user_image);
		//  die();
		
		$data['value'] = $this->Description_model->list();
		$res = $this->Permission_model->userdetails($user_id);
		$result['roles']=$this->Login_model->userdetails($user_id);

		$user_image['values']=$res[0]->user_image;
			// var_dump($res);
			// die();
			$result['permission']=$this->Login_model->select_all_menu($user_id);
		$this->load->view('includes/header',$user_image);
		$this->load->view('includes/navigation',$result,$user_image);
		$this->load->view('masters/description',$data,$result);
		 $this->load->view('includes/footer');
	}
	public function create()
	{
		$user_id=	$this->session->userdata('user_id');
		$res = $this->Permission_model->userdetails($user_id);
		$user_image['values']=$res[0]->user_image;
		$result['roles']=$this->Login_model->userdetails($user_id);
		$result['permission']=$this->Login_model->select_all_menu($user_id);
		$data['code']=$this->Description_model->selectcode();
		$this->load->view('includes/header',$user_image);
		$this->load->view('includes/navigation',$result,$user_image);
		$this->load->view('masters/create_description',$data);
		$this->load->view('includes/footer');	
	}
	public function store()
	{
		$postdata=$this->input->post('postData');
		
		$result= $this->Description_model->add($postdata);
		
		echo json_encode($result);
		
	}
	public function edit()
	{
		$user_id=	$this->session->userdata('user_id');
		$res = $this->Permission_model->userdetails($user_id);
		$user_image['values']=$res[0]->user_image;
		$result['roles']=$this->Login_model->userdetails($user_id);
		$id=$_REQUEST['id'];
		$result['permission']=$this->Login_model->select_all_menu($user_id);
		$data['value'] = $this->Description_model->edit($id);
		$this->load->view('includes/header',$user_image);
		$this->load->view('includes/navigation',$result,$user_image);
		$this->load->view('masters/edit_description',$data);
		$this->load->view('includes/footer');	
	}
	public function update()
	{	
	
		$postdata=$this->input->post('postData');
		
		$data=$postdata["postData1"];
		$id=$postdata["id"];
		$result= $this->Description_model->update($id,$data);
		echo json_encode($result);
		
	}
	//update status
	public function enable_status($id)
	
	{
		$result = $this->Description_modell->enable_status($id);

		redirect('description');
	}
	public function disable_status($id)
	
	{
		$result = $this->Description_model->disable_status($id);
		redirect('description');
		
	}

}
