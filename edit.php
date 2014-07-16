<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_GET['id']))
{
    $id =$_GET['id'];
     session_start();
    //include('dbconfig.php');
    //$result = mysqli_query($con, "select * from data where empid=$id") or die(mysqli_error($con));
    //$row = mysqli_fetch_array($result);
     $main = fopen('data.txt', 'r+');
    
    while (!feof($main)) // Loop til end of file.
      {
            $buffer = fgets($main);
            $buffer = trim($buffer);
            if($buffer == ""){ break;}
            list($id_test,$name,$age,$email)=explode(",",$buffer);
            if($id_test == $id){
                $_SESSION['id'] = $id;
                $_SESSION['name'] = $name;
                $_SESSION['age'] = $age;
                $_SESSION['email'] = $email;
                $_SESSION['type'] = 'edit';
                break;
            }
      }
      fclose($main);
      
    
    
    
}
 header('Location: http://localhost/mgmt/employee_data_entry.php');
