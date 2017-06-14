<?php include "includes/header.php"; ?>


    <!-- Navigation -->
   <?php include "includes/navbar.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">


            <?php

            $status  = '' ;
            if (isset($_POST['submit_search'])) {
                # code...
               $search =  $_POST['search'];

               $select_post = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
               $sql_query = mysqli_query($connection , $select_post);
               if (!$sql_query) {
                   # code...
                die("Query Failed" . mysqli_error($connection));
               }  

               $count = mysqli_num_rows($sql_query);
               if ($count == 0) {
                   # code...
                echo  '<div class="alert alert-default"><h1>Oops! sorry request not found<h1></div>';
               }else{
                  


            while ($rows = mysqli_fetch_assoc( $sql_query)) {
                $post_title = $rows['post_title'];
                $post_date = $rows['post_date'];
                $post_author = $rows['post_author'];
                $post_content = $rows['post_content'];
                $post_image = $rows['post_image'];

                echo '
                    
                   <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#">'. $post_title.'</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">'.$post_author.'</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on '.$post_date.'</p>
                <hr>
                <img class="" src="images/'.$post_image.'" alt="" width="100%">
                <hr>
                <p>'.$post_content.'.</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>




                ';
                 

                 



            }



               }
             

            }





            ?>

              
               

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>
 
        </div>
        <!-- /.row -->

        <hr>

       <?php include "includes/footer.php";  ?>



 