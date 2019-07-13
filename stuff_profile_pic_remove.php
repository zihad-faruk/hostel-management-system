<?php
include "header.inc.php";

if(stuff_logged_in()){
    $id = stuff_get_field('SSN');
    $q="Update `stuff` SET `profile_pic`='' Where `SSN`=$id";
    if(mysqli_query($con,$q)){
        header("Location: stuff_profile.php?msg=".rawurlencode("Profile picture was updated"));
    }
}else{
    header("Location: stuff_login.php?err=".rawurldecode("You have to Login to Continue"));
}

?>
