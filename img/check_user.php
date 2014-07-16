<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_POST["emp"]))
{
       
        include('dbconfig.php');  
        $emp = $_POST['emp'];
        $result = mysqli_query($con, "SELECT empid FROM data WHERE empid=$emp");
        $user_exist = mysqli_num_rows($result);
        if(!user_exist)
            {
            die('Error : User Exists');
        }
        else {die('<image src="img/check.png"/>');}
        mysqli_close($con);
}


?>

