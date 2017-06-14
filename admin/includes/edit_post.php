<?php
 $message = '';
if (isset($_GET['post_id'])) {
	# code...
	$post = $_GET['post_id'];
	
}

if (isset($_POST['update_post'])) {
	# code...
	$post_category_id = $_POST['post_category_id'];
	$post_title = $_POST['title'];
	$post_author = $_POST['author'];	
	$post_status = $_POST['post_status'];
	$post_image = $_FILES['image']['name'];
	$post_image_temp = $_FILES['image']['tmp_name'];
	$post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date("d-m-y");
	
     move_uploaded_file($post_image_temp, "../images/$post_image");

     if (empty($post_image)) {
     	# code...
     	
     	$query = "SELECT * FROM posts WHERE post_id = '$post'";
     	$run_query = mysqli_query($connection , $query);
     	while ($rows = mysqli_fetch_assoc($run_query)) {
     		# code...
     		$post_image = $rows['post_image'];
     	}
     }

	$update_posts = "UPDATE posts SET post_title = '$post_title ' , post_author = '$post_author' , post_status = '$post_status' ,  post_tags = '$post_tags' , post_content = '$post_content',post_category_id = '$post_category_id' , post_date = '$post_date' , Post_image = '$post_image'  WHERE post_id = '$post'";
    $sql_query = mysqli_query($connection ,  $update_posts );

    echo "Post Updated";
    
    $message =   '<div class="alert alert-success">Post Updated successfully: <a href="../post.php?post_id='.$post .'">View Post</a>  or <a href="posts.php?post_id='.$post .'">Edit more posts</a></div>';
   

}

$fetch_posts = "SELECT * FROM posts WHERE post_id = '$post'";
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
 $post_content = $rows['post_content'];

  }


?>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script src="js/script.js"></script>
<div style="margin-top: 50px"></div>
<div class="col-md-6">
	<form action="" method="post" enctype="multipart/form-data">
	<?php echo  $message;  ?>
	<div class="form-group">
		<label for="title">Project Title</label>
		<input type="text" name="title" class="form-control" value="<?php echo $post_title;  ?>">
	</div>

	<div class="form-group">
		<label for="post_category_id">Project category </label><br>
		<select name="post_category_id" class="form-control" style="border-radius: 0">
		  <option>Select category</option>
			<?php

			$fetch_categories = "SELECT * FROM categories";
			$sql_query =  mysqli_query($connection , $fetch_categories);
			while ($row = mysqli_fetch_assoc($sql_query)) {
				# code...
				$cat_title = $row['cat_title'];
				echo '<option>'.$cat_title.'</option>';
				
			}




			?>
		</select>
	</div>
    
	<div class="form-group" style="">
		<label for="author">Project Facilitator</label>
		<input value = "<?php echo $post_author; ?>" type="text" name="author" class="form-control" >
	</div>


	<div class="form-group ">
		
	<select name="post_status" id="" style="border-radius: 0" class="form-control">
		<option value="<?php echo $post_status;  ?>"><?php echo $post_status;  ?></option>
		<?php
		if ($post_status == 'published') {
			# code...
			echo '<option value="draft">Draft</option>';
		}else{
			echo '<option value="published">Published</option>';
		}


		?>
	</select>
	</div>

	

	<div class="form-group">
		<img src="../images/<?php echo $post_image;  ?>" width="100px">
		<input type="file" name="image">

	</div>

	<div class="form-group">
		<label for="post_tags">project Tags</label>
		<input type="text" name="post_tags" class="form-control" value="<?php echo $post_tags;  ?>">
	</div>

	<div class="form-group">
		<label for="post_content">project description</label>
		<textarea class="form-control" name="post_content" id="post_content" style="border-radius: 0" cols="30" rows="10"><?php echo $post_content;  ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="update_post" class="btn btn-primary" value="Update Project">
	</div>
</form>
</div>
