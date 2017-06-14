 <?php include "includes/db.php";  ?>
 <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Zichelectrics</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                <?php
               

                   $query = "SELECT * FROM categories ";
                   $sql_query = mysqli_query($connection, $query);
                   while ($rows = mysqli_fetch_assoc($sql_query)) {
                       # code...
                    $cat_title = $rows['cat_title'];
                    $cat_id = $rows['cat_id'];

                    echo '<li>
                             <a href="category.php?category='.$cat_title.'">'.$cat_title.'</a>
                         </li> ';

                   }
                    


                ?> 
                  <li><a href="register.php">Register</a> </li>
                  <li><a href="admin/index.php">Admin</a> </li>


                  <?php

                  // if (isset($_SESSION['username'])) {
                      # code...
                   if (isset($_GET['post_id'])) {
                       # code...
                    $the_post_id  = $_GET['post_id'];
                    $post_id = $_GET['post_id'];
                     echo "<li><a href='admin/posts.php?source=edit_post&post_id=".$post_id."'>Edit post</a></li>";

                   }
                  // }








                  ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
















