<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php 
	global $user;
	if(isset($_GET['id'])){
		$id = $_GET['id'];


		//delete all comments that belongs to this user's every blog;
		$all_blogs = find_all_blogs_of_user("blogs", $id);
		while($blogs = mysqli_fetch_assoc($all_blogs)){
			$query_1 = "DELETE FROM comments WHERE blog_id={$blogs["id"]}";
			$result_1 = mysqli_query($connection, $query_1);
		}

		// delte all comments that this user wrote
		$query_2 = "DELETE FROM comments WHERE user_id={$id}";
		$result_2 = mysqli_query($connection, $query_2);

		$query_blogs = "DELETE FROM blogs WHERE subject_id = {$id}";
		$query = "DELETE FROM users WHERE id = {$id} LIMIT 1";
		$result = mysqli_query($connection, $query);
		$result_blogs = mysqli_query($connection, $query_blogs);


		if($result){
	    	redirect_to("manage_content.php");
	    }else{
	    	// echo $id == null;
	    	echo "User Deletion failed";
	    }
	}
	else if(isset($_GET['de'])){
		$query = "Truncate table users";
		$result = mysqli_query($connection, $query);
		$query_1 = "Truncate table blogs";
		$result_1 = mysqli_query($connection, $query_1);
		$query_2 = "Truncate table comments";
		$result_2 = mysqli_query($connection, $query_2);
		if($result && $result_1&& $result_2){
	    	redirect_to("manage_content.php");
	    }else{
	    	// echo $id == null;
	    	echo "Users Deletion failed";
	    }
	}


?>