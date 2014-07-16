<?php

if (isset($_POST['emp'])) {
    //include('dbconfig.php');

    session_start();
    $_SESSION['id'] = $_POST['emp'];
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['email'] = $_POST['email'];

    $empid = $_POST['emp'];
    if (!preg_match('/^[0-9]+$/', $empid)) {
        $message = "Invalid Employee ID";
        echo "<script type='text/javascript'>alert('$message'); window.location.href = 'http://localhost/mgmt/employee_data_entry.php';</script>";
        die();
    }
    $user = $_POST['name'];
    if (!preg_match('/^[a-zA-Z ]+$/', $user)) {
        $message = "Invalid User Name";
        echo "<script type='text/javascript'>alert('$message'); window.location.href = 'http://localhost/mgmt/employee_data_entry.php';</script>";
        die();
    }
    $age = $_POST['age'];
    if ((!preg_match('/^[0-9]+$/', $age)) && ($age > 0) && ($age < 150)) {
        $message = "Invalid Age";
        echo "<script type='text/javascript'>alert('$message'); window.location.href = 'http://localhost/mgmt/employee_data_entry.php';</script>";
        die();
    }

    $email = strtolower($_POST['email']);
    $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    if (!preg_match($regex, $email)) {

        $message = "Invalid Email ID";
        echo "<script type='text/javascript'>alert('$message'); window.location.href = 'http://localhost/mgmt/employee_data_entry.php';</script>";
        die();
    }
    $text = $empid . ',' . $user . ',' . $age . ',' . $email . "\r\n";
    if ($_SESSION['type'] == 'edit') {

        $main = fopen('data.txt', 'r+');
        $dup = fopen('temp.txt', 'w+');
        while (!feof($main)) { // Loop til end of file.
            $buffer = fgets($main);
            $buffer = trim($buffer);
            if ($buffer == "") {
                break;
            }
            list($id_test, $name1, $age1, $email1) = explode(",", $buffer);
            if ($id_test != $_SESSION['id']) {
                $text = $id_test . ',' . $name1 . ',' . $age1 . ',' . $email1 . "\r\n";
                fwrite($dup, $text);
            } else {

                $text = $_SESSION['id'] . ',' . $user . ',' . $age . ',' . $email . "\r\n";
                fwrite($dup, $text);
            }
        }
        fclose($main);
        fclose($dup);
        unlink('data.txt');
        rename('temp.txt', 'data.txt');
        $_SESSION['type'] = '';
        //mysqli_query($con,"update data set user='$user',age=$age , email='$email' where empid=$empid");
        //mysqli_close($con);
        header('Location: http://localhost/mgmt/display_info.php');
    }
    $handle = @fopen("data.txt", "a+");
    $user_exist = 0;
    while (!feof($handle)) {
        $buffer = fgets($handle);
        list($id1, $name1, $age1, $email1) = explode(",", $buffer);
        if ($id1 == $empid) {
            $user_exist++;
        }
    }
    //$result = mysqli_query($con,"SELECT empid FROM data WHERE empid=$empid") or die(mysqli_error($con));
    //$user_exist = mysqli_num_rows($result);
    if ($user_exist) {
        $message = "User Already Exists";
        echo "<script type='text/javascript'>alert('$message'); window.location.href = 'http://localhost/mgmt/employee_data_entry.php';</script>";
        die();
    }

    fwrite($handle, $text);
    //mysqli_query($con,"INSERT INTO data(empid,user,age,email) VALUES ($empid,'$user', $age,'$email')") or die(mysqli_error($con));
    //mysqli_close($con);
    fclose($handle);
    header('Location: http://localhost/mgmt/display_info.php');
}

