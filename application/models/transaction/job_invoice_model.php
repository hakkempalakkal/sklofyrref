<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class job_invoice_model extends CI_Model {

public function select_job_details($id)
{
 $this->db->where('JobId',$id);
$this->db->select('*');
$this->db->from('jm_job');
$query = $this->db->get();
$result = $query->result();
return $result;

}

public function select_all_bank()
{
$this->db->select('*');
$this->db->from('mst_bank');
$query = $this->db->get();
$result = $query->result();
return $result;

}
public function selectcode()
{

  $this->db->select_max('Inv');
$this->db->from('jm_invoicemaster');
$query = $this->db->get();
$result = $query->result();
if($result==NULL)
{
  $result=1;
}
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
   
    
      $this->db->insert('jm_invoicemaster', $data_array);
      $job_master_id=$this->db->insert_id();
      return $job_master_id;
   
      

   }
   public function addjobinvoicedetailsinsert($data_array)
   {
   
      // var_dump( $data_array);
      // die();
      $this->db->insert('jm_invoicedetail', $data_array);
      $job_invoice_details_id=$this->db->insert_id();
      return $job_invoice_details_id;
   
      

   }
   //to select invoicedetails
   
   public function selectinvoicedetails($data)
{
  
$dataq="select ji.Inv,ji.Date,ji.Total,ji.VatTotal,ji.GrandTotal,concat(jj.Hawb,'-',jj.Mawb) as awb,jj.Number,jj.ActualWeight,
jj.Etd,jj.Eta,concat(c.name,'|',c.address,'|',c.telephone,'-',c.mobile,'|',c.email) as clientenglish,c.vat_no,
concat(c.name_arabic,'|',c.address_arabic,'|',c.telephone,'-',c.mobile,'|',c.email) as clientearabic,
concat(consignor.name,',',consignor.address,',',consignor.telephone,'-',consignor.mobile,',',consignor.email) as consignor,
concat(consignee.name,',',consignee.address,',',consignee.telephone,'-',consignee.mobile,',',consignee.email) as consignee,
concat(bn.bank_name,',',bn.acc_number,',',bn.other_info,',',bn.iban) as bank
from jm_invoicemaster ji
inner join mst_bank bn  on bn.id=ji.Bank

inner join jm_job jj on ji.JobId=jj.JobId

inner join mst_client c on c.id=jj.client_id
inner join mst_shipper consignor on consignor.id=jj.consignor_id
inner join mst_shipper consignee on consignee.id=jj.consignee_id

 where ji.InvoiceMasterId=".$data.";";

 $query = $this->db->query($dataq);
    $result = $query->result();
        return $result;
     
 

}

// to select_job_invoice details
public function select_job_invoice_details($data)
{
   $this->db->where('jm_invoicedetail.InvoiceMasterId', $data);
   $this->db->select('*');    
   $this->db->from('jm_invoicedetail');
   $query = $this->db->get();
   $result = $query->result();
   return $result;
 

}
 
public function editinvoicedetails($data)
{
  
$dataq="select ji.Inv,ji.Date,ji.Total,ji.VatTotal,ji.GrandTotal,ji.InvoiceType,ji.ReceiptNo,ji.ReceiptDescription,ji.Amount,concat(jj.Hawb,'-',jj.Mawb) as awb,jj.Number,jj.ActualWeight,
jj.Etd,jj.Eta,jj.Type,jj.Mbl,jj.Carrier,jj.Pol,jj.Pod,jj.PoNo,bn.id,bn.bank_name,bn.id,concat(c.name,'|',c.address,'|',c.telephone,'-',c.mobile,'|',c.email) as clientenglish,c.vat_no,
concat(c.name_arabic,'|',c.address_arabic,'|',c.telephone,'-',c.mobile,'|',c.email) as clientearabic,
concat(consignor.name,',',consignor.address,',',consignor.telephone,'-',consignor.mobile,',',consignor.email) as consignor,
concat(consignee.name,',',consignee.address,',',consignee.telephone,'-',consignee.mobile,',',consignee.email) as consignee,
concat(bn.bank_name,',',bn.acc_number,',',bn.other_info,',',bn.iban) as bank
from jm_invoicemaster ji
inner join jm_job jj on ji.JobId=jj.JobId
inner join mst_client c on c.id=jj.client_id
inner join mst_shipper consignor on consignor.id=jj.consignor_id
inner join mst_shipper consignee on consignee.id=jj.consignee_id
inner join mst_bank bn  on bn.id=ji.Bank
 where ji.InvoiceMasterId=".$data.";";

 $query = $this->db->query($dataq);
    $result = $query->result();
        return $result;
     
 

}


public function updateJobinvoicemaster($Id,$data_array)
   {
   
      $this->db->where('jm_invoicemaster.InvoiceMasterId', $Id);
      $this->db->update('jm_invoicemaster', $data_array);
      
      return 1;
   
      

   }
   public function insertjobinvoicedetails($data_array)
   {
   
    
      $this->db->insert('jm_invoicedetail', $data_array);
      return 1;
   
   }
   public function deleteinvoicedetailsinsert($Id)
   {

      $this->db->where('InvoiceDetailId',$Id);
      $this->db->delete('jm_invoicedetail');
      return 1;
   
      

   }
   
   public function change_invoice_status($invoicemasteid)
   {
      $this->db->set('Status',"Posted" );
      $this->db->where('InvoiceMasterId', $invoicemasteid);
      $this->db->update('jm_invoicemaster');
      return 1;
   }
   public function select_currency()
   {
      $this->db->select('currency');
$this->db->from('mst_currency');
$query = $this->db->get();
$result = $query->result();
return $result;
   }
}