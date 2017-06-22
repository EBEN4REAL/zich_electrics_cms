<?php ob_start();  ?>
<?php include("functions.php");  ?>
<?php 
session_start();

if (!isset($_SESSION['user_role'])) {
    # code...
    
        # code...
        header("Location: ../index.php");


}
//section that fetches user profile pictures from the database
$sql = "SELECT * FROM users WHERE username = '$_SESSION[username]'";
$run_query = mysqli_query($connection , $sql);
while ($row = mysqli_fetch_assoc($run_query)) {
    # code...
      $profile_pics = $row['user_image'];
}

?>


  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/loader.css">
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

<style type="text/css">
   body{
      font-family: 'Josefin Slab', serif;
    } 
    input[type = "text"] , input[type = "email"] , input[type = "submit"] , input[type = "password"]  {
        border-radius: 0;
    }
    #img {
        border-radius: 50%;
    }
</style>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="border-bottom: none; height: 50px ">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button/>
                <a class="navbar-brand" href="index.php">Zich-Electrics</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
             <li ><a href="../index.php" class='glyphicon glyphicon-home'></a></li>
              <li ><a href="" class=''>Users Online: <span class="usersOnline"></span></a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                       
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                       <!--  <h5 class="media-heading">
                                            <strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p> -->
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li> -->
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <!-- <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                         -->
                        
                        <!-- <li class="divider"></li> -->
                        <!-- <li>
                            <a href="#">View All</a>
                        </li> -->
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo  '<img src="images/'.$profile_pics.'" width="40px" id="img" style="margin-top: -9px">';  ?>
                     &nbsp;

                    <?php
                    if (isset($_SESSION['username'])) {
                        # code...
                        echo   $_SESSION['username'];
                    }





                     ?>
                     </a>

                      
                 
                     <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                       
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Tracked Projects <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="posts.php?source=add_post">Add Project</a>
                            </li>
                            <li>
                                <a href="posts.php">View all projects</a>
                            </li>
                        </ul>
                    </li>
                   
                    
                    <li>
                        <a href="categories.php"><i class="fa fa-fw fa-desktop"></i> Categories</a>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-arrows-v"></i> Financial records <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="financial_records.php?source=view_all_financial_records">View Financial records</a>
                            </li>
                             <li>
                                <a href="financial_records.php?source=add_financial_record">Add Financial record</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="comments.php"><i class="fa fa-fw fa-wrench"></i> Comments</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-arrows-v"></i> Employees <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a href="users.php?source=view_all_users">View all employees</a>
                            </li>
                            <li>
                                <a  href="users.php?source=add_user">Add Employee</a>
                            </li>
                        </ul>
                    </li>
                   
                   
                    <li>
                        <a href="profile.php"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>