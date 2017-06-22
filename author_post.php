<?php include "includes/header.php"; ?>


    <!-- Navigation -->
   <?php include "includes/navbar.php"; ?>

    <!-- Page Content -->
    <div class="container" >

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php

            if (isset($_GET['post_id'])) {
                # code...
                $post_id = $_GET['post_id'];
                $post_author = $_GET['author'];

            $query = "SELECT * FROM posts WHERE post_author = '$post_author'";
            $sql_query = mysqli_query($connection , $query);
            while ($rows = mysqli_fetch_assoc( $sql_query)) {
                $post_title = $rows['post_title'];
                $post_id = $rows['post_id'];
                $post_date = $rows['post_date'];
                $post_author = $rows['post_author'];
                $post_content = $rows['post_content'];
                $post_image = $rows['post_image'];

                echo '

                  
                   <h3 class="page-header">
                   
                     <small></small>
                </h3>

                <!-- First Blog Post -->
                <h2>
                   All Projects Facilitated by
                </h2>
                <p class="lead">
                    '.$post_author.'
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on '.$post_date.'</p>
                <hr>
                <img class="img-responsive" src="images/'.$post_image.'" alt="" width="">
                <hr>
                <p>'.$post_content.'.</p>
              

                <hr>




                ';
                 

                 



            }

            }





            ?>

              <!-- Blog Comments -->

            <?php

            if (isset($_POST['submit_comment'])) {
                # code...
                 $post_id = $_GET['post_id'];
                $comment_author = $_POST['comment_author'];
                $comment_email = $_POST['comment_email'];
                $comment_content = $_POST['comment_content'];
                $comment_date  = date("Y-m-d h:i:s");
                if (!empty($comment_author) && !empty($comment_author) && !empty($comment_content)) {
                    # code...

                $query = "INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_status,comment_content,comment_date) VALUES ('$post_id',' $comment_author',' $comment_email','Unapproved',' $comment_content',now())";
                $run_query = mysqli_query($connection , $query);

                if (!$run_query) {
                    # code...
                    die("Query Failed" . mysqli_error($connection));
                }

                $query = "UPDATE posts SET post_comment_count = post_comment_count  +  1 WHERE post_id = '$post_id'";
                $run_query = mysqli_query($connection , $query);
              

            }else{
                echo "<script>alert('Fields cannot be empty')</script>";
                }
            }


               









            ?>

                <hr>

                <!-- Posted Comments -->
                <?php


                $query  = "SELECT * FROM comments WHERE comment_post_id  = '$post_id' AND comment_status = 'Approved' ORDER BY comment_id DESC";
                $select_comment_query   = mysqli_query($connection , $query);

               while ($row = mysqli_fetch_assoc($select_comment_query)) {
                   # code...
                $comment_date = $row['comment_date'];
                $comment_content = $row['comment_content'];
                $comment_author = $row['comment_author'];
                ?>



              
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo  $comment_author;  ?>
                            <small><?php  echo $comment_date;  ?></small>
                        </h4>
                       <?php echo  $comment_content;  ?>
                    </div>
                </div>

<?php } ?>

<br><br><br>









              
              
               

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

       <?php include "includes/footer.php";  ?>



 