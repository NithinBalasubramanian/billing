<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Add Bulk Product</h1>
  <button type="button" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm " style="float:right" data-toggle="modal" data-target="#add_category">
  Add Category
</button>
  <a href="<?php echo base_url();?>index.php/View/product/list_product" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> List Products</a>
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Add Bulk Product Form</h6>
      
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <a href="<?php echo base_url(); ?>assets/excel/product_upload.xlsx" download class="btn btn-success btn-sm">Download Excel Sheet</a>
    <div class="row justify-content-center">
        <form method="post" id="import_form" enctype="multipart/form-data" class="col-md-6">
        <p><label>Select Excel File</label>
        <input type="file" name="file" id="file" class="form-control" required accept=".xls, .xlsx" /></p>
        <br />
        <input type="submit" name="import" value="Import" class="btn btn-info" />
        </form>
    </div>
    <h5>Category List</h5>
   <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr class="bg-secondary text-light">
                  <th>Category Id</th>
                  <th>Category</th>
                </tr>
                </thead>
                <tbody>
            <?php $product=$this->CI->table_column($tablename='category');
            if(count($product)>0){
              $i=1;
              foreach($product as $p_row){
                ?>
                <tr>
                  <td><?php echo $p_row['id']; ?></td>
                  <td><?php echo $p_row['category']; ?></td>
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

</div>

<?php $this->load->view('include/footer');?>
<script>
     $('#import_form').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"<?php echo base_url(); ?>Admin/import",
   method:"POST",
   data:new FormData(this),
   contentType:false,
   cache:false,
   processData:false,
   success:function(data){
       var url="<?php echo base_url(); ?>View/product/list_product";
       window.location.replace(url);
   }
  })
 });
</script>