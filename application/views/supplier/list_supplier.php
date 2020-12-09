<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/popup.php'); ?>
<?php $this->load->view('include/header_menu');?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List supplier </h1>
  <a href="<?php echo base_url();?>View/supplier/add_supplier" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> Add supplier</a>
 </div>
 
<div class="row">
<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center row">
      <h6 class="col-md-6 m-0 font-weight-bold text-primary">List supplier Table</h6>
     
</div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr class="bg-secondary text-light">
                  <th>S.No</th>
                  <th>suppler Name</th>
                  <th>Address</th>
                  <th>Area</th>
                  <th>Contact</th>
                  <th>Due</th>
                  <th>Secondary Contact</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $suppler = $this->CI->table_column($tablename='supplier');
				if(count($suppler) >0) {
          $i=1;
				foreach($suppler as $row) { ?>
                <tr>
                  <td><?php echo $i; ?> </td>
                  <td><?php echo strtoupper($row["supplier_name"]); ?></td>
                  <td><?php echo strtoupper($row["address"]); ?></td>
                  <?php $area_list=$this->Admin_model->table_column('area','id',$row["area_id"]); 
                     foreach($area_list as $area_list_row){ ?>
                        <td><?php echo $area_list_row["area_name"]; ?></td>
                      <?php 
                      } ?>
                  <td><?php echo $row["supplier_contact"]; ?></td>
                  <td><?php echo $row["due"]; ?></td>
                  <?php if($row["supplier_sec"] != "0"){ ?>
                  <td><?php echo $row["supplier_sec"]; ?></td>
                  <?php }else{ ?>
                  <td>-</td>
                  <?php } ?>
                 <td><a href="<?php echo base_url();?>View/supplier/edit_supplier/<?php echo $row['id'];?>"  onclick="pop_function();" class=""><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:20px;"></i></a><br>
                  <a href="<?php echo base_url();?>Admin/delete/supplier/supplier/<?php echo $row['id'];?>/list_supplier" class=""><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;"></i></a></td>
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
<script>
  function pop_function(){
    document.querySelector('#pop_up').style.display='block';
  }
</script>
<?php $this->load->view('include/footer');?>