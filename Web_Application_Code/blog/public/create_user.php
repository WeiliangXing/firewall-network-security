<?php ob_start(); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php require_once("create_user.php");?>

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

		$query  = "INSERT INTO users(";
	    $query .= "user_name,password,gender,major,annual_salary,remark,create_time,update_time";
	    $query .= ") VALUES (";
	    $query .= "'{$username}', '{$password}', {$gender}, '{$major}', {$annual_salary},'{$remark}',null,null";
	    $query .= ")";
	    $result = mysqli_query($connection, $query);

	    if($result){
	    	redirect_to("manage_content.php");
	    }else{
	    	echo "User creation failed";
	    }
	}


?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>

<div align="justify">
	<p>
		<a href="manage_content.php">Back</a>
	</p>
	<h2>
		Here is the new user!
	</h2>

	<form action="create_user.php" method="get">
		Username:<input type="text" name="username" value="" /><br /><br />
		Password: <input type="password" name="password" value="" /><br /><br />
		Gender: <input type="radio" name="gender" value="Male" checked>Male
				<input type="radio" name="gender" value="Female">Female<br /><br />
		Major: <input type="text" name="major" value="" /><br /><br />
		Annual Salary: <input type="text" name="annual_salary" value="" /><br /><br />
		Description:<br /> <textarea name="remark" rows="10" cols="40"></textarea><br /><br />
		<input type="submit" name="submit" value="Submit" /><br /><br /><br />
	</form>
</div>

<?php include("../includes/layouts/footer.php"); ?>
