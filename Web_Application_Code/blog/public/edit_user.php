<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php 
	global $user;
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$user = show_user_details_by_id("users",$id);
	}
?>

<?php 
	if (isset($_GET['submit'])) {
		// form was submitted
		$username = $_GET["username"];
		$password = $_GET["password"];
		if($_GET["gender"] == "Male"){
			$gender = (int)1;
		}else{ 
			$gender = (int)0;
		}
		$major = $_GET["major"];
		$annual_salary = (int)$_GET["annual_salary"];
		$remark = $_GET["remark"];

		$query  = "UPDATE users SET ";
	    $query .= "user_name = '{$username}', ";
	    $query .= "password = '{$password}', ";
	   	$query .= "gender = {$gender}, ";
   	    $query .= "major = '{$major}', ";
	    $query .= "annual_salary = {$annual_salary}, ";
	   	$query .= "remark = '{$remark}' ";
	   	$query .= "WHERE id = {$user["id"]} ";
	   	$query .= "LIMIT 1";

	    $result = mysqli_query($connection, $query);

	    if($result){
	    	redirect_to("show_user.php?id={$user["id"]}");
	    }else{
	    	// echo $id == null;
	    	echo "User Modification failed";
	    }
	}


?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>

<div align="justify">
	<p>
		<a href="show_user.php?id=<?php echo $id?>">Back</a>
	</p>
	<h2>
		Edit User: <?php echo htmlentities($user["user_name"]);?>
	</h2>

	<form action="edit_user.php?id=<?php echo urlencode($user["id"]); ?>" method="get">
		Username:<input type="text" name="username" value=
			"<?php echo htmlentities($user["user_name"]);?>" /><br /><br />
		Password: <input type="password" name="password" value=
		    "<?php echo htmlentities($user["password"]);?>" /><br /><br />
		Gender: <input type="radio" name="gender" value="Male"
					<?php if ($user["gender"] == 1) { echo "checked"; } ?> />Male
				<input type="radio" name="gender" value="Female"
					<?php if ($user["gender"] == 0) { echo "checked"; } ?> />Female<br /><br />
		Major: <input type="text" name="major" value=
			"<?php echo htmlentities($user["major"]);?>" /><br /><br />
		Annual Salary: <input type="text" name="annual_salary" value=
			"<?php echo htmlentities($user["annual_salary"]);?>" /><br /><br />
		Description:<br /> <textarea name="remark" rows="10" 
			cols="40"><?php echo htmlentities($user["remark"]);?></textarea><br /><br />
		<input type="submit" name="submit" value="Edit User" />
		&nbsp;
		&nbsp;
		<input type=button onclick="cancel()" value="Cancel">
		&nbsp;
		&nbsp;
		<input type=button onclick="delete_user()" value="Delete">
	</form><br /><br /><br /><br />
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

