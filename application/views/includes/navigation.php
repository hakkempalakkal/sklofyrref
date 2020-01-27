
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
            <li class="treeview">
              <a href="#">
                <i class=" fa fa-home"></i> <span>Master </span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
          
               <li><a href="<?php echo base_url(); ?>bank"><i class="fa fa-circle-o"></i>Manage Bank</a></li>
               <li><a href="<?php echo base_url(); ?>carrier"><i class="fa fa-circle-o"></i>Manage Carrier</a></li>
               <li><a href="<?php echo base_url(); ?>client"><i class="fa fa-circle-o"></i> Manage Client</a></li>
               
                <li><a href="<?php echo base_url(); ?>supplier"><i class="fa fa-circle-o"></i> Manage Supplier</a></li>
                <li><a href="<?php echo base_url(); ?>description"><i class="fa fa-circle-o"></i> Manage Description Master</a></li>
                <li><a href="<?php echo base_url(); ?>shipper"><i class="fa fa-circle-o"></i> Manage Shipper</a></li>
                <li><a href="<?php echo base_url(); ?>currency"><i class="fa fa-circle-o"></i> Manage Currency</a></li>

              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class=" fa fa-exchange"></i> <span>Transaction </span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="<?php echo base_url(); ?>job"><i class="fa fa-circle-o"></i>Job </a></li>
        
              </ul>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>job-search">
                <i class=" fa fa-search"></i> <span>Job View </span> <i class=" pull-right"></i>
              </a>
              <!-- <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i>Search Job </a></li>
               <li><a href="#"><i class="fa fa-circle-o"></i>Job Profile </a></li>
               
              
              </ul> -->
            </li>
           
            <li class="treeview">
              <a href="<?php echo base_url(); ?>supplier-search">
                <i class="fa fa-search"></i> <span>Supplier View </span> <i class=""></i>
              </a>
           
            </li>
            <li class="treeview ">
              <a href="<?php echo base_url(); ?>client-search">
                <i class="fa fa-search"></i> <span>Client View </span> <i class=""></i>
              </a>
             
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>list-supplier">
                <i class="fa fa-search"></i> <span> Supplier Payment</span> <i class=" pull-right"></i>
              </a>
              <a href="<?php echo base_url(); ?>clientpaymentlist">
                <i class="fa fa-search"></i> <span> client reciept</span> <i class=" pull-right"></i>
              </a>
              <!-- <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i>Search Supplier </a></li>
               <li><a href="#"><i class="fa fa-circle-o"></i>Supplier Profile  </a></li>
              
              
              </ul> -->
            </li>
            <li class="treeview">
              <a href="#">
                <i class=" fa fa-files-o"></i> <span>Reports </span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="<?php echo base_url(); ?>job-reports"><i class="fa fa-circle-o"></i>Job Reports</a></li>
               <li><a href="<?php echo base_url(); ?>non-billed-jobs"><i class="fa fa-circle-o"></i>Non Billed Jobs </a></li>
               <li><a href="<?php echo base_url(); ?>invoice-reports"><i class="fa fa-circle-o"></i>Invoice Report </a></li>
               <li><a href="<?php echo base_url(); ?>pending-invoice"><i class="fa fa-circle-o"></i>Pending Invoice </a></li>
               <li><a href="<?php echo base_url(); ?>bill-report"><i class="fa fa-circle-o"></i>Bill Report </a></li>
               <li><a href="<?php echo base_url(); ?>pending-bills"><i class="fa fa-circle-o"></i>Pending Bills</a></li>
              
              </ul>
            </li>
            <li class="treeview ">
              <a href="#">
                <i class=" fa fa-credit-card"></i> <span>Accounts </span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="<?php echo base_url(); ?>create-ledger-group"><i class="fa fa-circle-o"></i>Create Ledger Group</a></li>
               <li><a href="<?php echo base_url(); ?>create-ledger"><i class="fa fa-circle-o"></i>Create Ledger</a></li>
               <li><a href="<?php echo base_url(); ?>accounts-entry"><i class="fa fa-circle-o"></i>Accounts Entry</a></li>
               <li><a href="<?php echo base_url(); ?>day-book"><i class="fa fa-circle-o"></i>Day Book</a></li>
               <li><a href="<?php echo base_url(); ?>trial-balance"><i class="fa fa-circle-o"></i>Trial Balance</a></li>
               <li><a href="<?php echo base_url(); ?>balance-sheet"><i class="fa fa-circle-o"></i>Balance Sheet</a></li>
               <li><a href="<?php echo base_url(); ?>ledger-view"><i class="fa fa-circle-o"></i>Ledger View</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class=" fa fa-wrench"></i> <span>Settings </span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i>Company Settings </a></li>
               <li><a href="#"><i class="fa fa-circle-o"></i>Invoice Settings </a></li>
              
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
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">