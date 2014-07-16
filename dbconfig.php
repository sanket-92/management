<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$con = mysqli_connect('localhost', 'root', 'sk');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
//echo 'Connected successfully';
mysqli_select_db($con, "emp") or die(mysqli_error($con));
?>