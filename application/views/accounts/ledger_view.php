<?php 

// var_dump($code[0]);
// die();
?>

 <section class="content">
    <div class="box box-success">
       <div class="box-body">
          <form role="form">                                                                                                                                                                                      
                  <div class="box-body"  style="min-height:auto;">
                             
                  <div class="row">  
                  <div class="form-group col-md-2">
                      <label for="exampleInputname1">From</label>
                <input type="text" id="from"  name="from" class="form-control" value="<?php echo date('m/d/yy');?>">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="exampleInputname1">To</label>
                <input type="text" id="to"  name="to" class="form-control" value="<?php echo date('m/d/yy');?>">
                    </div>    
                  <div class="form-group col-md-2 ">
                      <label>Ledger</label>
                      <select class="form-control" required name="ledger" id="ledger" value="">
                      <option value="" selected="selected" diabled="disabled">----Select----</option>
                        <option value="cash">cash</option>
                        <option value="AOT-credit-account">AOT-credit-account</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                  
                  <button type="button" style="margin-top: 25px;" class="btn btn-success" id="find" name="find">Find</button>
                  </div>
                  <div class="form-group col-md-2">
                  <button type="button"  style="margin-top: 25px;" class="btn btn-success" id="print" name="print">Print</button>

                 
                 </div>
                                
                         
</div>
                </form>
                </div>
                <div class="box-body">
                     <table class="table">
                      <thead style="background-color:#abc5b1; color:#fff;">
                          <tr>
                            <th style="width:200px">Date</th>
                            <th style="width:500px">Purticular</th>
                             <th style="width:500px">Voucher Type</th>
                            <th style="text-align:right;"> Debit Balance</th>
                            <th style="text-align:right;">Credit Balance</th>
                          <tr>
                      </thead>
                      <tbody>
                        <?php 
                       
                       if($data!=""){  ?>
                           
                      <tr style="background-color:#f5f5f5; font-weight:500;">
                            <td colspan="3">Opening Balance</td>
                            <td style="text-align:right;"><?php echo number_format((float)$summery[0]->opDebitAccount, 2, '.', ''); ?></td>
                            <td style="text-align:right;"><?php echo number_format((float)$summery[0]->opCreditAccount, 2, '.', ''); ?></td>
                          </tr>
                       <?php      
                     $credittotal=0;
                     $debittotal=0;
                         foreach ($ledgerview as $key => $values){
                           $credittotal=$credittotal+( (float)$values->Credit);
                       $debittotal=$debittotal+( (float)$values->Debit);
                        ?>
                          <tr>
                               <td><?php echo $values->TransDate; ?></td>
                            <td><?php echo $values->Purticular; ?></td>
                             <td><?php echo $values->VoucherType; ?></td>
                            <td style="text-align:right;"><?php echo number_format((float)$values->Debit, 2, '.', ''); ?></td>
                            <td style="text-align:right;"><?php echo number_format((float)$values->Credit, 2, '.', ''); ?></td>
                          </tr>
                       <?php } ?>
                        <tr style="background-color:#f5f5f5; font-weight:500;">
                            <td colspan="3">Total</td>
                            <td style="text-align:right;"><?php echo number_format((float)$debittotal, 2, '.', ''); ?></td>
                            <td style="text-align:right;"><?php echo number_format((float)$credittotal, 2, '.', ''); ?></td>
                          </tr>
                           <tr style="background-color:#f5f5f5; font-weight:500;">
                            <td colspan="3">Closing Balance</td>
                            <td style="text-align:right;"><?php echo number_format((float)$summery[0]->cbDebitAccount, 2, '.', ''); ?></td>
                            <td style="text-align:right;"><?php echo number_format((float)$summery[0]->cbCreditAccount, 2, '.', ''); ?></td>
                          </tr>
                          <?php } ?>
                      </tbody>
                    </table>

                </div>
                </div>
                        </section>
          <script src="<?php echo base_url(); ?>/assets/js/moment.js"></script>
          <script src="<?php echo base_url(); ?>/assets/js/alert.js"></script>
          <!-- <script src="<?php echo base_url(); ?>/assets/user_scripts/masters/bank.js"></script> -->




  