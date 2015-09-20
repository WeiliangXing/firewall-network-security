<?php
  // 1. Create a database connection
  $dbhost = "localhost";
  $dbuser = "web_db";
  $dbpass = "password";
  $dbname = "web_db";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>
<?php
	// 2. Perform database query
	$query  = "SELECT * ";
	$query .= "FROM users ";
	$query .= "WHERE id = 1 ";
	$query .= "ORDER BY id ASC";
	$result = mysqli_query($connection, $query);
	// Test if there was a query error
	if (!$result) {
		die("Database query failed.");
	}
?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<title>Databases</title>
	</head>
	<body>
		
		<ul>
		<?php
			// 3. Use returned data (if any)
			while($user = mysqli_fetch_assoc($result)) {
				// output data from each row
		?>
				<li><?php echo $user["user_name"] . " (" . $user["id"] . ")"; ?></li>
	  <?php
			}
		?>
		</ul>
		
		<?php
		  // 4. Release returned data
		  mysqli_free_result($result);
		?>
	</body>
</html>

<?php
  // 5. Close database connection
  mysqli_close($connection);
?>