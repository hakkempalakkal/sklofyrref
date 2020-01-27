<?php 

// var_dump($code[0]);
// die();
?>
<section class="content-header">
 <h1>
  New Carrier
 </h1>
</section>
 <section class="content">
    <div class="box box-success">
       <div class="box-body">
          <form role="form">
                  <div class="box-body"  style="min-height: 300px;">
                   
                  
                    
                  <div class="row">
                  <div class="form-group col-md-6 ">
                      <label>Carrier Type</label>
                      <select class="form-control" name="carrier_type" id="carrier_type" value="">
                        <option value="land">Land</option>
                        <option value="transportation">Transportation</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputname1">Code</label>
                <input type="text" id="code"  name="code" class="form-control" readonly="readonly" placeholder="<?php echo $code[0]->code+1;?>"  value="<?php echo $code[0]->code+1;?>" >
                    </div>
                                <div class="form-group col-md-6">
                      <label for="exampleInputname1">Name</label>
                      <input type="text" id="name"  name="name" class="form-control" id="name" placeholder="Enter name" >
                    </div>
                               
                  
                                <div class="form-group col-md-6">
									<label>Contact Person</label>
									
									<input type="text" class="form-control" id="contact" name="contact">
								
                                </div>
                                <div class="form-group col-md-6">
									<label>Address</label>
									
									<input type="text" class="form-control" id="address" name="address">
								
                                </div>
                                <div class="form-group col-md-6">
									<label>Country</label>
									
									<input type="text" class="form-control" id="country" name="country">
								
                                </div>
                                <div class="form-group col-md-6">
									<label>Telephone</label>
									
									<input type="text" class="form-control" id="telephone" name="telephone">
								
                                </div>
                                <div class="form-group col-md-6">
									<label>Mobile</label>
									
									<input type="text" class="form-control" id="mobile" name="mobile">
								
                                </div>
                                <div class="form-group col-md-6">
									<label>Fax</label>
									
									<input type="text" class="form-control" id="fax" name="fax">
								
                                </div>
                                <div class="form-group col-md-6">
									<label>Email</label>
									
									<input type="text" class="form-control" id="email" name="email">
								
                                </div>
                                <div class="form-group col-md-6">
									<label>Remarks</label>
									
									<input type="text" class="form-control" id="remarks" name="remarks">
								
                                </div>
                                <!-- <div class="form-group col-md-6">
									<label>credit limit</label>
									
										<input type="text" class="form-control" id="credit" name="credit">
								
                                </div> -->
                                
                               
                               
</div>
                  <div class="box-footer">
                    <button type="button"  onclick="store();" class="btn btn-success">Save</button>
                    <button type="reset"  class="btn btn-success">Cancel</button>
                  </div>
                </form>
</div>
</div>
          </section>
          <script src="<?php echo base_url(); ?>/assets/js/moment.js"></script>
          <script src="<?php echo base_url(); ?>/assets/plugins/iCheck/icheck.min.js"></script>
          <script src="<?php echo base_url(); ?>/assets/user_scripts/masters/carrier.js"></script>



