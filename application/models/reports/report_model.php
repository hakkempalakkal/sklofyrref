<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {


//list jobs
    public function listjobdata()
    {
    // $this->db->where('JobId',$id);
    $this->db->select('*');
    $this->db->from('jm_job');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
    
    }
    //list non billed jobs
public function nonbilledjob()
{
    $data="select jm_job.JobId,jm_job.Number ,jm_job.Date,jm_job.Shipper,jm_job.Consignee , jm_job.client_name,jm_job.shipment_type,jm_job.ShipmentTerms,jm_job.Type from jm_job
     inner join jm_expensemaster on jm_expensemaster.JobID=jm_job.JobId 
     where jm_expensemaster.Status!='Paid';";
       $query = $this->db->query($data);
       $result = $query->result();
       return $result;
}
 

}