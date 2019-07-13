<?php include 'connect.inc.php';
        include 'core.inc.php';

        if(stuff_logged_in()){

            $pos = stuff_get_field('Position');
            if($pos=='Dining Manager'){ ?>


                <!DOCTYPE html>
                <html>


                <head><title>Token Count Page</title></head>


                <meta name="viewport" content="width=device-width, initial-scale=1">



                <!-- Fontawesome Icon font -->
                <link rel="stylesheet" href="plugins/themefisher-font/style.css">
                <!-- bootstrap.min css -->
                <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
                <!-- Animate.css -->
                <link rel="stylesheet" href="plugins/animate-css/animate.css">

                <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

                <!-- Main Stylesheet -->
                <link rel="stylesheet" href="css/style.css">


                <!--CSS and Scripts for slider-->


                <link rel="stylesheet" type="text/css" href="css/style3.css" />
                <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>

                <body>
                    <!--PHP code for showing message-->
                    <div class="error_msg_div" style="text-align:center;background-color:#66ccbb;">
                        <?php
                        if(isset($_GET['msg'])){
                            $msg= $_GET['msg'];
                            if(!empty($msg)){

                                ?>

                                <h4 style="color:green;padding:20px;font-size:20px"><span style="font-weight: 900;">Success!!!</span> <?php echo $msg;?></h4>
                                <?php
                                $msg='';
                            }

                        }


                     ?>
                     </div>
                     <div class="row">
                         <a href="stuff_profile.php"><button type="button" name="button" class="btn btn-primary" style="float:left;margin-left:70px;margin-top:20px"> <i class="fa fa-arrow-left"></i>  Back</button></a>
                         <a href="stuff_logout.php"><button type="button" name="button" class="btn btn-primary" style="float:right;margin-right:70px;margin-top:20px"> <i class="fa fa-power-off"></i>  Log Out</button></a>


                     </div>

                <!--Form Title--->
                <div class="title text-center wow fadeIn" data-wow-duration="500ms" style="text-align: center;margin-top: 30vh">
                    <h2>Token  <span class="color">Count For</span> <?php echo date("d-m-Y");?></h2>
                    <div class="border"></div>
                </div>






                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">  </div>

                        <div class="contact-form col-lg-6 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">

                            <?php
                            $mon= date('Y-m');

                            $q= "SELECT * FROM `token` WHERE `Month`='$mon'";
                            if($query_run=  mysqli_query($con,$q)){
                                if(mysqli_num_rows($query_run)>0){
                                    ?>

                                    <?php
                                    while($row = mysqli_fetch_assoc($query_run)){
                                        $id= $row['Student_id'];?>
                                    <?php
                                         if(compare_token($id,date('Y-m-d'))){
                                                ?>
                                                <div class=" row" style="border:2px solid grey;text-align:center">

                                                    <div class="col-lg-4" style="border:1px solid grey">
                                                        <h3><?php echo $id;?></h3>
                                                    </div>
                                                    <div class="col-lg-4" style="border:1px solid grey">
                                                    <h3><?php echo other_student_get_field('F_name',$id)?></h3>
                                                    </div>
                                                    <div class="col-lg-4" style="border:1px solid grey">
                                                        <?php if(token_checked(date('Y-m-d'),$id)){ ?>
                                                            <i class="fa fa-edit" style="padding-top:8px"></i>
                                                            <p>Token is checked</p>

                                                            <?php
                                                        }elseif(cancel_token($mon,$id)){
                                                            ?>

                                                            <i class="fa fa-edit" style="padding-top:8px"></i>
                                                            <p>Token is caceled today</p>
                                                            <?php

                                                        }else{
                                                            ?>

                <a href="token_checked.php?Student_id=<?php echo $id;?>&date=<?php echo date('Y-m-d');?> "><button style="margin-top:7px;margin-bottom:7px" class="btn btn-primary" type="button" name="button">Check Token</button></a>
                                                            <?php
                                                        }?>
                                                    </div>





</div>

                                                <?php
                                            }?>

                                <?php
                                    }

                                }else{
                                    echo "There is nothing to show";
                                }

                            }else{
                                echo "There was a problem";

                            }


                            ?>



                </div>

<div class="col-lg-3">

</div>

                <?php
            }else{
                ?>




                    <i class="fa fa-shield"></i>
                 <h2 style="padding:20px;border:2px solid grey">You do not have the previlege to view this page</h2>

            </body>
            </html>
                <?php
            }

        }else{
            header("Location: stuff_login.php?err=".rawurlencode("Please login to continue"));
        }
    ?>
