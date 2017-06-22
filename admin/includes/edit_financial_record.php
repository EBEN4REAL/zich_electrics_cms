<?php

include 'functions.php';
$message = '';
if (isset($_POST['edit_user'])) {
	
	# code...
	
	$user_firstname = $_POST['user_firstname'];
	$user_lastname = $_POST['user_lastname'];
	$username = $_POST['username'];
	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];
	$user_role = $_POST['user_role'];
	$post_date = date('d-m-y h:i:s');

  //docuemt upload variables
  $user_image = $_FILES['user_image']['name'];
  $user_image_temp = $_FILES['user_image']['tmp_name']; 
  
  move_uploaded_file($user_image_temp, "images/$user_image");
    
  $query = "SELECT randSalt FROM users";
  $run_query  = mysqli_query($connection  , $query);

  if (!$run_query) {
    # code...
    die("Query Fialed" . mysqli_error($connection));
  }

  $row = mysqli_fetch_array($run_query) ;
  
  $salt = $row['randSalt'];

  $user_password = crypt($user_password  , $salt);
    

     $query  =  "INSERT INTO users (user_firstname, user_lastname , username,user_image, user_email, user_password,user_role) VALUES ('$user_firstname','$user_lastname','$username', '$user_image','$user_email','$user_password','$user_role')" ;
    $run_query = mysqli_query($connection , $query);

    check_query_success($run_query);

    $message =  "User Created : " . " " . "<a href='users.php' class='btn btn-primary'>View Users</a>";


}





?>


<div class="col-md-6">
  <h3 class="page-header">
   Create user

    <small><?php echo $_SESSION['username'];  ?></small>
      </h3>
	<form action="" method="post" enctype="multipart/form-data">
	<?php echo $message;  ?>
	<div class="form-group">
		<label for="author">Firstname</label>
		<input type="text" name="user_firstname" class="form-control" >
	</div>

	<div class="form-group">
		<label for="post_status">Lastname</label>
		<input type="text" name="user_lastname" class="form-control" >
	</div>

	<div class="form-group">
		<label for="post_status">Username</label>
		<input type="text" name="username" class="form-control" >
	</div>

	<div class="form-group">
		<label for="post_status">Email</label>
		<input type="email" name="user_email" class="form-control" >
	</div>

	<div class="form-group">
		<label for="post_status">Password</label>
		<input type="password" name="user_password" class="form-control" style="border-radius: 0">
	</div>
	<div class="form-group">
		<label for="post_status">Profile picture</label>
		<input type="file" name="user_image" class="form-control" style="border-radius: 0">
	</div>

	<div class="form-group">
		<select name="user_role" style="border-radius: 0;"  class="form-control">
		    <option value="">Select role</option>
			<option value="admin">admin</option>
			<option value="subscriber">Subscriber</option>

		</select>
	</div>

	
	<div class="form-group">
		<input type="submit" name="create_user" class="btn btn-primary" value="Create User">
	</div>
</form>
</div>
