<?php

	// Start up your PHP Session 
	session_start();
        
	// If the user is not logged in send him/her to the login form
	if ($_SESSION["Login"] != "YES") {
	  header("Location: index.php");
	}

?>

<html>
    <link href="css/table.css" rel="stylesheet">
    <link rel="icon" href="img/favicon.ico">
    <title> Info of All Employee's</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin1.css" rel="stylesheet">
    <script src="/assets/js/ie-emulation-modes-warning.js"></script>

    <script src="/assets/js/ie10-viewport-bug-workaround.js"></script>
    
    <link href="form.css" rel="stylesheet" type="text/css" />
    
	<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <form action="" method="post">
       <div class="CSSTableGenerator" >
<table  //width: 50px;
        //height: 50px;
    margin-left: auto;
    margin-right: auto;>
       <tr><td>Employee ID</td><td>Name</td><td>Age</td><td>Email ID</td><td>Actions</td></tr></thead
<?php 
        //include('dbconfig.php');
        
        
        //$result = mysqli_query($con,"SELECT * FROM data");
        
        //while($row = mysqli_fetch_array($result)) {
        $handle = @fopen("data.txt", "r");
        
       /* while (!feof($handle)) // Loop til end of file.
        {
            $buffer = fgets($handle);
            // Read a line.
            if($buffer == ''){  break;}
            list($id,$name,$age,$email)=explode(",",$buffer);
            */
        //}
        //file_put_contents('data.txt',implode('', file('data.txt', FILE_SKIP_EMPTY_LINES)));
            if ($handle) {
            while (($buffer = fgets($handle)) !== false) {
        // process the line read.
                if($buffer == '' || $buffer == NULL){  break;}
                list($id,$name,$age,$email)=explode(",",$buffer);
                    
                

        
         ?> 
            
            <tr>
             <!--<td><?php echo $row['empid']; ?></td> -->
             <td><?php echo $id; ?></td>
             <?php $link_delete = 'delete.php?id='.$id; ?>
             <?php $link_edit = 'edit.php?id='.$id; ?>
             <!--<td><?php 
             $u_name =  $row['user'];
                     echo $u_name; ?></td>-->
             <td><?php echo $name; ?></td>
             <!--<td><?php echo $row['age']; ?></td>-->
             <td><?php echo $age; ?></td>
            <!-- <td><?php echo $row['email']; ?></td>-->
             <td><?php echo $email; ?></td>
             <td><a href=<?php echo $link_edit?> > Edit</a>
                 <?php echo " ";?>
                   
                    <span class="delete" ><a href=<?php echo $link_delete?> >Delete</a></span></td>
            </tr>
            
            <?php
        }
            }
        fclose($handle);
        //mysqli_close($con);

?>
</table>
        </div>
    </form>
        <form class="form-signin">
    <input type="button" class="btn btn-lg btn-primary btn-block submit-button" onclick="location.href = 'employee_data_entry.php';" value="Enter More Info"/>
       <input type="button" class="btn btn-lg btn-primary btn-block submit-button" onclick="location.href = 'logout.php';" value="Logout"/>
        </form>
</html>
