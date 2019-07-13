<?php
include 'header.inc.php';
if(isset($_GET['id'])){

    $id= $_GET['id'];


    if(stuff_logged_in()){
        $pos= stuff_get_field('Position');

        if($pos=="Accountant"){


            $q= "DELETE FROM `due` WHERE `Student_id`='$id'";
            if(mysqli_query($con,$q)){
                header("Location: stuff_profile.php?msg=".rawurlencode("Information was updated!"));
            }else{

                echo "There was a  problem";
            }


            
        }else{

            header("Location: stuff_profile.php?msg=".rawurlencode("Only dining manager can view the page!!"));
        }

    }else{
        header("Location: stuff_login.php?msg=".rawurlencode("You have to log in to continue"));
    }




}else{

    ?>
<div class="error_msg_div">
    <h2 style="font-size:30px">There was a problem</h2>
</div>

    <?php

}

?>
