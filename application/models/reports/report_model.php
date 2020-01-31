<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {


//list jobs
    public function listjobdata()
    {
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
 
//list invoice reports


public function get_invoice_reportdata($fromdate,$todate)
{
    $data="select jm_invoicemaster.Inv,jm_invoicemaster.Date,jm_invoicemaster.JobId,jm_invoicemaster.InvoiceType,jm_invoicemaster.Status,jm_invoicemaster.Total,jm_invoicemaster.VatTotal,jm_invoicemaster.GrandTotal,
    mst_client.name  from jm_invoicemaster inner join jm_job on jm_invoicemaster.JobId=jm_job.JobId 
            inner join mst_client on mst_client.id=jm_job.client_id  where jm_invoicemaster.Date BETWEEN CAST('".$fromdate."' AS DATE) AND CAST('".$todate."' AS DATE)";
      $query = $this->db->query($data);
      $result = $query->result();
      return $result;

}
public function get_invoice_reportdata_withid($id,$fromdate,$todate)
{
    $data="select jm_invoicemaster.Inv,jm_invoicemaster.Date,jm_invoicemaster.JobId,jm_invoicemaster.InvoiceType,jm_invoicemaster.Status,jm_invoicemaster.Total,jm_invoicemaster.VatTotal,jm_invoicemaster.GrandTotal,
    mst_client.name  from jm_invoicemaster inner join jm_job on jm_invoicemaster.JobId=jm_job.JobId 
            inner join mst_client on mst_client.id=jm_job.client_id  where jm_job.client_id=".$id." and jm_invoicemaster.Date BETWEEN CAST('".$fromdate."' AS DATE) AND CAST('".$todate."' AS DATE)";
      $query = $this->db->query($data);
      $result = $query->result();
      return $result;

}
public function pending_invoice_data($from,$to)
{
    $data="select jm_invoicemaster.Inv,jm_invoicemaster.Date,jm_invoicemaster.JobId,jm_invoicemaster.InvoiceType,jm_invoicemaster.Status,jm_invoicemaster.Total,jm_invoicemaster.VatTotal,jm_invoicemaster.GrandTotal,
    mst_client.name  from jm_invoicemaster inner join jm_job on jm_invoicemaster.JobId=jm_job.JobId 
            inner join mst_client on mst_client.id=jm_job.client_id  where jm_invoicemaster.Status!='Paid' and jm_invoicemaster.Date BETWEEN CAST('".$from."' AS DATE) AND CAST('".$to."' AS DATE)";
      $query = $this->db->query($data);
      $result = $query->result();
      return $result;

}
public function pending_invoice_data_withid($id,$from,$to)
{
    $data="select jm_invoicemaster.Inv,jm_invoicemaster.Date,jm_invoicemaster.JobId,jm_invoicemaster.InvoiceType,jm_invoicemaster.Status,jm_invoicemaster.Total,jm_invoicemaster.VatTotal,jm_invoicemaster.GrandTotal,
    mst_client.name  from jm_invoicemaster inner join jm_job on jm_invoicemaster.JobId=jm_job.JobId 
            inner join mst_client on mst_client.id=jm_job.client_id  where jm_invoicemaster.Status!='Paid' and jm_job.client_id=".$id." and jm_invoicemaster.Date BETWEEN CAST('".$from."' AS DATE) AND CAST('".$to."' AS DATE)";
      $query = $this->db->query($data);
      $result = $query->result();
      return $result;

}
public function select_suppliers()
{
    $this->db->select('*');
$this->db->from('mst_supplier');
$query = $this->db->get();
$result = $query->result();
return $result;
}
public function select_clients()
{
    $this->db->select('*');
$this->db->from('mst_client');
$query = $this->db->get();
$result = $query->result();
return $result;
}

public function get_billed_reportdata($from,$to)
{
    $data="select DISTINCT jm_expensedetail.Description,jm_expensedetail.Amount,jm_expensedetail.Currency,jm_expensemaster.PostId,jm_expensemaster.PostingDate,concat(jm_expensemaster.OurInv,'|',jm_expensemaster.Reference) as inv,jm_expensemaster.JobID,jm_expensemaster.SupplierID,mst_supplier.supplier_name,jm_expensemaster.Mode,jm_expensemaster.Status,jm_expensemaster.GrandTotal
    from jm_expensemaster  inner join mst_supplier on mst_supplier.id=jm_expensemaster.SupplierID 
    inner join jm_expensedetail on jm_expensedetail.ExpenseMasterId=jm_expensemaster.ExpenseMasterId
   where jm_expensemaster.PostingDate BETWEEN CAST('".$from."' AS DATE) AND CAST('".$to."' AS DATE)";
      $query = $this->db->query($data);
      $result = $query->result();
      return $result;

}

public function get_billed_reportdata_withid($id,$from,$to)
{
    $data="select DISTINCT jm_expensedetail.Description,jm_expensedetail.Amount,jm_expensedetail.Currency, jm_expensemaster.PostId,jm_expensemaster.PostingDate,concat(jm_expensemaster.OurInv,'|',jm_expensemaster.Reference) as inv,jm_expensemaster.JobID,jm_expensemaster.SupplierID,mst_supplier.supplier_name,jm_expensemaster.Mode,jm_expensemaster.Status,jm_expensemaster.GrandTotal
    from jm_expensemaster
        inner join mst_supplier on mst_supplier.id=jm_expensemaster.SupplierID 
          inner join jm_expensedetail on jm_expensedetail.ExpenseMasterId=jm_expensemaster.ExpenseMasterId
                where jm_expensemaster.SupplierID=".$id." and  jm_expensemaster.PostingDate BETWEEN CAST('".$from."' AS DATE) AND CAST('".$to."' AS DATE)";
      $query = $this->db->query($data);
      $result = $query->result();
      return $result;

}
public function get_pendiding_bille_reportdata($from,$to)
{
    $data="select jm_expensemaster.PostId,jm_expensemaster.PostingDate,jm_expensemaster.Reference,jm_expensemaster.OurInv,jm_expensemaster.JobID,jm_expensemaster.SupplierID,mst_supplier.supplier_name,jm_expensemaster.Mode,jm_expensemaster.Status,jm_expensemaster.GrandTotal
    from jm_expensemaster  inner join mst_supplier on mst_supplier.id=jm_expensemaster.SupplierID 
   where jm_expensemaster.Status!='Paid' and jm_expensemaster.PostingDate BETWEEN  CAST('".$from."' AS DATE) AND CAST('".$to."' AS DATE)";
      $query = $this->db->query($data);
      $result = $query->result();
      return $result;
}
public function get_pending_bille_reportdata_withid($id,$from,$to)
{
    $data="select jm_expensemaster.PostId,jm_expensemaster.PostingDate,jm_expensemaster.Reference,jm_expensemaster.OurInv,jm_expensemaster.JobID,jm_expensemaster.SupplierID,mst_supplier.supplier_name,jm_expensemaster.Mode,jm_expensemaster.Status,jm_expensemaster.GrandTotal
    from jm_expensemaster
        inner join mst_supplier on mst_supplier.id=jm_expensemaster.SupplierID 
       
                where jm_expensemaster.Status!='Paid' jm_expensemaster.SupplierID=".$id." and  jm_expensemaster.PostingDate BETWEEN CAST('".$from."' AS DATE) AND CAST('".$to."' AS DATE)";
      $query = $this->db->query($data);
      $result = $query->result();
      return $result;

}
}


