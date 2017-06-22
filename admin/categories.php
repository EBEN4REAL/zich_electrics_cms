-<?php include "../includes/db.php";  ?>

<?php $status = '';  ?>




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

            <div class="container-fluid" style="">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-xs-6">
                        <h1 class="page-header">
                           Welcome Admin
                            
                        </h1>
                    <div class="form-group">

                    	<form action="" method="POST">

                        <?php echo  $status;  ?>
                        <label>Add category</label>

                    		<div class="form-group">
                    			<input type="text" name="category" placeholder="Enter new category..." class="form-control">
                    		</div>
                    		<div class="form-group">
                    			<input type="submit" name="submit_category" placeholder="Enter new category..." class=" btn btn-primary" value="Create category">
                    		</div>

                    	</form>
                        <hr class="page-header">

                        <form action="" method="POST">
                        <?php echo  $status;  ?>
                        <label>Update category</label>
                        <?php echo '
                         <div class="form-group">
                                <input type="text" name="category" placeholder="Enter new category..." class="form-control" value="'.$cat_title.'">
                            </div>

                        ';
                        ?>

                            <div class="form-group">
                                <input type="submit" name="update_category"  class=" btn btn-primary"  value="Update category">
                            </div>

                        


                        </form>
                    </div>
                    </div>

                     <div class="col-xs-6">
                      <h1 class="page-header"></h1>
                      <div style="height: 20px"></div>
                        <table class="table table-striped table-bordered table-hover">
                        	<thead>
                        		<tr>
                        			<th>Id</th>
                        			<th>Category Title</th>
                                    <th>Edit</th>
                                    <th>Trash</th>
                        		</tr>
                        	</thead>
                        	<tbody>

                            <?php
                             display_categories(); 
                             ?>
                        	</tbody>
                        </table>
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
    <script type="text/javascript">
        function loadUsersOnline(){
    $.get("functions.php?onlineusers=result" , function(data){
      $(".usersOnline").text(data);
    });

}

setInterval(function(){
    loadUsersOnline()
}, 500)

loadUsersOnline();

    </script>



                <?php
                
                 //function that inset category into database
                insert_category();
                 //section that updates categories in the  database
               if (isset($_POST['update_category'])) {
                   # code...
                 $category = $_POST['category'];
                 $update_category = "UPDATE categories SET cat_title = ' $category'   WHERE cat_id = '$cat_id'";
                 $sql_query = mysqli_query($connection ,  $update_category);
               }
            
             ?>
            
           
          


</body>

</html>


