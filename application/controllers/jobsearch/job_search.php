<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_Search extends CI_Controller {

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
		 $this->load->model('job_search/Job_searchmodel');
		
	}
	
	public function job_search()
	{	
        // $data['bank']=$this->Bank_model->list();
      	$user_id=	$this->session->userdata('user_id');
		$res = $this->Permission_model->userdetails($user_id);
		$user_image['values']=$res[0]->user_image;
		// $data['value'] = $this->User_model->list();
		$result['roles']=$this->Login_model->userdetails($user_id);
		$result['permission']=$this->Login_model->select_all_menu($user_id);
	
		$this->load->view('includes/header',$user_image);
		$this->load->view('includes/navigation',$result,$user_image);
		$this->load->view('jobsearch/jobsearch');
		$this->load->view('includes/footer');

	}
	public function job_description($jobid)
	{	
		$result['jobdata']=$this->Job_searchmodel->select_job_decription($jobid);
		$result['invoicetotal']=$this->Job_searchmodel->select_invoice_total($jobid);
		$result['expensetotal']=$this->Job_searchmodel->select_expense_total($jobid);
		
	 $result['invoicepaid']=$this->Job_searchmodel->select_inv_paid_total($jobid);
	 
	//  $result['amountdue']=$this->Job_searchmodel->select_amount_due($jobid);

		$result['invoicedata']=$this->Job_searchmodel->select_invoice_details($jobid);
		
		$result['creditnotedata']=$this->Job_searchmodel->select_creditnote_details($jobid);
		$result['receiptdata']=$this->Job_searchmodel->select_customer_payment_receipt_details($jobid);
		
		$result['expense']=$this->Job_searchmodel->select_expense_details($jobid);
		$result['debitnotedata']=$this->Job_searchmodel->select_debit_note_details($jobid);
		$result['supplierpayment']=$this->Job_searchmodel->select_payment_details($jobid);
		
		$result['jobledger']=$this->Job_searchmodel->select_job_ledger_details($jobid);
		
		echo json_encode($result);
	
	}
}