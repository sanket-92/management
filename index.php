<?php

	// Start up your PHP Session 
	session_start();

	// If the user is not logged in send him/her to the login form
        if(isset($_SESSION['Login'])){
	if ($_SESSION["Login"] == "YES") {
	  header("Location: employee_data_entry.php");
	}
        }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.ico">

    <title>Log In Page</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin1.css" rel="stylesheet">
    <script src="/assets/js/ie-emulation-modes-warning.js"></script>

    <script src="/assets/js/ie10-viewport-bug-workaround.js"></script>
    
    <link href="form.css" rel="stylesheet" type="text/css" />
    
	<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
   <!-- <script language="javascript" src="js/login_check.js"></script>-->
  </head>

  <body>

    <div>

      <form class="form-signin" role="form" method="post" action="login.php">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input name="userid" id="username" type="text" class="form-control" placeholder="Employee ID" required autofocus autocomplete="off">
        <input name="pswrd" type="password" class="form-control" placeholder="Password" required autocomplete="off">
      <!--  <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label> -->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        
      </form>

    </div> 
  </body>
</html>
