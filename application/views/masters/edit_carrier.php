
<section class="content-header">
 <h1>
  Edit Carrier
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
                      <input type="text" id="code"  name="code" class="form-control"  value="<?php  echo $value[0]->code;?>">
                    </div>
                                <div class="form-group col-md-6">
                      <label for="exampleInputname1">Name</label>
                      <input type="text" id="name"  name="name" class="form-control"  value="<?php  echo $value[0]->name;?>" id="name"  >
                      <input type="hidden" name="id" id="id"  value="<?php  echo $value[0]->id;?>" />
                    </div>

                               
                  
                                <div class="form-group col-md-6">
									<label>Contact Person</label>
									
									<input type="text" class="form-control" id="contact" name="contact"  value="<?php  echo $value[0]->contact;?>">
								
                                </div>
                                <div class="form-group col-md-6">
									<label>Address</label>
									
									<input type="text"  value="<?php  echo $value[0]->address;?>" class="form-control" id="address" name="address">
								
                                </div>
                                <div class="form-group col-md-6">
									<label>Country</label>
									
									<input type="text" class="form-control"  value="<?php  echo $value[0]->country;?>"  id="country" name="country">
								
                                </div>
                                <div class="form-group col-md-6">
									<label>Telephone</label>
									
									<input type="text" class="form-control"  value="<?php  echo $value[0]->telephone;?>" id="telephone" name="telephone">
								
                                </div>
                                <div class="form-group col-md-6">
									<label>Mobile</label>
									
									<input type="text" class="form-control"  value="<?php  echo $value[0]->mobile;?>" id="mobile" name="mobile">
								
                                </div>
                                <div class="form-group col-md-6">
									<label>Fax</label>
									
									<input type="text" class="form-control"  value="<?php  echo $value[0]->fax;?>" id="fax" name="fax">
								
                                </div>
                                <div class="form-group col-md-6">
									<label>Email</label>
									
									<input type="text" class="form-control" id="email" name="email"  value="<?php  echo $value[0]->email;?>">
								
                                </div>
                                <div class="form-group col-md-6">
									<label>Remarks</label>
									
									<input type="text" class="form-control" id="remarks" name="remarks" value="<?php  echo $value[0]->remarks;?>">
								
                                </div>
                                <!-- <div class="form-group col-md-6">
									<label>credit limit</label>
									
										<input type="text" class="form-control" id="credit" name="credit" value="<?php  echo $value[0]->credit_limit;?>">
								
                                </div>
                                 -->
                              
                               
                               
</div>
<div class="box-footer">
                    <button type="button"  onclick="update();" class="btn btn-success">Update</button>
                    <button type="reset" class="btn btn-success">Cancel</button>
                  </div>
                </form>
</div>
</div>
          </section>
          <script src="<?php echo base_url(); ?>/assets/js/moment.js"></script>
          <script src="<?php echo base_url(); ?>/assets/plugins/iCheck/icheck.min.js"></script>
          <script src="<?php echo base_url(); ?>/assets/user_scripts/masters/carrier.js"></script>




  