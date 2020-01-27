<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model {

//insert client
public function add($data)
{
    $this->db->where('code', $data['code']);
    $query = $this->db->get('mst_client');
    $count_row = $query->num_rows();
    if ($count_row > 0) {
       return "data already exist";
    } else {
       
        $this->db->insert('mst_client',$data);
        $clientid=   $this->db->insert_id();
        return $clientid;
        
    

    }
}
//select client name
// public function client_name($clientid)
// {
//  $this->db->where('id', $clientid);
// $this->db->select('name');
// $this->db->from('mst_client');
// $query = $this->db->get();
// $clientname = $query->result();
// return $clientname;

// }

// public function addto_accountsledger($clientname)
// {
//   $query1="insert into accounts_ledger(LedgerGroupID,Ledger_Name) values(9,$clientname)";
//   $accountsid=   $this->db->insert_id();
//   return $accountsid;
// }
// public function addto_clientledger($clientid,$accountsid)
// {
//   $query2="insert into accounts_client_ledger(client_id,ledger_id) values($clientid,$accountsid)"; 
//   return 1;
// }


public function list()
{

$this->db->select('*');
$this->db->from('mst_client');
$query = $this->db->get();
$result = $query->result();
return $result;

}
public function selectcode()
{

  $this->db->select_max('code');
$this->db->from('mst_client');
$query = $this->db->get();
$result = $query->result();
if($result==NULL)
{
  $result=1;
}
return $result;

}
public function edit($id)
{
    $this->db->where('id', $id);
    $query = $this->db->get('mst_client');
    $result = $query->result();
return $result;
}
public function update($id,$data)
{

    $this->db->where('id',$id);
        $this->db->update('mst_client',$data);
        
        return "success";
    
} 

//change status
public function enable_status($id)
{
     
  
  $this->db->where('id', $id);
  $this->db->set('IsActive',1);
  if($this->db->update('mst_client'))
  {
    return 1;
  }else{
    return 0;
  }
}
public function disable_status($id)
{
     
  
  $this->db->where('id', $id);
  $this->db->set('IsActive',0);
  if($this->db->update('mst_client'))
  {
    return 1;
  }else{
    return 0;
  }
}
public function checkclientmodel($email)
{
  
   
    $query = $this->db->query("select email from mst_client where email='".$email."'");
    if($query->num_rows() > 0)
    {
     
      return 1;
    }else{
      return 0;
    }
}
}