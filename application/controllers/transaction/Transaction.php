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
}
