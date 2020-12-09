<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List Product</h1>
  <a href="<?php echo base_url();?>index.php/View/product/add_product" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> Add Product</a>
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">List Product Table</h6>
      
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr class="bg-secondary text-light">
                  <th>S NO </th>
                  <th>Category</th>
                  <th>Product Name</th>
                  <th>HSN CODE</th>
                  <th>Quantity</th>
                  <th>Pieces in Box</th>
                  <th>Rate</th>
                  <th>Rate per Box</th>
                  <th>Purchase piece</th>
                  <th>Purchase box</th>
                  <th>Value in</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
            <?php $product=$this->CI->table_column($tablename='product');
            if(count($product)>0){
              $i=1;
              foreach($product as $p_row){
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <?php $cat_list=$this->Admin_model->table_column('category','id',$p_row["category_id"]); 
                     foreach($cat_list as $cat_list_row){ ?>
                        <td><?php echo $cat_list_row["category"]; ?></td>
                      <?php 
                      } ?>
                  <td><?php echo $p_row['product_name']; ?></td>
                  <td><?php echo $p_row['hsn_code']; ?></td>
                  <td><?php echo $p_row['qty']; ?></td>
                  <td><?php echo $p_row['box_piece']; ?></td>
                  <td><?php echo $p_row['rate']; ?></td>
                  <td><?php echo $p_row['rate_box']; ?></td>
                  <td><?php echo $p_row['purchase_piece']; ?></td>
                  <td><?php echo $p_row['purchase_box']; ?></td>
                  <?php if($p_row['value_in'] != ''){ ?>
                  <td><?php echo $p_row['value_in']; ?></td>
                  <?php }else{ ?>
                  <td>-</td>
                <?php } ?>
                  <td><a href="<?php echo base_url();?>View/product/edit_product/<?php echo $p_row['id'];?>" class=""><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:20px;"></i></a><br>
                  <a href="<?php echo base_url();?>Admin/delete/product/product/<?php echo $p_row['id'];?>/list_product"><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;"></i></a></td>
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