<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php 
	global $user;
	if(isset($_GET['user_id'])&&isset($_GET['blog_id'])){
		$query = "DELETE FROM blogs WHERE id = {$_GET['blog_id']} 
			and subject_id = {$_GET['user_id']} LIMIT 1";
		$query_comment = "DELETE FROM comments WHERE blog_id = {$_GET['blog_id']}";
		$result = mysqli_query($connection, $query);
		$result_comments = mysqli_query($connection, $query_comment);
		
		if($result&& $result_comments){
	    	redirect_to("user_main.php?id={$_GET['user_id']}");
	    }else{
	    	// echo $id == null;
	    	echo "Blog Deletion failed";
	    }
	}
	else if(isset($_GET['de'])){
		// $query = "Truncate table blogs";
		// $result = mysqli_query($connection, $query);

		// if($result){
	 //    	redirect_to("show_user.php?id={$_GET['user_id']}");
	 //    }else{
	 //    	// echo $id == null;
	 //    	echo "Blogs Deletion failed";
	 //    }
	}


?>