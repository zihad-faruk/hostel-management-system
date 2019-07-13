<!--Including header files-->
<?php include 'header.inc.php'?>


<!--If student is logged in-->
<?php
if (student_logged_in()) {
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

                               <div style="margin-top: 10px;" class="error_msg_div"><h4 style="color:green;"><span style="font-weight: 900">Success!!!</span> <?php echo $msg;?></h4></div>
                               <?php
                               $msg='';
                           }

                       }
                       ?>

                        <?php
                        $q = "SELECT `profile_pic` FROM `student` WHERE `Student_id`='".student_get_field('Student_id')."'";
                        $r= mysqli_query($con,$q);

                        while($row = mysqli_fetch_assoc($r)){

                            ?>
                            <img src='uploads/<?php echo $row["profile_pic"]?>' onerror="imgError(this)" class="img img-responsive animated bounceInDown">
                        <?php
                        }

                        ?>

                        <a href="student_profile_pic.php" ><button class="btn btn-large btn-success dp" style="margin-top: 20px;">Change Picture</button></a>

                        <!--If there is no profile picture don't show the remove button-->
                        <?php
                        $test_dp = student_get_field('profile_pic');
                        if(!empty($test_dp)){
                            ?>
                            <a href="student_profile_pic_remove.php" ><button class="btn btn-large btn-danger dp" style="margin-left:10px;margin-top: 20px;">Remove</button></a>
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
                                    <p style="font-size:15px;font-weight:600;">  <span style="color:grey">Welcome,</span> <?php echo student_get_field('F_name');?></p>
                                </div>
                                <div class="dropdown" style="padding-top:20px;float:left;">
                                    <button class="btn   dropdown-toggle" type="button" data-toggle="dropdown"> <span style="color: #66BC6D;">Student</span> <span style="color:grey;font-weight:700">|</span> <i class="fa fa-cog"></i>
                                        <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="notice_board.php"><i class="fa fa-book"></i> Notice Board</a></li>
                                            <li><a href="create_complain.php"><i class="fa fa-pencil"></i> Complain</a></li>

                                        </ul>
                                        </div>


                            </div>


                        </div>

                        <h2 class="animated fadeIn" style=""><?php echo student_get_field('F_name')?></h2>
                        <h1 class="animated slideInDown"><?php echo student_get_field('L_name')?></h1>
                        <h4>A Student of <span class="green_color"><?php echo student_get_field('dept')?></span>'<span class="green_color"><?php echo student_get_field('batch')?></span></h4>

                        <hr>

                        <div class="row t animated slideInUp">
                            <div class="container-fluid">
                                <a href="#about">
                                    <div class="col-lg-4 about-options"><h3>Student's Information</h3>
                                        <p>Know about the student</p>
                                    </div>
                                </a>
                                <a href="#due">
                                    <div class="col-lg-4 about-options">
                                        <h3>Payments and Tokens</h3>
                                        <p>Hall dues and Token Condition</p>
                                    </div>
                                </a>
                                <a href="student_logout.php">
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
                        <h3 style="margin-top:30px;">Student's Information</h3>
                        <p>All relevant information about the student</p>
                    </div>
                    <div class="col-lg-8 content_description" style="padding-top: 40px;padding-bottom: 40px;">
                        <a href="edit_student_profile.php"><button type="button" style="float:right;margin-bottom:10px" class="btn btn-default"><i class="fa fa-edit"></i> Edit</button></a>

                        <table style="text-align: center;" >
                            <style>
                                h2{
                                    color:grey;
                                    font-size:15px;
                                }
                            </style>

                            <tr >
                                <td style="padding: 20px !important;">Full Name</td>
                                <td style="color:grey;font-weight:100;padding: 20px !important;"><h2><?php echo student_get_field('F_name')?> <?php echo student_get_field('L_name')?></h2></td>

                            </tr>
                            <tr >
                                <td style="padding: 20px !important;">Department</td>
                                <td style="padding: 20px !important;"><h2><?php echo student_get_field('Dept')?></h2></td>

                            </tr>
                            <tr >
                                <td style="padding: 20px !important;">Batch</td>
                                <td style="padding: 20px !important;"><h2><?php echo student_get_field('Batch')?></h2></td>

                            </tr>

                            <tr>
                                <td style="padding: 20px !important;">Student ID</td>
                                <td style="padding: 20px !important;"><h2><?php echo student_get_field('Student_id')?></h2></td>

                            </tr>
                            <tr>
                                <td style="padding: 20px !important;">Father's Name</td>
                                <td style="padding: 20px !important;"><h2><?php echo student_get_field('Father')?></h2></td>

                            </tr>
                            <tr>
                                <td style="padding: 20px !important;">Mother's Name</td>
                                <td style="padding: 20px !important;"><h2><?php echo student_get_field('Mother')?></h2></td>

                            </tr>

                            <tr>
                                <td style="padding: 20px !important;">Blood Group</td>
                                <td style="padding: 20px !important;"><h2><?php echo student_get_field('Blood_Grp')?></h2></td>

                            </tr>
                            <tr>
                                <td style="padding: 20px !important;">Room No</td>
                                <td style="padding: 20px !important;"><h2><?php echo student_get_field('Room_no')?></h2></td>

                            </tr>
                            <tr>
                                <td style="padding: 20px !important;">Address</td>
                                <td style="padding: 20px !important;"><h2><?php echo student_get_field('Address')?></h2></td>

                            </tr>
                            <tr>
                                <td style="padding: 20px !important;">Contact No</td>
                                <td style="padding: 20px !important;"><h2><?php echo student_get_field('Contact_no')?></h2></td>

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
                    <div class="col-lg-8 content_description" style="padding-top: 30px;text-align:center">

                        <div class="" style="min-height:100vh">
                            <i class="animated bounceInDown wow fa fa-apple fa-3x" data-wow-duration="500ms" data-wow-delay="400ms" style="margin-top:150px"></i>

                            <h1 style="font-size:25px;font-weight:600;margin-top:20px">Dining & Tokens</h1>
                        </div>

                        <div class="row" style="margin-bottom:50px">

                            <div class="col-lg-12" style="background-color:#66BC6D;margin-bottom:20px;opacity:.8">
                                <h1 style="padding:10px;font-size:20px;font-weight:700"> <i class="fa fa-list"></i> Menu for <?php $date=date("Y-m-d");echo date('d-m-Y',strtotime($date.'+ 1 days'));?>  Day</h1>
                            </div>
                        <div class="" style="border:2px solid grey">
                            <?php  $to_date= date('Y-m-d',strtotime($date.'+ 1 days'));$time1='Day'?>

                            <table style="margin-bottom:50px">

                                <tr>
                                    <td><?php  echo  menu_get_field('Item_1',$to_date,"Day");?></td>
                                </tr>
                                <tr>
                                    <td><?php echo  menu_get_field('Item_2',$to_date,"Day");?></td>
                                </tr>
                                <tr>
                                    <td><?php
                                    if( menu_get_field('Item_2',$to_date,"Day")==""){
                                        echo "-";
                                    }else{
                                        echo  menu_get_field('Item_2',$to_date,"Day");
                                    }
                                    ?></td>
                                </tr>
                                <tr>
                                    <td><?php
                                    if( menu_get_field('Item_3',$to_date,$time1)==""){
                                        echo "-";
                                    }else{
                                        echo  menu_get_field('Item_3',$to_date,$time1);
                                    }
                                    ?></td>
                                </tr>
                                <tr>
                                    <td><?php
                                    if( menu_get_field('Item_4',$to_date,$time1)==""){
                                        echo "-";
                                    }else{
                                        echo  menu_get_field('Item_4',$to_date,$time1);
                                    }
                                    ?></td>
                                </tr>
                                <tr>
                                    <td><?php
                                    if( menu_get_field('Item_5',$to_date,$time1)==""){
                                        echo "-";
                                    }else{
                                        echo  menu_get_field('Item_5',$to_date,$time1);
                                    }
                                    ?></td>
                                </tr>
                                <tr>
                                    <td><?php
                                    if( menu_get_field('Item_6',$to_date,$time1)==""){
                                        echo "-";
                                    }else{
                                        echo  menu_get_field('Item_6',$to_date,$time1);
                                    }
                                    ?></td>
                                </tr>

                                <tr>
                                    <td><?php
                                    if( menu_get_field('Item_7',$to_date,$time1)==""){
                                        echo "-";
                                    }else{
                                        echo  menu_get_field('Item_7',$to_date,$time1);
                                    }
                                    ?></td>
                                </tr>
                            </table>
                        </div>

                            <div class="col-lg-12" style="background-color:#66BC6D;margin-bottom:20px;opacity:.8;margin-top:30p">
                                <h1 style="padding:10px;font-size:20px;font-weight:700"> <i class="fa fa-list"></i> Menu for <?php $date=date("Y-m-d");echo date('d-m-Y',strtotime($date.'+ 1 days'));?>  Night</h1>


                            </div>

                            <div class="" style="border:2px solid grey">
                                <?php  $to_date= date('Y-m-d',strtotime($date.'+ 1 days'));$time2='Night'?>

                                <table style="margin-bottom:50px">

                                    <tr>
                                        <td><?php  echo  menu_get_field('Item_1',$to_date,$time2);?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo  menu_get_field('Item_2',$to_date,$time2);?></td>
                                    </tr>
                                    <tr>
                                        <td><?php
                                        if( menu_get_field('Item_2',$to_date,$time2)==""){
                                            echo "-";
                                        }else{
                                            echo  menu_get_field('Item_2',$to_date,$time2);
                                        }
                                        ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php
                                        if( menu_get_field('Item_3',$to_date,$time2)==""){
                                            echo "-";
                                        }else{
                                            echo  menu_get_field('Item_3',$to_date,$time2);
                                        }
                                        ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php
                                        if( menu_get_field('Item_4',$to_date,$time2)==""){
                                            echo "-";
                                        }else{
                                            echo  menu_get_field('Item_4',$to_date,$time2);
                                        }
                                        ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php
                                        if( menu_get_field('Item_5',$to_date,$time2)==""){
                                            echo "-";
                                        }else{
                                            echo  menu_get_field('Item_5',$to_date,$time2);
                                        }
                                        ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php
                                        if( menu_get_field('Item_6',$to_date,$time2)==""){
                                            echo "-";
                                        }else{
                                            echo  menu_get_field('Item_6',$to_date,$time2);
                                        }
                                        ?></td>
                                    </tr>

                                    <tr>
                                        <td><?php
                                        if( menu_get_field('Item_7',$to_date,$time2)==""){
                                            echo "-";
                                        }else{
                                            echo  menu_get_field('Item_7',$to_date,$time2);
                                        }
                                        ?></td>
                                    </tr>
                                </table>
                            </div>

                        </div>


                        <div class="" style="min-height:100vh">

                        <i class="animated bounceInDown wow fa fa-file fa-3x" data-wow-duration="500ms" data-wow-delay="400ms" style="margin-top:150px"></i>
                        <h1 style="font-size:25px;font-weight:600;margin-top:20px">Hall Dues</h1>
                        </div>

                        <div class="">
                            <?php
                            $st_id = $_SESSION['Student_id'];

                            if(has_due($st_id)){ ?>

                                <div class="error_msg_div" style="margin-bottom:50px">
                                    <h2 style="padding:20px;font-size:20px">You have pending due of <?php echo due_get_field('Amount',$st_id);?> BDT</h2>
                                </div>

                        <?php    }else{ ?>

                                <div class="error_msg_div" style="margin-bottom:50px">
                                    <h2 style="padding:20px">You have no pending due</h2>
                                </div>
<?php

                            }?>
                        </div>


                        <div class="" style="min-height:100vh">

                        <i class="animated bounceInDown wow fa fa-archive fa-3x" data-wow-duration="500ms" data-wow-delay="400ms" style="margin-top:150px"></i>
                        <h1 style="font-size:25px;font-weight:600;margin-top:20px">Tokens</h1>
                        </div>

                        <div class="row" style="margin-bottom:50px;">
                            <div class="col-lg-2">

                            </div>
                            <div class="col-lg-4">
                                <a href="issue_token.php"><button type="button" name="button" class="btn btn-primary">Issue Token</button></a>
                            </div>
                            <div class="col-lg-4">
                                <?php
                                $mon = date("Y-m");
                                if (has_token($mon,$st_id)) {
                                    ?>
                                    <a href="cancel_token.php"><button type="button" name="button" class="btn btn-danger">Cancel Token</button></a>
                                    <?php
                                }else{ ?>
                                    <div class="" style="border:2px solid grey">
                                        <p> <i class="fa fa-info-circle"></i> Token must be issued to view this option</p>
                                    </div>
                                <?php
                                }?>
                            </div>
                            <div class="col-lg-2">

                            </div>


                        </div>

                        <div class="row">

                            <?php
                                  $id = $_SESSION['Student_id'];

                                  if(has_token($mon,$id)){ ?>

                                      <table style="margin-bottom: 40px">
                                          <tr>
                                              <th>Current Month</th>
                                              <th>Starting Day</th>
                                              <th>Finishing Day</th>
                                              <th>Token Used</th>
                                          </tr>
                                          <tr>
                                              <td><?php echo date("m-Y")?></td>
                                              <td><?php  $dat=token_get_field('Starting',$mon,$id);
                                              echo date('d-m-Y',strtotime($dat));
                                                ?></td>
                                              <td><?php echo date('d-m-Y',strtotime($dat.'+'.token_get_field('Days',$mon,$id).' days'." - 1 days")) ?></td>
                                              <td><?php echo token_get_field('Token_count',$mon,$id)?> Days</td>

                                          </tr>

                                      </table>

                                      <?php
                                  }else{
                                      ?>
                                      <div class="error_msg_div">
                                          <h2 style="padding:20px">You have not issued any token this month</h2>
                                      </div>
                            <?php
                                  }
                                    ?>

                        </div>

                        <div class="row">

                            <?php if(cancel_token($mon,$id)){
                                ?>
                                <div class="error_msg_div" style="margin-bottom: 50px">
                                    <h2 style="padding:20px">You have canceled token from <span style="font-weight:600"><?php echo token_cancel_get_field('Start',$mon,$id)?></span> to <span style="font-weight:600"><?php echo token_cancel_get_field('Finish',$mon,$id)?></span> </h2>
                                </div>
                                <?php
                            }?>



                        </div>


                        <!----Get the bill of studet in 1st day of the next month---->
                        <?php if(date('d')==01){
                             $m= date('Y-m',strtotime(date('Y-m-d')."- 1 month"));
                            $sum = 50*token_get_field('Token_count',$m,$id);
                            ?>
                        <div class="row">
                            <div class="error_msg_div" style="margin-bottom: 50px">


                                <h2 style="padding:20px">Your current dining bill is <span style="font-weight:700"><?php echo $sum;?>/= BDT</span> </h2>
                            </div>

                        </div>
                    <?php }?>

                    </div>

                </div>

            </div>

    </div>

    </contents>
    <footer></footer>
    </div>


    <!--*********-->


    <?php


} /*If student is not logged in then redirect to the login page*/
else {
    header("Location: student_login.php?err=".rawurlencode(" You have to login to continue . "));

}


?>

<!--Including the footer files-->
<?php include 'footer.inc.php'?>
