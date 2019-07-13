<?php
$host = "localhost";
$user = "root";
$pass = "";
$database_name = "hostel";

global $con;



$con = mysqli_connect($host,$user,$pass);
if($f=mysqli_select_db($con,$database_name)){
}

else{
    echo "There was a problem while connecting";
}
?>
