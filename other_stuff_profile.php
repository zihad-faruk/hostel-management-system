<?php include 'header1.inc.php'?>


<!--If Admin is logged in-->
<?php
if (admin_logged_in()) {

    if(isset($_GET['SSN'])){
        $ssn= $_GET['SSN'];

    ?>


    <div class="main">
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 profile-pics">

                      <!--PHP code for showing message-->
                       <?php
                       if(isset($_GET['msg'])){
                           $msg= $_GET['msg'];
                           if(!empty($msg)){

                               ?>

                               <div style="margin-top: 10px;" class="error_msg_div"><h4 style="color:green;"><span style="font-weight: 900">Success!!!</span> <?php echo $msg; ?></h4></div>
                               <?php
                               $msg='';
                           }

                       }
                       ?>

                        <?php
                        $q = "SELECT `profile_pic` FROM `stuff` WHERE `SSN`='".other_stuff_get_field('SSN',$ssn)."'";
                        $r= mysqli_query($con,$q);

                        while($row = mysqli_fetch_assoc($r)){

                            ?>

                            <a href="admin_profile.php"><button style="margin-top:30px" type="button" name="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button></a>
                            <img src='uploads/<?php echo $row["profile_pic"]?>' onerror="imgError(this)" class="img img-responsive animated bounceInDown">
                        <?php
                        }

                        ?>



                        <div class="picture animated fadeIn">


                        </div>

                    </div>
                    <div class="col-lg-8 about">


                        <div class="row">
                            <div class="col-lg-1">

                            </div>
                            <div class="col-lg-6 ">



                            </div>
                            <div class="col-lg-5" style="float:left">
                                <div class="" style="float:left;padding-top:25px;padding-right:3px">
                                    <p style="font-size:15px;font-weight:600;"> <span style="color:grey">Logged in as, </span> <?php echo admin_get_field('F_name');?></p>
                                </div>
                                <div class="dropdown" style="padding-top:20px;float:left;">
                                    <button class="btn   dropdown-toggle" type="button" data-toggle="dropdown"> <span style="color: #66BC6D;">Admin</span> <span style="color:grey;font-weight:700">|</span> <i class="fa fa-cog"></i>
                                        <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="notice_board.php"><i class="fa fa-book"></i> Notice Board</a></li>



                                        </ul>
                                        </div>


                            </div>


                        </div>


                        <h2 class="animated fadeIn"><?php echo other_stuff_get_field('F_name',$ssn)?></h2>
                        <h1 class="animated slideInDown"><?php echo other_stuff_get_field('L_name',$ssn)?></h1>
                        <h4><span class="green_color"><?php echo strtoupper(other_stuff_get_field('Position',$ssn))?></span> of the Hall</h4>

                        <hr>

                        <div class="row t animated slideInUp">
                            <div class="container-fluid">
                                <a href="#about">
                                    <div class="col-lg-4 about-options"><h3>Stuff's Information</h3>
                                        <p>Know about the stuff</p>
                                    </div>
                                </a>
                                <a href="#due">
                                    <div class="col-lg-4 about-options">
                                        <h3>Payments and Tokens</h3>
                                        <p>Hall dues and Token Condition</p>
                                    </div>
                                </a>
                                <a href="admin_logout.php">
                                    <div class="col-lg-4 about-options1">
                                        <h3><i class="fa fa-power-off"></i>  Log Out</h3>
                                        <p>Log out of your account</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>
        <contents>

            <div class="container-fluid">
                <div class="row content1" id="about">
                    <div class="col-lg-4 content_name">
                        <i class="fa fa-address-card fa-5x" style="margin-top: 30vh"></i>
                        <h3 style="margin-top:30px;">Stuff's Information</h3>
                        <p>All relevant information about the stuff</p>
                    </div>
                    <div class="col-lg-8 content_description" style="padding-top: 40px;padding-bottom: 40px;">
                        <table style="text-align: center;" >
                            <style>
                                h2{
                                    color:grey;
                                    font-size:15px;
                                }
                            </style>

                            <tr >
                                <td style="padding: 20px !important;">Full Name</td>
                                <td style="color:grey;font-weight:100;padding: 20px !important;"><h2><?php echo other_stuff_get_field('F_name',$ssn)?> <?php echo other_stuff_get_field('L_name',$ssn)?></h2></td>

                            </tr>
                            <tr >
                                <td style="padding: 20px !important;">Position</td>
                                <td style="padding: 20px !important;"><h2><?php echo other_stuff_get_field('Position',$ssn)?></h2></td>

                            </tr>

                            <tr>
                                <td style="padding: 20px !important;">Address</td>
                                <td style="padding: 20px !important;"><h2><?php echo other_stuff_get_field('Address',$ssn)?></h2></td>

                            </tr>
                            <tr>
                                <td style="padding: 20px !important;">Contact No</td>
                                <td style="padding: 20px !important;"><h2><?php echo other_stuff_get_field('Contact_no',$ssn)?></h2></td>

                            </tr>

                        </table>
                    </div>
                </div>

                <div class="row content2">
                    <div class="col-lg-4 content_name " id="due">
                        <i class="fa fa-pencil fa-5x" style="margin-top:30vh" ></i>
                        <h3 style="margin-top:20px;">Payments and Tokens</h3>
                        <p>Status of the current due and tokens.</p>
                    </div>
                    <div class="col-lg-8 content_description" style="padding-top: 30px;">

                        <div class="" style="min-height:100vh">
                            <i class="animated bounceInDown wow fa fa-shield fa-3x" data-wow-duration="500ms" data-wow-delay="400ms" style="margin-top:150px"></i>

                            <h1 style="font-size:25px;font-weight:600;margin-top:20px">You do not have privelege for this options</h1>
                        </div>


                    </div>

                </div>

            </div>

    </div>

    </contents>
    <footer></footer>
    </div>


    <!--*********-->


    <?php

}else{
    ?>

<h2 style="font-size:40px">You have not specified which profile to show</h2>

    <?php



}
} /*If student is not logged in then redirect to the login page*/
else {
    header("Location: admin_login.php?err=".rawurlencode(" You have to login to continue . "));

}


?>

<!--Including the footer files-->
<?php include 'footer.inc.php'?>
