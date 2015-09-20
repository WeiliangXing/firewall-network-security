<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
  $username = "";

  if (isset($_GET['submit'])) {

  	$username = $_GET["username"];
  	$password = $_GET["password"];
  	
  	$found_user = attempt_login($username, $password);

    if ($found_user) {
  		$_SESSION["user_id"] = $found_user["id"];
  		$_SESSION["username"] = $found_user["username"];
      redirect_to("user_main.php?user_id={$_SESSION["user_id"]}");
    } else {
      // Failure
      $_SESSION["message"] = "Username/password not found.";
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
        <div class="container" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">CSE 508 Network Security</a>
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
                        <a class="page-scroll" href="user_signup.php">New to sign up</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
        <div class="container" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">CSE 508 Network Security</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../index.php">Home page</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="user_signup.php">New to sign up</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>


  <div class="container">

<div class="page-header">
    <h1>Sign in <small>Welcome back to our blog</small></h1>
</div>

<?php echo message(); ?>
<!-- Simple Login - START -->
<form class="col-md-6" action="user_signin.php" method="get">
    <div class="form-group">
      <input type="text" class="form-control input-lg" placeholder="Username" name="username" value="<?php echo htmlentities($username); ?>" />
    </div>
    <div class="form-group">
        <input type="password" name="password" value="" class="form-control input-lg" placeholder="Password">
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Sign In" class="btn btn-primary btn-lg btn-block"/>
        
        <span><a href="#">Need help?</a></span>
        <span class="pull-right"><a href="user_signup.php">New Registration</a></span>
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
