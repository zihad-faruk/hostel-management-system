<?php
include "header.inc.php";

if(student_logged_in()){
    $id = student_get_field('Student_id');
    $q="Update `student` SET `profile_pic`='' Where `Student_id`=$id";
    if(mysqli_query($con,$q)){
        header("Location: student_profile.php?msg=a");
    }
}else{
    header("Location: student_login.php?err=".rawurldecode("You have to Login to Continue"));
}

?>