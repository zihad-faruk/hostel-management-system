<!--Including header files-->
<?php include 'header.inc.php'?>


<!--If student is logged in-->
<?php
if (student_logged_in() || stuff_logged_in() || admin_logged_in() ||editor_logged_in()) {

if(isset($_GET['Student_id'])){

    $id=$_GET['Student_id'];

    if(student_logged_in()){
        $cu_id =$_SESSION['Student_id'];

        if($id==$cu_id){
            header('Location: student_profile.php');
        }
    }






    ?>

    <!--Script for searching-->
    <script type="text/javascript">

        function match() {

            if(window.XMLHttpRequest){

                var xhttp = new XMLHttpRequest();

            }
            else{
                /*Internet Explorer er Jonno */

                var xhttp = new ActiveXObject('MICROSOFT.XMLHTTP');

            }



            xhttp.onreadystatechange= function () {
                if(xhttp.readyState==4 && xhttp.status== 200 ){

                    document.getElementById('result').innerHTML = this.responseText;

                }
            }

            xhttp.open('GET',"student_search.php?input="+document.search.input.value,true);
            xhttp.send();




        }

    </script>


<style media="screen">
.autocomplete{
    position: relative;
display: inline-block;
}
.autocomplete-items {
    margin-left: 15px;
position: absolute;
border: 1px solid #d4d4d4;
border-bottom: none;
border-top: none;
z-index: 99;
width: 66%;
/*position the autocomplete items to be the same width as the container:*/
top: 100%;
left: 0;
right: 0;
}
.autocomplete-items div {

padding: 5px;
cursor: pointer;
background-color: #fff;
border-bottom: 1px solid #d4d4d4;

}
.autocomplete-items div:hover {
/*when hovering an item:*/
background-color: #e9e9e9;
}
</style>
    <div class="main">
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 profile-pics">

                      <!--PHP code for showing message-->
                       <?php

                       if(admin_logged_in()){
                           $url= "admin_profile.php";

                       }elseif(student_logged_in()){
                           $url= "student_profile.php";
                       }  elseif(stuff_logged_in()){
                           $url= "stuff_profile.php";
                       } elseif(editor_logged_in()){
                           $url= "editor_profile.php";
                       }

                       ?>
<a href="<?php echo $url;?>"><button type="button" name="button" class="btn btn-primary" style="margin-top:30px"><i class="fa fa-arrow-left"></i> Back</button></a>
                        <?php
                        $q = "SELECT `profile_pic` FROM `student` WHERE `Student_id`='".other_student_get_field('Student_id',$id)."'";
                        $r= mysqli_query($con,$q);

                        while($row = mysqli_fetch_assoc($r)){

                            ?>
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
                            <div class="col-lg-8 ">


                                <form action="" method="GET" id="search" name="search" style="padding-top:20px;">
                                    <div class="autocomplete">
                                        <input autocomplete="off" style="padding-right:200px" type="text" name="input" id="input" onkeyup="match();"  class="form-control" placeholder="Search for...">
                                        </div>
                                        <button name="button" class="btn btn-default" disabled ><i class="fa fa-search"></i></button>

                                </form>




                                <div id="result" class="autocomplete-items"></div>


                            </div>
                            <div class="col-lg-3" style="float:left">
                                <div class="" style="float:left;padding-top:25px;padding-right:3px">
                                    <p style="font-size:15px;font-weight:600;"> <?php


                                    if(student_logged_in()){
                                         echo student_get_field('F_name');
                                    }elseif(admin_logged_in()){
                                        echo admin_get_field('F_name');
                                    }elseif(stuff_logged_in()){
                                        echo stuff_get_field('F_name');
                                    }elseif(editor_logged_in()){
                                        echo editor_get_field('F_name');
                                    }



                                    ?></p>
                                </div>
                                <div class="dropdown" style="padding-top:20px;float:left;">
                                    <button class="btn   dropdown-toggle" type="button" data-toggle="dropdown"> <span style="color: #66BC6D;"><?php
                                        if(student_logged_in()){
                                            echo "Student";
                                        }elseif(stuff_logged_in()){
                                            echo "Stuff";
                                        }elseif(admin_logged_in()){
                                            echo "Admin";
                                        }elseif(editor_logged_in()){
                                            echo "Editor";
                                        }

                                    ?></span> <span style="color:grey;font-weight:700">|</span> <i class="fa fa-cog"></i>
                                        <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="notice_board.php"><i class="fa fa-book"></i> Notice Board</a></li>
                                            <!--Only show this option if student is logged in-->
                                            <?php

                                            if(student_logged_in()){

                                            ?>
                                            <li><a href="create_complain.php"><i class="fa fa-pencil"></i> Complain</a></li>
<?php }elseif (stuff_logged_in()) {
    // code...


$ssn = $_SESSION['SSN'];
if(stuff_is_admin($ssn)){
    ?>
    <li><a href="admin_login.php"><i class="fa fa-user"></i> Admin Panel</a></li>
<?php
}elseif(stuff_is_editor($ssn)){
    ?>
    <li><a href="editor_login.php"><i class="fa fa-user"></i> Editor Panel</a></li>
    <?php

}
}
?>
                                        </ul>
                                        </div>


                            </div>

                        </div>

                        <h2 class="animated fadeIn" style=""><?php echo other_student_get_field('F_name',$id)?></h2>
                        <h1 class="animated slideInDown"><?php echo other_student_get_field('L_name',$id)?></h1>
                        <h4>A Student of <span class="green_color"><?php echo other_student_get_field('dept',$id)?></span>'<span class="green_color"><?php echo other_student_get_field('batch',$id)?></span></h4>

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

                                <?php
                                    if(student_logged_in()){
                                        $u="student_logout.php";
                                    }
                                    elseif(admin_logged_in()){
                                        $u="admin_logout.php";
                                    }
                                    elseif(stuff_logged_in()){
                                        $u="stuff_logout.php";
                                    }elseif(editor_logged_in()){
                                        $u="editor_logout.php";
                                    }
                                ?>
                                <a href="<?php echo $u;?>">
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

                        <table style="text-align: center;" >
                            <style>
                                h2{
                                    color:grey;
                                    font-size:15px;
                                }
                            </style>

                            <tr >
                                <td style="padding: 20px !important;">Full Name</td>
                                <td style="color:grey;font-weight:100;padding: 20px !important;"><h2><?php echo other_student_get_field('F_name',$id)?> <?php echo other_student_get_field('L_name',$id)?></h2></td>

                            </tr>
                            <tr >
                                <td style="padding: 20px !important;">Department</td>
                                <td style="padding: 20px !important;"><h2><?php echo other_student_get_field('Dept',$id)?></h2></td>

                            </tr>
                            <tr >
                                <td style="padding: 20px !important;">Batch</td>
                                <td style="padding: 20px !important;"><h2><?php echo other_student_get_field('Batch',$id)?></h2></td>

                            </tr>

                            <tr>
                                <td style="padding: 20px !important;">Student ID</td>
                                <td style="padding: 20px !important;"><h2><?php echo other_student_get_field('Student_id',$id)?></h2></td>

                            </tr>
                            <tr>
                                <td style="padding: 20px !important;">Father's Name</td>
                                <td style="padding: 20px !important;"><h2><?php echo other_student_get_field('Father',$id)?></h2></td>

                            </tr>
                            <tr>
                                <td style="padding: 20px !important;">Mother's Name</td>
                                <td style="padding: 20px !important;"><h2><?php echo other_student_get_field('Mother',$id)?></h2></td>

                            </tr>

                            <tr>
                                <td style="padding: 20px !important;">Blood Group</td>
                                <td style="padding: 20px !important;"><h2><?php echo other_student_get_field('Blood_Grp',$id)?></h2></td>

                            </tr>
                            <tr>
                                <td style="padding: 20px !important;">Room No</td>
                                <td style="padding: 20px !important;"><h2><?php echo other_student_get_field('Room_no',$id)?></h2></td>

                            </tr>
                            <tr>
                                <td style="padding: 20px !important;">Address</td>
                                <td style="padding: 20px !important;"><h2><?php echo other_student_get_field('Address',$id)?></h2></td>

                            </tr>
                            <tr>
                                <td style="padding: 20px !important;">Contact No</td>
                                <td style="padding: 20px !important;"><h2><?php echo other_student_get_field('Contact_no',$id)?></h2></td>

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


                                                                            if(has_due($id)){ ?>

                                                                                <div class="error_msg_div">
                                                                                    <h2 style="padding:10px;font-size:20px">This student have pending due of <?php echo due_get_field('Amount',$id);?> BDT</h2>
                                                                                </div>

                                                                        <?php    }else{ ?>

                                                                                <div class="error_msg_div">
                                                                                    <h2 style="padding:20px">This student have no pending due</h2>
                                                                                </div>
                                                <?php

                                                                            }?>
                                                                        </div>

                                                                        <div class="" style="min-height:100vh">

                                                                        <i class="animated bounceInDown wow fa fa-archive fa-3x" data-wow-duration="500ms" data-wow-delay="400ms" style="margin-top:150px"></i>
                                                                        <h1 style="font-size:25px;font-weight:600;margin-top:20px">Tokens</h1>
                                                                        </div>


                                                                        <div class="row">

                                                                            <?php $mon = date("Y-m");


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
                                                                                          <h2 style="padding:20px">This student has not issued any token this month</h2>
                                                                                      </div>
                                                                            <?php
                                                                                  }
                                                                                    ?>

                                                                        </div>

                                                                        <div class="row">

                                                                            <?php if(cancel_token($mon,$id)){
                                                                                ?>
                                                                                <div class="error_msg_div" style="margin-bottom: 50px">
                                                                                    <h2 style="padding:20px">This student has canceled token from <span style="font-weight:600"><?php echo token_cancel_get_field('Start',$mon,$id)?></span> to <span style="font-weight:600"><?php echo token_cancel_get_field('Finish',$mon,$id)?></span> </h2>
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


                                                                                <h2 style="padding:20px"> Current outstanding dining bill  is <span style="font-weight:700"><?php echo $sum;?>/= BDT</span> </h2>
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

}else{
    header("Location: $refer");
}

} /*If student is not logged in then redirect to the login page*/
else {
?>
    <div class="" style="text-align:center;">
        <h2 style="font-size:25px;">You have to login to continue . <a href="<?php $refer;?>">Go back</a></h2>
    </div>

<?php
}


?>

<!--Including the footer files-->
<?php include 'footer.inc.php'?>
