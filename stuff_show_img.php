<?php
require "connect.inc.php";
require_once "core.inc.php";
if(stuff_logged_in()){


    $q = "SELECT `profile_pic` FROM `stuff` WHERE `SSN`='".stuff_get_field('SSN')."'";
    $r= mysqli_query($con,$q);

    while($row = mysqli_fetch_assoc($r)){
        echo "<img src='uploads/".$row["profile_pic"]."'>" ;
    }

}else{
    header('Location: stuff_login.php?err='.rawurldecode("You have to Login to Continue"));
}


?>


