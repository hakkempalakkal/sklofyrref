<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_expensemodel extends CI_Model {

    public function select_job_details($id)
    {
     $this->db->where('JobId',$id);
    $this->db->select('*');
    $this->db->from('jm_job');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
    
    }
    
    public function select_all_job()
    {
    $this->db->select('*');
    $this->db->from('jm_job');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
    
    }
    public function selectcode()
    {
    
      $this->db->select_max('PostId');
    $this->db->from('jm_expensemaster');
    $query = $this->db->get();
    $result = $query->result();
    if($result==NULL)
    {
      $result=1;
    }
    return $result;
    
    }

    public function getsupplier()
    {
          
    $this->db->select('id as value, supplier_name as label');
    $this->db->from('mst_supplier');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
    
    }

    public function list_description($data)
    {
      
    $this->db->where('code', $data);
    $this->db->select('description,id');
    $this->db->from('mst_description');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
    
    }
    //to insert into jobmaster tb
    public function addjobmaster($data_array)
       {
       
        
          $this->db->insert('jm_expensemaster', $data_array);
          $job_master_id=$this->db->insert_id();
          return $job_master_id;
       
          
    
       }
       public function addjobinvoicedetailsinsert($data_array)
       {
       
          // var_dump( $data_array);
          // die();
          $this->db->insert('jm_expensedetail', $data_array);
          $job_invoice_details_id=$this->db->insert_id();
          return $job_invoice_details_id;
       
          
    
       }
      //print
      public function selectexpensedetails($data)
      {
         $dataq="select sp.id,sp.supplier_name,ji.ExpenseMasterId,ji.PostId,ji.InvDate,ji.PostingDate,ji.SubTotal,ji.VatTotal,ji.Reference,ji.OurInv,ji.GrandTotal,concat(jj.Hawb,'-',jj.Mawb) as awb,jj.JobId,jj.Number,jj.ActualWeight,
         jj.Etd,jj.Eta,jj.Type,jj.Mbl,jj.Carrier,jj.Pol,jj.Pod,jj.PoNo,concat(c.name,'|',c.address,'|',c.telephone,'-',c.mobile,'|',c.email) as clientenglish,c.vat_no,
         concat(c.name_arabic,'|',c.address_arabic,'|',c.telephone,'-',c.mobile,'|',c.email) as clientearabic,
         concat(consignor.name,',',consignor.address,',',consignor.telephone,'-',consignor.mobile,',',consignor.email) as consignor,
         concat(consignee.name,',',consignee.address,',',consignee.telephone,'-',consignee.mobile,',',consignee.email) as consignee
         from jm_expensemaster ji
         inner join jm_job jj on ji.JobId=jj.JobId
         inner join mst_client c on c.id=jj.client_id
         inner join mst_supplier sp on sp.id=ji.SupplierID
         inner join mst_shipper consignor on consignor.id=jj.consignor_id
         inner join mst_shipper consignee on consignee.id=jj.consignee_id
          where ji.ExpenseMasterId=".$data.";";
      
       $query = $this->db->query($dataq);
          $result = $query->result();
              return $result;
           
       
      
      }
      
      // to select_job_invoice details
      public function supplier_expense_details($data)
      {
         $this->db->where('jm_expensedetail.ExpenseMasterId', $data);
         $this->db->select('*');    
         $this->db->from('jm_expensedetail');
         $query = $this->db->get();
         $result = $query->result();
         return $result;
       
      
      }
       //edit
      public function editexpenseedetails($data)
      {
        
      $dataq="select sp.id,sp.supplier_name,ji.ExpenseMasterId,ji.PostId,ji.InvDate,ji.PostingDate,ji.SubTotal,ji.VatTotal,ji.Reference,ji.OurInv,ji.GrandTotal,concat(jj.Hawb,'-',jj.Mawb) as awb,jj.JobId,jj.Number,jj.ActualWeight,
      jj.Etd,jj.Eta,jj.Type,jj.Mbl,jj.Carrier,jj.Pol,jj.Pod,jj.PoNo,concat(c.name,'|',c.address,'|',c.telephone,'-',c.mobile,'|',c.email) as clientenglish,c.vat_no,
      concat(c.name_arabic,'|',c.address_arabic,'|',c.telephone,'-',c.mobile,'|',c.email) as clientearabic,
      concat(consignor.name,',',consignor.address,',',consignor.telephone,'-',consignor.mobile,',',consignor.email) as consignor,
      concat(consignee.name,',',consignee.address,',',consignee.telephone,'-',consignee.mobile,',',consignee.email) as consignee
      from jm_expensemaster ji
      inner join jm_job jj on ji.JobId=jj.JobId
      inner join mst_client c on c.id=jj.client_id
      inner join mst_supplier sp on sp.id=ji.SupplierID
      inner join mst_shipper consignor on consignor.id=jj.consignor_id
      inner join mst_shipper consignee on consignee.id=jj.consignee_id
       where ji.ExpenseMasterId=".$data.";";
      
       $query = $this->db->query($dataq);
          $result = $query->result();
              return $result;
           
       
      
      }
      
      //update
      public function update_expenseemaster($Id,$data_array)
         {
            $this->db->where('jm_expensemaster.ExpenseMasterId', $Id);
            $this->db->update('jm_expensemaster', $data_array);
            
            return 1;
       
         }
         public function insert_expncdetails($data_array)
         {
         
            $this->db->insert('jm_expensedetail', $data_array);
            return 1;
         
         }
         public function delete_expncdetails($Id)
         {
           
            $this->db->where('ExpenseDetailId',$Id);
            $this->db->delete('jm_expensedetail');
            return 1;
         
            
      
         }
         //view supplier expense list
   public function select_expenselist()
    {
    $this->db->select('*');
    $this->db->from('jm_expensemaster');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
    
    }
    public function list_currency()
{

$this->db->select('*');
$this->db->from('mst_currency');
$query = $this->db->get();
$result = $query->result();
return $result;

}   
   
}