<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>
<style>
@media print {
    html, body{
        width:210mm;
        height:297mm;
    }
	th, td{
		-webkit-print-color-adjust: exact; 
		font-size:12px;
	}
	p {
	margin-bottom: 0rem;
	}
    
}
</style>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Purchase Bill</h1>
  <a href="<?php echo base_url();?>View/purchase/list_purchase" class="d-none d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> List purchase</a>
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-12">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Purchase Bill</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
   <div id="page_pdf" style="width:100%;height:auto;">
   <div class="bill" style="width:100%;height:100%;border:2px solid black;">
   <div class="bill_head" style="width:100%;height:auto;">
   <div class="img row" style="width:100%;height:160px;margin-top:20px;">
        <div class="gas_img col-md-5 text-center" >
        <!-- <img src="<?php echo base_url(); ?>/assets/img/gas.jpg" alt="" width="100%" height="100px"> -->
        <h4><b>AMJ Traders</b>(Consumer Copy)</h4>
            <p>Tc/7/205,Kottayammukku,Vellappally<br>Naruvamoodu po,Pin 695528 <br>Phone : 7610830039</p>
        </div>
        <div class="col-md-5 text-right"> <h5 style="margin-top:30px;"><b>GST INVOICE</b></h5></div>
        <div class="col-md-2 text-center">
           
        </div>
		<div class="col-md-12 text-center">GSTIN : 32DENPM4213M1ZC</div>
    </div>
    <div class="cus_detail" style="width:100%;height:auto;border-top:2px solid black;border-bottom:solid 2px black;">
    <div class="container" style="padding-top:10px;padding-bottom:10px;">
    <?php $sales_bill =$this->Admin_model->table_column($tablename='purchase',$column='invoice_no',$val=$invoice);
    if(count($sales_bill)>0){
        foreach($sales_bill as $sales_bill_row){
            $date=$sales_bill_row['date_created'];
            $grand_total=$sales_bill_row['grand_total'];
            $paid=$sales_bill_row['paid'];
            $old_due=$sales_bill_row['old_due'];
            $total=$sales_bill_row['total'];
    }
} ?>
    
        <div class="row">
            <div class="col-md-6">Ivoice No : <?php echo $sales_bill_row['invoice_no']; ?></div>
            <?php $cus=$this->Admin_model->table_column('supplier','id',$sales_bill_row['supplier_id']);
            foreach($cus as $cus_row){ 
                $cus_name=$cus_row['supplier_name'];
                $cus_phone=$cus_row['supplier_contact'];
                $due=$cus_row['due'];
            } ?>
            <div class="col-md-6">Supplier Name : <?php echo strtoupper($cus_name); ?></div>
        </div>
        <!-- <div class="row">
            <div class="col-md-12">Customer No : <?php echo $cus_row['id']; ?></div>
        </div> -->
        <div class="row">
            <div class="col-md-6">Date : <?php echo $newDate = date("d-m-Y", strtotime($date)); ?></div>
            <div class="col-md-6">Supplier Number : <?php echo $cus_phone; ?></div>
        </div>
        </div>
    </div>
   </div>
   <div class="bill_cont" style="width:100%;height:auto;margin-bottom:20px;padding-bottom:20px;border-bottom:2px solid black;">
   <div class="container" style="padding-top:20px;">
   <div class="bill_table">
    <table class="table table-bordered" >
    <thead>
        <tr>
            <th>S.NO</th>
            <th>Product</th>
            <th>Type</th>
            <th>Quantity</th>
            <th>Rate</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php
        $i=1;
        $saled_list=$this->Admin_model->table_column('purchase_details',$column='invoice_no',$val=$invoice);
        if(count($saled_list)>0){
        foreach($saled_list as $saled_list_row){
            ?>
            <td><?php echo $i; ?></td>
            <?php $product_name=$this->Admin_model->table_column('product',$column='id',$val=$saled_list_row['product_id']);
        if(count($product_name)>0){
        foreach($product_name as $product_name_row){ ?>
           <td><?php echo $product_name_row['product_name']; ?></td>
        <?php } } ?>
           <td><?php echo $saled_list_row['type']; ?></td>
           <td><?php echo $saled_list_row['qty']; ?></td>
           <td><?php echo $saled_list_row['rate']; ?></td>
           <td><?php echo $saled_list_row['price']; ?></td>
        </tr>
<?php $i++;  } } ?>
        <tr>
            <td colspan="3"></td>
            <td>Old due : <?php echo $old_due; ?></td>
            <td>Total :</td>
            <td><?php echo $total; ?></td>
        </tr>
        <tr>
            <td colspan="4" rowspan="3">Amount in words :
            <?php
                                $number =  $grand_total; 
                                $no = round($number);
                                $point = round($number - $no, 2) * 100;
                                $hundred = null;
                                $digits_1 = strlen($no);
                                $i = 0;
                                $str = array();
                                $words = array('0' => '', '1' => 'One', '2' => 'Two',
                                '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
                                '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
                                '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
                                '13' => 'Thirteen', '14' => 'Fourteen',
                                '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
                                '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
                                '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
                                '60' => 'Sixty', '70' => 'Seventy',
                                '80' => 'Eighty', '90' => 'Ninety');
                                $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
                                while ($i < $digits_1) {
                                    $divider = ($i == 2) ? 10 : 100;
                                    $number = floor($no % $divider);
                                    $no = floor($no / $divider);
                                    $i += ($divider == 10) ? 1 : 2;
                                    if ($number) {
                                    $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                                    $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                                    $str [] = ($number < 21) ? $words[$number] .
                                        " " . $digits[$counter] . $plural . " " . $hundred
                                        :
                                        $words[floor($number / 10) * 10]
                                        . " " . $words[$number % 10] . " "
                                        . $digits[$counter] . $plural . " " . $hundred;
                                    } else $str[] = null;
                                }
                                $str = array_reverse($str);
                                $result = implode('', $str);
                                echo $number_val =  $result . "Rupees Only";

                            ?>

                                                </td>
            <td colspan="">Grand Total </td>
            <td><?php echo $grand_total; ?>.00</td>
        </tr>
        <tr>
            <td colspan="">Paid</td>
            <td><b><?php echo ($paid); ?>.00</b></td>
        </tr>
        <tr>
            <td colspan="">Due</td>
            <td><b><?php echo ($due); ?>.00</b></td>
        </tr>
        <tr>
            <td colspan="2"><div style="height:60px;width:100%;">Consumer Signature</div></td>
            <td colspan="4"><div style="height:60px;width:100%;">For AMJ Traders</div></td>
        </tr>
    </tbody>
    </table>
   </div>
   </div>
   </div>
   <div class="bill_head" style="width:100%;height:auto;">
   <div class="img row" style="width:100%;height:160px;margin-top:20px;">
   <div class="gas_img col-md-5 text-center" >
        <!-- <img src="<?php echo base_url(); ?>/assets/img/gas.jpg" alt="" width="100%" height="100px"> -->
        <h4><b>AMJ Traders</b>(Consumer Copy)</h4>
            <p>Tc/7/205,Kottayammukku,Vellappally<br>Naruvamoodu po,Pin 695528 <br>Phone : 7610830039</p>
        </div>
        <div class="col-md-5 text-right"> <h5 style="margin-top:30px;"><b>GST INVOICE</b></h5></div>
        <div class="col-md-2 text-center">
           
        </div>
		<div class="col-md-12 text-center">GSTIN : 32DENPM4213M1ZC</div>
    </div>
    <div class="cus_detail" style="width:100%;height:auto;border-top:2px solid black;border-bottom:solid 2px black;">
    <div class="container" style="padding-top:10px;padding-bottom:10px;">
    <?php $sales_bill =$this->Admin_model->table_column($tablename='purchase',$column='invoice_no',$val=$invoice);
    if(count($sales_bill)>0){
        foreach($sales_bill as $sales_bill_row){
            $date=$sales_bill_row['date_created'];
            $grand_total=$sales_bill_row['grand_total'];
            $paid=$sales_bill_row['paid'];
            $old_due=$sales_bill_row['old_due'];
            $total=$sales_bill_row['total'];
    }
} ?>
    
        <div class="row">
            <div class="col-md-6">Ivoice No : <?php echo $sales_bill_row['invoice_no']; ?></div>
            <?php $cus=$this->Admin_model->table_column('customer','id',$sales_bill_row['supplier_id']);
            foreach($cus as $cus_row){ 
                $cus_name=$cus_row['customer_name'];
                $cus_phone=$cus_row['contact'];
                $due=$cus_row['due'];
            } ?>
            <div class="col-md-6">Supplier Name : <?php echo strtoupper($cus_name); ?></div>
        </div>
        <!-- <div class="row">
            <div class="col-md-12">Customer No : <?php echo $cus_row['id']; ?></div>
        </div> -->
        <div class="row">
            <div class="col-md-6">Date : <?php echo $newDate = date("d-m-Y", strtotime($date)); ?></div>
            <div class="col-md-6">Supplier Number : <?php echo $cus_phone; ?></div>
        </div>
        </div>
    </div>
   </div>
   <div class="bill_cont" style="width:100%;height:auto;margin-bottom:20px;padding-bottom:20px;border-bottom:2px solid black;">
   <div class="container" style="padding-top:20px;">
   <div class="bill_table">
    <table class="table table-bordered" >
    <thead>
        <tr>
            <th>S.NO</th>
            <th>Product</th>
            <th>Type</th>
            <th>Quantity</th>
            <th>Rate</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php
        $i=1;
        $saled_list=$this->Admin_model->table_column('purchase_details',$column='invoice_no',$val=$invoice);
        if(count($saled_list)>0){
        foreach($saled_list as $saled_list_row){
            ?>
            <td><?php echo $i; ?></td>
            <?php $product_name=$this->Admin_model->table_column('product',$column='id',$val=$saled_list_row['product_id']);
        if(count($product_name)>0){
        foreach($product_name as $product_name_row){ ?>
           <td><?php echo $product_name_row['product_name']; ?></td>
        <?php } } ?>
           <td><?php echo $saled_list_row['type']; ?></td>
           <td><?php echo $saled_list_row['qty']; ?></td>
           <td><?php echo $saled_list_row['rate']; ?></td>
           <td><?php echo $saled_list_row['price']; ?></td>
        </tr>
<?php $i++;  } } ?>
        <tr>
            <td colspan="3"></td>
            <td>Old due : <?php echo $old_due; ?></td>
            <td>Total :</td>
            <td><?php echo $total; ?></td>
        </tr>
        <tr>
            <td colspan="4" rowspan="3">Amount in words :
            <?php
                                $number =  $grand_total; 
                                $no = round($number);
                                $point = round($number - $no, 2) * 100;
                                $hundred = null;
                                $digits_1 = strlen($no);
                                $i = 0;
                                $str = array();
                                $words = array('0' => '', '1' => 'One', '2' => 'Two',
                                '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
                                '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
                                '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
                                '13' => 'Thirteen', '14' => 'Fourteen',
                                '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
                                '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
                                '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
                                '60' => 'Sixty', '70' => 'Seventy',
                                '80' => 'Eighty', '90' => 'Ninety');
                                $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
                                while ($i < $digits_1) {
                                    $divider = ($i == 2) ? 10 : 100;
                                    $number = floor($no % $divider);
                                    $no = floor($no / $divider);
                                    $i += ($divider == 10) ? 1 : 2;
                                    if ($number) {
                                    $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                                    $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                                    $str [] = ($number < 21) ? $words[$number] .
                                        " " . $digits[$counter] . $plural . " " . $hundred
                                        :
                                        $words[floor($number / 10) * 10]
                                        . " " . $words[$number % 10] . " "
                                        . $digits[$counter] . $plural . " " . $hundred;
                                    } else $str[] = null;
                                }
                                $str = array_reverse($str);
                                $result = implode('', $str);
                                echo $number_val =  $result . "Rupees Only";

                            ?>

                                                </td>
            <td colspan="">Grand Total </td>
            <td><?php echo $grand_total; ?>.00</td>
        </tr>
        <tr>
            <td colspan="">Paid</td>
            <td><b><?php echo ($paid); ?>.00</b></td>
        </tr>
        <tr>
            <td colspan="">Due</td>
            <td><b><?php echo ($due); ?>.00</b></td>
        </tr>
        <tr>
            <td colspan="2"><div style="height:60px;width:100%;">Consumer Signature</div></td>
            <td colspan="4"><div style="height:60px;width:100%;">For AMJ Traders</div></td>
        </tr>
    </tbody>
    </table>
   </div>
   </div>
   </div>
   </div>
   </div>
   <br>
   <div class="form-group row">
                        <div class="col-md-6 offset-md-3">
                           <span href="" class="btn btn-success" style="float:right;" onclick="printDiv('page_pdf')"><i class="fa fa-print" aria-hidden="true"></i>  PRINT</span>
                        </div>
                      </div>
    </div>
  </div>
</div>
</div>
</div>
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
 