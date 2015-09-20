<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php 
	global $user;
	if(isset($_GET['comment_id'])&&isset($_GET['blog_id'])&& !isset($_GET['de'])){
		$query = "DELETE FROM comments WHERE id = {$_GET['comment_id']} 
			and blog_id = {$_GET['blog_id']} LIMIT 1";
		$result = mysqli_query($connection, $query);

		if($result){
	    	redirect_to("view_blog.php?user_id={$_GET['user_id']}&blog_id={$_GET['blog_id']}");
	    }else{
	    	// echo $id == null;
	    	echo "Comment Deletion failed";
	    }
	}
	else if(isset($_GET['de'])){
		$query = "DELETE FROM comments WHERE blog_id={$_GET['blog_id']}";
		$result = mysqli_query($connection, $query);

		if($result){
	    	redirect_to("view_blog.php?user_id={$_GET['user_id']}&blog_id={$_GET['blog_id']}");
	    }else{
	    	// echo $id == null;
	    	echo "Comments Deletion failed";
	    }
	}


?>