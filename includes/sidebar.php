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
    $status =  '<div class="alert alert-danger">Oops! sorry request not found!</div>';
   }else{
       $status = 'some result';
   }
 

}
 


?>
<div class="col-md-4"> 

           <div class="well">
         
                    <h4> Search</h4>
                    <form action="login.php" method="post">
                        <div class="input-group">
                        <input type="text" name="search" class="form-control" >
                        <span class="input-group-btn" >
                            <button class="btn btn-primary" name="submit_search" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                    </form>
                    
                </div>

                <!--Login -->
                  <div class="well">
         
                    <h4>Login Panel</h4>
                    <form action="includes/login.php" method="post">
                        <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Enter username">
                       
                    </div>

                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="password">
                        <span class="input-group-btn">
                          <button class="btn btn-primary" name="login" type="submit"> <span class="glyphicon glyphicon-log-in"></span> </button>
                        </span>
                       
                    </div>
                    <!-- /.input-group -->
                    </form><br><br>
                    
  
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4> Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                        <?php
                       $select_categories  = "SELECT * FROM categories LIMIT 4";
                       $sql_query = mysqli_query($connection , $select_categories);
                       while ($rows = mysqli_fetch_assoc($sql_query)) {
                           # code...
                        $cat_title = $rows['cat_title'];
                           echo '
                              <ul class="list-unstyled">
                                <li><a href="#">'. $cat_title.'</a>
                                </li>
                              
                            </ul>
                           ';
                       }


                        ?>
                           
                        </div>
                        <!-- /.col-lg-6 -->
                       
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
               <!--  <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div> -->

            </div>


           