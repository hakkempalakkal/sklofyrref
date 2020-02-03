
      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo IMAGE_PATH.$values; ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $roles[0]->name; ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
           <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>  -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
           
            <li class="treeview">
              <a href="#">
                <i class=" fa fa-dashboard"></i> <span>User Management </span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <?php 
              // foreach($permission as $key=>$val){
                if (in_array("read user", $permission))
                {  ?>
               <li><a href="<?php echo base_url(); ?>users"><i class="fa fa-circle-o"></i>List User</a></li>
            
              <?php
              }
                ?>
                  <?php 
          
                if (in_array("read permission",$permission))
                { 
                   ?>
               <li><a href="<?php echo base_url(); ?>permission"><i class="fa fa-circle-o"></i>Lsit Permission</a></li>
               
              <?php
              }
              ?>
                  <?php 
          
          if (in_array("read role",$permission))
          { 
             ?>
         <li><a href="<?php echo base_url(); ?>roles"><i class="fa fa-circle-o"></i> List Roles</a></li>
         
        <?php
        }
        ?>
      
              </ul>
            </li>
            <?php 
          
          if(in_array("read bank",$permission)||in_array("read carrier",$permission)||in_array("read client",$permission)||in_array("read supplier",$permission)||in_array("read descriptionmaster",$permission)||in_array("read shipper",$permission)||in_array("read currency",$permission))
          { 
             ?>
            <li class="treeview">
           
              <a href="">
                <i class=" fa fa-home"></i> <span>Master </span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            
              <ul class="treeview-menu">
              <?php 
          


          if (in_array("read bank",$permission))
          { 
             ?>
               <li><a href="<?php echo base_url(); ?>bank"><i class="fa fa-circle-o"></i>Manage Bank</a></li>
               <?php
        }
        ?>
            <?php 
          
          if (in_array("read  carrier",$permission))
          { 
             ?>
               <li><a href="<?php echo base_url(); ?>carrier"><i class="fa fa-circle-o"></i>Manage Carrier</a></li>
               <?php
        }
        ?>
         <?php 
          
          if (in_array("read client",$permission))
          { 
             ?>
               <li><a href="<?php echo base_url(); ?>client"><i class="fa fa-circle-o"></i> Manage Client</a></li>
               <?php
        }
        ?>
         <?php 
          
          if (in_array("read supplier",$permission))
          { 
             ?>
                <li><a href="<?php echo base_url(); ?>supplier"><i class="fa fa-circle-o"></i> Manage Supplier</a></li>
                <?php
        }
        ?>
         <?php 
          
          if (in_array("read descriptionmaster",$permission))
          { 
             ?>
                <li><a href="<?php echo base_url(); ?>description"><i class="fa fa-circle-o"></i> Manage Description Master</a></li>
                <?php
        }
        ?>
         <?php 
          
          if (in_array("read shipper",$permission))
          { 
             ?>
                <li><a href="<?php echo base_url(); ?>shipper"><i class="fa fa-circle-o"></i> Manage Shipper</a></li>
                <?php
        }
        ?>
         <?php 
          
          if (in_array("read currency",$permission))
          { 
             ?>
                <li><a href="<?php echo base_url(); ?>currency"><i class="fa fa-circle-o"></i> Manage Currency</a></li>
                <?php
        }
        ?>
              </ul>
           
            </li>
            <?php
        }
        ?>
       <?php 
          
          if (in_array("read transaction ",$permission))
          { 
             ?>
            <li class="treeview">
              <a href="#">
                <i class=" fa fa-exchange"></i> <span>Transaction </span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <!-- <li><a href="<?php echo base_url(); ?>job"><i class="fa fa-circle-o"></i>Job </a></li> -->
              <li><a href="<?php echo base_url(); ?>list-job"><i class="fa fa-circle-o"></i>List Job  </a></li>
        
              </ul>
            </li>
            <?php
        }
        ?>
          <?php 
          
          if (in_array("read job view",$permission))
          { 
             ?>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>job-search">
                <i class=" fa fa-search"></i> <span>Job View </span> <i class=" pull-right"></i>
              </a>
          
            </li>
            <?php
        }
        ?>
        <?php 
          
          if (in_array("read supplier search",$permission))
          { 
             ?>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>supplier-search">
                <i class="fa fa-search"></i> <span>Supplier View </span> <i class=""></i>
              </a>
           
            </li>
            <?php
        }
        ?>
          <?php 
          
          if (in_array("read client search",$permission))
          { 
             ?>
            <li class="treeview ">
              <a href="<?php echo base_url(); ?>client-search">
                <i class="fa  fa-user"></i> <span>Client View </span> <i class=""></i>
              </a>
             
            </li>
            <?php
        }
        ?>
         <?php 
          
          if (in_array("read supplier payment",$permission))
          { 
             ?>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>list-supplier">
                <i class="fa  fa-credit-card"></i> <span> Supplier Payment</span> <i class=" pull-right"></i>
              </a></li>
              <?php
        }
        ?>
            <?php 
          
          if (in_array("read clientreceipt",$permission))
          { 
             ?>
              <li class="treeview">
              <a href="<?php echo base_url(); ?>clientpaymentlist">
                <i class="fa fa-list"></i> <span> client reciept</span> <i class=" pull-right"></i>
              </a>
             
            </li>
            <?php
        }
        ?>
        
     
         <?php 
          
          if (in_array("read jobreports",$permission)||in_array("read nonbilledreports",$permission)||in_array("read invoicereports",$permission)||in_array("read pendinginvoice",$permission)||in_array("read billreport",$permission)||in_array("read pendingbills",$permission))
          { 
             ?>
            <li class="treeview">
              <a href="#">
                <i class=" fa fa-files-o"></i> <span>Reports </span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <?php 
          
          if (in_array("read jobreports",$permission))
          { 
             ?>
              <li><a href="<?php echo base_url(); ?>job-reports"><i class="fa fa-circle-o"></i>Job Reports</a></li>
              <?php } ?>
          <?php 
          
          if (in_array("read nonbilledreports",$permission))
          { 
             ?>
               <li><a href="<?php echo base_url(); ?>non-billed-jobs"><i class="fa fa-circle-o"></i>Non Billed Jobs </a></li>
               <?php } ?>
          <?php 
          
          if (in_array("read invoicereports",$permission))
          { 
             ?>
               <li><a href="<?php echo base_url(); ?>invoice-reports"><i class="fa fa-circle-o"></i>Invoice Report </a></li>
               <?php } ?>
          <?php 
          
          if (in_array("read pendinginvoice",$permission))
          { 
             ?> 
               <li><a href="<?php echo base_url(); ?>pending-invoice"><i class="fa fa-circle-o"></i>Pending Invoice </a></li>
               <?php 
              } 
              ?>
          <?php 
          
          if (in_array("read billreport",$permission))
          { 
             ?> 
               <li><a href="<?php echo base_url(); ?>bill-report"><i class="fa fa-circle-o"></i>Bill Report </a></li>
               <?php 
              }
               ?>
          <?php 
          
          if (in_array("read pendingbills",$permission))
          { 
             ?>
               <li><a href="<?php echo base_url(); ?>pending-bills"><i class="fa fa-circle-o"></i>Pending Bills</a></li>
               <?php 
              } 
              ?>  
              </ul>
            </li>
            <?php
        }
        ?>
          <?php 
          
          if (in_array("create ledgergroup",$permission)||in_array("create ledger",$permission)||in_array("create accountsentry",$permission)||in_array("read daybook",$permission)||in_array("read trialbalance",$permission)||in_array("read balancesheet",$permission)||in_array("read ledgerview",$permission))
          { 
             ?>
            <li class="treeview ">
              <a href="#">
                <i class=" fa fa-credit-card"></i> <span>Accounts </span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <?php 
          
          if (in_array("create ledgergroup",$permission))
          { 
             ?>
              <li><a href="<?php echo base_url(); ?>create-ledger-group"><i class="fa fa-circle-o"></i>Create Ledger Group</a></li>
              <?php
        }
        ?>
          <?php 
          
          if (in_array("create ledger",$permission))
          { 
             ?>
              <li><a href="<?php echo base_url(); ?>create-ledger"><i class="fa fa-circle-o"></i>Create Ledger</a></li>
              <?php
          }
        ?>
          <?php 
          
          if (in_array("create accountsentry",$permission))
          { 
             ?>
              <li><a href="<?php echo base_url(); ?>accounts-entry"><i class="fa fa-circle-o"></i>Accounts Entry</a></li>
              <?php
          }
        ?>
          <?php 
          
          if (in_array("read daybook",$permission))
          { 
             ?>
              <li><a href="<?php echo base_url(); ?>day-book"><i class="fa fa-circle-o"></i>Day Book</a></li>
              <?php
          }
        ?>
          <?php 
          
          if (in_array("read trialbalance",$permission))
          { 
             ?>
              <li><a href="<?php echo base_url(); ?>trial-balance"><i class="fa fa-circle-o"></i>Trial Balance</a></li>
              <?php
          }
        ?>
          <?php 
          
          if (in_array("read balancesheet",$permission))
          { 
             ?>
              <li><a href="<?php echo base_url(); ?>balance-sheet"><i class="fa fa-circle-o"></i>Balance Sheet</a></li>
              <?php
          }
        ?>
          <?php 
          
          if (in_array("read ledgerview",$permission))
          { 
             ?>
              <li><a href="<?php echo base_url(); ?>ledger-view"><i class="fa fa-circle-o"></i>Ledger View</a></li>
              <?php
          }
        ?>
            </ul>
            </li>
            <?php } ?>
            <?php 
          
          // if (in_array("read ledgerview",$permission))
          // { 
             ?>
            <li class="treeview">
              <a href="#">
                <i class=" fa fa-wrench"></i> <span>Settings </span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="<?php echo base_url(); ?>basic-settings"><i class="fa fa-circle-o"></i>Basic Settings </a></li>
               <!-- <li><a href="#"><i class="fa fa-circle-o"></i>Invoice Settings </a></li> -->
              
              </ul>
            </li>
            <!-- 
                </ul>
                </li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
              </ul>
            </li> -->
            <!-- <li><a href="<?php echo base_url(); ?>/assets/documentation/index.html"><i class="fa fa-book"></i> Documentation</a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-danger"></i> Important</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-warning"></i> Warning</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-info"></i> Information</a></li> -->
            <?php
        // }
        ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">