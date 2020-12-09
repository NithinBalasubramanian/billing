<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>
<style>
@page{
  #service_type{
    display:none;
  }
}
</style>
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
    <div class="row" style="height:auto;">
<div class="col-md-3">From :	<?php
                            $first_date = date('Y-m-01');
                    ?>
                        <input type="date" value="<?php echo $first_date; ?>" class="form-control" id="min" name="min" style="display:;"></div>
<div class="col-md-3">To :<?php 
                                $last_date = date('Y-m-t'); 							
                            ?>
                        <input type="date" value="<?php echo $last_date;  ?>" class="form-control" id="max" name="max" style="display:;">
        </div>
        <div class="col-md-4">Service type :
                        <select class="form-control" name="" id="service_type" >
                          <option value="" data-serv="all">ALL SERVICES</option>
                        <?php  $ser=$this->CI->table_column($tablename='service_type');
                        if(count($ser)>0){
                          foreach($ser as $ser_row){ ?>
                              <option value="<?php echo $ser_row['id']; ?>" data-serv="<?php echo $ser_row['service_type']; ?>"><?php echo $ser_row['service_type']; ?></option>
                        <?php  }
                        } ?>
                        </select>
        </div>
		<br>
  <div class="col-md-12 row"  id="page_pdf" style="padding:20px 0px;">
	  <h5 style="padding-top:20px;" class="col-md-3"><span id="from_date_disp"></span></h5>
      <h5 style="padding-top:20px;" class="col-md-3"><span id="to_date_disp"></span></h5>
	  <h5 style="padding-top:20px;" class="col-md-6"><span id="serv_disp"></span></h5>
      <h5 style="padding-top:20px;" class="col-md-6">Total Amount : <span id="total_disp"></span>.00 RS</h5>
      <h5 style="padding-top:20px;" class="col-md-6">GST Amount : <span id="gst_disp"></span>.00 RS</h5>
  </div>
  <br>
    </div>
    <span href="" class="btn btn-success btn-sm" style="float:right;" onclick="printDiv('page_pdf')"><i class="fa fa-print" aria-hidden="true"></i>  Print Overall</span>
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped table-hover" >
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
                <tbody class="display">
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
			  <div  id="data_table" style="display:none;">
			  <table class="table table-bordered table-striped table-hover"  >
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
				 <tbody class="display1">
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
    </div><br> <span href="" class="btn btn-success btn-sm" style="float:right;" onclick="printDiv('data_table')"><i class="fa fa-print" aria-hidden="true"></i>  Print Report</span>
  </div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
					<script type="text/javascript">
						$(document).ready(function() {
                  $(document).on('change','#service_type,#min,#max',function () {
									var service_type = $('#service_type').val();
									var serv=$('#service_type option:selected').data('serv');
									var base_url = "<?php echo base_url(); ?>";
									var a = $('#min').val();
									var b = $('#max').val();
									$.ajax({
									url: base_url+'index.php/Admin/service_type',
									type: 'POST',
									data: "service_type=" + service_type +"&a="+a +"&b="+b ,
									success: function(data) {
                        $('.display').html(data);
						$('.display1').html(data);
									}
							        });
                  $.ajax({
                    url:base_url+'index.php/Admin/amount_based',
                    type:'POST',
                    dataType: "json",
                    data:"service_type=" + service_type +"&a="+a +"&b="+b ,
                    success : function(data){
                        $('#total_disp').html(data.total);
						$('#gst_disp').html(data.gst);
						$('#from_date_disp').html("From :"+a);
						$('#to_date_disp').html("To :"+b);
						if(service_type == ''){
							$('#serv_disp').html("Service : All Service");
						}else{
							$('#serv_disp').html("Service :"+serv);
						}
                    }
                  })
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
<?php $this->load->view('include/footer'); ?>