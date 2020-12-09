
<?php $this->load->view('include/popup.php'); ?>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion disp " id="accordionSidebar" >

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15" style="font-size:25px;">
         AMJ
        </div>
        <div class="sidebar-brand-text mx-3">Product billing</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>index.php/Admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone" aria-expanded="true" aria-controls="collapseone">
          <i class="fas fa-user"></i>
          <span>Customer</span>
        </a>
        <div id="collapseone" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Customer Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View/customer/add_customer">Add Customer</a>
            <a class="collapse-item" href="<?php echo base_url();?>View/customer/list_customer">List Customer</a>
          </div>
        </div>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
          <i class="fas fa-plus"></i>
          <span>Product</span>
        </a>
        <div id="collapsetwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Product Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View/product/add_product">Add Product</a>
            <a class="collapse-item" href="<?php echo base_url();?>View/product/add_product_excel">Add Product Bulk</a>
            <a class="collapse-item" href="<?php echo base_url();?>View/product/list_product">List Product</a>
          </div>
        </div>
      </li>
      <?php if($this->session->userdata('type') =='Admin' || $this->session->userdata('type') =='order'){?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
          <i class="fas fa-plus"></i>
          <span>Order</span>
        </a>
        <div id="collapsethree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Order Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View/sales/add_sales">Add Order</a>
            <a class="collapse-item" href="<?php echo base_url();?>View/sales/list_sales">List Order</a>
          </div>
        </div>
      </li>
      <?php }  
      if($this->session->userdata('type')=='Admin'|| $this->session->userdata('type')=='Sales'){?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsenine" aria-expanded="true" aria-controls="collapsenine">
          <i class="fas fa-address-book"></i>
          <span>Sales</span>
        </a>
        <div id="collapsenine" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Sales Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View/final_sale/final_sale">List UnSaled</a>
            <a class="collapse-item" href="<?php echo base_url();?>View/final_sale/list_final_sale">List Saled</a>
          </div>
        </div>
      </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseten" aria-expanded="true" aria-controls="collapseten">
          <i class="fas fa-address-book"></i>
          <span>Supplies</span>
        </a>
        <div id="collapseten" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Supplies Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View/supply/list_to_supply">List Supplies</a>
            <a class="collapse-item" href="<?php echo base_url();?>View/supply/list_supply">List Supplied</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseeight" aria-expanded="true" aria-controls="collapseeight">
          <i class="fas fa-address-book"></i>
          <span>Other Expenses</span>
        </a>
        <div id="collapseeight" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Expenses Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View/expenses/add_expenses">Add Other Expenses</a>
            <a class="collapse-item" href="<?php echo base_url();?>View/expenses/list_expenses">List Other Expenses</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefive" aria-expanded="true" aria-controls="collapsefive">
          <i class="fas fa-plus"></i>
          <span>Purchase</span>
        </a>
        <div id="collapsefive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Purchase Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View/purchase/add_purchase">Add Purchase</a>
            <a class="collapse-item" href="<?php echo base_url();?>View/purchase/list_purchase">List Purchase</a>
          </div>
        </div>
      </li>
<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseseven" aria-expanded="true" aria-controls="collapseseven">
          <i class="fas fa-user"></i>
          <span>Supplier</span>
        </a>
        <div id="collapseseven" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Supplier Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View/supplier/add_supplier">Add Supplier</a>
            <a class="collapse-item" href="<?php echo base_url();?>View/supplier/list_supplier">List Supplier</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
          <i class="fas fa-address-book"></i>
          <span>Employee</span>
        </a>
        <div id="collapsefour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Employee Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View/employee/add_employee">Add Employee</a>
            <a class="collapse-item" href="<?php echo base_url();?>View/employee/list_employee">List Employee</a>
          </div>
        </div>
      </li>
     
      
            <!-- Divider -->
      <hr class="sidebar-divider">
        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>View/order/order">
          <i class="fas fa-address-book"></i>
          <span>Order Report</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>View/reports/report_sales">
          <i class="fas fa-address-book"></i>
          <span>Sales Report</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>View/reports/report_purchase">
          <i class="fas fa-address-book"></i>
          <span>Purchase Report</span>
        </a>
      </li>
      <!-- Heading -->
     

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
           
            <!-- Nav Item - Messages -->
           
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                
      <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php $name = $this->session->userdata('employee_name'); echo $name; ?></span>
                <img class="img-profile rounded-circle" src="<?php echo base_url(); ?>assets/img/img.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
      <div class="dropdown-item" onclick="disp_profile()">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        Profile
</div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url(); ?>Admin/logout_front" >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>