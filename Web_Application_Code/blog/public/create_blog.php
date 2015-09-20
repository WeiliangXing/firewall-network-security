<?php ob_start(); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/session.php"); ?>

<?php require_once("create_blog.php");?>

<?php
	if(isset($_GET['user_id'])){
		$_SESSION["adimn_user_id"] =$_GET['user_id']; 
	} 
?>

<?php 
	if (isset($_GET['submit'])) {
		// form was submitted
		$title = $_GET["title"];
		$content = $_GET["content"];
		$query  = "INSERT INTO blogs(";
	    $query .= "subject_id, title, view_counts,content, create_time, update_time";
	    $query .= ") VALUES (";
	    $query .= "{$_SESSION["adimn_user_id"]}, '{$title}', 1, '{$content}',null,null";
	    $query .= ")";
	    $result = mysqli_query($connection, $query);

	    if($result){
	    	redirect_to("show_user.php?id={$_SESSION["adimn_user_id"]}");
	    }else{
	    	echo "Blog creation failed";
	    }
	}


?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>

<div align="justify">
	<p>
		<a href="show_user.php?id=<?php echo urlencode($_SESSION["adimn_user_id"])?>">Back</a>
	</p>
	<h2>
		Here is the new blog!
	</h2>

	<form action="create_blog.php" method="get">
		Title:<input type="text" name="title" value="" /><br /><br />
		Content:<br /> <textarea name="content" rows="10" cols="40"><?php echo htmlentities(nl2br(""));?></textarea><br /><br />
		<input type="submit" name="submit" value="Submit" /><br /><br /><br />
	</form>
</div>

<?php include("../includes/layouts/footer.php"); ?>
