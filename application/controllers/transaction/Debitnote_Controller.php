<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Debitnote_Controller extends CI_Controller {

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
        
    //   $this->load->model('masters/Shipper_model');
     $this->load->model('transaction/Debit_note_model');
    //  $this->load->model('transaction/Transaction_model');
	}

	
	public function debit_note($id)
	{
		 $user_id=	$this->session->userdata('user_id');
		$res = $this->Permission_model->userdetails($user_id);
		$result['roles']=$this->Login_model->userdetails($user_id);
       	$user_image['values']=$res[0]->user_image;
		$result['permission']=$this->Login_model->select_all_menu($user_id);
        $result['job']=$this->Debit_note_model->select_all_job();
        $result['jobdata']=$this->Debit_note_model->select_job_details($id);
		$result['currencylist']=$this->Debit_note_model->list_currency();
        $result['code']=$this->Debit_note_model->selectcode();
		$this->load->view('includes/header',$user_image);
		$this->load->view('includes/navigation',$result,$user_image);
		$this->load->view('transaction/debitnote',$result);
		$this->load->view('includes/footer');
    }
    public function getdata($value)
    {
	
          $result= $this->Debit_note_model->list_description($value);
          echo json_encode($result);
            
	  }
public function debit_note_details()
	{

		 $data=$this->input->post('postData');
	
		$debit_data=$data["DebitDetails"];
		$result=$this->Debit_note_model->adddebitnote($data["DebitData"]);
		$my_values = array();
		if($result!=0)
		{
			
			foreach($debit_data as $row)
			{
				$row["Debitnote_Master_id"]=$result;
				
				
				$row["Amount"]=floatval($row["Amount"]);
				$this->Debit_note_model->add_debitnotedetails($row);
				$my_values[] = $row;
			}
		}
		
	
		
	}
	
	public function getsupplierdata(){
        
        $data = $this->Debit_note_model->getsupplier();
        echo json_encode($data);
	  }
	//editand update
	  public function edit_debitnote($id)
	  {
		  $debitid=$id;
		  $user_id=$this->session->userdata('user_id');
		  $res = $this->Permission_model->userdetails($user_id);
		  $result['roles']=$this->Login_model->userdetails($user_id);
			 $user_image['values']=$res[0]->user_image;
		  $result['permission']=$this->Login_model->select_all_menu($user_id);
		  // $data['bank']=$this->Debit_note_model->select_all_bank();
		  $data['currencylist']=$this->Debit_note_model->list_currency();
		  $data['debitdata']=$this->Debit_note_model->edit_debitnotedetails($debitid);
		  // var_dump($data['expensedata']);
		  // die();
		  $data['dbtnote']=$this->Debit_note_model->debit_note_details($debitid);
	  
		  $this->load->view('includes/header',$user_image);
		  $this->load->view('includes/navigation',$result,$user_image);
		  $this->load->view('transaction/edit_debitnote',$data);
		  $this->load->view('includes/footer');
	  }
	  
  
	  public function update_debitnote()
	  {
  
		   $data=$this->input->post('postData');
		  
		  $dbtnote=$data["DebitDetails"];
		  $id=$data["Id"];
		  $deletedids=$data["deleted"];
		//   echo $id;
		//   die();
		  $result=$this->Debit_note_model->update_debitnotemaster($id,$data["DebitData"]);
		  $my_values = array();
		  if($dbtnote!="")
		  {
		  foreach($dbtnote as $row)
		  {
				  $row["Debitnote_Master_id"]=$id;
				//   $row["Vat"]=floatval($row["Vat"]);
				  $row["Amount"]=floatval($row["Amount"]);
				  $this->Debit_note_model->insert_debitdetails($row);
				  $my_values[] = $row;
		  }
		  }
		  if($deletedids!="")
		  {
		  foreach($deletedids as $row)
		  {
				  $id=$row;
				  $result=$this->Debit_note_model->delete_debitdetails($id);
			  
		  }
	  }
  echo $result;
	  }
  

//print debitnote details
public function debit_note_print($debitid)
{
	$debitid=$debitid;

	$result['debitdata']=$this->Debit_note_model->selectdebit_details($debitid);
	 $result['debit']=$this->Debit_note_model->debitnote_details($debitid);

	$this->load->view('transaction/debitnote_print',$result);

}


}