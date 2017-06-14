<?php 
include "db.php";


if (isset($_POST['login'])) {
	# code...
	$username =  $_POST['username'];
	$password  = $_POST['password'];

	$username = mysqli_real_escape_string($connection , $username );
	$password = mysqli_real_escape_string($connection , $password );

	$query = "SELECT * FROM users WHERE username = '$username'";
	$select_user_query = mysqli_query($connection , $query);


	while ($rows = mysqli_fetch_array($select_user_query)) {
		# code...
		 $db_user_id = $rows['user_id'];
		 $db_user_firstname = $rows['user_firstname'];
		 $db_user_lastname = $rows['user_lastname'];
		 $db_user_role = $rows['user_role'];
		 $db_username = $rows['username'];
		 $db_user_password = $rows['user_password'];
		 
	}

	$password = crypt($password  , $db_user_password);

 if ($username !==  $db_username  ||  $password  !== $db_user_password) {
		 	# code...
     	    
		 	header("Location: ../index.php");



		 }else if ($username ==  $db_username  &&  $password  == $db_user_password) {
		 	# code...
		 	header("Location: ../admin/index.php");
            session_start();
		 	$_SESSION['username'] = $db_username;
		 	$_SESSION['firstname'] = $db_user_firstname;
		 	$_SESSION['lastname'] =  $db_user_lastname;
		 	$_SESSION['user_role'] = $db_user_role;

		 }else{
		 	header("Location: ../index.php");
		 }

 	

}