<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/session.php"); ?>
<?php 
	$_SESSION["adimn_user_id"] = null;
	$_SESSION["adimn_username"] = null;
	$_SESSION["adimn_blog_id"] = null;
?>

<?php 
	if(isset($_GET['submit'])){
		$attack = $_GET["attacks"];
		if($attack){
	    	redirect_to("{$attack}");
	    }else{
	    	echo "Go to user failed";
	    }
	}
?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>

<div id="main_table">
	<p>
		<a href="../index.php">Back to Main</a>
	</p>

	<?php 
		echo show_users("users");

	?>
	<p>
		<a href="create_user.php">Create New User</a>&nbsp;&nbsp;
		<a href="delete_user.php?de=0" onclick="return confirm('Are you sure?');">Delete All</a>&nbsp;&nbsp;
	</p>
</div>

<!--
<div id="link_experiment">
	<h4>Experiements:</h4>
	<p>
		<form action="manage_content.php" method="get">
			<select id='attack_type'onclick="chooseAttack()">
			  <option value='0' selected>Normal</option>
			  <option value='1'>Attack 1</option>
			  <option value='2'>Attack 2</option>
			  <option value='3'>Attack 3</option>
			  <option value='4'>Attack 4</option>
			</select><br /><br />
			Attack Content: <br /><textarea id="attack_field" name = "attacks" rows='10' cols='40'></textarea><br /><br />
			<input type="submit" name="submit" value="Go" />
		</form>
	</p>

</div>

<script type="text/javascript">
	function chooseAttack(){
		var attack_type = document.getElementById("attack_type").value;

		var show_area = document.getElementById("attack_field");
		var content = "";
		switch(parseInt(attack_type)){
			case 1:
				content = "attacks type_1";
				break;
			case 2:
				content = "attacks type_2";
				break;
			case 3:
				content = "attacks type_3";
				break;
			case 4:
				content = "attacks type_4";
				break;
			default:
				content = "show_user.php?id=1";

		}
		show_area.innerHTML = content;
	}
</script>
-->

<?php include("../includes/layouts/footer.php"); ?>
