<!--Including header files-->
<?php include 'header1.inc.php'?>


<!--If student is logged in-->
<?php
if (stuff_logged_in()) {
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
                        $q = "SELECT `profile_pic` FROM `stuff` WHERE `SSN`='".stuff_get_field('SSN')."'";
                        $r= mysqli_query($con,$q);

                        while($row = mysqli_fetch_assoc($r)){

                            ?>
                            <img src='uploads/<?php echo $row["profile_pic"]?>' onerror="imgError(this)" class="img img-responsive animated bounceInDown">
                        <?php
                        }

                        ?>

                        <a href="stuff_profile_pic.php" ><button class="btn btn-large btn-success dp" style="margin-top: 20px;">Change Picture</button></a>

                        <!--If there is no profile picture don't show the remove button-->
                        <?php
                        $test_dp = stuff_get_field('profile_pic');
                        if(!empty($test_dp)){
                            ?>
                            <a href="stuff_profile_pic_remove.php" ><button class="btn btn-large btn-danger dp" style="margin-left:10px;margin-top: 20px;">Remove</button></a>
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
                                        <input autocomplete="off" style="padding-right:200px" type="text" name="input" id="input" onkeyup="match();"  class="form-control" placeholder="Search for students...">
                                        </div>
                                        <button  name="button" class="btn btn-default" ><i class="fa fa-search"></i></button>

                                </form>




                                <div id="result" class="autocomplete-items"></div>


                            </div>
                            <div class="col-lg-3" style="float:left">
                                <div class="" style="float:left;padding-top:25px;padding-right:3px">
                                    <p style="font-size:15px;font-weight:600;"> <?php echo stuff_get_field('F_name');?></p>
                                </div>
                                <div class="dropdown" style="padding-top:20px;float:left;">
                                    <button class="btn   dropdown-toggle" type="button" data-toggle="dropdown"> <span style="color: #66BC6D;">Stuff</span> <span style="color:grey;font-weight:700">|</span> <i class="fa fa-cog"></i>
                                        <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="notice_board.php"><i class="fa fa-book"></i> Notice Board</a></li>
                                            <?php

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

                                            ?>


                                        </ul>
                                        </div>


                            </div>


                        </div>


                        <h2 class="animated fadeIn"><?php echo stuff_get_field('F_name')?></h2>
                        <h1 class="animated slideInDown"><?php echo stuff_get_field('L_name')?></h1>
                        <h4><span class="green_color"><?php echo strtoupper(stuff_get_field('Position'))?></span> of the Hall</h4>

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
                                <a href="stuff_logout.php">
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
                        <a href="edit_stuff_profile.php"><button type="button" style="float:right;margin-bottom:10px" class="btn btn-default"><i class="fa fa-edit"></i> Edit</button></a>

                        <table style="text-align: center;" >
                            <style>
                                h2{
                                    color:grey;
                                    font-size:15px;
                                }
                            </style>

                            <tr >
                                <td style="padding: 20px !important;">Full Name</td>
                                <td style="color:grey;font-weight:100;padding: 20px !important;"><h2><?php echo stuff_get_field('F_name')?> <?php echo stuff_get_field('L_name')?></h2></td>

                            </tr>
                            <tr >
                                <td style="padding: 20px !important;">Position</td>
                                <td style="padding: 20px !important;"><h2><?php echo stuff_get_field('Position')?></h2></td>

                            </tr>

                            <tr>
                                <td style="padding: 20px !important;">Address</td>
                                <td style="padding: 20px !important;"><h2><?php echo stuff_get_field('Address')?></h2></td>

                            </tr>
                            <tr>
                                <td style="padding: 20px !important;">Contact No</td>
                                <td style="padding: 20px !important;"><h2><?php echo stuff_get_field('Contact_no')?></h2></td>

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


                        <!---If stuff is dining manager,show him this options--->
                        <?php

                        $pos = stuff_get_field('Position');

                        if($pos=="Dining Manager"){ ?>

                        <div class="" style="min-height:100vh">
                            <i class="animated bounceInDown wow fa fa-apple fa-3x" data-wow-duration="500ms" data-wow-delay="400ms" style="margin-top:150px"></i>

                            <h1 style="font-size:25px;font-weight:600;margin-top:20px">Dining & Tokens</h1>
                        </div>

                        <div class="row">
                            <div class="col-lg-12" style="background-color:#66BC6D;margin-bottom:20px;opacity:.8">
                                <h1 style="padding:10px;font-size:20px;font-weight:700"> <i class="fa fa-list"></i> Menu</h1>
                            </div>
                        <div class="row" style="margin-bottom:50px;">
                            <div class="col-lg-2">

                            </div>
                            <div class="col-lg-4">
                                <a href="create_menu.php"><button type="button" name="button" class="btn btn-primary">Create Menu</button></a>
                            </div>
                            <div class="col-lg-4">
                                <a href="count_token.php"><button type="button" name="button" class="btn btn-danger">Count Tokens</button></a>
                            </div>
                            <div class="col-lg-2">

                            </div>


                        </div>

                    <div class="" id="menu" style="margin-bottom:50px">
                        <?php

                           $query = "SELECT `Time`,`date`,DATE_FORMAT(`date`, '%e %M, %Y') AS `dateToPrint` FROM `menu` ORDER BY `Date`  ";


                           /*If the above query runs*/
                           if ($query_run = mysqli_query($con, $query)) {

                               if(mysqli_num_rows($query_run)){ ?>


                             <table>
                                                      <tr>
                                                          <th style="text-align:center;">Serial Number</th>
                                                          <th>Date</th>
                                                          <th>Time</th>
                                                          <th></th>


                                                      </tr>



                                   <?php

                                   $i=1;

                                       /*Showing the data from the table*/
                                       while ($query_row = mysqli_fetch_assoc($query_run)) {


                                           $time = $query_row['Time'];
                                           $d= $query_row['date'];
                                           $date= $query_row['dateToPrint'];

                                           if($d>=date('Y-m-d')){
                                      ?>
                                      <tr>
                                         <td style="text-align:center;"><?php echo $i;  ?></td>
                                         <td><?php echo $date; ?></td>
                                         <td><?php echo $time; ?></td>
                                         <td>
                                             <a href="edit_menu.php?time=<?php echo $time;?>&date=<?php echo $d;?>"> <button type="button" name="button"> <i class="fa fa-edit"></i> Edit</button> </a>
                                         </td>

                                        </tr>

                        <?php $i++;}

                        }

                    }else{
                        ?>
                        <div class="" style="text-align:center;margin-bottom:50px;min-height:50vh">
                            <h3>There are no new menus to show.</h3>
                        </div>

                        <?php
                    }
                    }
                         ?>
</table>
                    </div>



                        </div>



                        <?php


                    }

                    elseif($pos=="Accountant"){
                        ?>


                        <div class="" style="min-height:100vh">
                            <div class="row">
                                <a href="add_due.php"><button type="button" name="button" style="float:right;margin-right:30px" class="btn btn-primary"> <i class="fa fa-plus"></i> Add</button></a>
                            </div>
                        <i class="animated bounceInDown wow fa fa-file fa-3x" data-wow-duration="500ms" data-wow-delay="400ms" style="margin-top:150px"></i>
                        <h1 style="font-size:25px;font-weight:600;margin-top:20px">Hall Dues</h1>
                        </div>

                        <div class="row">
                            <div class="col-lg-12" style="background-color:#66BC6D;margin-bottom:20px;opacity:.8">
                                <h1 style="padding:10px;font-size:20px;font-weight:700"> <i class="fa fa-list"></i> List of students having due</h1>
                            </div>

                            <?php

                               $query = "SELECT * FROM  `due`";


                               /*If the above query runs*/
                               if ($query_run = mysqli_query($con, $query)) {

                                   if(mysqli_num_rows($query_run)){


                                   ?>

                           <table style="margin-bottom:50px">
                              <tr>
                                  <th style="text-align:center;">Serial Number</th>
                                  <th>Student Id</th>
                                  <th>Name</th>
                                  <th>Amount</th>
                                  <th></th>

                              </tr>


                               <?php

                                    $i=1;

                                       /*Showing the data from the table*/
                                       while ($query_row = mysqli_fetch_assoc($query_run)) {


                                           $id = $query_row['Student_id'];
                                           $amount= $query_row['amount'];
                                      ?>

                                <tr>
                                   <td style="text-align:center;"><?php echo $i;  ?></td>
                                   <td><?php echo $id; ?></td>
                                   <td><?php echo other_student_get_field('F_name',$id)." ".other_student_get_field('L_name',$id) ?></td>
                                   <td><?php echo $amount;?></td>
                                    <td style="text-align:center;">
                                        <a href="paid.php?id=<?php echo $id;?>"> <button type="button" name="button" class="btn btn-success"> <i class="fa fa-info-circle"></i> Paid</button> </a>
                                    </td>
                                  </tr>
                                   <?php
                                      $i++;
                                  }
                              }else{ ?>
                                  <div class="" style="text-align:center;font-size:20px;margin-bottom:50px">
                                      <h3>There are no students</h3>
                                  </div>
                                  <?php
                              }
                               }
                                   ?>
                           </table>
                        </div>


                <?php    }else{ ?>


                    <div class="" style="min-height:100vh">
                        <i class="animated bounceInDown wow fa fa-shield fa-3x" data-wow-duration="500ms" data-wow-delay="400ms" style="margin-top:150px"></i>

                        <h1 style="font-size:25px;font-weight:600;margin-top:20px">You do not have previlege for this options</h1>
                    </div>

        <?php
                }
                        ?>


                    </div>

                </div>

            </div>

    </div>

    </contents>
    <footer></footer>
    </div>

<script type="text/javascript" src="src="plugins/wow/dist/wow.min.js"">

</script>
    <!--*********-->


    <?php


} /*If student is not logged in then redirect to the login page*/
else {
    header("Location: stuff_login.php?err=".rawurlencode(" You have to login to continue . "));

}


?>

<!--Including the footer files-->
<?php include 'footer.inc.php'?>
