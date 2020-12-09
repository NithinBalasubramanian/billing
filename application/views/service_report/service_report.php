<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List Service Report</h1>
  <a href="<?php echo base_url();?>index.php/View/service_billing/add_service_bill" class="d-none d-sm-inline-block btn btn-sm btn-primary btn-grad shadow-sm"><i class="fas fa-add"></i>Add Service Billing</a>
  
 </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">List Service Report</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="from container">
    <div class="row" style="height:auto;" id="page_pdf">
    <h1 class="col-md-12">Consolidate List</h1>
<div class="col-md-4">FROM : 	<?php
                            $first_date = date('Y-m-01');
                    ?>
                        <input type="date" value="<?php echo $first_date; ?>" class="form-control" id="min" name="min"></div>
<div class="col-md-4">To :<?php 
                                $last_date = date('Y-m-t'); 							
                            ?>
                        <input type="date" value="<?php echo $last_date;  ?>" class="form-control" id="max" name="max">
        </div>
        <div class="col-md-4" style="display:none;">Service type :
                        <select class="form-control" name="" id="service_type">
                          <option value="">ALL SERVICES</option>
                        <?php  $ser=$this->CI->table_column($tablename='service_type');
                        if(count($ser)>0){
                          foreach($ser as $ser_row){ ?>
                              <option value="<?php echo $ser_row['service_type']; ?>"><?php echo $ser_row['service_type']; ?></option>
                        <?php  }
                        } ?>
                        </select>
        </div>
  <div class="col-md-12 row">
      <h5 style="padding-top:20px;" class="col-md-6">Total Amount : <span id="total_disp"></span>.00 RS</h5>
      <h5 style="padding-top:20px;" class="col-md-6">GST Amount : <span id="gst_disp"></span>.00 RS</h5>
  </div>
    </div>
    <span href="" class="btn btn-success btn-sm" style="float:right;" onclick="printDiv('page_pdf')"><i class="fa fa-print" aria-hidden="true"></i>  Print Consolidate</span>
    <br>
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr class="bg-secondary text-light"> 
                  <th>Id</th>
                  <th>Invoice Number</th>
                  <th>DATE</th>
                  <th>Customer</th>
                  <th>Services</th>
                  <th>Charges</th>
                  <th>SGST</th>
                  <th>CGST</th>
                  <th>Net Total</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; $ser=$this->CI->table_column($tablename='service_bill');
            if(count($ser)>0){
              foreach($ser as $ser_row){
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $ser_row['invoice_no']; ?></td>
			        	  <td><?php  $date_created=$ser_row['date_created'];echo $newDate = date("Y-m-d", strtotime($date_created)); ?></td>
                  <td><?php echo $ser_row['customer_name']; ?></td>
                    <?php $serv=$this->CI->table_column_get_limit($tablename='service_type',$column='id',$val=$ser_row['service_id']); 
                  if(count($ser)>0){
                    foreach($serv as $serv_row){ ?>
                  <td><?php echo $serv_row['service_type']; ?></td>
                  <td><?php echo $serv_row['charges']; ?></td>
                  <td><?php echo $serv_row['gst_amount']/2; ?> (<?php echo ($serv_row['gst_percent']/2); ?> % )</td>
                  <td><?php echo $serv_row['gst_amount']/2; ?> (<?php echo ($serv_row['gst_percent']/2); ?> % )</td>
                  <td><?php echo $serv_row['net_total']; ?></td>
                    <?php } } ?>
                
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/moment/moment.min.js"></script>
					<script type="text/javascript">
						$(document).ready(function() {
                            $.fn.dataTable.ext.search.push(
								function (settings, data, dataIndex) {
									var min = $('#min').val();
									var max = $('#max').val();
									var createdAt = data[2] || 0;
									if(
										  (min == "" || max == "") ||
										  (moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max)) 
										) {
										  return true;
										}
										return false;
								}
								);
									var table = $('#dataTable').DataTable( {
										dom: 'Bfrtip',
										buttons: [
											  'copy',
											  'csv',
										]
									} );

                            $('#min, #max').change(function () {
										table.draw();
									var min = $('#min').val();
									var max = $('#max').val();
									var base_url = "<?php echo base_url(); ?>";
									
									$.ajax({
									url: base_url+'index.php/Admin/total_service',
									type: 'POST',
									dataType: "json",
									data: "min=" + min + "&max=" + max ,
									success: function(data) {
                    $('#total_disp').html(data.total);
                    $('#gst_disp').html(data.gst);
									}
							        });
									});
									$('#min, #max').trigger('change');

                  $('#service_type').change(function () {
										table.draw();
                  var service_type = $('#service_type').val();
									var base_url = "<?php echo base_url(); ?>";
									
									$.ajax({
									url: base_url+'index.php/Admin/',
									type: 'POST',
									dataType: "json",
									data: "service_type=" + service_type ,
									success: function(data) {

									}
							        });
									});
									$('#service_type').trigger('change');
                        });
                        </script>
                          <script type="text/javascript">
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<?php $this->load->view('include/footer_table'); ?>