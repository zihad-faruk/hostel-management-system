<?php
require "connect.inc.php";
require_once "core.inc.php";
if(student_logged_in()){


    $q = "SELECT `profile_pic` FROM `student` WHERE `Student_id`='".student_get_field('Student_id')."'";
    $r= mysqli_query($con,$q);

    while($row = mysqli_fetch_assoc($r)){
        echo "<img src='uploads/".$row["profile_pic"]."'>" ;
    }

}else{
    header('Location: student_login.php?err='.rawurldecode("You have to Login to Continue"));
}


?>


