<?php 
   // var_dump($jobdata);
   // var_dump ($Inv);
   // die();
   $month = date('m');
   $day = date('d');
   $year = date('Y');
   
   $today = $year . '-' . $month . '-' . $day;
   ?>
<script src="<?php echo base_url(); ?>/assets/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<section class="content">
<div class="row">
   <div class="col-md-12 ">
      <div class="panel panel-primary " >
         <div class="panel-heading">
            <h3 class="panel-title">Invoice</h3>
         </div>
         <div class="panel-body">
            <section class="content">
            <div class="col-md-10">
               <h4 class="box-title">Job Invoice</h4>
               <div class="box box-primary">
                  <div class="box-header with-border">
                     <div class="box-body">
                        <div class="row">
                           <div class="form-group col-md-1">
                              <label class="control-label">Inv*</label>
                              <input   type="text" id="inv_code" required="required" class="form-control" readonly="readonly"  placeholder="<?php echo $Inv[0]->Inv+1;?>"  value="<?php echo $Inv[0]->Inv+1;?>"/>

                           </div>
                           <div class="form-group col-md-3">
                              <label class="control-label">Date</label>
                              <input type="date" value="<?php echo $today; ?>" class="form-control" required id="date" name="date" ></input>
                              <input maxlength="100" type="hidden" id="job_id"  class="form-control"  value="<?php echo $jobdata[0]->JobId;?>"/>

                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-1">
                              <label class="control-label"></label>
                              <input maxlength="100"  onchange="getdata();" type="text" id="desc_code" name="desc_code" required="required" class="form-control" placeholder=" code" />
                           </div>
                           <div class="form-group col-md-2">
                              <label class="control-label">Description</label>
                              <input maxlength="100" type="text" id="description_job" required="required" class="form-control" placeholder=" Description" value=""/>
                           </div>
                           <div class="row">
                              <div class="form-group col-md-2">
                                 <label class="control-label">Unit Price</label>
                                 <input maxlength="100" type="text" id="unitprice" required="required" class="form-control " placeholder=" unit price" />
                              </div>
                              <div class="form-group col-md-2">
                                 <label class="control-label"></label>
                                 <select class="form-control" id="unit_price" name="unit_price"  value="--Select Type--">
                                    <option value="bank">--Select Type--</option>
                                    <option value="INR">INR</option>
                                    <option value="EUR">EUR</option>
                                    <option value="USD">USD</option>
                                    <option value="AED">AED</option>6
                                  <?php 
                                  foreach($currency as $key=>$value)
                                  {
?>
                                 <option value="<?php echo $value->currency;?>"><?php echo $value->currency;?></option>
                                  <?php } ?>
                                 </select>
                                 </select>
                              </div>
                              <div class="form-group col-md-1">
                                 <label class="control-label">Conv.Factor</label>
                                 <input maxlength="100" type="text" id="conv_factor"  required="required" class="form-control " value="1" />
                              </div>
                              <div class="form-group col-md-1">
                                 <label class="control-label">Quantity</label>
                                 <input maxlength="100" type="text" id="quantity" required="required" class="form-control " value=" 1" />
                              </div>
                              <div class="form-group col-md-1">
                                 <label class="control-label">VAT</label>
                                 <input maxlength="100" type="text" id="vat" required="required" class="form-control" value=" 0" />
                              </div>
                           </div>
                           <input type="button" name="add" value="ADD" onclick="insert_job_invoice();" id="add" class="btn btn-success" style="float: right;">
                        </div>
                        <!-- /.panel body -->
                        <div class="col-md-12">
                           <div>
                              <!-- /.box-header -->
                              <div class="">
                                 <div id="ContentPlaceHolder1_upDataList">
                                    <table id="datatable" class="table table-striped table-bordered">
                                       <thead>
                                          <tr>
                                             <th>Description</th>
                                             <th>UnitPrice</th>
                                             <th>Quantity</th>
                                             <th>SubTotal</th>
                                             <th>VAT</th>
                                             <th>TOTAL</th>
                                             <th></th>
                                          </tr>
                                       </thead>
                                       <tbody class="dataadd"> 
                                       </tbody>
                                       <tfoot>
                                       </tfoot>
                                    </table>
                                 </div>
                                 <div id="ContentPlaceHolder1_upTotals">
                                    <div style="float: right;">
                                       <span id="ContentPlaceHolder1_lbl">TOTAL</span>        
                                       <input name="total" type="text" value="0" readonly="readonly" id="total" class="form-control " style="width: 100%;">
                                       <span id="ContentPlaceHolder1_Label1">Vat Total</span>        
                                       <input name="vat_total" type="text" value="0" readonly="readonly" id="vat_total" class="form-control " style="width: 100%;"> 
                                       <span id="ContentPlaceHolder1_Label2">Grand Total</span>        
                                       <input name="grand_total" type="text" value="0" readonly="readonly" id="grand_total" class="form-control " style="width: 100%;">                 
                                    </div>
                                 </div>
                                 <!-- /.box-body -->
                              </div>
                              <!-- /.box -->
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12 ">
                        <br><br>
                        <div class="row">
                           <div class="form-group col-md-4">
                              <label class="control-label">BANK*</label>
                              <select class="form-control" id="bank" name="bank"  value="">
                              <option value="bank">--Select Bank--</option>

                               <?php
                                    foreach($bank as $key=>$value)
                                    {
                                        ?>
                                 <option value="<?php echo $value->id;?>"><?php echo $value->bank_name;?></option>
                                 <?php
                                    }
                                    ?>
                              </select>
                           </div>
                           <div class="form-group col-md-4">
                              <label class="control-label">Invoice Type:</label>
                              <select class="form-control" id="type" name="type"  onchange="visible_cash();"  value="">
                                 <option value="credit">Credit</option>
                                 <option value="cash">Cash</option>
                              </select>
                           </div>
                           <div class="form-group col-md-4" id="receipt">
                              <label class="control-label">   Receipt No(Only for Cash):</label>
                              <input maxlength="100" type="text" id="receipt_no"  class="form-control " placeholder="Receipt No" />
                           </div>
                           <div class="form-group col-md-4" id="description">
                              <label class="control-label"></label>
                              <input maxlength="100" type="text" id="adv_desc"  class="form-control " placeholder="Advance Description" />
                           </div>
                           <div class="form-group col-md-4" id="amnt">
                              <label class="control-label"></label>
                              <input maxlength="100" type="text" id="amount"  class="form-control " placeholder="Amount" />
                           </div>
                           <div class="form-group col-md-2">
                              <input type="button" name="submit" onclick="insert_job_details();" style=" margin-top:20px;" value="Submit" id="submit" class="btn btn-success"  >
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               </div>
               <div class="col-md-2">
                  <h4 class="box-title">Job Description </h4>
                  <div class="box box-primary">
                     <div class="box-header with-border">  
                     </div>
                     <div class="box-body">
                        <strong><i class=""></i> Job</strong>
                        <p class="text-muted">
                           <?php echo $jobdata[0]->JobId;?>
                        </p>
                        <hr>
                        <strong><i class=""></i> Shipper</strong>
                        <p class="text-muted">    <?php echo $jobdata[0]->Shipper;?></p>
                        <hr>
                        <strong><i class=""></i> Consignee</strong>
                        <p class="text-muted">    <?php echo $jobdata[0]->Consignee;?> </p>
                        <hr>
                        <strong><i class=""></i> Client </strong>
                        <p> <?php echo $jobdata[0]->client_name;?></p>
                        <hr>
                        <strong><i class=""></i>Mode</strong>
                        <p> <?php echo $jobdata[0]->Type;?> </p>
                        <hr>
                        <strong><i class=""></i>Weight</strong>
                        <p> <?php echo $jobdata[0]->ActualWeight;?> </p>
                        <hr>
                        <strong><i class=""></i>ETA</strong>
                        <p> <?php echo $jobdata[0]->Eta;?> </p>
                        <hr>
                        <strong><i class=""></i>ETD</strong>
                        <p><?php echo $jobdata[0]->Etd;?></p>
                        <hr>
                        <strong><i class=""></i>MBL/MAWB</strong>
                        <p><?php echo $jobdata[0]->Mbl;?> </p>
                        <hr>
                        <strong><i class=""></i>CARRIER</strong>
                        <p><?php echo $jobdata[0]->Carrier;?> </p>
                        <hr>
                        <strong><i class=""></i>POL</strong>
                        <p><?php echo $jobdata[0]->Pol;?></p>
                        <hr>
                        <strong><i class=""></i>POD</strong>
                        <p><?php echo $jobdata[0]->Pod;?></p>
                        <hr>
                        <strong><i class=""></i>PO NO</strong>
                        <p><?php echo $jobdata[0]->PoNo;?></p>
                     </div>
                  </div>
               </div>
               <button class="btn btn-primary nextBtn pull-right" style=" margin-top:20px;" type="button">Next</button>
            </div>
         </div>
      </div>
   </div>
   </div>
   </section>
<script src="<?php echo base_url(); ?>/assets/user_scripts/transaction/job_invoice.js"></script>
<!-- <script type="text/javascript"> -->