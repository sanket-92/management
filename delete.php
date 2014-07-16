<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $main = fopen('data.txt', 'r+');
    $dup = fopen('temp.txt', 'w+');
    while (!feof($main)) { // Loop til end of file.
        $buffer = fgets($main);
        $buffer = trim($buffer);
        if ($buffer == "") {
            break;
        }
        list($id_test, $name, $age, $email) = explode(",", $buffer);
        if ($id_test != $id) {
            $text = $id_test . ',' . $name . ',' . $age . ',' . $email . "\r\n";
            fwrite($dup, $text);
        }
    }
    fclose($main);
    fclose($dup);
    unlink('data.txt');
    rename('temp.txt', 'data.txt');

    //include('dbconfig.php');
    //$delete = mysqli_query($con, "delete from data where empid=$id") or die(mysqli_error($con));
}
header('Location: http://localhost/mgmt/display_info.php');

