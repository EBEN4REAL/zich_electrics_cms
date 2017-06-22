<?php include "../includes/db.php"; ?>

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

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/header.php";  ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Welcome Admin
                            <small>Author</small>
                        </h1>

                        <?php

                        if (isset($_GET['source'])) {
                            # code...
                            $source = $_GET['source'];

                        }else{
                            $source = '';
                        }
                        switch ($source) {
                            case 'add_post':
                                # code...
                            include 'includes/add_post.php';
                                break;
                            case 'edit_post':
                                # code...
                            include 'includes/edit_post.php';
                                break;
                            
                            default:
                                # code...
                              include 'includes/view_all_comments.php';
                                break;
                        }




                        ?>

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

</body>

</html>
