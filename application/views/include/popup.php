<div class="profile_data" id="profile">
  <div class="profile_data_cont">
  <div class="pre_header">
    <div class="sub_heading">
        <h2>Profile</h2> 
    </div>
  <div class="close_button">
  <i class="fa fa-times" aria-hidden="true"  onclick="undisp_profile()"></i>
  </div>
  </div>
  <div class="profile_data_main" >
 
  </div>
  </div>
</div>
<div class="modal fade" id="add_area" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Area :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="<?php echo base_url('Insert/area/customer/add_customer/add_customer'); ?>" method="post" enctype="multipart/form-data" >
      <div class="form-group">
          <label for="inputEmail3" class="col-sm-5 control-label">Area Name : *</label>
            <input type="text" name= "area_name" id="" class="form-control" id="inputEmail3" placeholder="Area Name" required>
       </div>
       <div class="box-footer">
            <button type="submit" class="btn btn-gradient-green btn-sm pull-right">Submit</button>
       </div>
              <!-- /.box-footer -->
       </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="<?php echo base_url('Insert/category/product/add_product/add_product'); ?>" method="post" enctype="multipart/form-data" >
      <div class="form-group">
          <label for="inputEmail3" class="col-sm-5 control-label">Category : *</label>
            <input type="text" name= "category" id="" class="form-control" id="inputEmail3" placeholder="Category name" required>
       </div>
       <div class="box-footer">
            <button type="submit" class="btn btn-gradient-green btn-sm pull-right">Submit</button>
       </div>
              <!-- /.box-footer -->
       </form>
      </div>
    </div>
  </div>
</div>