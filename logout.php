<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// Start up your PHP Session 
session_start();

// If the user is not logged in send him/her to the login form
if ($_SESSION["Login"] != "YES") {
  header("Location: login.php");
}
else{
    session_destroy();
    header("Location: login.php");
    
}

	
?>