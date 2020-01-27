<section class="content">
<input type="hidden" value="<?php echo base_url(); ?>" id="baseurl"/>
      <div class="row">
        <div class="col-md-3">
 <!-- search form -->
           <!-- <form action="#" method="get"> -->
            <div class="input-group">
              <input type="text" name="q" id="q" class="form-control" placeholder="Search..."/>
               <span class="input-group-btn">
                <button type="submit" name="search_job" id="search_job" onclick="search_job()" class="btn btn-flat" ><i class="fa fa-search" ></i></button>
              </span>
            </div>
          <!-- </form>  -->
          <!-- /.search form -->
          <!-- Profile Image -->
          <h4 class="box-title" id="title">Job Description </h4>
          <div class="box " id="description">
            <div class="box-body box-profile">
            <div class="box-body" >
               <div class="job"></div>
               <!-- <input type="hidden" id="client_id"> -->
                        <strong><i class=""></i> Job</strong>
                        <p  id="job_id">
                           <!-- <?php echo $jobdata[0]->JobId;?> -->
                        </p>
                        <hr>
                        <input type="hidden" name="client_id" id="client_id" class="form-control" />

                        <strong><i class=""></i> Shipper</strong>
                        <p class="text-muted" id="shipper">   
                             <!-- <?php echo $jobdata[0]->Shipper;?> -->
                    </p>
                        <hr>
                        <strong><i class=""></i> Consignee</strong>
                        <p class="text-muted" id="consignee">  
                              <!-- <?php echo $jobdata[0]->Consignee;?>  -->
                            </p>
                        <hr>
                        <strong><i class=""></i> Client Company </strong>
                        <p class="text-muted" id="client">  
                            <!-- <?php echo $jobdata[0]->client_name;?> -->
                        </p>
                        <hr>
                        <strong><i class=""></i>Shipment Terms</strong>
                        <p class="text-muted" id="terms">  
                             <!-- <?php echo $jobdata[0]->Type;?> -->
                             </p>
                        
                                 <hr>
                        <strong><i class=""></i>Consignment Description</strong>
                        <p class="text-muted" id="description">  
                            <!-- <?php echo $jobdata[0]->PoNo;?> -->
                        </p>
                     </div>

             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <br><br><br><br>
        <div class="col-md-9">
            
          <div class="nav-tabs-custom">
          <div class="row">
               <div class="col-sm-3 col-xs-6 ">
                  <div class="description-block border-right ">
                  <span class="description-text ">TOTAL INVOICE</span>
                   <h5 class=" description-header" id="invtotal" style="color:green;">0.00</h5>

                  </div>
                  <!-- /.description-block -->
                </div>
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                  <span class="description-text">TOTAL EXPENCE</span>
                    <h5 class="description-header" id="expensetotal" style="color:green;">0.00</h5>
                    
                  </div>
                  <!-- /.description-block -->
                </div>
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                  <span class="description-text">INVOICE PAID </span>
                    <h5 class="description-header" id="invpaid" style="color:green;">0.00</h5>
                  </div>
                  <!-- /.description-block -->
                </div>
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                  <span class="description-text">AMOUNT DUE </span>
                    <h5 class="description-header" style="color:red;" id="amountdue">0.00</h5>
                  </div>
                  <!-- /.description-block -->
                </div>
               </div>
               <br>
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="false">Job Ledger</a></li>
              <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">Invoice</a></li>
              <li class=""><a href="#settings" data-toggle="tab" aria-expanded="true">Supplier Expense</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="activity">
              <section class="content">
              <div class="row">
      <div class="col-md-12">
      <h3 class="box-title"> Job Ledger Report </h3>
      <div class="box">
         
         
            
            <div class="box-body">
               <table class="table table-stripped">
                  <thead>
                     <tr>
                        <th> Sl.no</th>
                        <th> Date</th>
                        <th> Transaction Type</th>
                        <th> Description</th>
                        <th> Credit</th>
                        <th> Debit</th>
                       
                     </tr>
                  </thead>
                 
                  <tbody class="ledger">
                     
                    
                  </tbody>
               </table>
                         </div>
      </div>
      </div>
                         </div>
                         </section>
               
               
              </div>
           
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <section class="content">
   <div class="row">
      <div class="col-md-12">
      <h3 class="box-title"> Generated Invoices </h3>
         <div class="box ">
           <div class="box-header with-border">
         <input type="submit" onclick="createnewinvoice();" style="float: right; width:150px;" class="btn btn-block btn-success" value="Create new invoice">
           <!-- <span class="new-button" style="float: right;" onclick="createnewinvoice();"><a href=" " class="btn btn-success btn-sm" ><span class="fa fa-plus"></span> &nbsp;Create Invoice </a></span> -->
           </div>
           
            <div class="box-body">
    
               <table id="invoicereport" class="table table-stripped">
                  <thead>
                     <tr>
                        <th> Sl.no</th>
                        <th> Invoice.no</th>
                        <th> Date</th>
                        <!-- <th> Particulars</th> -->
                        <th> Mode</th>
                        <th> SubTotal</th>
                        <th>  Vat</th>
                        <th style='text-align: right;'>  Grand Total</th>
                        <th >  Action</th>
                     </tr>
                  </thead>
                  <tbody class="dataadd">
                     
                  </tbody>
                  </table>
            </div>
         </div>
      </div>
   </div>
</section> 
<br><br>
<section class="content">
   <div class="row">
      <div class="col-md-12">
      <h3 class="box-title"> Credit Note </h3>
         <div class="box ">
           <div class="box-header with-border">
           <input type="submit" onclick="createcreditnote();" style="float: right; width:150px;" class="btn btn-block btn-success" value="Create Creditnote">

           <!-- <span class="new-button" style="float: right;"><a href="<?php echo base_url(); ?> " class="btn btn-success btn-sm" ><span class="fa fa-plus"></span> &nbsp;Create Creditnote </a></span> -->
           </div>
           
            <div class="box-body">
    
               <table id="invoicereport" class="table table-stripped">
                  <thead>
                     <tr>
                        <th> Sl.no</th>
                        <th> CRN.no</th>
                        <th> Date</th>
                        <th> Customer</th>
                      
                        <th  style='text-align: right;'> Amount</th>
                        
                     </tr>
                  </thead>
                  <tbody class="creditdata">
                
                  </tbody>
                 

               </table>
            </div>
         </div>
      </div>
   </div>
</section> 
<br><br>
<section class="content">
   <div class="row">
      <div class="col-md-12">
      <h3 class="box-title">Customer Payment Receipt </h3>
         <div class="box ">
           <div class="box-header with-border">
          
           </div>
           
            <div class="box-body">
    
               <table id="invoicereport" class="table table-stripped">
                  <thead>
                     <tr>
                        <th> Sl.no</th>
                       
                        <th>Receipt Date</th>
                        <th> Doc.#</th>
                        <th> Particulars</th>
                        <th> Ref/Invoice</th>
                        <th style='text-align: right;'> Amount</th>
                     </tr>
                  </thead>
                  <tbody class="paymentreceipt">
                  
                  </tbody>

               </table>
            </div>
         </div>
      </div>
   </div>
</section> 
              </div>
            

              <div class="tab-pane " id="settings">
              <section class="content">
   <div class="row">
      <div class="col-md-12">
      <h3 class="box-title"> Posted Expences </h3>
         <div class="box ">
           <div class="box-header with-border">
          
           <input type="submit" onclick="createexpense();" style="float: right; width:150px;" class="btn btn-block btn-success" value="Create new expense">
           </div>
           
            <div class="box-body">
    
               <table id="invoicereport" class="table table-stripped">
                  <thead>
                     <tr>
                        <th> Sl.no</th>
                        <th> Inv Date</th>
                        <th> Doc.#</th>
                        <th> Particulars</th>
                        <th> Ref/Inv</th>
                        <th> Supplier</th>
                      
                        <th style='text-align: right;'>  Amount#</th>
                        <th>  Action</th>


                     </tr>
                  </thead>
                  <tbody class="postedexpense">
                   
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section> 
<br><br>
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box ">
           <div class="box-header with-border">
           <h3 class="box-title"> Debit Note </h3>
           <input type="submit" onclick="createdebitnote();" style="float: right; width:150px;" class="btn btn-block btn-success" value="Create Debitnote">
           </div>
           
            <div class="box-body">
    
               <table id="invoicereport" class="table table-stripped">
                  <thead>
                     <tr>
                     <th> Sl.no</th>
                        <th> Inv Date</th>
                        <th> Doc.#</th>
                       
                        <th> Ref/Inv</th>
                        <th> Supplier</th>
                      
                        <th style='text-align: right;'>  Amount#</th>

                        
                     </tr>
                  </thead>
                  <tbody class="debitnote">
                    
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section> 
<br><br>
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box">
           <div class="box-header with-border">
           <h3 class="box-title">Supplier Payment  </h3>
           </div>
           
            <div class="box-body">
    
               <table id="invoicereport" class="table table-stripped">
                  <thead>
                     <tr>
                        <th> Sl.no</th>
                       
                        <th>Payment Date</th>
                        <th> Doc.#</th>
                        <!-- <th> Particulars</th>
                        <th> Ref/Invoice</th> -->
                        <th> Supplier</th>
                      
                      <th style='text-align: right;'>  Amount#</th>
                     </tr>
                  </thead>
                  <tbody class="payment">
                    
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section> 
              </div>
            
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <script src="<?php echo base_url(); ?>/assets/user_scripts/jobsearch/jobsearch.js"></script>
