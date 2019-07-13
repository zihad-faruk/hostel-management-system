<?php
include 'header.inc.php';

    if(stuff_logged_in()){
        $pos= stuff_get_field('Position');

        if($pos=="Accountant"){

            if(isset($_POST['id']) && isset($_POST['amount'])){
                $id= $_POST['id'];
                $amount = $_POST['amount'];

                if(!empty($id) && !empty($amount)){

                    if(other_student_get_field('Student_id',$id)){

                        $q= "INSERT INTO `due` VALUES('$id','$amount')";

                        if(mysqli_query($con,$q)){


                            header("Location: stuff_profile.php?msg=".rawurlencode("Information was updated"));
                        }else{
                            ?>
                            <div class="error_msg_div">
                                <h2>Already record exists for this student</h2>
                            </div>
                            <?php
                        }



                    }else{

                        ?>
                        <div class="error_msg_div">
                            <h2>This student does not exist</h2>
                        </div>

                        <?php


                    }


                }else{
                    ?>

                    <div class="error_msg_div">
                        <h2>Fields can not be empty</h2>
                    </div>

                    <?php
                }

            }



?>
<div class="row" style="height:100vh;">
    <div class="col-lg-2">

    </div>
    <div class="col-lg-8" style="background-color:white;margin-bottom:50px;margin-top:50px;min-height:100vh;border:1px solid grey;border-radius:5px;">
        <div class="row">
            <a href="stuff_profile.php"><button type="button" name="button" style="float:left;margin:5px;" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button></a>
            <a href="stuff_logout.php"><button type="button" name="button" style="float:right;margin:5px;" class="btn btn-danger"><i class="fa fa-power-off"></i> Log Out</button></a>
        </div>
        <i class="fa fa-3x fa-edit" style="padding-top:50px;"></i> <h2 style="font-size:25px;margin-bottom:30px">ADD Due</h2>


<style media="screen">
.aa{
    background-color: transparent;
}
    .aa:hover {
        background-color: #57cbcc;
    }
</style>

        <form  action="add_due.php" method="POST" style="">


            <div class="form-group row">
                <div class="col-lg-6">
                    <input type="number" placeholder="Student id" class="form-control" name="id" >
                </div>

                <div class="col-lg-6">
                    <input type="number" placeholder="Amount" class="form-control" name="amount" min="100" >
                </div>



            </div>


            <input class="aa" type="submit" name="" value="Add">

        </form>

    </div>
    <div class="col-lg-2">

    </div>
</div>


<?php

        }else{

            header("Location: stuff_profile.php?msg=".rawurlencode("Only dining manager can view the page!!"));
        }

    }else{
        header("Location: stuff_login.php?msg=".rawurlencode("You have to log in to continue"));
    }





?>
