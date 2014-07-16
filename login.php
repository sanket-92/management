<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// Check if username and password are correct
if ($_POST["userid"] == "admin" && $_POST["pswrd"] == "admin") {

    // If correct, we set the session to YES
    session_start();

    $_SESSION["Login"] = "YES";
    $_SESSION['id'] = "";
    $_SESSION['name'] = "";
    $_SESSION['email'] = "";
    $_SESSION['age'] = "";
    $_SESSION['type'] = "";
    //echo "<h1>You are now logged correctly in</h1>";
    header("Location: employee_data_entry.php");
    exit;
} else {

    // If not correct, we set the session to NO
    session_start();
    $_SESSION["Login"] = "NO";
    echo "<h1>You are NOT logged correctly in </h1>";
    header("Location: index.php");
    exit;
}
?>

