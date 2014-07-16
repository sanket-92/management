<?php

	// Start up your PHP Session 
	session_start();

	// If the user is not logged in send him/her to the login form
	if ($_SESSION["Login"] != "YES") {
	  header("Location: index.php");
	}

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.ico">
    <title>Employee Data Entry</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    
    <script src="/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/assets/js/ie10-viewport-bug-workaround.js"></script>
    <link href="form.css" rel="stylesheet" type="text/css" />
    
	<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="js/employee_entry.js"></script>
    
  </head>

  <body>

    <div class="container">

        <form class="form-signin" action="insert.php" method="POST">
        <h2 class="form-signin-heading">Enter Details of Employee</h2>
	<p>Enter Employee ID</p>
  
        <input <?php if($_SESSION["type"]=="edit"){ echo "readonly"; } ?> name="emp" type="text" onkeyup="emp_check()" pattern="[0-9]+"  oninvalid="setCustomValidity('Plz Enter Valid Employee ID ')"
      onclick="emp_check()" value='<?php echo $_SESSION['id'];?>' onchange="try{setCustomValidity('')}catch(e){}" class="emp"  id="emp" placeholder="Employee ID" maxlength="10" required placeholder autocomplete="off"><span id="emp-result" autocomplete="off"></span><br>
	<p>Enter Your Name</p>
	<input name="name" type="text" pattern="[a-zA-Z ]+" oninvalid="setCustomValidity('Plz Enter Valid Name')"
     onkeyup="name_check()" value='<?php echo $_SESSION['name']; ?>' onchange="try{setCustomValidity('')}catch(e){}" class="name" id="name" placeholder="Name" maxlength="20" required autocomplete="off"><span id="name-result" autocomplete="off"></span><br>
	<p>Age</p>
	<input name="age" type="text"  pattern="[0-9]+" oninvalid="setCustomValidity('Plz Enter Valid Age')"
     onchange="try{setCustomValidity('')}catch(e){}" value='<?php echo $_SESSION['age']; ?>' class="age" id="age" onkeyup="age_check()" placeholder="Age" maxlength="3" required autocomplete="off"><span id="age-result" autocomplete="off"></span>
	<br>
	<p>Email ID</p>
        <input name="email" type="text"  pattern="[a-zA-Z0-9\._-]+@[a-zA-Z]+\.[a-zA-Z]{2,6}" oninvalid="setCustomValidity('Plz Enter Valid Email ID')"
               onchange="try{setCustomValidity('')}catch(e){}" onkeyup="email_check()" value='<?php echo $_SESSION['email']; ?>'  class="email"  id="email" age="email" maxlength="20"  placeholder="Email ID" required autocomplete="off"><span id="email-result" autocomplete="off"></span><br>
	<br>
	
        
        <button class="btn btn-lg btn-primary btn-block" type="submit" id="submit">Submit</button>
        
        <input type="reset" class="btn btn-lg btn-primary btn-block"  value="Reset"/>
        <input type="button" class="btn btn-lg btn-primary btn-block submit-button" onclick="location.href = 'display_info.php';" value="Display Info"/>
        <input type="button" class="btn btn-lg btn-primary btn-block submit-button" onclick="location.href = 'logout.php';" value="Logout"/>
        </form>

    </div> 
      
  </body>
</html>
