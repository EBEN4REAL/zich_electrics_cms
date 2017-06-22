

                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>In Response to</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                      
                                    <th>Trash</th>
                                   
                                 </tr>
                            </thead>
                            <tbody>
                            <?php
                            //section that deletes comments from thwe database
                            if (isset($_GET['del_comment'])) {
                                # code...
                                $del_comment = $_GET['del_comment'];
                                $query = "DELETE FROM comments WHERE comment_id = '$del_comment'";
                                $unapprove_comment_query=  mysqli_query($connection , $query);


                            }
                            //section to Unaprove
                            if (isset($_GET['unapprove'])) {
                                 # code...
                                $the_comment_id = $_GET['unapprove'];
                                $unapprove_comment = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = '$the_comment_id'";
                                $sql_query = mysqli_query($connection , $unapprove_comment);
                            
                                
                            }



                            //section to Approve comments
                            if (isset($_GET['approve'])) {
                                 # code...
                                $the_comment_id = $_GET['approve'];
                                $approve_comment = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = '$the_comment_id'";
                                $sql_query = mysqli_query($connection , $approve_comment );
                            
                                
                            }
                          //section that fetches comments from the database
                            $fetch_comments = "SELECT * FROM comments";
                            $sql_query = mysqli_query($connection , $fetch_comments);
                            while ($rows  = mysqli_fetch_assoc($sql_query)) {
                                # code...
                                $comment_id= $rows['comment_id'];
                                $comment_post_id = $rows['comment_post_id'];
                                $comment_author = $rows['comment_author'];
                                $comment_email = $rows['comment_email'];
                                
                                $comment_content = $rows['comment_content'];
                                $comment_status = $rows['comment_status'];
                                $comment_date = $rows['comment_date'];
                               
                                echo "<tr>";
                                echo "<td> $comment_id</td>";
                                echo "<td>$comment_author</td>";
                                echo "<td> $comment_content</td>";
                                echo "<td> $comment_email</td>";
                                echo "<td>$comment_status</td>";


                                $query = "SELECT * FROM posts WHERE post_id = '$comment_post_id'";
                                $select_post_id_query = mysqli_query($connection , $query);
                                while ($row = mysqli_fetch_assoc($select_post_id_query)) {
                                    # code...
                                    $post_id = $row['post_id'];
                                    $post_title = $row['post_title'];


                                    echo '<td><a href="../post.php?post_id='.$post_id.'">'.$post_title.'</a></td>';
                                }




                               
                                echo "<td>$comment_date</td>";
                               
                               
                            //     $query = "SELECT * FROM posts WHERE post_id = '$post_id'";
                            //     $select_categories_id = mysqli_query($connection ,$query);
                            //     while ($row = mysqli_fetch_assoc($select_categories_id)) {
                            //         # code...
                            //         $post_category_id =  $row['post_category_id'];
                                    
                            //           echo "<td> $post_category_id</td>";
                            //     }


                                
                                echo ' <td><a href="comments.php?approve='.$comment_id.'" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span> Approve</a></td>';


                                echo ' <td><a href="comments.php?unapprove='.$comment_id.'" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit"></span> Unapprove</a></td>';

                               
                                echo ' <td><a href="comments.php?del_comment='.$comment_id.'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>';

                            } 

                             ?>
                               
                            </tbody>
                        </table>
