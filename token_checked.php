<?php
include 'header.inc.php';
if(isset($_GET['Student_id']) && isset($_GET['date'])){
    $id= $_GET['Student_id'];
    $date = $_GET['date'];
    $mon= date('Y-m');

    if(!empty($id) && !empty($date)){
        $q= "INSERT INTO `token_checked` VALUES('$date','$id')";
        if(mysqli_query($con,$q)){
            $q1= "UPDATE `token` SET `Token_count`=`Token_count`+1 WHERE `Month`='$mon' AND `Student_id`='$id' ";
            if(mysqli_query($con,$q1)){
                header("Location: count_token.php?msg=".rawurlencode("Token has been checked"));
            }else{
                echo "There was a problem";
            }
        }

    }else{
        echo "Fiels can not be empty";
    }
}
?>
