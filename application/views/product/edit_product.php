<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Edit Product</h1>
  <a href="<?php echo base_url();?>index.php/View/product/list_product" class=" d-sm-inline-block btn btn-grad btn-sm btn-primary shadow-sm"><i class="fas fa-add"></i> List Products</a>
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Edit Product Form</h6>
      
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url('admin/Update_all/product/product/'.$edit_id.'/edit_product/list_product'); ?>" method="post" enctype="multipart/form-data" >
              <div class="box-body">
                <?php $product=$this->CI->table_column_get($tablename='product',$column='id',$val=$edit_id);
                if(count($product)>0){
                    foreach($product as $product_root){ ?>
                                 <div class="row">
                                 <div class="form-group col-md-12">
                  <label for="inputEmail3" class="col-sm-5 control-label">Product Name:*</label>

                  <div class="col-sm-6">
                  <select class="form-control" name="category_id" required>
                  <?php $cat_list=$this->Admin_model->table_column('category','id',$product_root["category_id"]); 
                     foreach($cat_list as $cat_list_row){ ?>
                        <option value="<?php echo $cat_list_row["id"]; ?>"><?php echo $cat_list_row["category"]; ?></option>
                      <?php 
                      } ?>
                     <?php $cat_list=$this->Admin_model->table_column('category'); 
                     foreach($cat_list as $cat_list_row){ ?>
                      <option value="<?php echo $cat_list_row['id']; ?>"><?php echo $cat_list_row['category']; ?></option>
                      <?php 
                      } ?>
                      </select>
                      </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-5 control-label">Product Name:*</label>

                  <div class="col-sm-12">
                    <input type="text" name= "product_name" id="" class="form-control" id="inputEmail3" placeholder="Product Name" value="<?php echo $product_root['product_name']; ?>" required>
                  </div>
                </div>
				<div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-5 control-label">HSN NO:*</label>

                  <div class="col-sm-12">
                    <input type="text" name= "hsn_code" id="" class="form-control" id="inputEmail3" placeholder="HSN Code" value="<?php echo $product_root['hsn_code']; ?>"  required>
                  </div>
                </div>
      </div>
      <div class="row">
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-5 control-label">Pieces In Box :*</label>

                  <div class="col-sm-12">
                    <input type="text" name= "box_piece" id="" class="form-control" id="inputEmail3" placeholder="Pieces In Box" value="<?php echo $product_root['box_piece']; ?>" required>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-5 control-label">Rate :*</label>

                  <div class="col-sm-12">
                    <input type="text" name= "rate" id="" class="form-control" id="inputEmail3" placeholder="Rate" value="<?php echo $product_root['rate']; ?>" required>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-5 control-label">Rate per box :*</label>

                  <div class="col-sm-12">
                    <input type="text" name= "rate_box" id="" class="form-control" id="inputEmail3" placeholder="Rate" value="<?php echo $product_root['rate_box']; ?>" required>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-5 control-label">Value In :</label>

                  <div class="col-sm-12">
                    <input type="text" name= "value_in" id="" class="form-control" id="inputEmail3" placeholder="Enter value as kg / liter / pieces" <?php if($product_root['value_in'] != ''){ ?> value="<?php echo $product_root['value_in']; ?>" <?php } ?> >
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-5 control-label">Purchase Rate Per Piece :*</label>

                  <div class="col-sm-12">
                    <input type="text" name= "purchase_piece" id="" class="form-control" id="inputEmail3" placeholder="Purchase Rate" value="<?php echo $product_root['purchase_piece']; ?>" required>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-5 control-label">Purchase Rate Per Box :*</label>

                  <div class="col-sm-12">
                    <input type="text" name= "purchase_box" id="" class="form-control" id="inputEmail3" placeholder="Purchase Rate per box" value="<?php echo $product_root['purchase_box']; ?>" required>
                  </div>
                </div>
                 <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-5 control-label">Open Stock :*</label>

                  <div class="col-sm-12">
                    <input type="text" name= "qty" id="" class="form-control" id="inputEmail3" placeholder="Quantity" value="<?php echo $product_root['qty']; ?>" required>
                  </div>
                </div>
      </div>
      
                    <?php } } ?>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-gradient-green pull-right">Update</button>
              </div>
              <!-- /.box-footer -->
            </form>
    </div>
  </div>
</div>

</div>

</div>

<?php $this->load->view('include/footer');?>