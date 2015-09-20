<?php
	require_once("functions.php");
	
	if (isset($_POST['submit'])) {
		// form was submitted
		$username = $_POST["username"];
		$password = $_POST["password"];

		if ($username == "weiliang" && $password == "xing") {
			// successful login
			redirect_to("first_page.php");
		} else {
			$message = "There were some errors.";
		}
	} else {
		$username = "";
		$message = "Please log in.";
	}
?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<title>Form</title>
	</head>
	<body>

		<?php echo $message; ?><br />
		
		<form action="form.php" method="post">
		  Username: <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" /><br />
		  Password: <input type="password" name="password" value="" /><br />
			<br />
		  <input type="submit" name="submit" value="Submit" />
		</form>

	</body>
</html>
