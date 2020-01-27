<?php 

// var_dump($code[0]);
// die();
?>
<section class="content-header">
 <h1>
 Ledger Group
 </h1>
</section>
 <section class="content">
    <div class="box box-success">
       <div class="box-body">
          <form role="form">                                                                                                                                                                                      
                  <div class="box-body"  style="min-height:100px;">
                             
                  <div class="row">                         
                  <div class="form-group col-md-3 ">
                      <label>Financial Year</label>
                      <select class="form-control" required name="financial_year" id="financial_year" value="">
                      <option value="" selected="selected" diabled="disabled">----Select----</option>
                        <option value="2010-2011">2010-2011</option>
                        <option value="2011-2012">2011-2012</option>
                      </select>
                      </div>
                      <div class="form-group col-md-2">
                  
                  <button type="button" style="margin-top: 25px;" class="btn btn-success" id="find" name="find">Find</button>
                  </div>
                  <div class="form-group col-md-2">
                  <button type="button"  style="margin-top: 25px;" class="btn btn-success" id="print" name="print">Print</button>

                 
                 </div>
                                
                         
</div>
                  <!-- <div class="box-footer">
                    <button type="button"  onclick="store();" class="btn btn-success">Save</button>
                    <button type="reset"  class="btn btn-success">Cancel</button>
                  </div> -->
                </form>
              
              
                <div id="divexport">
                                 <div id="ContentPlaceHolder1_up_GridLedgerAccountsDetails">
	

               
                                 <div style="width:98%; float:none;">
                                
                                

                                <div id="Balancesheet" style=" background-color:White;color: gray; font-size:15px ">

    <div>
    <div id=" Liability" style=" width:49%; float:left; clear:both ">
    <div style=" background-color:rgba(82, 107, 1, 1); color:White; border-color:White; border-style:solid; border-width:1px;border:solid 1px gray">
    <div style=" width:70%; float:left; padding:2px;">Liability</div>
    <div style=" width:25%;text-align:right; float:right; padding:2px;">Amount</div>
    <div style=" clear:both"></div>
    </div>
    <div style=" clear:both;"></div>

        
     

     <div style=" clear:both;"></div>
    <div style=" width:50%; float:left;">
        </div>
    <div style=" width:48%;text-align:right;float:right; ">
        </div>

    </div>
    
    <div id="Asset" style=" width:50%; float:right;">
     <div style=" background-color:rgba(82, 107, 1, 1); color:White; border-color:White; border-style:solid; border-width:1px;border:solid 1px gray">
    <div style=" width:70%; float:left; padding:2px;">Asset</div>
     <div style=" width:25%;text-align:right; float:right; padding:2px;">Amount</div>
    <div style=" clear:both"></div>
    
    </div>
    <div style=" clear:both;"></div>
       

        <div style=" clear:both;"></div>
    <div style=" width:50%; float:left"></div>
    <div style=" width:48%;text-align:right; float:right">
        </div>


   

    </div>

    </div>

     <div style=" clear:both;"></div>
    <div id="Total">
    <div id="Total Liability" style=" width:49%; float:left;border:solid 1px gray ">

     

    <div style=" background-color:Gray; color:White;border-color:White; border-style:solid; border-width:1px;">
     <div style=" width:70%; float:left; padding:2px;">Total Liability </div>
    <div style=" width:25%; text-align:right;float:right; padding:2px;">
        <span id="ContentPlaceHolder1_lblTotalLiab"></span></div>
     <div style=" clear:both;"></div>
    </div>
  
    </div>
 
    <div id="TotalAsset" style=" width:50%; float:right;border:solid 1px gray">

    <div style=" background-color:Gray; color:White;border-color:White; border-style:solid; border-width:1px;">
     <div style=" width:70%; float:left; padding:2px;">Total Asset </div>
    <div style=" width:25%;text-align:right;float:right ; padding:2px;">
        <span id="ContentPlaceHolder1_lblTotalAsset"></span></div>
     <div style=" clear:both;"></div>
    </div>

    </div>
    
</div>

 <div style=" clear:both;"></div>

    </div>

                              
       </div>
                             
&nbsp;
    
</div>
                                 </div>
</div>
</div>
          </section>
          <script src="<?php echo base_url(); ?>/assets/js/moment.js"></script>
          <script src="<?php echo base_url(); ?>/assets/js/alert.js"></script>
          <!-- <script src="<?php echo base_url(); ?>/assets/user_scripts/masters/bank.js"></script> -->




  