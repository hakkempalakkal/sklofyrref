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
//autocomplete carrier

// public function getcarrier($data)
// {
//   $this->db->where('name', $data);   
// $this->db->select('*');
// $this->db->from('mst_carrier');
// $query = $this->db->get();
// $result = $query->result();
// return $result;

// }

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
}