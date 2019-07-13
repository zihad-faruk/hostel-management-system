<?php
include 'header.inc.php';
if(isset($_GET['time']) && isset($_GET['date'])){

    $date= $_GET['date'];
    $time= $_GET['time'];

    if(stuff_logged_in()){
        $pos= stuff_get_field('Position');

        if($pos=="Dining Manager"){

            if(isset($_POST['item_1'])){


                $i1= $_POST['item_1'];
                $i2= $_POST['item_2'];
                $i3= $_POST['item_3'];
                $i4= $_POST['item_4'];
                $i5= $_POST['item_5'];
                $i6= $_POST['item_6'];
                $i7= $_POST['item_7'];

                if(!empty($i1) && !empty($i2)){

                    $q= "INSERT INTO `menu` VALUES('$ti','$da','$i1','$i2','$i3','$i4','$i5','$i6','$i7')";
                    $q= "UPDATE `menu` SET `Item_1`='$i1',`Item_2`='$i2',`Item_3`='$i3',`Item_4`='$i4',`Item_5`='$i5',`Item_6`='$i6',`Item_7`='$i7' WHERE `Time`='$time' AND `Date`='$date' ";

                    if($query_run= mysqli_query($con,$q)){

                        header("Location: stuff_profile.php?msg=".rawurlencode("Menu was updated!!"));
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
                    <i class="fa fa-3x fa-edit" style="padding-top:20px;"></i> <h2 style="font-size:25px;margin-bottom:30px">Edit Menu</h2>


            <style media="screen">
            .aa{
                background-color: transparent;
            }
                .aa:hover {
                    background-color: #57cbcc;
                }
            </style>

                    <form  action="" method="POST" style="">
                        <div class="form-group">

                        </div>



                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="text" placeholder="Item 1" class="form-control" name="item_1" value="<?php echo menu_get_field('Item_1',$date,$time);?>">
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="text" placeholder="Item 2" class="form-control" name="item_2"  value="<?php echo menu_get_field('Item_2',$date,$time);?>">
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="text" placeholder="Item 3" class="form-control" name="item_3"  value="<?php echo menu_get_field('Item_3',$date,$time);?>">
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="text" placeholder="Item 4" class="form-control" name="item_4"  value="<?php echo menu_get_field('Item_4',$date,$time);?>">
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="text" placeholder="Item 5" class="form-control" name="item_5"  value="<?php echo menu_get_field('Item_5',$date,$time);?>">
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="text" placeholder="Item 6" class="form-control" name="item_6"  value="<?php echo menu_get_field('Item_6',$date,$time);?>">
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="text" placeholder="Item 7" class="form-control" name="item_7"  value="<?php echo menu_get_field('Item_7',$date,$time);?>">
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




}else{

    ?>
<div class="error_msg_div">
    <h2 style="font-size:30px">There was a problem</h2>
</div>

    <?php

}

?>
