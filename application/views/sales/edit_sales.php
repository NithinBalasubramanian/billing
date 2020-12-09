<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Add Order</h1>
  <a href="<?php echo base_url();?>index.php/View/sales/list_sales" class="d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> List Order</a>
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-12">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Add Order</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url('Sales_update/sales/sales/add_sales/list_sales'); ?>" method="post" enctype="multipart/form-data" >
            <?php $edit_data=$this->Admin_model->table_column('sales','id',$edit_id);
            foreach($edit_data as $edit_row){ ?>
            <div class="box-body row">
              <div class="form-group col-md-2">
                <label for="inputEmail3" class="col-sm-12 control-label">Invoice Number :</label>
                  <div class="col-sm-10">
                  <input type="text" name="invoice_no" class="form-control" id="inputEmail3" value="<?php echo $edit_row['invoice_no']; ?>" required>
                  </div>
                </div>
                <div class="form-group col-md-3">
                <label for="inputEmail3" class="col-sm-12 control-label">Date :</label>
                  <div class="col-sm-10">
                  <input type="date" name="date" class="form-control" id="inputEmail3" value="<?php echo $edit_row['date_created'];?>" required >
                  </div>
                </div>
                <div class="form-group col-md-6">
                </div>
                <div class="form-group col-md-6">
                <label for="inputEmail3" class="col-sm-12 control-label">Area :</label>
                  <div class="col-sm-10">
                  <select type="text" name="area_id" id="area" class="form-control">
                    <?php $area_list=$this->Admin_model->table_column('area','id',$edit_row['area_id']);
                    foreach($area_list as $area_list_row){ ?>
                    <option value="<?php echo $area_list_row['id']; ?>"><?php echo $area_list_row['area_name']; ?></option>
                    <?php   } ?>
            	</select> 
                  </div>
                </div>
                <div class="form-group col-md-6">
                <label for="inputEmail3" class="col-sm-12 control-label">Salesperson :</label>
                  <div class="col-sm-10">
                  <select type="text" name="saler_id" id="saler_id" class="form-control">
                    <?php $emp_list=$this->Admin_model->table_column('employee','id',$edit_row['saler_id']);
                    foreach($emp_list as $emp_list_row){ ?>
                    <option value="<?php echo $emp_list_row['id']; ?>"><?php echo $emp_list_row['employee_name']; ?></option>
                    <?php   } ?>
            	</select> 
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-12 control-label">Consumer Name :</label>
                  <div class="col-sm-10">
                  <select type="text" name="customer_id" id="customer" class="form-control">
                    <?php $customer_list=$this->Admin_model->table_column('customer','id',$edit_row['customer_id']);
                    foreach($customer_list as $customer_row){
                        $cus_no=$customer_row['contact'];
                        $due=$customer_row['due']; ?>
                    <option value="<?php echo $customer_row['id']; ?>"><?php echo $customer_row['customer_name']; ?></option>
                    <?php   } ?>
            	</select>
                  </div>
                </div>
                <div class="form-group col-md-6">
                <label for="inputEmail3" class="col-sm-12 control-label">Consumer Number :</label>
                  <div class="col-sm-10">
                  <input type="text" name="" id="" class="form-control cus_number" id="inputEmail3" placeholder="Enter Consumer Number" value="<?php echo  $cus_no; ?>" required>
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
                <?php $salles_detail=$this->Admin_model->table_column('sales_details','invoice_no',$edit_row['invoice_no']);
                $i=1;
                $edit_count=count($salles_detail);
                    foreach($salles_detail as $detail_row){ ?>
                        <tr>
                            <td style="width:80px;"><input type="number" class="form-control forms_1" value="<?php echo $i; ?>" readonly><input type="hidden" name="id[]" value="<?php echo $detail_row['id'];?>"></td>
                            <td><select name="" id="category_<?php echo $i; ?>" class="form-control forms_2 category"><option value="">select Category</option>
                            <?php $cat_list=$this->Admin_model->table_column('category'); 
                            foreach($cat_list as $cat_list_row){ ?><option value="<?php echo $cat_list_row['id']; ?>"><?php echo $cat_list_row['category']; ?> </option><?php } ?>
                           </select></td>
                           <td><select name="product_id[]" id="product" class="form-control forms_2 product_<?php echo $i; ?>">
                            <?php $product_list=$this->Admin_model->table_column('product','id',$detail_row['product_id']); 
                            foreach($product_list as $product_row){ $hsn=$product_row['hsn_code'];?><option value="<?php echo $product_row['id']; ?>"><?php echo $product_row['product_name']; ?> </option><?php } ?>
                           </select></td>
                           <td style="width:120px;"><input type="text" class="form-control forms hsn_<?php echo $i; ?>" value="<?php echo $hsn;?>" ></td>
                           <td style="width:120px;">
                              <select name="type[]" id="" class="qty_type  forms_2 form-control">
                              <?php if($detail_row['type'] == 'piece'){ ?>
                                <option value="piece">Piece</option>
                              <?php }else{ ?>
                                <option value="box">Box </option>
                              <?php } ?>
                              </select>
                            </td>
                            <td style="width:130px;"><input type="number" class="form-control forms rate_<?php echo $i; ?>" name="rate[]" value="<?php echo $detail_row['rate']; ?>" ></td>
                            <td style="width:100px;"><input type="hidden" value="<?php echo $i; ?>"><input type="number" class="form-control forms qty" name="qty[]" value="<?php echo $detail_row['quantity']; ?>" ></td>
                            <td><input type="hidden" class="form-control forms " id="price_<?php echo $i; ?>" value="<?php echo $detail_row['price']; ?>" ><input type="number" class="form-control forms price_<?php echo $i; ?>" name="price[]" value="<?php echo $detail_row['price']; ?>" ></td>
                            <td><a href="javascript:void(0);" class="Remove_1 col-sm-1" data-id="<?php echo $detail_row['id']; ?>"><button type="button" style="" id="btn1" class="btn btn-danger btn-flat"><i class="fa fa-trash" aria-hidden="true"></i></button> </a></td>
                        </tr>
                    <?php $i++; } ?>
                        <tr>
                            <td style="width:80px;"><input type="hidden" id="edit_count" value="<?php echo $edit_count; ?>"><input type="hidden" id="count" value="<?php echo $i-1; ?>"></td>
                            <td></td>
                            <td></td>
                           <td style="width:120px;"></td>
                           <td style="width:120px;">
                              
                            </td>
                           <td style="width:130px;"></td>
                            <td style="width:100px;"></td>
                            <td></td>
                            <td>	<a href="javascript:void(0);" class="addCF col-sm-1">
							 <button type="button" style="" id="btn1" class="btn btn-info btn-flat add"><i class="fa fa-plus-circle" aria-hidden="true"></i>
							 </button> 
						</a></td>
                        </tr>
                </tbody>
                <tbody>
                      <tr>
                        <td></td>
                        <td colspan="3"></td>
                        <td class="text-right;"><p>Total :</p></td>
                        <td><input type="text" name="total" id="tot" class="form-control" value="<?php $grand=$due+$edit_row['total'];echo $edit_row['total']; ?>"></td>
                        <td class="text-right;"><p>Grand Total :</p></td>
                        <td><input type="hidden" name="" id="grand_hid" value="<?php echo $edit_row['total']; ?>" class="form-control"><input type="text" name="grand_total" id="grand" value="<?php echo $grand; ?>" class="form-control"></td>
                      </tr>
                      <tr>
                        <td colspan="4"></td>
                        <td class="text-right;" ><p>Old Due :</p></td>
                        <td><input type="text" name="old_due" id="old_due" class="form-control" value="<?php echo $due; ?>"></td>
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
                    <?php } ?>
            </form>
    </div>
  </div>
</div>
</div>
</div>

<?php $this->load->view('include/footer');?>
<script>

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
                $('.rate_'+count).val(data.rate);
                $('.box_qty_'+count).val(data.box_qty);
            }
        });
 });
 $(document).on('keyup','.qty',function(){
    var qty=$(this).val();
    var rate=$(this).parent().prev().children().val();
    var count=Number($(this).prev().val());
    var edit_count=Number($('#edit_count').val());
    var grand=Number($('#grand_hid').val());
    var prev_price=Number($('#price_'+count).val());
    var grand=grand-prev_price;
    var price=qty*rate;
    $(this).parent().next().children().val(price);
    var price=Number($('.price_'+count).val());
    var now_grand=grand+price;
    var old_due=Number($('#old_due').val());
    var tot=now_grand+old_due;
    $('#tot').val(now_grand);
    $('#grand_hid').val(now_grand)
    $('#grand').val(tot);
 });
 $(document).on('keyup','#paid',function(){
    var paid=$(this).val();
    var grand=$("#old_due").val();
    var due=grand-paid;
    $('#due').val(due);
 });
 $(document).ready(function(){
			$(".addCF").click(function(){
        var grand=Number($('#grand').val());
        $('#grand_hid').val(grand);
        var count=Number($('#count').val());
        var pres_count=count+1;
				$("#tb_next").append('<tr><td><input type="number" value="'+pres_count+'" class="form-control" readonly></td><td><select name="" id="category_'+pres_count+'" class="form-control category"><option value="">select Category</option><?php $cat_list=$this->Admin_model->table_column('category');foreach($cat_list as $cat_list_row){ ?><option value="<?php echo $cat_list_row['id']; ?>"><?php echo $cat_list_row['category']; ?> </option><?php } ?></select></td><td><select name="product_id[]" id="product" class="form-control product_'+pres_count+'"><option value="">select product</option><?php $product_list=$this->Admin_model->table_column("product");foreach($product_list as $product_row){ ?><option value="<?php echo $product_row["id"]; ?>"><?php echo $product_row["product_name"]; ?> </option><?php } ?></select></td><td><input type="text" class="form-control hsn_'+pres_count+'" ></td><td style="width:120px;"><select name="type[]" id="" class="qty_type  forms_2 form-control"><option value="piece">Piece</option><option value="box">Box </option></select></td><td><input type="number" class="form-control rate_'+pres_count+'" name="rate[]" ></td><td><input type="hidden" value="'+pres_count+'"><input type="number" name="qty[]" class="form-control qty"></td><td><input type="number" name="price[]" class="form-control price_'+pres_count+'" id="price_'+pres_count+'"></td><td><a href="javascript:void(0);" class="Remove col-sm-1"><button type="button" style="" id="btn1" class="btn btn-danger btn-flat"><i class="fa fa-trash" aria-hidden="true"></i></button> </a></td></tr>');
        $('#count').val(pres_count);
        });
      });	
    $(document).on('click', "a.Remove", function() { 
            var price=$(this).parent().prev().children().val();
            var grand=Number($('#grand').val());
            var grand_total=grand-price;
            var total_then= $('#tot').val();
            var total=total_then-price;
            $('#tot').val(total);
            $('#grand').val(grand_total);
            $('#grand_hid').val(grand_total);
            count=Number($('#count').val());
			      $(this).parent().parent().remove();
            $('#count').val(count-1);
    });
    $(document).on('click', "a.Remove_1", function() { 
      var id=$(this).data('id');
      var base_url = "<?php echo base_url(); ?>";
      var price=$(this).parent().prev().children().val();
            var grand=Number($('#grand').val());
            var grand_total=grand-price;
            var total_then= $('#tot').val();
            var total=total_then-price;
            count=Number($('#count').val());
            $('#tot').val(total);
            $('#grand').val(grand_total);
            $('#grand_hid').val(grand_total);
      $.ajax({
                url: base_url+'Admin/sales_detail_remove',
                type: 'POST',
                dataType: "json",
                data: "id=" + id ,
                success: function(data) {
                }
            });
            $(this).parent().parent().remove();
            $('#count').val(count-1);
    });
    $(document).on('change','#area',function(){
      var area_id=$(this).val();
      var base_url = "<?php echo base_url(); ?>";
        $.ajax({
                url: base_url+'Admin/area_cus',
                type: 'POST',
                data: "area_id=" + area_id ,
                success: function(data) {
                    $('#customer').html(data);
                }
            });
    });
    $(document).on('change','.qty_type',function(){
      var type=$(this).val();
      var product_id=$(this).parent().prev().prev().children().val();
      var base_url = "<?php echo base_url(); ?>";
      var count=Number($('#count').val());
      if(type=='box'){
        $.ajax({
                url: base_url+'Admin/box_price',
                type: 'POST',
                dataType: "json",
                data: "product_id=" + product_id ,
                success: function(data) {
                    $('.rate_'+count).val(data.rate_box);
                }
            });
      }else{
        $.ajax({
                url: base_url+'Admin/box_price',
                type: 'POST',
                dataType: "json",
                data: "product_id=" + product_id ,
                success: function(data) {
                    $('.rate_'+count).val(data.rate);
                }
            });
      }

    //   var box_no=Number($(this).val());
    //   var box_pieces=Number($(this).prev().val());
    //   var qty=box_no*box_pieces;
    //   var rate=$(this).parent().prev().children().val();
    // var price=qty*rate;
    // $(this).parent().next().next().children().val(price);
    // var count=Number($('#count').val());
    // var grand=Number($('#grand_hid').val());
    // var price=Number($('.price_'+count).val());
    // var now_grand=grand+price;
    // var old_due=Number($('#old_due').val());
    // var tot=now_grand+old_due;
    // $('#tot').val(now_grand);
    // $('#grand').val(tot);
    //   $(this).parent().next().children().val(qty);
    });
</script>



