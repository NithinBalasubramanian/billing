<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List Billing </h1>
  <a href="<?php echo base_url();?>index.php/View/billing/add_billing" class="d-none d-sm-inline-block btn btn-sm btn-primary btn-grad shadow-sm"><i class="fas fa-add"></i> Add Billing</a>
 </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">List Billing Table</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr class="bg-secondary text-light">
                  <th>Customer Name</th>
                  <th>Customer Contact</th>
                  <th>GST</th>
                  <th>No Of Cylinder</th>
                  <th>Discount</th>
                  <th>Price</th>
                  <th>No Of Empty Cylinder</th>
                  <th>Available Cylinder</th>
                  <th>Amount Paid</th>
                  <th>Balance Amount</th>
                  <th>Delivery Person Name</th> 
                  <th>Cash Collector Name</th> 
                  <th>Pay</th>
                  <th>Action</th>
                  <th>Date Created</th>
                </tr>
                </thead>
                <tbody>
                <?php  $customer = $this->CI->table_column_desc_limit($tablename='billing'); 
				if(count($customer) >0) {
				foreach($customer as $row) { ?>
                <tr><?php
                $customer_id=$row["customer_id"];
                $customer=$this->CI->table_column_get($tablename='customer',$column='id',$val=$customer_id);
                if(count($customer)>0){
                    foreach($customer as $customer_row){ ?>
                  <td><?php echo strtoupper($customer_row["company_name"]); ?></td>
                  <td><?php echo $customer_row["customer_phone"]; ?></td>
                    <?php } } ?>
                  <td><?php echo strtoupper($row["gst"]); ?></td>
                  <td><?php echo $row["cylinder_num"]; ?></td>
                  <td><?php echo $row["discount"]; ?></td>
                  <td><?php echo $row["price"]; ?></td>
				          <td><?php echo $row["empty_cylinder_num"]; ?></td>
                  <td><?php echo $row["cus_available_cyl"]; ?></td>
                  <td><?php echo $row["paid"]; ?></td>
                  <td><?php echo $row["balance"]; ?></td>
                  <td><?php echo strtoupper($row["delivery_person_name"]); ?></td>
                  <td><?php echo strtoupper($row["cash_collector"]); ?></td>
                  <td><a href="<?php echo base_url();?>index.php/View/billing/pay_balance/<?php echo $row['id'];?>" class="btn btn-sm btn-success">Pay</a></td>
                  <td><a href="<?php echo base_url();?>index.php/View/billing/edit_billing/<?php echo $row['id'];?>" class=""><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:20px;"></i></a><br>
                  <a href="<?php echo base_url();?>index.php/Admin/delete/billing/billing/<?php echo $row['id'];?>/list_billing" class=""><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;"></i></a></td>
                  <td><?php echo $row["date_created"]; ?></td>
                </tr>
        <?php } ?>
        <?php } ?>
                </tbody>
              </table>
    </div>
    </div>
  </div>
</div>

</div>

</div>
<?php $this->load->view('include/footer');?>
