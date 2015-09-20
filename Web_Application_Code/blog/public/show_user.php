<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/session.php"); ?>

<?php $_SESSION["adimn_blog_id"] = null;?>

<?php 
	if (isset($_GET['id'])) {
		$user = show_user_details_by_id("users",$_GET['id']);
		$_SESSION["adimn_user_id"] = $user['id'];
	}
?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>

<div>
	<p>
		<a href="manage_content.php">Back</a>
	</p>
	<p>
		<table id="t01">
		  <tr>
		    <td>Username</td>
		    <td><?php echo $user["user_name"];?></td>		
		  </tr>
		  	<tr>
		    <td>Password</td>
		    <td><?php echo $user["password"];?></td>		
		  </tr>
			<tr>
		    <td>Gender</td>
		    <td>
		    	<?php 
		    		if($user["gender"] == 1){
		    			echo "Male";
		    		}else{
		    			echo "Female";
		    		}
		    	?>
		    </td>		
		  </tr>
		  	<tr>
		    <td>Major</td>
		    <td><?php echo $user["major"];?></td>		
		  </tr>
		  	<tr>
		    <td>Annual Salary($)</td>
		    <td><?php echo $user["annual_salary"];?></td>		
		  </tr>
		  	<tr>
		    <td>Description</td>
		    <td><?php echo $user["remark"];?></td>		
		  </tr>
		  <tr>
		    <td>Created Time</td>
		    <td><?php echo $user["create_time"];?></td>		
		   </tr>
		   <tr>
		    <td>Updated Time</td>
		    <td><?php echo $user["update_time"];?></td>		
		   </tr>
		</table>
	</p>
	<p>
		<a href="edit_user.php?id=<?php echo urlencode($_SESSION["adimn_user_id"]); ?>">Edit Profile</a>
	</p>
	<p>Blogs of the user</p>
	<p>
		<?php echo show_blogs_of_user(blogs, $user['id']); ?>
	</p>
	<p>
		<a href="create_blog.php?user_id=<?php echo urlencode($_SESSION["adimn_user_id"]); ?>">New Blog</a>
		&nbsp;&nbsp;
		<a href="delete_blog.php?de=0&user_id= <?php echo urlencode($_SESSION["adimn_user_id"]); ?>" onclick="return confirm('Are you sure?')">Delete All Blogs</a>
	</p>

</div>

<?php include("../includes/layouts/footer.php"); ?>
