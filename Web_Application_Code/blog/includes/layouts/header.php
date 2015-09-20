<?php 
	if (!isset($layout_context)) {
		$layout_context = "public";
	}
?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<title>Team Password <?php if ($layout_context == "admin") { echo "Admin"; } ?></title>
		<style>
			header {
			    background-color:black;
			    color:white;
			    text-align:center;
			    padding:5px;	 
			}
			table{width:100%;}
			table, th, td {
			    border: 1px solid black;
			    border-collapse: collapse;
			}
			th, td {
			    padding: 5px;
			    text-align: left;
			}

			section {
			    width:350px;
			    /*text-align:center;*/
			    float:left;
			    padding:10px;	 	 
			}
			footer {
			    background-color:black;
			    color:white;
			    clear:both;
			    text-align:center;
			    padding:5px;	 	 
			}
			.textlimits{
			  line-height: 1.2em;
			  height: 6.0em;
			  overflow: hidden;
			}
			.leftalign{
				text-align: left;
			}

		</style>
	</head>
	<body>

    <header>
      <h1><?php
       if ($layout_context == "admin") { echo "Users Manage System"; 
       } else {echo "Welcome to Blogs For Network Security!";}
       ?></h1>
    </header>
