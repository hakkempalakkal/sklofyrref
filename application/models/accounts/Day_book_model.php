<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Day_book_model extends CI_Model {

 

public function day_book_details()
{
   
   $sql="select * from  (
    select Accounts_AccountMaster.TransferDate, Accounts_Ledger.Ledger_Name  AS PARTICULARLS,
    Accounts_AccountMaster.Amount,'0.00' as CreditAmount,
    Accounts_AccountMaster.VoucherType ,Accounts_Ledger.LedgerID ,Accounts_AccountMaster.Narration
     from Accounts_AccountMaster
    
    join Accounts_Ledger on Accounts_AccountMaster.DebitAccount=Accounts_Ledger.LedgerID 
    where TransferDate between '2020-01-01' and '2020-01-10' 
    union all 
    
    select Accounts_AccountMaster.TransferDate, Accounts_Ledger.Ledger_Name AS PARTICULARLS,'0.00',Accounts_AccountMaster.Amount as CreditAmount,
    Accounts_AccountMaster.VoucherType ,Accounts_Ledger.LedgerID ,Accounts_AccountMaster.Narration
    from Accounts_AccountMaster
    join Accounts_Ledger on 
    Accounts_AccountMaster.CreditAccount=Accounts_Ledger.LedgerID 
    -- or Accounts_AccountMaster.DebitAccount=Accounts_Ledger.LedgerID
    where TransferDate between '2020-01-01' and '2020-01-10' )aa
    ORDER BY TransferDate";
  $query = $this->db->query($sql);

//$query = $this->db->get();
   $result = $query->result();
       return $result;
    

    
  
}

public function find_day_book($from,$to)
{
   
   $sql="select * from  (
    select Accounts_AccountMaster.TransferDate, Accounts_Ledger.Ledger_Name  AS PARTICULARLS,
    Accounts_AccountMaster.Amount,'0.00' as CreditAmount,
    Accounts_AccountMaster.VoucherType ,Accounts_Ledger.LedgerID ,Accounts_AccountMaster.Narration
     from Accounts_AccountMaster
    
    join Accounts_Ledger on Accounts_AccountMaster.DebitAccount=Accounts_Ledger.LedgerID 
    where TransferDate between $from and $to 
    union all 
    
    select Accounts_AccountMaster.TransferDate, Accounts_Ledger.Ledger_Name AS PARTICULARLS,'0.00',Accounts_AccountMaster.Amount as CreditAmount,
    Accounts_AccountMaster.VoucherType ,Accounts_Ledger.LedgerID ,Accounts_AccountMaster.Narration
    from Accounts_AccountMaster
    join Accounts_Ledger on 
    Accounts_AccountMaster.CreditAccount=Accounts_Ledger.LedgerID 
    -- or Accounts_AccountMaster.DebitAccount=Accounts_Ledger.LedgerID
    where TransferDate between $from and $to  )aa
    ORDER BY TransferDate";
  $query = $this->db->query($sql);

//$query = $this->db->get();
   $result = $query->result();
       return $result;
    

    
  
}


}