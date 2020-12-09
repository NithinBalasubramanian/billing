<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Empty Cylinder Collection Table</h1>
 
 </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">List Empty Cylinder Collection Table</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped table-hover" >
                <thead>
                <tr class="bg-secondary text-light">
                  <th>Customer Name</th>
                  <th>Customer Contact</th>
                  <th>GST</th>
                  <th>No Of Cylinder</th>
                  <th>Price</th>
                  <th>No Of Empty Cylinder</th>
                  <th>Available Cylinder</th>
                  <th>Amount Paid</th>
                  <th>Balance Amount</th>
                  <th>Delivery Person Name</th> 
                  <th>Cash Collector Name</th> 
                  <th>Collect</th>
                  <?php  $this->load->library('session');
      $data=$_SESSION['admin'];
      if($data=='admin'||$data=='sub_admin'){
      ?>
                   <th>Action</th>
      <?php } ?>
                  <th>Date Created</th>
                </tr>
                </thead>
                <tbody>
               
               <?php $i=1;
               $customer=$this->CI->table_column($tablename='customer');
               if(count($customer)){
                   foreach($customer as $customer_row){
                       ?>
                       <tr>
                       <td><?php echo $i; ?></td>
                       <td><?php echo $customer_row['company_name']; ?></td>
                       <td></td>
                       <?php $billing=$this->CI->table_column_get_limit($tablename='billing',$column='customer_id',$val=$customer_row['id']); 
                       if(count($billing)){
                           foreach($billing as $billing_row){ ?>
                       <td><?php echo $billing_row['cylinder_num']; ?></td>
                       <td><?php echo $billing_row['price']; ?></td>
                       <td><?php echo $billing_row['empty_cylinder_num']; ?></td>
                       <td><?php echo $billing_row['cus_available_cyl']; ?></td>
                       <td><?php echo $billing_row['paid']; ?></td>
                       <td><?php echo $billing_row['balance']; ?></td>
                       <td><?php echo $billing_row['delivery_person_name']; ?></td>
                       <td><?php echo $billing_row['cash_collector']; ?></td>
                       <td><a href="<?php echo base_url();?>index.php/View/billing/pay_empty/<?php echo $billing_row['id'];?>" class="btn btn-sm btn-success">Collect</a></td>
                       <?php  $this->load->library('session');
      $data=$_SESSION['admin'];
      if($data=='admin'||$data=='sub_admin'){
      ?>
                       <td><a href="<?php echo base_url();?>index.php/View/billing/edit_billing/<?php  $billing_row['id'];?>" class=""><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:20px;"></i></a><br>
                  <a href="<?php echo base_url();?>index.php/Admin/delete/billing/billing/<?php echo $billing_row['id'];?>/list_billing" class=""><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;"></i></a></td>
      <?php } ?>
                  <td><?php echo  date("d-m-Y", strtotime($billing_row["date_created"])); ?></td>
                   </tr>
                           <?php  } } $i++;  }
               } ?>
              
                </tbody>
              </table>
    </div>
    </div>
  </div>
</div>

</div>

</div>
<?php $this->load->view('include/footer');?>
