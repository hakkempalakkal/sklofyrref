<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model {

public function list()
{
// $this->db->where('JobId',$id);
$this->db->select('*');
$this->db->from('jm_job');
$query = $this->db->get();
$result = $query->result();
return $result;

}

public function getjobById($id)
{
$this->db->where('JobId',$id);
$this->db->select('*');
$this->db->from('jm_job');
$query = $this->db->get();
$result = $query->result();
return $result;

}


// auto code 
public function selectcode()
{

$this->db->select_max('Number');
$this->db->from('jm_job');
$query = $this->db->get();
$result = $query->result();
if($result==NULL)
{
  $result=1;
}
return $result;

}
public function add($data)
{    
        $this->db->insert('jm_job',$data);
      //  return "success";
        $id = $this->db->insert_id();
        // var_dump($id);
        // die();
      
      return $id;
}

public function list_client()
{

$this->db->select('*');
$this->db->from('mst_client');
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
public function list_carrier()
{
  $this->db->select('*');
$this->db->from('mst_carrier');
$query = $this->db->get();
$result = $query->result();
return $result;
}
public function list_user()
{

  $this->db->select('*');
$this->db->from('mst_users');
$query = $this->db->get();
$result = $query->result();
return $result;
}
//autocomplete text
public function getshippers()
{
      
$this->db->select('id as value, name as label');
$this->db->from('mst_shipper');
$query = $this->db->get();
$result = $query->result();
return $result;

}
public function update($id,$data)
{

    $this->db->where('JobId',$id);
        $this->db->update('jm_job',$data);
        
        return "success";
    
} 
public function list_description($data)
{
    
 
    $this->db->where('code', $data);
$this->db->select('id,description');
$this->db->from('mst_description');
$query = $this->db->get();
$result = $query->result();
return $result;

}
//get job details
public function job_desc($data)
{
  $this->db->where('JobId',$data);
$this->db->select('*');
$this->db->from('jm_job');
$query = $this->db->get();
$result = $query->result();
return $result;
}

public function selectcode_estimate()
{

$this->db->select_max('estimate_no');
$this->db->from('jm_estimate_master');
$query = $this->db->get();
$result = $query->result();
if($result==NULL)
{
  $result=1;
}
return $result;

}
//add estimate details
public function add_estimate($data)
{
  $this->db->insert('jm_estimate_master',$data);
        $invoice_id = $this->db->insert_id();
        return $invoice_id;
}
public function add_estimatedetails($data)
{ 
    $this->db->insert('jm_estimate_master_details', $data);
    $invoice_details_id=$this->db->insert_id();
    return $invoice_details_id;

}

public function listjobdetails()
{
// $this->db->where('JobId',$id);
$this->db->select('*');
$this->db->from('jm_job');
$query = $this->db->get();
$result = $query->result();
return $result;

}
public function jobclosed_status($id)
{
     
  $this->db->where('JobId', $id);
  $this->db->set('Status','CLOSED');
  if($this->db->update('jm_job'))
  {
    return 1;
  }else{
    return 0;
  }
}

public function job_estimate_details($data)
{
   $this->db->where('jm_estimate_master_details.estimate_masterid', $data);
   $this->db->select('*');    
   $this->db->from('jm_estimate_master_details');
   $query = $this->db->get();
   $result = $query->result();
   return $result;
 

}
public function editestimateedetails($data)
{
  
$dataq="select ji.estimate_masterid,ji.estimate_no,ji.e_date,ji.total_amount,ji.tax_amount,ji.grand_total,concat(jj.Hawb,'-',jj.Mawb) as awb,jj.JobId,jj.Number,jj.ActualWeight,
jj.Etd,jj.Eta,jj.Type,jj.Mbl,jj.Carrier,jj.Pol,jj.Pod,jj.ShipmentTerms,jj.CargoDescription,jj.PoNo,concat(c.name,'|',c.address,'|',c.telephone,'-',c.mobile,'|',c.email) as clientenglish,
concat(c.name_arabic,'|',c.address_arabic,'|',c.telephone,'-',c.mobile,'|',c.email) as clientearabic,
concat(consignor.name,',',consignor.address,',',consignor.telephone,'-',consignor.mobile,',',consignor.email) as consignor,
concat(consignee.name,',',consignee.address,',',consignee.telephone,'-',consignee.mobile,',',consignee.email) as consignee
from jm_estimate_master ji
inner join jm_job jj on ji.job_id=jj.JobId
inner join mst_client c on c.id=jj.client_id
inner join mst_shipper consignor on consignor.id=jj.consignor_id
inner join mst_shipper consignee on consignee.id=jj.consignee_id
 where ji.job_id=".$data.";";

 $query = $this->db->query($dataq);
    $result = $query->result();
        return $result;
     
 

}
public function update_estimatemaster($Id,$data_array)
{
   $this->db->where('jm_estimate_master.estimate_masterid', $Id);
   $this->db->update('jm_estimate_master', $data_array);
   
   return 1;

}
public function insert_estimatedetails($data_array)
{

   $this->db->insert('jm_estimate_master_details', $data_array);
   return 1;

}
public function delete_estimatedetails($Id)
{
  
   $this->db->where('estimate_details_id',$Id);
   $this->db->delete('jm_estimate_master_details');
   return 1;

}

}