
 

<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-success">
           <div class="box-header with-border">
           <h3 class="box-title"> JOB LIST </h3>
           <span class="new-button"><a href="<?php echo base_url(); ?>job" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> &nbsp;Add New</a></span>
           </div>
           
            <div class="box-body">
    
               <table  class="table table-bordered indexer" >
                  <thead style="background-color: bisque;">
                     <tr>
                     <th> Mode</th>
                   
                        <th> Code</th>
                        <th> Type</th>
                        <th> Date</th>
                        <th> Shipper</th>
                        <th> Consignee</th>
                        <th> Client</th>
                     
                        <th> Shipment Terms</th>
                     
                        <th>#</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                        foreach ($values as $key => $value1)
                         {  
                        	?>
                     <tr>
                     <td class="text-center"><?php 
                      if($value1->Type=='air')
                     {
                        echo '<i class="text-blue fa fa-plane fa-2x"></i>';
                     } else if($value1->Type=='sea')
                     {
                        echo '<i class="text-green fa fa-ship fa-2x"></i>';
                     }
                     else if($value1->Type=='land')
                     {
                        echo '<i class="text-red  fa  fa-truck fa-2x"></i>';
                     }
                     else{
                        echo '<i class="text-yellow fa  fa-train fa-2x"></i>';
                     }
                     
                     ?></td>
                        <td class="text-center"><?php echo $value1->Number;?></td>
                        <td class="text-center"><?php echo $value1->shipment_type;?></td>
                        
                        <td class="text-center"><?php echo $value1->Date;?></td>
                        <td class="text-center"><?php echo $value1->Shipper;?></td>
                        <td class="text-center"><?php echo $value1->Consignee;?></td>
                        <td class="text-center"><?php echo $value1->client_name;?></td>
                        <td class="text-center"><?php echo $value1->ShipmentTerms;?></td>
                        
                      
                        <?php 
                    if($value1->Status=="OPEN")
                      { ?>  
                        <td class="text-center"><a href="<?php echo base_url()."edit-job/". $value1->JobId;?>" ><i class="fa fa-edit"></i></a>
                      <a href="<?php echo base_url()."job-closed-status/". $value1->JobId;?>" ><span class="label label-success" >Close Job</span></a><?php }
                      else
                      { ?> <a href="" ><span  ></span></a><?php } ?>
               
                        <!-- <?php echo '<a href="" ><span class="label label-success" >Close Job</span></a>'; ?> -->
                    </td>
                      
                     </tr>
                     <?php } ?>
                  </tbody> 
               </table>
            </div>
         </div>
      </div>
   </div>
</section>


