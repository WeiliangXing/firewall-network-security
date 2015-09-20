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

		if($result && $result_comments){
	    	redirect_to("show_user.php?id={$_GET['user_id']}");
	    }else{
	    	// echo $id == null;
	    	echo "Blog Deletion failed";
	    }
	}
	else if(isset($_GET['de'])){
		$all_blogs = find_all_blogs_of_user("blogs", $_GET['user_id']);
		while($blogs = mysqli_fetch_assoc($all_blogs)){
			$query_1 = "DELETE FROM comments WHERE blog_id={$blogs["id"]}";
			$result_1 = mysqli_query($connection, $query_1);
		}
		$query = "DELETE FROM blogs WHERE subject_id={$_GET['user_id']}";
		$result = mysqli_query($connection, $query);
		if($result&& $result_1){
	    	redirect_to("show_user.php?id={$_GET['user_id']}");
	    }else{
	    	// echo $id == null;
	    	echo "Blogs Deletion failed";
	    }
	}


?>