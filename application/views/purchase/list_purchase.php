<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List Purchase</h1>
  <a href="<?php echo base_url();?>View/purchase/add_purchase" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> Add Purchase</a>
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">List Purchase Table</h6>
      
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr class="bg-secondary text-light">
                  <th>Invoice No</th>
                  <th>Supplier Name</th>
                  <th>Total</th>
                  <th>Paid</th>
                  <th>Date</th>
                  <th>Bill</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
            <?php $product=$this->CI->table_column($tablename='purchase');
            if(count($product)>0){
              $i=1;
              foreach($product as $p_row){
                ?>
                <tr>
                  <td><?php echo $p_row['invoice_no']; ?></td>
                  <?php $cat_list=$this->Admin_model->table_column('supplier','id',$p_row["supplier_id"]); 
                     foreach($cat_list as $cat_list_row){ 
                         $due=$cat_list_row['due']; ?>
                        <td><?php echo $cat_list_row["supplier_name"]; ?></td>
                      <?php 
                      } ?>
                  <td><?php echo $p_row['grand_total']; ?></td>
                  <td><?php echo $p_row['paid']; ?></td>
                  <td><?php echo $p_row['date_created']; ?></td>
                  <td><a href="<?php echo base_url();?>admin/bill/purchase/bill/<?php echo $p_row['invoice_no'];?>" class="btn btn-sm btn-info">Bill</a></td>
                  <td><a href="<?php echo base_url();?>View/product/edit_product/<?php echo $p_row['id'];?>" class=""><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:20px;"></i></a><br>
                  <a href="<?php echo base_url();?>Admin/delete/purchase/purchase/<?php echo $p_row['id'];?>/list_purchase"><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;"></i></a></td>
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