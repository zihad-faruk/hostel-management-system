<?php
include "header.inc.php";

if(admin_logged_in()){
    $id = admin_get_field('ASSN');
    $q="Update `admin` SET `profile_pic`='' Where `ASSN`=$id";
    if(mysqli_query($con,$q)){
        header("Location: admin_profile.php?msg=".rawurlencode("Picture was updated successfully"));
    }
}else{
    header("Location: admin_login.php?err=".rawurldecode("You have to Login to Continue"));
}

?>
