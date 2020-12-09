<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Add Product</h1>
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
      <h6 class="m-0 font-weight-bold text-primary">Add Product Form</h6>
      
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url('Insert/product/product/add_product/list_product'); ?>" method="post" enctype="multipart/form-data" >
              <div class="box-body">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-5 control-label">Category :*</label>

                  <div class="col-sm-12">
                    <select class="form-control" name="category_id" required>
                     <option value="">Select Category</option>
                     <?php $cat_list=$this->Admin_model->table_column('category'); 
                     foreach($cat_list as $cat_list_row){ ?>
                      <option value="<?php echo $cat_list_row['id']; ?>"><?php echo $cat_list_row['category']; ?></option>
                      <?php 
                      } ?>
                    </select>
                  </div>
                </div>
              </div>
                <div class="row">
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-5 control-label">Product Name:*</label>

                  <div class="col-sm-12">
                    <input type="text" name= "product_name" id="" class="form-control" id="inputEmail3" placeholder="Product Name" required>
                  </div>
                </div>
				<div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-5 control-label">HSN NO:*</label>

                  <div class="col-sm-12">
                    <input type="text" name= "hsn_code" id="" class="form-control" id="inputEmail3" placeholder="HSN Code" required>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-5 control-label">Pices In a Box :*</label>

                  <div class="col-sm-12">
                    <input type="text" name= "box_piece" id="" class="form-control" id="inputEmail3" placeholder="Pices In a Box" required>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-5 control-label">Rate Per Piece :*</label>

                  <div class="col-sm-12">
                    <input type="text" name= "rate" id="" class="form-control" id="inputEmail3" placeholder="Rate" required>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-5 control-label">Rate Per Box :*</label>

                  <div class="col-sm-12">
                    <input type="text" name= "rate_box" id="" class="form-control" id="inputEmail3" placeholder="Rate per box" required>
                  </div>
                </div>
				<div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-5 control-label">Value In :</label>

                  <div class="col-sm-12">
                    <input type="text" name= "value_in" id="" class="form-control" id="inputEmail3" placeholder="Enter value as kg / liter / pieces" >
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-5 control-label">Purchase Rate Per Piece :*</label>

                  <div class="col-sm-12">
                    <input type="text" name= "purchase_piece" id="" class="form-control" id="inputEmail3" placeholder="Purchase Rate" required>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-5 control-label">Purchase Rate Per Box :*</label>

                  <div class="col-sm-12">
                    <input type="text" name= "purchase_box" id="" class="form-control" id="inputEmail3" placeholder="Purchase Rate per box" required>
                  </div>
                </div>
                 <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-5 control-label">Open stock :*</label>

                  <div class="col-sm-12">
                    <input type="text" name= "qty" id="" class="form-control" id="inputEmail3" placeholder="Open stock " required>
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