<?php include "includes/header.php"; ?>


    <!-- Navigation -->
   <?php include "includes/navbar.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php

             //section that fetches the posts frodm the3 database
                $fetch_posts = "SELECT * FROM categories ";
                $sql_query = mysqli_query($connection , $fetch_posts);
                while ($row = mysqli_fetch_assoc($sql_query)) {
                    # code...
                    $cat_title = $row['cat_title'];
                    
                }

            if (isset($_GET['category'])) {
                # code...
                $post_category = $_GET['category'];
            }



            $query = "SELECT * FROM posts WHERE post_category_id= '$post_category'";
            $sql_query = mysqli_query($connection , $query);
            while ($rows = mysqli_fetch_assoc( $sql_query)) {
                $post_title = $rows['post_title'];
                $post_date = $rows['post_date'];
                $post_author = $rows['post_author'];
                $post_content = $rows['post_content'];
                $post_image = $rows['post_image'];
                $post_id = $rows['post_id'];

                echo '

                   <h1 class="page-header">
                    Latest posts
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?post_id='.$post_id.'">'. $post_title.'</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">'.$post_author.'</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on '.$post_date.'</p>
                <hr>
                <img class="" src="images/'.$post_image.'" alt="" width="700" height="350">
                <hr>
                <p>'.$post_content.'.</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>




                ';
                 

                 



            }



            ?>

              
               

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

       <?php include "includes/footer.php";  ?>



 