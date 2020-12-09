<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>
            <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Edit Balance Amount Form</h1>
  <a href="<?php echo base_url();?>index.php/View/billing/list_billing" class="d-none d-sm-inline-block btn btn-sm btn-primary btn-grad shadow-sm"><i class="fas fa-add"></i> List Billing</a>
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Add Balance Amount Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url('index.php/admin/Update_all/billing/billing/'.$edit_id.'/edit_billing/list_billing'); ?>" method="post" enctype="multipart/form-data" >
              <div class="box-body">
                <div class="form-group">
                <?php $billing=$this->CI->table_column_get($tablename='billing',$column='id',$val=$edit_id);
                if(count($billing)>0){
                    foreach($billing as $billing_row){ ?>
                    <?php $customer_id=$billing_row['customer_id'];
                     $customer=$this->CI->table_column_get($tablename='customer',$column='id',$val=$customer_id);
                     if(count($customer)>0){
                      foreach($customer as $customer_row){ ?>
                  <label for="inputEmail3" class="col-sm-2 control-label">Customer Name:</label>

                  <div class="col-sm-10">
                    <select type="text" name="customer_id" id="customer_id" class="form-control" id="inputEmail3">            
							<option value="<?php echo $billing_row['customer_id'];?>"><?php echo $customer_row['company_name']; ?></option>
              <?php } } ?>
					</select>
                  </div>
                </div>
                <div class="form-group" style="display:none;">
                  <label for="inputEmail3" class="col-sm-2 control-label">Gst:</label>

                  <div class="col-sm-10">
                    <input type="text" name="gst" id="gst" class="form-control" id="inputEmail3" placeholder="Gst" value="<?php echo $billing_row['gst'];?>">
                  </div>
                </div>
				<div class="form-group" style="display:none;">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="display:none;">>No Of Cylinder:</label>

                  <div class="col-sm-10">
                    <input type="text" name="cylinder_num" id="cylinder_num" class="form-control" id="inputEmail3" placeholder="No.Of.Cylinder"  value="<?php echo $billing_row['cylinder_num'];?>">
                  </div>
                </div>
				<div class="form-group" style="display:none;">>
                  <label for="inputEmail3" class="col-sm-4 control-label">No Of Empty Cylinder:</label>

                  <div class="col-sm-10">
                    <input type="text" name="empty_cylinder_num" id="empty_cylinder_num" class="form-control" id="inputEmail3" placeholder="No.Of.Empty Cylinder"  value="<?php echo $billing_row['empty_cylinder_num'];?>">
                  </div>
                </div>
              <div class="form-group" style="display:none;">>
                  <label for="inputEmail3" class="col-sm-4 control-label">Available Cylinder:</label>

                  <div class="col-sm-10">
                    <input type="text" name="cus_available_cyl" id="cus_available_cyl" class="form-control" id="inputEmail3" placeholder="No.Of.Empty Cylinder"  value="<?php echo $billing_row['cus_available_cyl'];?>">
                  </div>
                </div>
				<div class="form-group" style="display:none;">>
                  <label for="inputEmail3" class="col-sm-2 control-label">Discount:</label>

                  <div class="col-sm-10">
                    <input type="text" name="discount" id="discount" class="form-control" id="inputEmail3" placeholder="Discount"  value="<?php echo $billing_row['discount'];?>">
                  </div>
                </div>
				<div class="form-group" style="display:none;">>
                  <label for="inputEmail3" class="col-sm-2 control-label">Price:</label>

                  <div class="col-sm-10">
                    <input type="text" name="price" id="price" class="form-control" onclick="total_price()" id="inputEmail3" placeholder="Price"  value="<?php echo $billing_row['price'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Due Amount:</label>

                  <div class="col-sm-10">
                    <input type="text" name="" id="balance_amount" class="form-control" id="inputEmail3" placeholder="Paid"  value="<?php echo $billing_row['balance'];?>">
                  </div>
                </div>
                <div class="form-group" style="display:none;">
                  <label for="inputEmail3" class="col-sm-2 control-label">Pay:</label>

                  <div class="col-sm-10">
                    <input type="text" name="pay" id="pay" class="form-control" id="inputEmail3" placeholder="Paid"  value="<?php echo $billing_row['paid'];?>">
                  </div>
                </div>
				<div class="form-group" >
                  <label for="inputEmail3" class="col-sm-2 control-label">Paid:</label>

                  <div class="col-sm-10">
                    <input type="text" name="pay1" id="pay1" class="form-control" id="inputEmail3" placeholder="Paid"  value="">
                  </div>
                </div>
                <div class="form-group" style="display:none;>
                  <label for="inputEmail3" class="col-sm-2 control-label">Paid:</label>

                  <div class="col-sm-10">
                    <input type="text" name="paid" id="paid" class="form-control" id="inputEmail3" placeholder="Paid"  value="">
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Balance:</label>

                  <div class="col-sm-10">
                    <input type="text" name="balance" id="balance" class="form-control" onclick="balance_amount()" id="inputEmail3" placeholder="Balance"  value="">
                  </div>
                </div>
				<div class="form-group" style="display:none;">
                  <label for="inputEmail3" class="col-sm-8 control-label">Name Of Delivery Person:</label>

                  <div class="col-sm-10">
                    <input type="text" name="delivery_person_name" id="delivery_person_name" class="form-control" id="inputEmail3" placeholder="Name Of Delivery Boy"  value="<?php echo $billing_row['delivery_person_name'];?>">
                  </div>
                </div>
                <div class="form-group" >
                  <label for="inputEmail3" class="col-sm-8 control-label">Name Of Cash Collected Person:</label>

                  <div class="col-sm-10">
                    <input type="text" name="cash_collector" id="cash_collector" class="form-control" placeholder="Name Of Cash Collected Person" required>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#pay1').bind('change',function () {
			   var balance_amount=Number($('#balance_amount').val());
               var pay=Number($('#pay').val());
               var paid=Number($('#pay1').val());
               var balance=balance_amount-paid;
               var paid_amount=paid+pay;
         $('#balance').val(balance);
         $('#paid').val(paid_amount);
			});
      $('#pay1').trigger('change');
});
</script>

<?php $this->load->view('include/footer');?>