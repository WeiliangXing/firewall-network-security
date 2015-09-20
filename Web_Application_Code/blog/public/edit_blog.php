<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/session.php"); ?>

<?php 
	if(isset($_GET['user_id']) && isset($_GET['blog_id'])){
		$_SESSION["adimn_user_id"] = $_GET['user_id'];
		$_SESSION["adimn_blog_id"] = $_GET['blog_id'];
	}
	$blog = show_blog_details_by_id("blogs",$_SESSION["adimn_user_id"], $_SESSION["adimn_blog_id"]);
?>

<?php 
	if (isset($_GET['submit'])) {
		// form was submitted
		$title = $_GET["title"];
		$content = $_GET
		["content"];
		$query  = "UPDATE blogs SET ";
		$query .= "title = '{$title}', ";
		$query .= "content = '{$content}' ";
		$query .= "WHERE id = {$_SESSION["adimn_blog_id"]} ";
		$query .= "LIMIT 1";

	    $result = mysqli_query($connection, $query);

	    if($result){
	    	redirect_to("view_blog.php?user_id={$_SESSION["adimn_user_id"]}&blog_id={$_SESSION["adimn_blog_id"]}");
	    }else{
	    	echo "Blog Modification failed";
	    }
	}


?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>

<div align="justify">
	<p>
		<a href="view_blog.php?user_id=<?php echo urlencode($_SESSION["adimn_user_id"])?>
			&blog_id=<?php echo urlencode($_SESSION["adimn_blog_id"])?>">Back</a>
	</p>
	<h2>
		Edit Blog:
	</h2>
	<form action="edit_blog.php?user_id=<?php echo urlencode($_SESSION["adimn_user_id"])?>
			&blog_id=<?php echo urlencode($_SESSION["adimn_blog_id"])?>" method="get">
		Title:<input type="text" name="title" value="<?php echo htmlentities($blog["title"]);?>" /><br /><br />
		Content:<br /> <textarea name="content" rows="10" cols="40"><?php echo htmlentities(nl2br($blog["content"]));?></textarea><br /><br />
		<input type="submit" name="submit" value="Submit" /><br /><br /><br />
	</form>
</div>

<script type="text/javascript">
	function cancel(){
		location.href = 'manage_content.php';
	}

	function delete_user(){
		var ask = window.confirm("Are you sure you want to delete it?");
	    if (ask) {
	        window.alert("This user was successfully deleted.");
	        location.href = "delete_user.php?id=<?php echo $user["id"]; ?>";
    	}
	}
</script>

<?php include("../includes/layouts/footer.php"); ?>

