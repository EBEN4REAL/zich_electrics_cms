                      <h1 class="page-header">
                          All employees

                           <?php

                           ?>
                            <small></small>
                        </h1>
                        <a href="users.php?source=add_user" class="btn btn-primary" style="border-radius: 0px; margin: 10px"><span class="glyphicon glyphicon-plus"></span> Add User</a>
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Profile picture</th>
                                    <th>Username</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                   
                                    <th>Admin</th>
                                    <th>Subscriber</th>
                                    <th>Edit user</th>
                                    <th>Delete</th>

                                   
                                   
                                 </tr>
                            </thead>
                            <tbody>
                            <?php
                            //section that selects users from the database

                            $fetch_users = "SELECT * FROM users ORDER BY user_id DESC";
                            $sql_query = mysqli_query($connection , $fetch_users);
                            while ($rows  = mysqli_fetch_assoc($sql_query)) {
                                # code...
                                $user_id = $rows['user_id'];
                                $user_password = $rows['user_password'];
                                $user_firstname = $rows['user_firstname'];
                                $user_lastname = $rows['user_lastname'];
                                $username = $rows['username'];
                                
                                $user_email = $rows['user_email'];
                                $user_image = $rows['user_image'];
                                $user_role = $rows['user_role'];
                               

                                
                                echo "<tr>";
                                echo "<td>{$user_id}</td>";
                                echo '<td><a href = "user_finance.php?user_id='.$user_id.'"><img src="images/'.$user_image.'"  width="100%"></a></td>';
                                echo "<td> $username</td>";
                                echo "<td>$user_firstname</td>";
                                echo "<td>$user_lastname</td>";
                                echo "<td>$user_email</td>"; 
                                echo "<td>$user_role</td>";
                                
                               

                                // $query = "SELECT * FROM user";
                                // $select_categories_id = mysqli_query($connection ,$query);
                                // while ($row = mysqli_fetch_assoc($select_categories_id)) {
                                //     # code...
                                //     $post_category_id =  $row['post_category_id'];
                                    
                                //       echo "<td> $post_category_id</td>";
                                // }

                                echo ' <td><a href="users.php?change_to_admin='.$user_id.'" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon"></span> Admin</a></td>';
                                echo ' <td><a href="users.php?change_to_subscriber='.$user_id.'" class="btn btn-success btn-xs"><span class="glyphicon glyphicon"></span> Subscriber</a></td>';
                                 echo ' <td><a href="users.php?source=edit_user&edit_user='.$user_id.'" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>';
                                 echo ' <td><a href="users.php?del_id='.$user_id.'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>';

                            } 

                             ?>
                               
                            </tbody>
                        </table>


                        <?php
                        //section that deletes users form the database
                        if (isset($_GET['del_id'])) {
                            # code...
                            $delete = $_GET['del_id'];
                            $delete_post = "DELETE FROM users WHERE user_id = '$delete'";
                            $sql_query = mysqli_query($connection , $delete_post);
                            header("Location: users.php");

                        }

                        // section that toggles admin role of users
                        if (isset($_GET['change_to_admin'])) {
                            # code...
                            $admin = $_GET['change_to_admin'];
                            $update_role = "UPDATE users   SET user_role = 'Admin' WHERE user_id = '$admin'";
                            $sql_query = mysqli_query($connection , $update_role);
                            header("Location: users.php");

                        }

                         // section that toggles subscriber role of users
                        if (isset($_GET['change_to_subscriber'])) {
                            # code...
                            $subscriber = $_GET['change_to_subscriber'];
                            $update_role = "UPDATE users   SET user_role = 'Subscriber' WHERE user_id = ' $subscriber'";
                            $sql_query = mysqli_query($connection , $update_role);
                             header("Location: users.php");

                        }


                        ?>