<?php

if (isset($_POST['checkBoxArray'])) {
 # code...
foreach ($_POST['checkBoxArray'] as $checkBoxValue ) {
    # code...
   
 $bulk_options = $_POST['bulk_options'];

 switch ($bulk_options) {
     case 'published':
         # code...
     $query = "UPDATE posts SET post_status = '$bulk_options' WHERE post_id = '$checkBoxValue'";
     $sql_query = mysqli_query($connection , $query);
         break;
     case 'draft':
         # code...
       $query = "UPDATE posts SET post_status = '$bulk_options' WHERE post_id = '$checkBoxValue'";
       $sql_query = mysqli_query($connection , $query);
         break;
      
         break;

    case 'delete':
         # code...
      $query = "DELETE FROM posts WHERE post_id = '$checkBoxValue'";
      $sql_query = mysqli_query($connection , $query);
         break;
     
     default:
         # code...
         break;
 }


}
}





?>        
    

<form action="" method="post">
<h2 class="text-center" style="margin-top: 50px">Project tracker Zich Electrics</h2>
<hr class="page-heading">
<table class="table table-striped table-hover table-bordered table-responsive">
<div id="bulkOptionsContainer" class="col-xs-4"   style="padding:0;">
 <select value="" class="form-control" name="bulk_options" id="" style="border-radius: 0">
     <option value="">Select option</option>
     <option value="published">Publish</option>
     <option value="draft">Draft</option>
     <option value="delete">Delete</option>

 </select>

</div>

<div class="col-xs-4">
   <input type="submit" name="submit" class="btn btn-success" value="Apply">
  <a href="posts.php?source=add_post" class="btn btn-primary" style="border-radius: 0"><span class="glyphicon glyphicon-plus"></span> Add New project</a>
</div><br><br>
<thead>
 <tr>
    <th><input type="checkbox" name="" id="selectAllBoxes"> </th>
    <th>Id</th>
    <th>Author</th>
    <th>Title</th>
    <th>Status</th>
    <th>Image</th>
    <th>Tags</th>
    <th>Comments</th>
    <th>Date</th>
    <th>Category</th>
    <th>View</th>
    <th>Edit</th>
    <th>Trash</th>
   
    </tr> 
</thead>
<tbody>
<?php

$fetch_posts = "SELECT * FROM posts ORDER BY post_id DESC";
$sql_query = mysqli_query($connection , $fetch_posts);
while ($rows  = mysqli_fetch_assoc($sql_query)) {
# code...
$post_id = $rows['post_id'];
$post_title = $rows['post_title'];
$post_author = $rows['post_author'];
$post_image = $rows['post_image'];

$post_status = $rows['post_status'];
$post_date = $rows['post_date'];
$post_tags = $rows['post_tags'];
$post_category_id = $rows['post_category_id'];
$post_comment_count = $rows['post_comment_count'];


echo "<tr>";

?>

<td><input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="<?php  echo $post_id; ?>"></td>


<?php

echo "<td>$post_id</td>";
echo "<td>$post_author</td>";
echo "<td>$post_title</td>";
echo "<td>$post_status</td>";
echo ' <td><img src="../images/'.$post_image.'" width="100%" height="50px"></td>';
echo "<td>$post_tags</td>";
echo "<td>$post_comment_count</td>";
echo "<td>$post_date</td>";

$query = "SELECT * FROM posts WHERE post_id = '$post_id'";
$select_categories_id = mysqli_query($connection ,$query);
while ($row = mysqli_fetch_assoc($select_categories_id)) {
# code...
$post_category_id =  $row['post_category_id'];

echo "<td> $post_category_id</td>";
}
echo ' <td><a href="../post.php?source=edit_post&post_id='.$post_id.'" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-eye-open"></span> View Post</a></td>';

echo ' <td><a href="posts.php?source=edit_post&post_id='.$post_id.'" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>';
echo ' <td><a  onClick = "javascript: return confirm(\'Are you sure you want to delete\');" href="posts.php?del_id='.$rows['post_id'].'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>';

} 

?>

</tbody>
   </table>
 </form>
                       


<?php

if (isset($_GET['del_id'])) {
# code...
$delete = $_GET['del_id'];
$delete_post = "DELETE FROM posts WHERE post_id = '$delete'";
$sql_query = mysqli_query($connection , $delete_post);
header("Location: posts.php");

}

?>

           
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
   <!--  <script src="js/script.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    
<script type="text/javascript">

$(document).ready(function(){
  $('#selectAllBoxes').click(function(event){
    if (this.checked) {
        $('.checkBoxes').each(function(){
            this.checked = true;
        });
    } else{
         $('.checkBoxes').each(function(){
            this.checked = false;
        });
    }

  });
});
</script>
<script type="text/javascript">
    // function confirmDelete(){
    //     return confirm("Are you sure you want to delete this item(s)?");
    // }
</script>

