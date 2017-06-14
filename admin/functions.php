<?php
 
  $edit = '';
 $status = '';
 

 //section that sends categories to db
 function insert_category(){
 	global $connection;
 	if (isset($_POST['submit_category'])) {
        # code...
        if (!empty($_POST['category'])) {
            # code...
             $cat_title = $_POST['category'];

        $insert_category = "INSERT INTO categories (cat_title) VALUES ('$cat_title')";
        $sql_query = mysqli_query($connection , $insert_category);

        }else{
          $status = '<div class="alert alert-danger">Please type something!</div>';
        }
      
    }
 }
 
//function that displays categories in the category page
					function display_categories(){
						global $connection;
                        if (isset($_GET['del_id'])) {
					                                # code...
					    $delete_category = "DELETE FROM categories WHERE cat_id = '$_GET[del_id]'";
					      $sql_query = mysqli_query($connection , $delete_category);
					                               
               }
                             //section that selects categories from the database
                            $select_categories = "SELECT * FROM categories";
                            $sql_query = mysqli_query($connection ,  $select_categories);
                            while ($rows = mysqli_fetch_array($sql_query)) {
                                # code...
                                $cat_title = $rows['cat_title'];
                                 $cat_id = $rows['cat_id']; 

                                 echo '

                                  <tr>
                                   <td>'.$cat_id.'</td>
                                   <td>'.$cat_title.'</td>
                                   <td><a href="categories.php?edit_id='.$rows['cat_id'].'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit"> Edit</span></a></td></td>
                                   <td><a href="categories.php?del_id='.$rows['cat_id'].'" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"> Delete</span></a></td> 
                                  </tr>
                                
 

                                 ';
                            }
}
   

   
  //section that displays category in the edit category text field 
     $cat_title = '';
     if (isset($_GET['edit_id'])) {
          
        # code...
          $edit = $_GET['edit_id'];
           $select_categories = "SELECT * FROM categories WHERE cat_id = '$edit'";
           $sql_query = mysqli_query($connection ,  $select_categories);

             while ($rows = mysqli_fetch_array($sql_query)){
                                    # code...
                  $cat_title = $rows['cat_title'];
                  $cat_id = $rows['cat_id']; 
                 
              }  
          }


 function check_query_success($result){
  global $connection;
   if (!$result) {
      # code...
      die("Fatal Query Failure  " . mysqli_error($connection));
    }




 }


  

