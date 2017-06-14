-<?php include "../includes/db.php";  ?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   
 <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
 
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/header.php";  ?>

        <div id="page-wrapper" style="transform: translateY(-50px);">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                           Edit Profile
                            <small><?php echo $_SESSION['username'];  ?></small>
                        </h2>

        <?php

                        if (isset($_SESSION['username'])) {
                            # code...
                            $username = $_SESSION['username'];

                            $query = "SELECT * FROM users WHERE username = '$username'";
                            $select_user_profile = mysqli_query($connection , $query);
                            while ($rows = mysqli_fetch_array($select_user_profile)) {
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

    
//section that update users' record in the database
   $update_users = "UPDATE users SET user_firstname = '$user_firstname ' , user_lastname = '$user_lastname' , username = '$username' ,  user_email = '$user_email' , user_password = '$user_password',user_role = '$user_role' WHERE username = '$username'";
    $sql_query = mysqli_query($connection ,  $update_users );

   // confirmQUery($sql_query);

}

 ?>
 <div class="col-md-6">
     <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="author">Firstname</label>
        <input type="text" name="user_firstname" class="form-control" value="" >
    </div>

    <div class="form-group">
        <label for="post_status">Lastname</label>
        <input type="text" name="user_lastname" class="form-control" value="">
    </div>

    <div class="form-group">
        <label for="post_status">Username</label>
        <input type="text" name="username" class="form-control" value="">
    </div>

    <div class="form-group">
        <label for="post_status">Email</label>
        <input type="email" name="user_email" class="form-control" value="">
    </div>

    <div class="form-group">
        <label for="post_status">Password</label>
        <input type="password" name="user_password" class="form-control" value="">
    </div>

    <div class="form-group">
        <select name="user_role" class="form-control" style="border-radius: 0">
            <option value="<?php echo $user_role;  ?>"></option>
        
              <option value='Admin'>Select role</option>"
           <option value='subscriber'>Subscriber</option>"

           <option value='Admin'>Admin</option>"

         
        </select>
    </div>

  

    <div class="form-group">
        <button type="submit" name="edit_user" class="btn btn-primary" value="" style="border-radius: 0"> Update profile &nbsp;<span class="glyphicon glyphicon-chevron-right"> </span></button> 
    </div>
</form>

 </div>







                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
