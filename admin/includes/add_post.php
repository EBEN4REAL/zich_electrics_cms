<?php

include 'functions.php';
 $message = '';
if (isset($_POST['create_post'])) {
	# code...
	$post_title = $_POST['title'];
	$post_author = $_POST['author'];
	$post_category_id = $_POST['post_category_id'];
	$post_status = $_POST['post_status'];
	$post_image = $_FILES['image']['name'];
	$post_image_temp = $_FILES['image']['tmp_name'];
	$post_tags = $_POST['post_tags'];
	$post_content = $_POST['post_content'];
	$post_date = date('d-m-y h:i:s');
	// $post_comment_count = 4;


	move_uploaded_file($post_image_temp, "../images/$post_image");

    

     $query  =  "INSERT INTO posts (post_category_id, post_title , post_author, post_date, post_content,post_tags,post_status,post_image) VALUES ('$post_category_id','$post_title','$post_author',now(),'$post_content','$post_tags','$post_status','$post_image')" ;
    $run_query = mysqli_query($connection , $query);

    check_query_success($run_query);

     $post  =  mysqli_insert_id($connection);

     $message =   '<div class="alert alert-success">Post Created successfully: <a href="../post.php?post_id='.$post .'">View Post</a>  or <a href="posts.php?post_id='.$post .'">Edit more posts</a></div>';


}





?>

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script src="js/script.js"></script>
<div class="col-md-6">
     <h3 class="page-header">
      Create  project
        <small><?php echo $_SESSION['username'];  ?></small>
    </h3>
	<form action="" method="post" enctype="multipart/form-data" style="margin-top: 30px">
	 <?php echo  $message;  ?>
	<div class="form-group">
		<label for="title">Project Title</label>
		<input type="text" name="title" class="form-control">
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
    
    
	<div class="form-group">
		<label for="author">Project facilitator</label>
		<input type="text" name="author" class="form-control" >
	</div>

	<div class="form-group ">
		<label for="author">Project Status</label>
	<select name="post_status" id="" class="form-control" style="border-radius: 0">
		<option value="published">Published</option>
		<option value="draft">Draft</option>
	</select>
	</div>

	<div class="form-group">
		<label for="image">Project Image</label>
		<input type="file" name="image"  >
	</div>

	<div class="form-group">
		<label for="post_tags">Project Tags</label>
		<input type="text" name="post_tags" class="form-control" >
	</div>

	<div class="form-group">
		<label for="post_content">Project description</label>
		<textarea class="form-control" name="post_content" id="post_content" cols="30" rows="10" style="border-radius: 0"></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="create_post" class="btn btn-primary" value="Publish post">
	</div>
</form>
</div>
