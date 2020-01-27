<?php 
   // var_dump($code[0]);
   // die();
   ?>

<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-success">
                  <div class="box-header with-border">
                    <h3>TRIAL BALANCE</h3>
                  </div>
                  <div class="box-body"  style="min-height:auto;">
                    <form action="trial-balanceview" method="post">
                     <div class="row">
                        <div class="form-group col-md-3">
                           <label for="from">From</label>
                           <input type="text" class="form-control" required id="from" name="from" value="<?php echo date('yy/m/d');?>">
                        </div>
                       
                        <div class="form-group col-md-1">
                           <button type="SUBMIT" style="margin-top: 25px;" class="btn btn-success" id="find" name="find">Find</button>
                        </div>
                        <div class="form-group col-md-1">
                           <button type="button"  style="margin-top: 25px;" class="btn btn-success" id="print" name="print">Print</button>
                        </div>
                        <div class="col-md-12">
                          <hr>
                        </div>
                     </div>
                     </form>
                  </div>
                  <div class="box-body">
                  <div class="row">
                    <div class="col-md-7" >
                    <table class="table">
                      <thead style="background-color:#abc5b1; color:#fff;">
                          <tr>
                            <th style="width:500px">Ledger</th>
                            <th style="text-align:right;"> Debit Balance</th>
                            <th style="text-align:right;">Credit Balance</th>
                          <tr>
                      </thead>
                      <tbody>
                        <?php 
                        
                     $credittotal=0;
                     $debittotal=0;
                         foreach ($Trialbalance as $key => $values){
                           $credittotal=$credittotal+( (float)$values->Credit);
                       $debittotal=$debittotal+( (float)$values->DebitAccount);
                        ?>
                          <tr>
                            <td><?php echo $values->Ledger_Name; ?></td>
                            <td style="text-align:right;"><?php echo number_format((float)$values->DebitAccount, 2, '.', ''); ?></td>
                            <td style="text-align:right;"><?php echo number_format((float)$values->Credit, 2, '.', ''); ?></td>
                          </tr>
                        <?php } ?>
                        <tr style="background-color:#f5f5f5; font-weight:500;">
                            <td>Total</td>
                            <td style="text-align:right;"><?php echo number_format((float)$debittotal, 2, '.', ''); ?></td>
                            <td style="text-align:right;"><?php echo number_format((float)$credittotal, 2, '.', ''); ?></td>
                          </tr>
                      </tbody>
                    </table>
                    </div>
                  </div>
             
         </div>
      </div>
   </div>
</section>