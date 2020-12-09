<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>
            <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Add Billing</h1>
  <a href="<?php echo base_url();?>index.php/View/billing/list_billing" class="d-none d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> List Billing</a>
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Add Billing Form</h6>
      
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url('index.php/Insert/billing/billing/add_billing/list_billing'); ?>" method="post" enctype="multipart/form-data" >
<div class="box-body">
                <div class="form-group">
                
                  <label for="inputEmail3" class="col-sm-2 control-label">Company Name:</label>

                  <div class="col-sm-10">
                    <select type="text" name="customer_id" id="customer_id" class="form-control" id="inputEmail3">
                    <option value="">Select Customer</option>
            <?php $customer=$this->CI->table_column($tablename='customer');
            foreach($customer as $c_row){ ?>
							<option value="<?php echo $c_row['id'];?>"><?php echo $c_row['company_name']; ?></option>
              <?php } ?>
					</select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Gst:</label>

                  <div class="col-sm-10">
                    <input type="text" name="gst" id="gst" class="form-control" id="inputEmail3" placeholder="Gst">
                  </div>
                </div>
                <?php $price=$this->CI->table_column_get($tablename='price',$column='id',$val=2);
                if(count($price)>0){
                    foreach($price as $price_row){ ?>
                    <input id="price_cylinder" style="display:none;" value="<?php echo $price_row['price'];?>">
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No Of Cylinder:</label>
                  <div class="col-sm-10">
                    <input type="text" name="cylinder_num" id="cylinder_num" class="form-control" id="no_cylinder" placeholder="No.Of.Cylinder" required>
                  </div>
                </div>
                    <?php } } ?>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">No Of Empty Cylinder:</label>

                  <div class="col-sm-10">
                    <input type="text" name="empty_cylinder_num" id="empty_cylinder_num" class="form-control" id="inputEmail3" placeholder="No.Of.Empty Cylinder">
                  </div>
                </div>
                <input type="text" id="available" style="display:none;">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Available Cylinder:</label>

                  <div class="col-sm-10">
                    <input type="text" name="cus_available_cyl" id="cus_available_cylinder"  class="form-control" id="inputEmail3" placeholder="No.Of.Available Cylinder">
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Discount:</label>

                  <div class="col-sm-10">
                    <input type="text" name="discount" id="discount" class="form-control" id="discount" placeholder="Discount" required>
                  </div>
                </div>
                <input type="text" id="balance_amo" style="display:none;">
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Price:</label>

                  <div class="col-sm-10">
                    <input type="text" name="" id="price1" class="form-control" onclick="total_price()"  placeholder="Price" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Price Including Balance:</label>

                  <div class="col-sm-10">
                    <input type="text" name="price" id="price" class="form-control"  placeholder="Price Including Due" required>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Paid:</label>

                  <div class="col-sm-10">
                    <input type="text" name="paid" id="paid" class="form-control" " placeholder="Paid"  required>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Balance:</label>

                  <div class="col-sm-10">
                    <input type="text" name="balance" id="balance" class="form-control" onclick="balance_amount()"  placeholder="Balance" required>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-8 control-label">Name Of Delivery Person:</label>

                  <div class="col-sm-10">
                    <input type="text" name="delivery_person_name" id="delivery_person_name" class="form-control" placeholder="Name Of Delivery Boy" required>
                  </div>
                </div>
                <div class="form-group" style="display:none;">
                  <label for="inputEmail3" class="col-sm-8 control-label">Name Of Cash Collected Person:</label>

                  <div class="col-sm-10">
                    <input type="text" name="cash_collector" id="cash_collector" class="form-control" placeholder="Name Of Cash Collected Person" >
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script>
 $(document).ready(function(){
  $('#customer_id').bind('change', function(){
			   var customer_id = $(this).val();
				var base_url = "<?php echo base_url(); ?>";
				$.ajax({
					url: base_url+'index.php/Admin/available_cus_cylinder',
					type: 'POST',
		      dataType: 'json',
					data: "customer_id=" + customer_id,
					success: function(data) {
						$('#cus_available_cylinder').val(data.avail_cyl);
            $('#balance_amo').val(data.balance);
					}
        });
			});
    $('#customer_id').trigger('change');
    $('#empty_cylinder_num').bind('change',function () {
        var cylinder_num=Number($('#cylinder_num').val());
			   var empty_cylinder=Number($('#empty_cylinder_num').val());
         var available=Number($('#cus_available_cylinder').val());
         var remaining=(available+cylinder_num)-empty_cylinder;
         $('#cus_available_cylinder').val(remaining);
			});
      $('#empty_cylinder_num').trigger('change');
 });
</script>
<script>
function total_price(){
  var cyl_price=Number(document.getElementById('price_cylinder').value);
  var cylinder_num=Number(document.getElementById('cylinder_num').value);
  var discount=Number(document.getElementById('discount').value);
  var balance=Number(document.getElementById('balance_amo').value);
  var total_amount=(cyl_price*cylinder_num)-discount;
  document.getElementById('price1').value=total_amount;
  document.getElementById('price').value=(total_amount+balance);
}
function balance_amount(){
  var total_price=Number(document.getElementById('price').value);
  var paid=Number(document.getElementById('paid').value);
  var balance=total_price-paid;
  document.getElementById('balance').value=balance;
}
</script>

<?php $this->load->view('include/footer');?>

<script>
    $(document).ready(function(){
      var base_url="<?php echo base_url(); ?>";
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:base_url+'index.php/Admin/search?key=%QUERY'
    });
});
    </script>