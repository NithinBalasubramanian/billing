<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List Damage</h1>
  <a href="<?php echo base_url();?>View/damage/add_damage" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> Add Damage</a>
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">List Damage Table</h6>
      
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
                  <th>Date</th>
                  <th>Status</th>
                  <th>Order list</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
            <?php $product=$this->CI->table_column_desc($tablename='damage');
            if(count($product)>0){
              $i=1;
              foreach($product as $p_row){
                ?>
                <tr>
                  <td><?php echo $p_row['dam_no']; ?></td>
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
                  <td><?php echo $p_row['date_created']; ?></td>
                  <td><?php if($p_row['status'] == '0'){ ?><button class="btn btn-warning btn-sm">Incomplete</button><?php }else{ ?><button class="btn btn-success btn-sm">Complete</button><?php } ?></td>
                  <td><a href="<?php echo base_url();?>admin/bill/damage/bill/<?php echo $p_row['dam_no'];?>" class="btn btn-sm btn-info">Order List</a></td>
                  <td><a href="<?php echo base_url();?>View/product/edit_product/<?php echo $p_row['id'];?>" class=""><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:20px;"></i></a><br>
                  <a href="<?php echo base_url();?>Admin/delete/damage/damage/<?php echo $p_row['id'];?>/list_damage"><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;"></i></a></td>
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