<?php


$message = '';

if (isset($_POST['submit_financial_record'])) {
	# code...
	$amount_paid = $_POST['amount_paid'];
	$payee = $_POST['payee'];
	$date = date("Y-m-d h:i:s");

	//section that inserts query into database
	$sql = "INSERT INTO financial_records (payee , date_paid , amount_paid) VALUES ('$payee' , '$date' , '$amount_paid')";
	$query = mysqli_query($connection , $sql);
	$message = '<div  class = "alert alert-success" style="border-radius:0">Succeeeful! <a href = "view_all_financial_record">View records</a></div>';

}

?>


<div class="col-md-6">
  <h3 class="page-header">
   Enter financial record

    
      </h3>
	<form action="" method="post" enctype="multipart/form-data">
	<?php echo $message;  ?>
	<div class="form-group">
		<label for="author">Payee</label>
		<input type="text" name="payee" class="form-control" >
	</div>

	<div class="form-group">
		<label for="post_status">Amount Paid</label>
		<input type="text" name="amount_paid" class="form-control" >
	</div>

	<div class="form-group">
		<label for="post_status">Date Paid</label>
		<input type="text" name="" class="form-control" >
	</div>

   <div class="form-group">
		<input type="submit" name="submit_financial_record" class="btn btn-primary" value="Submit record">
	</div>
</form>
</div>
