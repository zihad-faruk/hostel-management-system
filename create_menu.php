<?php
include 'header.inc.php';
if(stuff_logged_in()){
    $pos= stuff_get_field('Position');

    if($pos=="Dining Manager"){

        if(isset($_POST['time']) && isset($_POST['date']) && isset($_POST['item_1'])){

            $ti = $_POST['time'];
            $da = $_POST['date'];
            $i1= $_POST['item_1'];
            $i2= $_POST['item_2'];
            $i3= $_POST['item_3'];
            $i4= $_POST['item_4'];
            $i5= $_POST['item_5'];
            $i6= $_POST['item_6'];
            $i7= $_POST['item_7'];

            if(!empty($i1) && !empty($i2)){

                $q= "INSERT INTO `menu` VALUES('$ti','$da','$i1','$i2','$i3','$i4','$i5','$i6','$i7')";

                if($query_run= mysqli_query($con,$q)){

                    header("Location: stuff_profile.php?msg=".rawurlencode("Menu was created!!"));
                }else{
                    ?>
                    <div class="error_msg_div" >
                        <h2 style="padding:10px">ERROR!!! You can not set multiple menus on same date and time.</h2>
                    </div>


                    <?php
                }



            }else{
                ?>
                <div class="error_msg_div" >
                    <h2 style="padding:10px">ERROR!!! There must be atleast two items entered</h2>
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
                <i class="fa fa-3x fa-edit" style="padding-top:20px;"></i> <h2 style="font-size:25px;margin-bottom:30px">Create Menu</h2>


        <style media="screen">
        .aa{
            background-color: transparent;
        }
            .aa:hover {
                background-color: #57cbcc;
            }
        </style>

                <form  action="create_menu.php" method="POST" style="">
                    <div class="form-group">

                    </div>

                    <div class="form-group row">

                        <div class="col-lg-6">
                            <select class="form-control" name="time">
                                <option value="Day">Day</option>
                                <option value="Night">Night</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <?php $date=date("Y-m-d");?>
                            <select class="form-control" name="date">
                                <option value="<?php echo date('Y-m-d',strtotime($date.'+ 1 days')) ?>"><?php echo date('d-m-Y',strtotime($date.'+ 1 days')) ?></option>
                                <option value="<?php echo date('Y-m-d',strtotime($date.'+ 2 days')) ?>"><?php echo date('d-m-Y',strtotime($date.'+ 2 days')) ?></option>
                                <option value="<?php echo date('Y-m-d',strtotime($date.'+ 3 days')) ?>"><?php echo date('d-m-Y',strtotime($date.'+ 3 days')) ?></option>
                                <option value="<?php echo date('Y-m-d',strtotime($date.'+ 4 days')) ?>"><?php echo date('d-m-Y',strtotime($date.'+ 4 days')) ?></option>
                                <option value="<?php echo date('Y-m-d',strtotime($date.'+ 5 days')) ?>"><?php echo date('d-m-Y',strtotime($date.'+ 5 days')) ?></option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-12">
                            <input type="text" placeholder="Item 1" class="form-control" name="item_1" >
                        </div>



                    </div>

                    <div class="form-group row">
                        <div class="col-lg-12">
                            <input type="text" placeholder="Item 2" class="form-control" name="item_2">
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-lg-12">
                            <input type="text" placeholder="Item 3" class="form-control" name="item_3">
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-lg-12">
                            <input type="text" placeholder="Item 4" class="form-control" name="item_4">
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-lg-12">
                            <input type="text" placeholder="Item 5" class="form-control" name="item_5">
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-lg-12">
                            <input type="text" placeholder="Item 6" class="form-control" name="item_6">
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-lg-12">
                            <input type="text" placeholder="Item 7" class="form-control" name="item_7">
                        </div>

                    </div>







                    <input class="aa" type="submit" name="" value="Update">

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
