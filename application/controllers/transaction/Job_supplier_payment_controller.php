<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_supplier_payment_controller extends CI_Controller {

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

    
     $this->load->model('transaction/Job_supplier_payment_model');
	}

	
	public function index($supid)
	{
		 $user_id=	$this->session->userdata('user_id');
		$res = $this->Permission_model->userdetails($user_id);
		$result['roles']=$this->Login_model->userdetails($user_id);
       	$user_image['values']=$res[0]->user_image;
		$result['permission']=$this->Login_model->select_all_menu($user_id);
        $result['Invcode']=$this->Job_supplier_payment_model->selectcode();

        $result['bank']=$this->Job_supplier_payment_model->select_all_bank();
        $result['supplier']=$this->Job_supplier_payment_model->select_supplier_details($supid);
        $result['invno']=$this->Job_supplier_payment_model->select_invoice_number($supid);
		$this->load->view('includes/header',$user_image);
		$this->load->view('includes/navigation',$result,$user_image);
		$this->load->view('transaction/job_supplier_payment',$result);
		$this->load->view('includes/footer');
    }
    public function select_client_details($value)
	{
    
        
              $result= $this->Job_supplier_payment_model->selectclientdetails($value);
            //   var_dump($result);
            //   die();
              echo json_encode($result);
                
          }
          //to insert data into tables
          
          public function insert_supplier_payment()
	{

		 $data=$this->input->post('postData');
	
		$jobdata=$data["JobSupplierPaymentDetails"];
		$result=$this->Job_supplier_payment_model->addjobsupplierpaymentmaster($data["JobSupplierPaymentData"]);
		$my_values = array();
		if($result!=0)
		{
			
			foreach($jobdata as $row)
			{
				$row["SupplierPaymentMasterID"]=$result;
				// $row["Vat"]=floatval($row["Vat"]);
				$row["Total"]=floatval($row["Total"]);
				$data["ExpenseMasterId"]=$row["SupplierExpenseMasterID"];

				$this->Job_supplier_payment_model->addjobsupplierpaymentdetails($row);
				$this->Job_supplier_payment_model->changeexpensemasterstatus($data);

				$my_values[] = $row;
			}
		}
		echo json_encode($result);

    }
        //edit job supplier payment 
     
		
	public function edit_job_supplier_payment($id)
	{
		$ID=$id;
		 $user_id=	$this->session->userdata('user_id');
		$res = $this->Permission_model->userdetails($user_id);
		$result['roles']=$this->Login_model->userdetails($user_id);
       	$user_image['values']=$res[0]->user_image;
		$result['permission']=$this->Login_model->select_all_menu($user_id);
        $data['bank']=$this->Job_supplier_payment_model->select_all_bank();
        $data['invno']=$this->Job_supplier_payment_model->selectinvoicenumber($id);

	  $data['supplierpaymentdata']=$this->Job_supplier_payment_model->fatchsupplierpaymentdetails($ID);
		$data['jobsupplierpaymentdata']=$this->Job_supplier_payment_model->select_job_supplier_payment($ID);
// var_dump(	$data['jobsupplierpaymentdata']);
// die();
		$this->load->view('includes/header',$user_image);
		$this->load->view('includes/navigation',$result,$user_image);
		$this->load->view('transaction/edit_job_supplier_payment',$data);
		$this->load->view('includes/footer');
	}
	


	public function update_supplier_payment()
	{

		 $data=$this->input->post('postData');
		
		$paymentdata=$data["PaymentDetails"];
		$id=$data["Id"];
		$deletedids=$data["deleted"];
		$result=$this->Job_supplier_payment_model->updatesupplierpaymentemaster($id,$data["PaymentData"]);
		$my_values = array();
		if($paymentdata!="")
		{
		foreach($paymentdata as $row)
		{
				$row["InvoiceMasterId"]=$id;
				// $row["Vat"]=floatval($row["Vat"]);
				$row["Total"]=floatval($row["Total"]);
				$this->Job_supplier_payment_model->insertsupplierpaymentdetails($row);
				$my_values[] = $row;
		}
		}
		if($deletedids!="")
		{
		foreach($deletedids as $row)
		{
				$id=$row;
				$result=$this->Job_supplier_payment_model->deletesupplierpayment($id);
			
		}
	}
echo $result;
	}
	//to print supplier payment

public function print_supplier_payment($id)
{
    $ID=$id;

    $result['paymentdata']=$this->Job_supplier_payment_model->selectpaymentdetails($ID);
     $result['paymentdetails']=$this->Job_supplier_payment_model->select_payment_details($ID);

   $this->load->view('transaction/print_supplier_payment',$result);

}

public function list_supplier()
{


		 $user_id=	$this->session->userdata('user_id');
		$res = $this->Permission_model->userdetails($user_id);
		$result['roles']=$this->Login_model->userdetails($user_id);
       	$user_image['values']=$res[0]->user_image;
		$result['permission']=$this->Login_model->select_all_menu($user_id);
		$result['suppliers']=$this->Job_supplier_payment_model->select_all_suppliers();
// var_dump($result['suppliers']);
// die();
		$this->load->view('includes/header',$user_image);
		$this->load->view('includes/navigation',$result,$user_image);
		$this->load->view('transaction/view_suppliers',$result);
		$this->load->view('includes/footer');
}
}