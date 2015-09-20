<?php ob_start(); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php

  $_SESSION["user_id"] = null;
  $_SESSION["username"] = null;
  $_SESSION["blog_id"] = null;
  redirect_to("../index.php");
?>
