<?php

	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed.");
		}
	}

	function redirect_to($new_location) {
		header("Location: " . $new_location);
		exit;
	}

	function find_all_users($table){
		global $connection;
		$query = "SELECT *";
		$query .= "FROM {$table} ";
		$query .= "ORDER BY id ASC" ;
		$user_set = mysqli_query($connection, $query);
		confirm_query($user_set);
		return $user_set;

	}

	function find_user_by_username($username) {
		global $connection;
		
		$query  = "SELECT * ";
		$query .= "FROM users ";
		$query .= "WHERE user_name = '{$username}' ";
		$query .= "LIMIT 1";
		$user_set = mysqli_query($connection, $query);
		confirm_query($user_set);
		if($user = mysqli_fetch_assoc($user_set)) {
			return $user;
		} else {
			return null;
		}
	}

	function show_users($table){
		$user_set = find_all_users($table);
		$output = "<table id=\"t02\">";
		$output .= "<tr>";
		$output .= "<th>Username&nbsp;&nbsp;&nbsp;&nbsp;</th>";
		$output .= "<th colspan=\"3\">Operations</th>";
		$output .= "</tr>";
		while($user = mysqli_fetch_assoc($user_set)){
			$output .= "<tr>";
			$output .= "<td>{$user["user_name"]}</td>";
			$output .= "<td><a href=\"show_user.php?id=";
			$output .= urlencode($user["id"]);
			$output .= "\">show</a>&nbsp;&nbsp;&nbsp;</td>";
			$output .= "<td><a href=\"edit_user.php?id=";
			$output .= urlencode($user["id"]);
			$output .= "\">edit</a>&nbsp;&nbsp;&nbsp;</td>";
			$output .= "<td><a href=\"delete_user.php?id=";
			$output .= urlencode($user["id"]);
			$output .= "\" onclick=\"return confirm('Are you sure?');\">delete</a>&nbsp;&nbsp;&nbsp;</td>";
			$output .= "</tr>";
		}
		$output .= "</table>";
		mysqli_free_result($user_set);
		return $output;
	}

	function show_user_details_by_id($table, $id){
		global $connection;
		if(isset($id)){
			$query  = "SELECT * ";
			$query .= "FROM {$table} ";
			$query .= "WHERE id = {$id} ";
			$query .= "LIMIT 1";
			$user_set = mysqli_query($connection, $query);
			if($user = mysqli_fetch_assoc($user_set)) {
				return $user;
			} else {
				return null;
			}
		}else{
			return null;
		}
	}

	function find_all_blogs_of_user($table, $id){
		global $connection;
		if(isset($id)){
			$query  = "SELECT * ";
			$query .= "FROM {$table} ";
			$query .= "WHERE subject_id = {$id} ";
			$query .= "ORDER BY update_time DESC";
			$blogs_set = mysqli_query($connection, $query);
			return $blogs_set;
		}else{
			return null;
		}
	}

	function show_blogs_of_user($table, $id){
		$blogs_set = find_all_blogs_of_user($table, $id);
		// print_r(array_values($blogs_set));
		$output = "<table id=\"t023\">";
		$output .= "<tr>";
		$output .= "<th>Title</th>";
		$output .= "<th>View Counts</th>";
		$output .= "<th>Create Time</th>";
		$output .= "<th>Update Time</th>";
		$output .= "<th>Content</th>";
		$output .= "</tr>";
		while($blogs = mysqli_fetch_assoc($blogs_set)){
			$output .= "<tr>";
			$output .= "<td>{$blogs["title"]}</td>";
			$output .= "<td>{$blogs["view_counts"]}</td>";
			$output .= "<td>{$blogs["create_time"]}</td>";
			$output .= "<td>{$blogs["update_time"]}</td>";
			$output .= "<td><a href=\"view_blog.php?user_id=";
			$output .= urlencode($id);
			$output .= "&blog_id=";
			$output .= urlencode($blogs["id"]);
			$output .= "\">view & edit</a></td>";
			$output .= "</tr>";
		}
		$output .= "</table>";
		return $output;
	}

	function find_all_comments_of_blog($table, $id){
		global $connection;
		if(isset($id)){
			$query  = "SELECT * ";
			$query .= "FROM {$table} ";
			$query .= "WHERE blog_id = {$id} ";
			$query .= "ORDER BY update_time DESC";
			$comments_set = mysqli_query($connection, $query);
			return $comments_set;
		}else{
			return null;
		}
	}

	function show_comments_of_blog($table, $id,$user_id){
		$comments_set=find_all_comments_of_blog($table, $id);
		$output = "<table id=\"t05\">";
		$output .= "<tr>";
		$output .= "<th>User</th>";
		$output .= "<th>Create Time</th>";
		$output .= "<th>Update Time</th>";
		$output .= "<th>Content</th>";
		$output .= "<th>Operation</th>";
		$output .= "</tr>";
		while($comments = mysqli_fetch_assoc($comments_set)){
			$user = show_user_info("users",$comments["user_id"]);
			$output .= "<tr>";
			$output .= "<td>{$user["user_name"]}</td>";
			$output .= "<td>{$comments["create_time"]}</td>";
			$output .= "<td>{$comments["update_time"]}</td>";
			$output .= "<td>{$comments["content"]}</td>";
			$output .= "<td><a href=\"delete_comment.php?blog_id=";
			$output .= urlencode($id);
			$output .= "&comment_id=";
			$output .= urlencode($comments["id"]);
			$output .= "&user_id=";
			$output .= urlencode($user_id);
			$output .= "\" onclick=\"return confirm('Are you sure?')\">delete</a></td>";
			$output .= "</tr>";
		}
		$output .= "</table>";
		return $output;
	}
	function show_comments_for_blog($table, $id, $user_id){
		$comments_set=find_all_comments_of_blog($table, $id);
		$output = "";
		while($comments = mysqli_fetch_assoc($comments_set)){
			$putput .= "<div class=\"media\">";
			$output .= "<div class=\"media-body\"><h4 class=\"media-heading\">";
			$user = show_user_info("users",$comments["user_id"]);
			$output .= "{$user["user_name"]} ";
			$output .= "<small>";
			$output .= "{$comments["update_time"]}";
			$output .= "</small></h4>";
			$output .= "{$comments["content"]}";
			$output .= "</div></div>";
		}
		return $output;

	}

	function show_user_info($table,$id){
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM {$table} ";
		$query .= "WHERE id = {$id} ";
		$query .= "LIMIT 1";
		$user_set = mysqli_query($connection, $query);
		$user=mysqli_fetch_assoc($user_set);
		return $user;
	}

	function show_blogs($table){
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM {$table} ";
		$query .= "ORDER BY update_time DESC";
		$blogs_set = mysqli_query($connection, $query);
		$output = "<ul>";
		while($blogs=mysqli_fetch_assoc($blogs_set)){
			$user = show_user_info("users", $blogs["subject_id"]);
			$output .= "<li><a href=\"user_view_blog.php?user_id=";
			$output .= urlencode($blogs["subject_id"]);
			$output .= "&blog_id=";
			$output .= urlencode($blogs["id"]);
			$output .= "\">Title: ";
			$output .= $blogs["title"];
			$output .= "</a><br /> Update:";
			$output .= $blogs["update_time"];
			$output .= "&nbsp;&nbsp; By: ";
			$output .= $user["user_name"];
			$output .= "</li>";
		}
		// $output .= "<li>hello</li>";
		$output .= "</ul>";
		mysqli_free_result($blogs_set);
		return $output;

	}

	function show_my_blogs($table, $id){
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM {$table} ";
		$query .= "WHERE subject_id = {$id} ";
		$query .= "ORDER BY update_time DESC";
		$blogs_set = mysqli_query($connection, $query);
		$output = "<div class=\"container\"><div class=\"row\">";
		$output .= "<div class=\"col-md-8\">";
		$output .= "<h1 class=\"page-header\">My Blogs <small>Welcome";
        $output .= ".</small></h1>";
		while($blogs=mysqli_fetch_assoc($blogs_set)){
			$user = show_user_info("users", $blogs["subject_id"]);
			$output .= "<h2><a href=\"user_view_blog.php?user_id=";
			$output .= urlencode($blogs["subject_id"]);
			$output .= "&blog_id=";
			$output .= urlencode($blogs["id"]);
			$output .= "\">";
			$output .= $blogs["title"];
			$output .= "</a></h2><br /> <p><span class=\"glyphicon glyphicon-time\"></span> Posted on ";
			$output .= $blogs["update_time"];
			$output .= "</p><hr><br/><p>";
			$output .= nl2br($blogs["content"]);
			$output .= "</p><a class=\"btn btn-primary\" href=\"user_view_blog.php?user_id=";
			$output .= urlencode($blogs["subject_id"]);
			$output .= "&blog_id=";
			$output .= urlencode($blogs["id"]);
			$output .= "\">";
			$output .= "Read More <span class=\"glyphicon glyphicon-chevron-right\"></span></a> <hr>";

			
		}
		// $output .= "<li>hello</li>";
		$output .= "</div></div></div>";
		mysqli_free_result($blogs_set);
		return $output;

	}

	function show_blog_details_by_id($table, $user_id, $blog_id){
		global $connection;
		if(isset($user_id) && isset($blog_id)){
			$query  = "SELECT * ";
			$query .= "FROM {$table} ";
			$query .= "WHERE subject_id = {$user_id} AND id = {$blog_id}";
			$blog_set = mysqli_query($connection, $query);
			if($blog = mysqli_fetch_assoc($blog_set)) {
				return $blog;
			} else {
				return null;
			}
		}else{
			return null;
		}
	}

	function attempt_login($username, $password) {
		$user = find_user_by_username($username);
		if ($user) {
			// found admin, now check password
			if ($password == $user["password"]) {
				// password matches
				return $user;
			} else {
				// password does not match
				return false;
			}
		} else {
			// admin not found
			return false;
		}
	}

	function show_edit_and_delete($user_id, $cur_user_id,$blog_id){
		if ($user_id == $cur_user_id){
			$output .= "<a href=\"user_edit_blog.php?user_id=";
			$output .= urlencode($user_id);
			$output .= "&blog_id=";
			$output .= urlencode($blog_id);
			$output .= "\">Edit</a>&nbsp;&nbsp;";
			$output .= "<a href=\"user_delete_blog.php?user_id=";
			$output .= urlencode($user_id);
			$output .= "&blog_id=";
			$output .= urlencode($blog_id);
			$output .= "\" onclick=\"return confirm('Are you sure?')\">Delete</a>&nbsp;&nbsp;";
			return $output;

		}else{
			return null;
		}
	}

	function increase_counts($table, $user_id, $cur_user_id,$blog_id){
		global $connection;
		
		if ($user_id != $cur_user_id){
			$query  = "UPDATE {$table} SET ";
			$query .= "view_counts = view_counts + 1 ";
			$query .= "WHERE id = {$blog_id} ";
			$update_count = mysqli_query($connection, $query);	
			if(!$update_count){echo "Count Increase Failed";}
		}
	}
	
?>
