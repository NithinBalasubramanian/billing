<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List Order</h1>

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
    <div class="row" style="height:auto;">
    <div class="col-md-3">FROM : 	<?php
                            $first_date = date('Y-m-01');
                    ?>
                        <input type="date" value="<?php echo $first_date; ?>" class="form-control" id="min" name="min"></div>
        <div class="col-md-3">To :<?php 
                                $last_date = date('Y-m-t'); 							
                            ?>
                        <input type="date" value="<?php echo $last_date;  ?>" class="form-control" id="max" name="max">
        </div>
        <div class="col-md-4">Area :<select class="form-control area" id="area">
        <option value="">Select Area</option>
        <?php $area=$this->Admin_model->table_column('area');
        foreach($area as $area_row){ ?>
          <option value="<?php echo $area_row['id']; ?>"><?php echo $area_row['area_name']; ?></option>
        <?php } ?>
        </select>
        </div>
    </div>
    <br>
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr class="bg-secondary text-light">
                  <th>S No</th>
                  <th>Product Name</th>
                  <th>Piece Total</th>
                </tr>
                </thead>
                <tbody id="product_reports">
            
                </tbody>
              </table>
    </div>
    </div>
  </div>
</div>
</div>

</div>
<?php $this->load->view('include/footer');?>
<script>
      $(document).on('change','#min, #max,#area',function () {
        var min = $('#min').val();
        var max = $('#max').val();
        var area = $('#area').val();
        var table='product';
        var base_url = "<?php echo base_url(); ?>";
        
        $.ajax({
        url: base_url+'Admin/product_order_page',
        type: 'POST',
        data: "min="+min+"&max="+max+"&area=" + area + "&table=" + table ,
        success: function(data) {
            $('#product_reports').html(data);
        }
    });
    });
    $('#min, #max, #area').trigger('change');

</script>