<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Add Employee</h1>
  <a href="<?php echo base_url();?>index.php/View/employee/list_employee" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> List Employee</a>
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Add Employee Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url('Insert/employee/employee/add_employee/list_employee'); ?>" method="post" enctype="multipart/form-data" >
              <div class="box-body">
                <div class="row">
				        <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Employee Name : *</label>

                  <div class="col-sm-12">
                    <input type="text" name="employee_name" id="" class="form-control" id="inputEmail3" placeholder="Employee Name" required>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Contact : *</label>

                  <div class="col-sm-12">
                    <input type="text" name= "contact" id="" class="form-control" id="inputEmail3" placeholder="Contact" required>
                  </div>
                </div>

              </div>
              <div class="row">
				<div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Address : </label>

                  <div class="col-sm-12">
                    <textarea type="text" name= "address" id="" class="form-control" id="inputEmail3" placeholder="Address" ></textarea>
                  </div>
                </div>
				<div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Secondary Number : </label>

                  <div class="col-sm-12">
                    <input type="text" name= "sec_contact" id="" class="form-control" id="inputEmail3" placeholder="Secondary Number" >
                  </div>
                </div>
              </div>
              <div class="row">
				<div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">User Type : </label>
                  <div class="col-sm-12" >
                   <select class="form-control" name="type" required>
                   <option>Choose User Type</option>
                    <option value="Admin">Admin</option>
                    <option value="Sales">Sales</option>
                    <option value="Order">Order</option>
                   </select>
                  </div>
                </div>
				<div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Password : </label>
                  <div class="col-sm-12">
                    <input type="password" name= "password" id="" class="form-control" id="inputEmail3" placeholder="Password" required>
                  </div>
                </div>  
              </div>
			

              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-gradient-green pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
    </div>
  </div>
</div>

</div>

</div>
<?php $this->load->view('include/footer');?>
