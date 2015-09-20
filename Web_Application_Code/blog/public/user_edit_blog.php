<?php ob_start(); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/session.php"); ?>

<?php 
	if(isset($_GET['user_id']) && isset($_GET['blog_id'])){
		$_SESSION["user_id"] = $_GET['user_id'];
		$_SESSION["blog_id"] = $_GET['blog_id'];
	}
	$blog = show_blog_details_by_id("blogs",$_SESSION["user_id"], $_SESSION["blog_id"]);
?>

<?php 
	if (isset($_GET['submit'])) {
		// form was submitted
		$title = $_GET["title"];
		$content = $_GET["content"];
		$query  = "UPDATE blogs SET ";
		$query .= "title = '{$title}', ";
		$query .= "content = '{$content}' ";
		$query .= "WHERE id = {$_SESSION["blog_id"]} ";
		$query .= "LIMIT 1";

	    $result = mysqli_query($connection, $query);

	    if($result){
	    	redirect_to("user_view_blog.php?user_id={$_SESSION["user_id"]}&blog_id={$_SESSION["blog_id"]}");
	    }else{
	    	echo "Blog Modification failed";
	    }
	}


?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Blog</title>

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
                        <a href="#">Welcome <?php echo $user["user_name"];?>!</a>
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

<div class="container">
        <div class="row">
        	<div class="col-lg-8">
            <!-- Blog Entries Column -->
            <a href="user_main.php?id=<?php echo urlencode($_SESSION["user_id"])?>">Back</a>
            <h1>Post a new blog </h1>
            <form action="user_edit_blog.php?user_id=<?php echo urlencode($_SESSION["user_id"])?>
						&blog_id=<?php echo urlencode($_SESSION["blog_id"])?>" method="get">
            <div class="form-group">
			Title:<input type="text" name="title" value="<?php echo htmlentities($blog["title"]);?>" class="form-control"/><br />
			Content:<br /> <textarea name="content" rows="10" class="form-control" cols="40"><?php echo htmlentities(nl2br($blog["content"]));?></textarea>
			</div>
			<input type="submit" name="submit" value="Submit" class="btn btn-primary"/>
	</form>
        	</div>
        </div>
</div>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; password</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

  <script src="../js/jquery-blog.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap-blog.min.js"></script>
</body>
</html>


