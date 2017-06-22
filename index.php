<?php include "includes/header.php"; ?>


    <!-- Navigation -->
   <?php include "includes/navbar.php"; ?>

    <!-- Page Content -->
    <div class="container" >

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8" style="transform: translateY(-20px);">

            <?php
            $query = "SELECT * FROM  posts  WHERE post_status = 'published' ORDER BY post_id DESC";
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
                    Tracked projects
                     <small></small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?post_id='.$post_id.'">'. $post_title.'</a>
                </h2>
                <p class="lead">
                    by <a href="author_post.php?author='.$post_author.'&post_id='. $post_id .'">'.$post_author.'</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on '.$post_date.'</p>
                <hr>
                <a href="post.php?post_id='.$post_id.'">
                <img class="" src="images/'.$post_image.'" alt="" width="600" height="350">
                </a>
                <hr>
                <p>'.substr($post_content, 0 ,150).'.</p>
                <a class="btn btn-primary" href="post.php?post_id='.$post_id.'">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>




                ';
                 

                 



            }



            ?>

              
               

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div><br>
        <!-- /.row -->

        <hr>

       <?php include "includes/footer.php";  ?>



 