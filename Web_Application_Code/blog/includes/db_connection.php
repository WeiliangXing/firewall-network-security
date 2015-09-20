<?php
  // 1. Create a database connection
  $db_host = "localhost";
  $db_user = "root";
  $db_password = "123";
  $db_name = "waf_db";
  $connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("Cannot connect to the database!");
  }
?>
