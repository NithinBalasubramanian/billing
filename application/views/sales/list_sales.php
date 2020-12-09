<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List Order</h1>
  <a href="<?php echo base_url();?>index.php/View/sales/add_sales" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> Add Order</a>
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">List Order Table</h6>
      
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr class="bg-secondary text-light">
                  <th>Invoice No</th>
                  <th>Customer Name</th>
                  <th>Sales person</th>
                  <th>Total</th>
                  <th>Paid</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Order list</th>
                  <!-- <th>Actions</th> -->
                </tr>
                </thead>
                <tbody>
            <?php $product=$this->CI->table_column_desc($tablename='sales');
            if(count($product)>0){
              $i=1;
              foreach($product as $p_row){
                ?>
                <tr>
                  <td><?php echo $p_row['invoice_no']; ?></td>
                  <?php $cat_list=$this->Admin_model->table_column('customer','id',$p_row["customer_id"]); 
                     foreach($cat_list as $cat_list_row){ 
                         $due=$cat_list_row['due']; ?>
                        <td><?php echo $cat_list_row["customer_name"]; ?></td>
                      <?php 
                      } ?>
                  <?php $emp_list=$this->Admin_model->table_column('employee','id',$p_row["saler_id"]); 
                     foreach($emp_list as $emp_list_row){  ?>
                        <td><?php echo $emp_list_row["employee_name"]; ?></td>
                      <?php 
                  } ?>
                  <td><?php echo $p_row['total_price']; ?></td>
                  <td><?php echo $p_row['paid']; ?></td>
                  <td><?php echo $p_row['date_created']; ?></td>
                <td><?php if($p_row['saled_status'] == '1'){ ?><button class="btn btn-sm btn-success">Saled</button><?php }else{ ?><button class="btn btn-sm btn-warning">UnSaled</button><?php } ?></td>
                  <td><a href="<?php echo base_url();?>admin/bill/sales/bill/<?php echo $p_row['invoice_no'];?>" class="btn btn-sm btn-info">Order List</a></td>
                  <!-- <td><?php if($p_row['saled_status'] != '1'){ ?><a href="<?php echo base_url();?>Admin/delete/sales/sales/<?php echo $p_row['id'];?>/list_sales"><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;"></i></a></td>
                  <?php } ?> -->
                  </tr>
              <?php $i++; } ?>
            <?php } ?>
                </tbody>
              </table>
    </div>
    </div>
  </div>
</div>
</div>

</div>
<?php $this->load->view('include/footer');?>