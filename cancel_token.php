<?php
include "header.inc.php";

if(student_logged_in()){
    $id= $_SESSION['Student_id'];
    $month = date("Y-m");
    $finishing = date('Y-m-d',strtotime(token_get_field('Starting',$month,$id)."+".token_get_field('Days',$month,$id)." days"));
    global $day;
    $day = date('d',strtotime($finishing."-".date('d')." days"));

    if(isset($_POST['starting']) && isset($_POST['days'])){


        $starting = $_POST['starting'];
        $days = $_POST['days'];



        if(!empty($days) && $days<=$day){

            //Determining Last date of Token Cancelation
            $finish = date('Y-m-d',strtotime($starting."+".$days." days"));

            $q= "INSERT INTO `token_cancel` VALUES('$month','$id','$starting','$finish')";

            if($query_run= mysqli_query($con,$q)){
                header("Location: student_profile.php?msg=".rawurlencode("Token has been canceled!"));
            }else{ ?>
                <div class="error_msg_div">
                    <h2 style="padding:20px;font-weight:600">ERROR!!! You can not cancel token multiple times in the same month</h2>
                </div>
            <?php }

        }else{

            ?>

            <div class="error_msg_div">
                <h2 style="padding:20px">Fields can not be empty or days can not exceed your limit</h2>
            </div>

            <?php


        }
    }
    ?>

    <div class="row" style="height:100vh;">
        <div class="col-lg-2">



        </div>
        <div class="col-lg-8" style="background-color:white;margin-bottom:50px;margin-top:50px;min-height:70vh;border:1px solid grey;border-radius:5px;">
            <div class="row">
                <a href="student_profile.php"><button type="button" name="button" style="float:left;margin:5px;" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button></a>
                <a href="student_logout.php"><button type="button" name="button" style="float:right;margin:5px;" class="btn btn-danger"><i class="fa fa-power-off"></i> Log Out</button></a>
            </div>
            <i class="fa fa-3x fa-edit" style="padding-top:50px;"></i> <h2 style="font-size:25px;margin-bottom:30px">Cancel Token(<?php echo $day;?> Days Left)</h2>


    <style media="screen">
    .aa{
        background-color: transparent;
    }
        .aa:hover {
            background-color: #57cbcc;
        }
    </style>

            <form  action="cancel_token.php" method="POST" style="">


                <div class="form-group row">
                    <div class="col-lg-6">
                        <?php $date=date("Y-m-d");?>

                        <select class="form-control" name="starting">
                            <option value="<?php echo date('Y-m-d',strtotime($date.'+ 1 days')) ?>"><?php echo date('d-m-Y',strtotime($date.'+ 1 days')) ?></option>
                        </select>
                    </div>

                    <div class="col-lg-6">
                        <input class="form-control" type="number" name="days" value="" min="1" max="<?php echo $day;?>" placeholder="Number of days">
                    </div>



                </div>


                <input class="aa" type="submit" name="" value="Cancel">

            </form>

        </div>
        <div class="col-lg-2">

        </div>
    </div>


    <?php
}else{
    header("Location: student_login.php?err=".rawurldecode("You have to Login to Continue"));
}

?>
