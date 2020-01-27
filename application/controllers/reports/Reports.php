<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

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
		 $this->load->model('masters/Bank_model');
		 $this->load->model('transaction/Transaction_model');
		 $this->load->model('reports/Report_model');
	}
	
	public function job_reports()
	{	
        // $data['bank']=$this->Bank_model->list();
      	$user_id=	$this->session->userdata('user_id');
		$res = $this->Permission_model->userdetails($user_id);
		$user_image['values']=$res[0]->user_image;
		// $data['value'] = $this->User_model->list();
		$result['roles']=$this->Login_model->userdetails($user_id);
		//to add menus
		$data['values'] = $this->Report_model->listjobdata();
		$result['permission']=$this->Login_model->select_all_menu($user_id);
	
		$this->load->view('includes/header',$user_image);
		$this->load->view('includes/navigation',$result,$user_image);
		$this->load->view('reports/job_report',$data);
		$this->load->view('includes/footer');

    }
    public function non_billed_jobs()
	{	
        // $data['bank']=$this->Bank_model->list();
      	$user_id=	$this->session->userdata('user_id');
		$res = $this->Permission_model->userdetails($user_id);
		$user_image['values']=$res[0]->user_image;
		// $data['value'] = $this->User_model->list();
		$result['roles']=$this->Login_model->userdetails($user_id);
	
		$data['values'] = $this->Report_model->nonbilledjob();
		$result['permission']=$this->Login_model->select_all_menu($user_id);
	
		$this->load->view('includes/header',$user_image);
		$this->load->view('includes/navigation',$result,$user_image);
		$this->load->view('reports/no_billed_jobs',$data);
		$this->load->view('includes/footer');

    }
    public function invoice_reports()
	{	
        // $data['bank']=$this->Bank_model->list();
      	$user_id=	$this->session->userdata('user_id');
		$res = $this->Permission_model->userdetails($user_id);
		$user_image['values']=$res[0]->user_image;
		// $data['value'] = $this->User_model->list();
		$result['roles']=$this->Login_model->userdetails($user_id);
		//to add menus
	
		$result['permission']=$this->Login_model->select_all_menu($user_id);
	
		$this->load->view('includes/header',$user_image);
		$this->load->view('includes/navigation',$result,$user_image);
		$this->load->view('reports/invoice_report');
		$this->load->view('includes/footer');

    }
    public function bill_reports()
	{	
        // $data['bank']=$this->Bank_model->list();
      	$user_id=	$this->session->userdata('user_id');
		$res = $this->Permission_model->userdetails($user_id);
		$user_image['values']=$res[0]->user_image;
		// $data['value'] = $this->User_model->list();
		$result['roles']=$this->Login_model->userdetails($user_id);
		//to add menus
	
		$result['permission']=$this->Login_model->select_all_menu($user_id);
	
		$this->load->view('includes/header',$user_image);
		$this->load->view('includes/navigation',$result,$user_image);
		$this->load->view('reports/bill_reports');
		$this->load->view('includes/footer');

    }
    // public function pending_bills()
	// {	
    //     // $data['bank']=$this->Bank_model->list();
    //   	$user_id=	$this->session->userdata('user_id');
	// 	$res = $this->Permission_model->userdetails($user_id);
	// 	$user_image['values']=$res[0]->user_image;
	// 	// $data['value'] = $this->User_model->list();
	// 	$result['roles']=$this->Login_model->userdetails($user_id);
	// 	//to add menus
	
	// 	$result['permission']=$this->Login_model->select_all_menu($user_id);
	
	// 	$this->load->view('includes/header',$user_image);
	// 	$this->load->view('includes/navigation',$result,$user_image);
	// 	$this->load->view('reports/pending_bills');
	// 	$this->load->view('includes/footer');

    // }
    public function pending_invoice()
	{	
        // $data['bank']=$this->Bank_model->list();
      	$user_id=	$this->session->userdata('user_id');
		$res = $this->Permission_model->userdetails($user_id);
		$user_image['values']=$res[0]->user_image;
		// $data['value'] = $this->User_model->list();
		$result['roles']=$this->Login_model->userdetails($user_id);
		//to add menus
	
		$result['permission']=$this->Login_model->select_all_menu($user_id);
	
		$this->load->view('includes/header',$user_image);
		$this->load->view('includes/navigation',$result,$user_image);
		$this->load->view('reports/pending_invoice');
		$this->load->view('includes/footer');

    }


}