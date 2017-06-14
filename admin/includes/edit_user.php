<?php

include 'functions.php';

if (isset($_GET['edit_user'])) {
	# code...
	$edit_user = $_GET['edit_user'];

	  $fetch_users = "SELECT * FROM users WHERE user_id = '$edit_user'";
    $sql_query = mysqli_query($connection , $fetch_users);
    while ($rows  = mysqli_fetch_assoc($sql_query)) {
        # code...
        $user_id = $rows['user_id'];
        $user_password = $rows['user_password'];
        $user_firstname = $rows['user_firstname'];
        $user_lastname = $rows['user_lastname'];
        $username = $rows['username'];
        
        $user_email = $rows['user_email'];
        $user_image = $rows['user_image'];
        $user_role = $rows['user_role'];

                              }

}

$user_password = crypt($user_password , $user_password);

if (isset($_POST['edit_user'])) {
	
	# code...
	
	$user_firstname = $_POST['user_firstname'];
	$user_lastname = $_POST['user_lastname'];
	$username = $_POST['username'];
	// $post_image = $_FILES['image']['name'];
	// $post_image_temp = $_FILES['image']['tmp_name'];
	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];
	$user_role = $_POST['user_role'];
	$post_date = date('d-m-y h:i:s');

	// $post_comment_count = 4;


	// move_uploaded_file($post_image_temp, "../images/$post_image");
    

  $query = "SELECT randSalt FROM users";
  $run_query  = mysqli_query($connection  , $query);

  if (!$run_query) {
    # code...
    die("Query Fialed" . mysqli_error($connection));
  }
  $row = mysqli_fetch_assoc($run_query);
  $salt = $row['randSalt'];
  $hashed_password = crypt($user_password , $salt);

    
   //section that update users' record in the database
   $update_users = "UPDATE users SET user_firstname = '$user_firstname ' , user_lastname = '$user_lastname' , username = '$username' ,  user_email = '$user_email' , user_password = '$hashed_password',user_role = '$user_role' WHERE user_id = '$user_id'";
    $sql_query = mysqli_query($connection ,  $update_users );

   // confirmQUery($sql_query);

}



?>


<div style="height: 50px"></div>
<div class="col-md-6">
	<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="author">Firstname</label>
		<input type="text" name="user_firstname" class="form-control" value="<?php echo $user_firstname;  ?>" >
	</div>

	<div class="form-group">
		<label for="post_status">Lastname</label>
		<input type="text" name="user_lastname" class="form-control" value="<?php echo $user_lastname;  ?>">
	</div>

	<div class="form-group">
		<label for="post_status">Username</label>
		<input type="text" name="username" class="form-control" value="<?php echo $username;  ?>">
	</div>

	<div class="form-group">
		<label for="post_status">Email</label>
		<input type="email" name="user_email" class="form-control" value="<?php echo $user_email;  ?>">
	</div>

	<div class="form-group">
		<label for="post_status">Password</label>
		<input type="password" name="user_password" class="form-control" value="<?php echo $user_password;  ?>">
	</div>

	<div class="form-group">
		<select name="user_role" class="form-control">
		    <option value="<?php echo $user_role;  ?>"><?php echo $user_role;  ?></option>
		

			<?php 
			if ($user_role == 'Admin') {
				# code...
				echo "<option value='subscriber'>Subscriber</option>";

			}else{
				echo "<option value='Admin'>Admin</option>";
			}



			?>

		</select>
	</div>

	<!-- <div class="form-group">
		<label for="post_category_id">Role </label><br>
		<select name="post_category_id" class="fosrm-control">
		  <option>Select category</option>
			<?php

			




			?>
		</select>
	</div>
     -->
    
	

	<!-- <div class="form-group">
		<label for="image">Post Image</label>
		<input type="file" name="image"  >
	</div> -->

	

	<div class="form-group">
		<button type="submit" name="edit_user" class="btn btn-primary" style="border-radius: 0" value=""> Update user profile &nbsp;<span class="glyphicon glyphicon-chevron-right"> </span></button> 
	</div>
</form>
</div>
