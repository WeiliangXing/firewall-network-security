<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/session.php"); ?>

<?php $_SESSION["blog_id"] = null;?>


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap-blog.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/blog-post.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<?php 
	if(isset($_GET['user_id']) && isset($_GET['blog_id'])){
		$user_id = $_GET['user_id'];
		$blog_id = $_GET['blog_id'];
		$blog = show_blog_details_by_id("blogs",$user_id, $blog_id);
	}
	$cur_user = show_user_details_by_id("users",$_SESSION['user_id']);
	$show_user = show_user_details_by_id("users",$user_id);

	increase_counts("blogs",$user_id, $_SESSION["user_id"],$blog_id);
?>

<?php 
	if (isset($_POST['submit'])) {
		//use session user_id as db user_id
		$db_blog_id = $blog_id;
		$db_user_id = $_SESSION['user_id'];
		$comments = $_POST["comments"];
		$query = "INSERT INTO comments(";
		$query .= "blog_id,user_id,content,create_time,update_time";
	    $query .= ") VALUES (";
	    $query .= "{$db_blog_id}, {$db_user_id}, '{$comments}', null,null";
	    $query .= ")";
	    $result = mysqli_query($connection, $query);

	    if($result){
	    	// redirect_to("user_signin.php");
	    	// echo "success comments!";
	    }else{
	    	echo "User creation failed";
	    }

	}
?>


<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">CSE 508 Network Security</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Welcome <?php echo $show_user["user_name"];?>!</a>
                    </li>
                    <li>
                        <a href="../index.php">Home Page</a>
                    </li>
                    <li>
                        <a href="user_main.php">Blogs</a>
                    </li>
                    <li>
                    	<a href="user_create_blog.php?id=<?php echo $user["id"];?>">Create New Blog</a>
                    </li>
                    <li>
                    	<a href="user_signout.php">Sign out</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <a href="user_main.php?id=<?php echo $_SESSION['user_id']?>">Back to last page</a>
				&nbsp;&nbsp;
				<?php echo show_edit_and_delete($user_id,$_SESSION["user_id"],$blog_id);?>

                <h1><?php echo $blog["title"];?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $show_user["user_name"];?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Create Time: <?php echo $blog["create_time"];?></p>
                <p><span class="glyphicon glyphicon-time"></span> Update Time: <?php echo $blog["update_time"];?></p>


                <hr>

                <!-- Post Content -->
	    		<?php echo nl2br($blog["content"]);?><br />	
                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="user_view_blog.php?user_id=<?php echo urlencode($user_id)?>&blog_id=<?php echo urlencode($blog_id)?>" method="post">
                        <div class="form-group">
                            <textarea class="form-control" name="comments" rows="3"></textarea>
                        </div>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary"/>
                    </form>
                </div>
                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php
					if($db_blog_id) {$this_blog_id=$db_blog_id;}
					if($blog_id){$this_blog_id=$blog_id;}
					echo show_comments_for_blog("comments",$this_blog_id, $_SESSION['user_id']);
				?>
         
                    
                </div>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; password</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery-blog.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap-blog.min.js"></script>

</body>

</html>