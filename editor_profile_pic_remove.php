<?php
include "header.inc.php";

if(editor_logged_in()){
    $id = editor_get_field('ESSN');
    $q="Update `editor` SET `profile_pic`='' Where `ESSN`=$id";
    if(mysqli_query($con,$q)){
        header("Location: editor_profile.php?msg=".rawurlencode("Picture was updated successfully"));
    }
}else{
    header("Location: editor_login.php?err=".rawurldecode("You have to Login to Continue"));
}

?>
