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
      
      	$user_id=	$this->session->userdata('user_id');
		$res = $this->Permission_model->userdetails($user_id);
		$user_image['values']=$res[0]->user_image;
	
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
      	$user_id=	$this->session->userdata('user_id');
		$res = $this->Permission_model->userdetails($user_id);
		$user_image['values']=$res[0]->user_image;
		$result['roles']=$this->Login_model->userdetails($user_id);
		//to add menus
	
		$result['permission']=$this->Login_model->select_all_menu($user_id);
	 $result['client']= $this->Report_model->select_clients();

		$this->load->view('includes/header',$user_image);
		$this->load->view('includes/navigation',$result,$user_image);
		$this->load->view('reports/invoice_report',$result);
		$this->load->view('includes/footer');

	}
	public function invoice_report_data()
	{
		$data=$this->input->post('postData');
		$id=$data["id"];
	$from=$data["fromdate"];
	$to=$data["todate"];
	if($id=="")
	{

 $result['invoicereportdata']= $this->Report_model->get_invoice_reportdata($from,$to);
		}
		else{
			$result['invoicereportdata']= $this->Report_model->get_invoice_reportdata_withid($id,$from,$to);

		}	
		echo json_encode($result);	
	}

	public function pending_invoice_reports()
	{	
      	$user_id=	$this->session->userdata('user_id');
		$res = $this->Permission_model->userdetails($user_id);
		$user_image['values']=$res[0]->user_image;
		$result['roles']=$this->Login_model->userdetails($user_id);
		//to add menus
	
		$result['permission']=$this->Login_model->select_all_menu($user_id);
	 $result['client']= $this->Report_model->select_clients();

		$this->load->view('includes/header',$user_image);
		$this->load->view('includes/navigation',$result,$user_image);
		$this->load->view('reports/pending_invoice',$result);
		$this->load->view('includes/footer');

	}
	public function pending_invoice_report_data()
	{
		$data=$this->input->post('postData');
		$id=$data["id"];
	$from=$data["fromdate"];
	$to=$data["todate"];
	if($id=="")
	{

 $result['pendinginvoicereportdata']= $this->Report_model->pending_invoice_data($from,$to);
		}
		else{
			$result['pendinginvoicereportdata']= $this->Report_model->pending_invoice_data_withid($id,$from,$to);

		}	
		echo json_encode($result);	
	}


    public function bill_reports()
	{	
      	$user_id=	$this->session->userdata('user_id');
		$res = $this->Permission_model->userdetails($user_id);
		$user_image['values']=$res[0]->user_image;
		$result['roles']=$this->Login_model->userdetails($user_id);
		//to add menus
	
		$result['permission']=$this->Login_model->select_all_menu($user_id);
		
		$result['suppliers']= $this->Report_model->select_suppliers();

		$this->load->view('includes/header',$user_image);
		$this->load->view('includes/navigation',$result,$user_image);
		$this->load->view('reports/bill_reports',$result);
		$this->load->view('includes/footer');

    }
	public function bill_reports_getdata()
	{
		$data=$this->input->post('postData');
	$id=$data["id"];
	$from=$data["from"];
	$to=$data["to"];

if($id=="")
{
	$result['billreportdata']= $this->Report_model->get_billed_reportdata($from,$to);

}
else
{
	$result['billreportdata']= $this->Report_model->get_billed_reportdata_withid($id,$from,$to);

}
	echo json_encode($result);	
	}

    public function pending_bills()
	{	
      	$user_id=	$this->session->userdata('user_id');
		$res = $this->Permission_model->userdetails($user_id);
		$user_image['values']=$res[0]->user_image;
		$result['roles']=$this->Login_model->userdetails($user_id);
		//to add menus
	
		$result['permission']=$this->Login_model->select_all_menu($user_id);
		
		$result['suppliers']= $this->Report_model->select_suppliers();

		$this->load->view('includes/header',$user_image);
		$this->load->view('includes/navigation',$result,$user_image);
		$this->load->view('reports/pending_bills',$result);
		$this->load->view('includes/footer');

    }

	public function 	pending_bill_data()
	{
		$data=$this->input->post('postData');
	$id=$data["id"];
	$from=$data["from"];
	$to=$data["to"];

if($id=="")
{
	$result['pendingbillreportdata']= $this->Report_model->get_pendiding_bille_reportdata($from,$to);

}
else
{
	$result['pendingbillreportdata']= $this->Report_model->get_pending_bille_reportdata_withid($id,$from,$to);

}
	echo json_encode($result);	
	}
}