<!DOCTYPE html>

<?php 
	session_start();

	$username="lamark";
	$password="lamark2017";

	if(isset($_SESSION['logg']) && $_SESSION['logg'] == true)
	{
		header("Location: manage_cpa.php");
	}

	if(isset($_POST['user']) && isset($_POST['pass']))
	{
		if($_POST['user']==$username && $_POST['pass']==$password)
		{
			$_SESSION['logg']=true;
			header("Location: manage_cpa.php");
		}
	}
?>

<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Latam-Report</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="bootstrap/css/datepicker.css" rel="stylesheet" media="screen">
      <!-- Custom styles for this template -->
      <link href="starter-template.css" rel="stylesheet">
    <style type="text/css">
      @import "bourbon";

body {
  background: #eee !important;  
}

.wrapper {  
  margin-top: 80px;
  margin-bottom: 80px;
}

.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1);  

  .form-signin-heading,
  .checkbox {
    margin-bottom: 30px;
  }

  .checkbox {
    font-weight: normal;
  }

  .form-control {
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    @include box-sizing(border-box);

    &:focus {
      z-index: 2;
    }
  }

  input[type="text"] {
    margin-bottom: -1px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
  }

  input[type="password"] {
    margin-bottom: 20px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }
}

    </style>
  </head>

  <body class="login">
      <div class="wrapper">
    <form class="form-signin" method="post" action="login.php">      
    <div class="form-group text-center"> 
      <h2 class="form-signin-heading">Sign In</h2>
      </div>
      <div class="form-group">
      <input type="text" class="form-control" name="user" placeholder="Usuario" required="" autofocus="" />
      </div>
      <div class="form-group">
      <input type="password" class="form-control" name="pass" placeholder="Password" required=""/>      
      </div>
      <div class="form-group">
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
      </div>
    </form>
  </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="bootstrap/js/validator.js"></script>
      <script src="bootstrap/js/bootstrap-datepicker.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
      <script src="bootstrap/js/bootstrap-select.js"></script>
  </body>
</html>
 