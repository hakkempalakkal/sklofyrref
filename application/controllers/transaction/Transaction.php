<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

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
        
        $this->load->model('masters/Shipper_model');
        $this->load->model('transaction/Transaction_model');
	}

	
	public function index()
	{
		 $user_id=	$this->session->userdata('user_id');
	
		$data['value'] = $this->Shipper_model->list();
		$res = $this->Permission_model->userdetails($user_id);
		$result['roles']=$this->Login_model->userdetails($user_id);
		$data['code']=$this->Transaction_model->selectcode();
		$data['codes']=$this->Transaction_model->selectcode_estimate();
		
		$data['clientlist']=$this->Transaction_model->list_client();
		$data['carrierlist']=$this->Transaction_model->list_carrier();
		$data['currencylist']=$this->Transaction_model->list_currency();
		$data['userlist']=$this->Transaction_model->list_user();
		// var_dump($data);
		// die();
		$user_image['values']=$res[0]->user_image;
		$result['permission']=$this->Login_model->select_all_menu($user_id);
				// $this->index($result);
				
		 $data['values'] = $this->Transaction_model->list();
	
	
		$this->load->view('includes/header',$user_image);
		$this->load->view('includes/navigation',$result,$user_image);
		$this->load->view('transaction/transaction',$data);
		$this->load->view('includes/footer');
	}
	
	public function edit_job($id)
	{
		 $user_id=	$this->session->userdata('user_id');
	
		$data['value'] = $this->Shipper_model->list();
		$res = $this->Permission_model->userdetails($user_id);
		$result['roles']=$this->Login_model->userdetails($user_id);
		$data['code']=$this->Transaction_model->selectcode();
		$data['codes']=$this->Transaction_model->selectcode_estimate();
		
		$data['clientlist']=$this->Transaction_model->list_client();
		$data['carrierlist']=$this->Transaction_model->list_carrier();
		$data['currencylist']=$this->Transaction_model->list_currency();
		$data['userlist']=$this->Transaction_model->list_user();
		// var_dump($data);
		// die();
		$user_image['values']=$res[0]->user_image;
		$result['permission']=$this->Login_model->select_all_menu($user_id);
				// $this->index($result);
				$data['estimatedata']=$this->Transaction_model->editestimateedetails($id);
		
		$data['estimate']=$this->Transaction_model->job_estimate_details($id);
		 $data['values'] = $this->Transaction_model->getjobById($id);
	
	
		$this->load->view('includes/header',$user_image);
		$this->load->view('includes/navigation',$result,$user_image);
		$this->load->view('transaction/edit_job',$data);
		$this->load->view('includes/footer');
	}
	
   

    public function store()
	{
		$postdata=$this->input->post('postData');
		$result= $this->Transaction_model->add($postdata);		
		echo json_encode($result);
		
    }
	public function update()
	{	
		$postdata=$this->input->post('postData');
		$data=$postdata["postData1"];
		$id=$postdata["id"];
		$result= $this->Transaction_model->update($id,$data);
		echo json_encode($result);	
	}
   //autocomplete textbox
	public function getshipperdata(){
        
        $data = $this->Transaction_model->getshippers();
        echo json_encode($data);
	  }
	  //carrier
	//   public function getcarrier($value)
	//   {
	// 		$result= $this->Transaction_model->getcarrier($value);
			
	// 		echo json_encode($result);

	//   }
	  public function getconsigneedata(){
        
        $data = $this->Transaction_model->getshippers();
        echo json_encode($data);
      }
	  public function getdescription($value)
	  {
			$result= $this->Transaction_model->list_description($value);
			echo json_encode($result);

	  }
		public function jobdetails($value)
		{
		   
			  $result= $this->Transaction_model->job_desc($value); 
			  echo json_encode($result);
			  
		  }
		public function store_estimate()
		{
			$postdata=$this->input->post('postData');
			$estimate_data=$postdata["estimate_master_details"];
			$result= $this->Transaction_model->add_estimate($postdata["estimate_master"]);		
			$my_values = array();
			if($result!=0)
		{
			
			foreach($estimate_data as $row)
			{
				$row["estimate_masterid"]=$result;
				$row["vat"]=floatval($row["vat"]);
				$row["total"]=$row["total"];
				$this->Transaction_model->add_estimatedetails($row);
				$my_values[] = $row;
			}
		}
		
			
		}
		
		//list job details
		public function job_transactionlist()
		{	
			
			  $user_id=	$this->session->userdata('user_id');
			$res = $this->Permission_model->userdetails($user_id);
			$user_image['values']=$res[0]->user_image;
			$result['roles']=$this->Login_model->userdetails($user_id);
			//to add menus
			$data['values'] = $this->Transaction_model->listjobdetails();
			$result['permission']=$this->Login_model->select_all_menu($user_id);
		
			$this->load->view('includes/header',$user_image);
			$this->load->view('includes/navigation',$result,$user_image);
			$this->load->view('transaction/list_jobtransaction',$data);
			$this->load->view('includes/footer');
	
		}
		
		public function jobclosed_status($id)
	
	{
		$result = $this->Transaction_model->jobclosed_status($id);
		redirect('list-job');
		
	}
	public function update_estimate()
	{

		 $data=$this->input->post('postData');
		
		$estimate=$data["estimate_master_details"];
		$id=$data["Id"];
		$deletedids=$data["deleted"];
		// echo $id;
		// die();
		$result=$this->Transaction_model->update_estimatemaster($id,$data["estimate_master"]);
		$my_values = array();
		if($estimate!="")
		{
		foreach($estimate as $row)
		{
				$row["estimate_masterid"]=$id;
				$row["vat"]=floatval($row["vat"]);
				$row["total"]=floatval($row["total"]);
				$this->Transaction_model->insert_estimatedetails($row);
				$my_values[] = $row;
		}
		}
		if($deletedids!="")
		{
		foreach($deletedids as $row)
		{
				$id=$row;
				$result=$this->Transaction_model->delete_estimatedetails($id);
			
		}
	}
	echo json_encode($result);
// echo $result;
	}
}
