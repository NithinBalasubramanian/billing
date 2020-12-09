<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Add Other Expenses</h1>
  <a href="<?php echo base_url();?>index.php/View/expenses/list_expenses" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> List Other Expenses</a>
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Add Other Expenses Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url('Insert/expenses/expenses/add_expenses/list_expenses'); ?>" method="post" enctype="multipart/form-data" >
            <div class="box-body">
                <div class="row">
				    <div class="form-group col-md-6">
                        <label for="inputEmail3" class="col-sm-6 control-label">Expenses Type : </label>
                        <div class="col-sm-12">
                            <input type="text" name="type" id="" class="form-control" id="inputEmail3" placeholder="Expenses Type" required>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail3" class="col-sm-6 control-label">Amount : *</label>
                        <div class="col-sm-12">
                            <input type="text" name= "amount" id="" class="form-control" id="inputEmail3" placeholder="Amount" required>
                        </div>
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
