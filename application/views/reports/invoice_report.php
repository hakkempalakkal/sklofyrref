<?php 
// var_dump($suppliers);
// die();
?>
<link href="<?php echo base_url(); ?>/assets/expensereport/style.css" rel="stylesheet" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<section class="content-header">
  <h1>
       Invoice report
            </h1>
          
          </section>
          <section  class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box box-success">
                <div class="box-header with-border">
<div class="row">
<form role="form" method="post" action=""> 
                <div class="col-md-2 form-group col-md-offset-5">
                <select class="form-control" id="client" name="client"  value="">
                                    <option value="">--ALL--</option>
                                  
                                  <?php 
                                  foreach($client as $key=>$value)
                                  {
?>
                                 <option value="<?php echo $value->id;?>"><?php echo $value->name;?></option>
                                  <?php
                                  }
                                   ?>
                                 </select>
                </div>
                <div class="col-md-2 form-group">
                  <input type="text" placeholder="yyyy-mm-dd" id="fromdate" name="date" class="form-control"/>
                </div>
                <div class="col-md-2 form-group">
                  <input type="text" placeholder="yyyy-mm-dd" id="todate" name="date" class="form-control"/>
                </div>
                <div class="col-md-1 form-group">
                <input type="button" class="btn btn-success" value="Show" id="show" onclick="get_invoicereport();"/>
                </div>
                                </form>
</div>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                    <table class="table table-striped table-hover indexer table tab1" style="margin-bottom: -4px;">
                        <thead>
                        <tr role="row">
                            <th >Invoice</th>
                            <th  >Date</th>
                            <th >Mode</th>
                            <th >Job</th>
                            <th>Customer</th>
                            <th>Sub-total</th>
                            <th >Vat Amount</th>
                            <th >Grand Total</th>
                            <th >Status</th>

                          </tr>

                          
                        </thead>
                        <tbody class="invoicereport" >
                            
                            </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          </section>
          <script src="<?php echo base_url(); ?>/assets/user_scripts/reports/reports.js"></script>
          <script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
     
     

    })
    
    </script>
                  <script src="<?php echo base_url(); ?>/assets/user_scripts/reports/reports.js"></script>
