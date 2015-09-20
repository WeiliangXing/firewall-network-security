<?php ob_start(); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("user_signup.php");?>



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
	    	redirect_to("user_signin.php");
	    }else{
	    	echo "User creation failed";
	    }
	}


?>


<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="../css/bootstrap-signin.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />

    <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap-signin.min.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
</head>

<body>
  <nav class="navbar navbar-default navbar-fixed-top navbar-shrink">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" hreff="#page-top">CSE 508 Network Security</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="active">
                        <a class="page-scroll" href="../index.php">Home page</a>
                    </li>
                    <li class="">
                        <a class="page-scroll" href="user_signin.php">Sign in</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#"></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>


  <div class="container" >

<div class="page-header">
    <h1>Sign up <small>Welcome to our blog, you'll like it!</small></h1>
</div>

<!-- Simple Login - START -->
<form class="col-md-6" action="user_signup.php" method="get">
    <div class="form-group">
    	<input type="text" name="username" value="" class="form-control input-lg" placeholder="Username"/>
    </div>
    <div class="form-group">
    	<input type="password" name="password" value="" class="form-control input-lg" placeholder="Password"/>
    </div>
    <div class="form-group">
    	<input type="radio" name="gender" value="Male" checked>&nbsp;Male &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="gender" value="Female">&nbsp;Female
    </div>
    <div class="form-group">
    	<input type="text" name="major" value="" class="form-control input-lg" placeholder="Major"/>
    </div>
    <div class="form-group">
    	<input type="text" name="annual_salary" value="" class="form-control input-lg" placeholder="Annual salary"/>
    </div>
    <div class="form-group">
			<textarea name="remark" rows="10" cols="40" placeholder="Describe yourself" class="form-control input-lg"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Sign Up"  class="btn btn-primary btn-lg btn-block"/>
        <span><a href="#">Need help?</a></span>
        <span class="pull-right"><a href="user_signin.php">Already have an account</a></span>
    </div>
</form>
<!-- Simple Login - END -->

</div>
<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; password</span>
                </div>
               
            </div>
        </div>
    </footer>
</body>



