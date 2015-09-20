<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/session.php"); ?>

<?php $_SESSION["adimn_blog_id"] = null;?>

<?php 
	if(isset($_GET['user_id']) && isset($_GET['blog_id'])){
		$user_id = $_GET['user_id'];
		$blog_id = $_GET['blog_id'];
		$blog = show_blog_details_by_id("blogs",$user_id, $blog_id);
	}
?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>

<div>
	<p>
		<a href="show_user.php?id=<?php echo $user_id?>">Back</a>
	</p>
	<p>
	<p>
	    Title:<br />
	    <?php echo $blog["title"];?><br />		
	    View Counts:<br />
	    <?php echo $blog["view_counts"];?><br />		
	    Create Time:<br />
	    <?php echo $blog["create_time"];?>	<br />	
	    Update Time:<br />
	    <?php echo $blog["update_time"];?><br />	
	    Content:<br />
	    <?php echo nl2br($blog["content"]);?><br />		
	</p>

	<p>
		<a href="edit_blog.php?user_id=<?php echo urlencode($user_id); ?>
			&blog_id=<?php echo urlencode($blog_id);?>">Edit Blog</a>
		&nbsp;&nbsp;
		<a href="delete_blog.php?user_id=<?php echo urlencode($user_id); ?>
			&blog_id=<?php echo urlencode($blog_id);?>" onclick="return confirm('Are you sure?')">Delete</a>
	</p>

	<p>Comments of the blog:</p>
	<p>
		<?php echo show_comments_of_blog(comments, $blog_id, $user_id); ?>
		<a href="delete_comment.php?de=0&blog_id=<?php echo urlencode($blog_id);?>&user_id=<?php echo urlencode($user_id);?>" onclick="return confirm('Are you sure?')">Delete All Comments</a>
	
	</p>
</div>

<?php include("../includes/layouts/footer.php"); ?>
