<?php

include 'connect.inc.php';

if(isset($_GET['ESSN'])){

    $ssn=$_GET['ESSN'];
    $f_name= $_GET['F_name'];
    $l_name= $_GET['L_name'];
    $email = $_GET['Email'];
    $pass = $_GET['Password'];
    $profile_pic = $_GET['profile_pic'];

    if(!empty($ssn)){
        $query = "INSERT INTO `editor` VALUES('$ssn','$f_name','$l_name','$email','$pass','$profile_pic')";
        $query1 = "DELETE FROM `hostel`.`admin` WHERE `admin`.`ASSN` = '$ssn'";
        if($query_run= mysqli_query($con,$query)  && $query_run1=mysqli_query($con,$query1)){

                header("Location: admin_profile.php?msg=".rawurlencode("Changes were successfull"));
            

        }else{
            header("Location: admin_profile.php?msg=".rawurlencode("There was a problem."));
        }
    }else{
        header("Location: admin_profile.php?msg=".rawurlencode("There was a problem."));
    }

}


?>
