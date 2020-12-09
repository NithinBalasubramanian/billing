<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Add Purchase</h1>
  <a href="<?php echo base_url();?>View/purchase/list_purchase" class="d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> List purchase</a>
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-12">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Add Purchase</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url('Purchase/purchase/purchase/add_purchase/list_purchase'); ?>" method="post" enctype="multipart/form-data" >
             
              <div class="box-body row">
              <div class="form-group col-md-2">
                <label for="inputEmail3" class="col-sm-12 control-label">Invoice Number :</label>
                  <div class="col-sm-10">
                  <input type="text" name="invoice_no" class="form-control" id="inputEmail3" value="" placeholder="Invoice no" required>
                  </div>
                </div>
                <div class="form-group col-md-3">
                <label for="inputEmail3" class="col-sm-12 control-label">Date :</label>
                  <div class="col-sm-10">
                  <?php $date = date('Y-m-d'); ?>
                  <input type="date" name="date" class="form-control" id="inputEmail3" value="<?php echo $date;?>" required >
                  </div>
                </div>
                <div class="form-group col-md-6">
                </div>
                <div class="form-group col-md-6">
                <label for="inputEmail3" class="col-sm-12 control-label">Area :</label>
                  <div class="col-sm-10">
                  <select type="text" name="" id="area" class="form-control">
                    <option value="">Select Area</option>
                    <?php $area_list=$this->Admin_model->table_column('area');
                    foreach($area_list as $area_list_row){ ?>
                    <option value="<?php echo $area_list_row['id']; ?>"><?php echo $area_list_row['area_name']; ?></option>
                    <?php   } ?>
            	</select> 
                  </div>
                </div>
                <div class="form-group col-md-6">
                 
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-12 control-label">Supplier Name :</label>
                  <div class="col-sm-10">
                  <select type="text" name="supplier_id" id="supplier" class="form-control">
                    <option value="">Select Supplier</option>
                    <?php $customer_list=$this->Admin_model->table_column('supplier');
                    foreach($customer_list as $customer_row){ ?>
                    <option value="<?php echo $customer_row['id']; ?>"><?php echo $customer_row['supplier_name']; ?></option>
                    <?php   } ?>
            	</select>
                  </div>
                </div>
                <div class="form-group col-md-6">
                <label for="inputEmail3" class="col-sm-12 control-label">supplier Number :</label>
                  <div class="col-sm-10">
                   
                  <input type="text" name="" id="" class="form-control sup_number" id="inputEmail3" placeholder="Enter supplier Number" required>
                  </div>
                </div>
                </div>
                <br>
               <div class="table-responsive">
               <table class="table table-bordered table-striped">
                <thead>
                        <tr  class="bg-secondary text-light">
                            <th>S NO</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>HSN CODE</th>
                            <th>Type</th>
                            <th>Rate</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Add</th>
                        </tr>
                </thead>
                <tbody id="tb_next">
                        <tr>
                            <td style="width:80px;"><input type="number" class="form-control forms_1" value="1" readonly><input type="hidden" id="count" value="1"></td>
                            <td><select name="" id="category_1" class="form-control forms_2 category"><option value="">select Category</option>
                            <?php $cat_list=$this->Admin_model->table_column('category'); 
                            foreach($cat_list as $cat_list_row){ ?><option value="<?php echo $cat_list_row['id']; ?>"><?php echo $cat_list_row['category']; ?> </option><?php } ?>
                           </select></td>
                            <td><select name="product_id[]" id="product" class="form-control forms_2 product_1"><option value="">select product</option>
                            <?php $product_list=$this->Admin_model->table_column('product'); 
                            foreach($product_list as $product_row){ ?><option value="<?php echo $product_row['id']; ?>"><?php echo $product_row['product_name']; ?> </option><?php } ?>
                           </select></td>
                           <td style="width:140px;"><input type="text" class="form-control forms hsn_1" ></td>
                           <td style="width:120px;">
                              <select name="type[]" id="" class="qty_type  forms_2 form-control">
                                <option value="box">Box </option>
                                <option value="piece">Piece</option>
                              </select>
                            </td>
                           <td style="width:100px;"><input type="number" class="form-control forms rate_1" name="rate[]" ></td>
                            <td style="width:100px;"><input type="number" class="form-control forms qty" name="qty[]" ></td>
                            <td><input type="number" class="form-control forms price_1" name="price[]" ></td>
                            <td>	<a href="javascript:void(0);" class="addCF col-sm-1">
							 <button type="button" style="" id="btn1" class="btn btn-info btn-flat add"><i class="fa fa-plus-circle" aria-hidden="true"></i>
							 </button> 
						</a></td>
                        </tr>
                </tbody>
                <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td class="text-right;" ><p>Old Due :</p></td>
                        <td><input type="text" name="old_due" id="old_due" class="form-control"></td>
                        <td class="text-right;"><p>Total :</p></td>
                        <td><input type="text" name="total" id="tot" class="form-control"></td>
                        <td class="text-right;"><p>Grand Total :</p></td>
                        <td><input type="hidden" name="" id="grand_hid" class="form-control"><input type="text" name="grand_total" id="grand" class="form-control"></td>
                      </tr>
                      <tr>
                        <td colspan="6"></td>
                        <td>Paid :</td>
                        <td><input type="text" name="paid" id="paid" class="form-control" autocomplete="off"></td>
                      </tr>
                      <tr>
                        <td colspan="6"></td>
                        <td>Due :</td>
                        <td><input type="text" name="due" id="due" class="form-control" autocomplete="off"></td>
                      </tr>
                </tbody>
               </table>
               </div>
                
               <br>
              <!-- /.box-body -->
              
              <div class="container">
              <div class="row justify-content-end">
              <div class="box-footer col-md-3 ">
                <button type="submit" class="btn btn-success btn-sm pull-right" >Submit</button>
              </div>
              </div>
              </div>
              <!-- /.box-footer -->
            </form>
    </div>
  </div>
</div>
</div>
</div>

<?php $this->load->view('include/footer');?>
<script>

 $(document).on('change','#supplier',function(){
    var supplier=$(this).val();
    var base_url = "<?php echo base_url(); ?>";
    $.ajax({
            url: base_url+'Admin/supplier_number',
            type: 'POST',
            dataType: "json",
            data: "supplier=" + supplier ,
            success: function(data) {
                $('.sup_number').val(data.sup_num);
                $('#old_due').val(data.due);
            }
        });
 });
 $(document).on('change','.category',function(){
    var cat_id=$(this).val();
    var base_url = "<?php echo base_url(); ?>";
    var count=Number($('#count').val());
    $.ajax({
            url: base_url+'Admin/cat_products',
            type: 'POST',
            data: "cat_id=" + cat_id ,
            success: function(data) {
                $('.product_'+count).html(data);
            }
        });
 });
 $(document).on('change','#product',function(){
     var product_id=$(this).val();
    var base_url = "<?php echo base_url(); ?>";
    var count=Number($('#count').val());
    $.ajax({
            url: base_url+'Admin/product_detail',
            type: 'POST',
            dataType: "json",
            data: "product_id=" + product_id ,
            success: function(data) {
                $('.hsn_'+count).val(data.hsn_code);
                $('.rate_'+count).val(data.purchase_box);
            }
        });
 });
 $(document).on('keyup','.qty',function(){
    var qty=$(this).val();
    var rate=$(this).parent().prev().children().val();
    var price=qty*rate;
    $(this).parent().next().children().val(price);
    var count=Number($('#count').val());
    var grand=Number($('#grand_hid').val());
    var price=Number($('.price_'+count).val());
    var now_grand=grand+price;
    var old_due=Number($('#old_due').val());
    var tot=now_grand+old_due;
    $('#tot').val(now_grand);
    $('#grand').val(tot);
 });
 $(document).on('keyup','#paid',function(){
    var paid=$(this).val();
    var grand=$("#grand").val();
    var due=grand-paid;
    $('#due').val(due);
 });
 $(document).ready(function(){
			$(".addCF").click(function(){
        var grand=Number($('#grand').val());
        $('#grand_hid').val(grand);
        var count=Number($('#count').val());
        var pres_count=count+1;
				$("#tb_next").append('<tr><td><input type="number" value="'+pres_count+'" class="form-control" readonly></td><td><select name="" id="category_'+pres_count+'" class="form-control category"><option value="">select Category</option><?php $cat_list=$this->Admin_model->table_column('category');foreach($cat_list as $cat_list_row){ ?><option value="<?php echo $cat_list_row['id']; ?>"><?php echo $cat_list_row['category']; ?> </option><?php } ?></select></td><td><select name="product_id[]" id="product" class="form-control product_'+pres_count+'"><option value="">select product</option><?php $product_list=$this->Admin_model->table_column("product");foreach($product_list as $product_row){ ?><option value="<?php echo $product_row["id"]; ?>"><?php echo $product_row["product_name"]; ?> </option><?php } ?></select></td><td><input type="text" class="form-control hsn_'+pres_count+'" ></td><td style="width:120px;"><select name="type[]" id="" class="qty_type  forms_2 form-control"><option value="box">Box </option><option value="piece">Piece</option></select></td><td><input type="number" class="form-control rate_'+pres_count+'" name="rate[]" ></td><td><input type="number" name="qty[]" class="form-control qty"></td><td><input type="number" name="price[]" class="form-control price_'+pres_count+'"></td><td><a href="javascript:void(0);" class="Remove col-sm-1"><button type="button" style="" id="btn1" class="btn btn-danger btn-flat"><i class="fa fa-trash" aria-hidden="true"></i></button> </a></td></tr>');
        $('#count').val(pres_count);
        });
      });	
        	$(document).on('click', "a.Remove", function() { 
            count=Number($('#count').val());
			      $(this).parent().parent().remove();
            $('#count').val(count-1);
		});
    $(document).on('change','#area',function(){
      var area_id=$(this).val();
      var base_url = "<?php echo base_url(); ?>";
        $.ajax({
                url: base_url+'Admin/area_sup',
                type: 'POST',
                data: "area_id=" + area_id ,
                success: function(data) {
                    $('#supplier').html(data);
                }
            });
    });
    $(document).on('keyup','.box',function(){
      var box_no=Number($(this).val());
      var box_pieces=Number($(this).prev().val());
      var qty=box_no*box_pieces;
      var rate=$(this).parent().prev().children().val();
    var price=qty*rate;
    $(this).parent().next().next().children().val(price);
    var count=Number($('#count').val());
    var grand=Number($('#grand_hid').val());
    var price=Number($('.price_'+count).val());
    var now_grand=grand+price;
    var old_due=Number($('#old_due').val());
    var tot=now_grand+old_due;
    $('#tot').val(now_grand);
    $('#grand').val(tot);
      $(this).parent().next().children().val(qty);
    });

    $(document).on('change','.qty_type',function(){
      var type=$(this).val();
      var product_id=$(this).parent().prev().prev().children().val();
      var base_url = "<?php echo base_url(); ?>";
      var count=Number($('#count').val());
      if(type=='box'){
        $.ajax({
                url: base_url+'Admin/purchase_box_price',
                type: 'POST',
                dataType: "json",
                data: "product_id=" + product_id ,
                success: function(data) {
                    $('.rate_'+count).val(data.rate_box);
                }
            });
      }else{
        $.ajax({
                url: base_url+'Admin/purchase_box_price',
                type: 'POST',
                dataType: "json",
                data: "product_id=" + product_id ,
                success: function(data) {
                    $('.rate_'+count).val(data.rate);
                }
            });
      }
    });
</script>



