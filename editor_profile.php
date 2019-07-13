<?php
include "core.inc.php";
include "connect.inc.php";

if(editor_logged_in()){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Favicon Icon-->
    <link rel="icon" type="image/png" href="images/favicon-32x32.png" sizes="16x16" />

    <title> Editor Panel | Begum Sufia Kamal Hall </title>


    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" >


    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">

<!--Script for alternate image-->
    <script>
        function imgError(image) {
            image.onerror = "";
            image.src = "images/no_image.png";
            return true;
        }
    </script>

    <!--Script for smooth loading of links as menus-->
    <script>$(document).ready(function(){
            $("a").on("click",function(a){
                if(this.hash!==""){
                    a.preventDefault();
                    var b=this.hash;
                    $("html, body").animate({scrollTop:$(b).offset().top},800,function(){window.location.hash=b})}})});
    </script>
    <!---Script for confirm proceeding--->
    <script type="text/javascript">
        function confirm_proceed() {
            var i;
            if (confirm("Do you really want to proceed?")==true) {
                return true;
            } else {
                return false;
            }


        }


        //Function for matching students
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


    <style>
        table {

            border-collapse: collapse;
            width: 100%;
        }

        th{
            border: 1px solid #dddddd;
            background-color:#2A3H54;
            padding: 10px

        }


        td {
            border: 1px solid #dddddd;
            padding: 8px;
        }

        tr:nth-child(odd) {
            background-color:#B1FAB7;
        }

        /***Styles for search fields***/
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
        width: 43%;
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

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container row">
        <div class="col-md-3 left_col" style="position: fixed">
            <div class="left_col scroll-view" >


                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix" style="text-align: center;align-content:center">
                    <div class="profile_pic" style="margin:0 auto !important;padding-top:20px;">
                          <?php
                        $q = "SELECT `profile_pic` FROM `editor` WHERE `ESSN`='".editor_get_field('ESSN')."'";
                        $r= mysqli_query($con,$q);

                        while($row = mysqli_fetch_assoc($r)){

                            ?>
                    <img style="margin:0 auto !important" src='uploads/<?php echo $row["profile_pic"]?>' onerror="imgError(this)" class="img-thumbnail profile_img">
                            <?php
                        }

                          ?>
                    </div>
                    <div class="profile_info" style="margin-left:30px;">
                        <span>Welcome,</span>
                        <h2><?php echo editor_get_field('F_name');
                                  echo " ";
                                  echo editor_get_field('L_name')?></h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="home.php#services">Services</a></li>
                                    <li><a href="home.php#blog">Blog</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-edit"></i> Complains <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="#complain">Inbox</a></li>

                                </ul>
                            </li>
                            <li><a><i class="fa fa-desktop"></i> Notice Board <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="create_notice.php">Create Notice</a></li>
                                    <li><a href="notice_board.php">All Notices</a></li>

                                </ul>
                            </li>

                            <li><a><i class="fa fa-table"></i> List <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="#student">Student</a></li>

                                </ul>
                            </li>


                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav " >
            <div class="nav_menu row" >
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <!---Upper bar display settings--->

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">


                                <?php
                                $q = "SELECT `profile_pic` FROM `editor` WHERE `ESSN`='".editor_get_field('ESSN')."'";
                                $r= mysqli_query($con,$q);

                                while($row = mysqli_fetch_assoc($r)){

                                    ?>
                                    <img src='uploads/<?php echo $row["profile_pic"]?>' onerror="imgError(this)">
                                    <?php
                                }

                                ?>
                                <?php echo editor_get_field('F_name');
                                echo " ";
                                echo editor_get_field('L_name');
                                ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li>
                                    <a href="editor_profile_pic.php">
                                        <i class="fa fa-user pull-right"></i> Change Picture</a>
                                    </a>
                                </li>
                                <li>
                                    <a href="editor_profile_pic_remove.php">
                                        <i class="fa fa-crosshairs pull-right"></i> Remove Picture</a>
                                    </a>
                                </li>

                                <li><a href="editor_logout.php"><i class="fa fa-power-off pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="editor_profile_pic.php">
                                <i class="fa fa-upload"></i>

                            </a>

                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

            <style media="screen">
            .error_msg_div{
margin-bottom:10px;
text-align: center;
background-color: #fff9d7;
border: 1px solid #e2c822;

}
            </style>

            <!--PHP code for showing message-->
             <?php
             if(isset($_GET['msg'])){
                 $msg= $_GET['msg'];
                 if(!empty($msg)){

                     ?>

                     <div style="margin-top: 10px;" class="error_msg_div"><h4 style="color:green;"><span style="font-weight: 900"><i class="fa fa-info-circle"></i> INFO!!!</span><?php echo ' '.$msg; ?></h4></div>
                     <?php
                     $msg='';
                 }

             }
             ?>



             <!----Complain Section---->
             <div id="complain" class="" style="min-height: 100vh;margin-bottom:30px;text-align:center;">

                 <i class="fa fa-archive fa-5x" style="padding-top:25vh"></i>
                 <h2 style="font-size:30px">Complain Box</h2>

             </div>

             <?php

                $query = "SELECT `CID`,`ID`,`Name`,`Position`,`Title`,`Content`,`date`,DATE_FORMAT(`date`, '%e %M, %Y') AS `dateToPrint` FROM `complain` ORDER BY `CID` DESC ";


                /*If the above query runs*/
                if ($query_run = mysqli_query($con, $query)) {

                    if(mysqli_num_rows($query_run)){





                            /*Showing the data from the table*/
                            while ($query_row = mysqli_fetch_assoc($query_run)) {

                                $cid = $query_row['CID'];
                                $id = $query_row['ID'];
                                $name = $query_row['Name'];
                                $pos= $query_row['Position'];
                                $title = $query_row['Title'];
                                $content = $query_row['Content'];
                                $date= $query_row['dateToPrint'];
                           ?>

             <div class="row" style="margin-bottom:50px">
                 <div class="col-lg-1">

                     <h2><?php echo $cid;?></h2>

                 </div>

                <div class="col-lg-10" style="border: 1px solid #dddddd;
                background-color:#F1FAC7;
                padding: 10px;margin-bottom:30px">
                    <h3 style="border:1px solid grey;float:right;font-size:17px;background-color:white;padding:2px"><?php echo $date;  ?></h3>
                    <h2 style="font-size:25px;font-weight:700"><?php echo $title;  ?> </h2>

                    <h3 style="font-size:20px;color:grey;font-weight:500"><?php echo $name; ?> | <span style="color:#169F85" ><?php echo $pos;  ?></></h3>
                    <p ><?php echo $content;  ?></p>
                </div>

                <div class="col-lg-1">
            <a href="delete_complain.php?CID=<?php echo $cid;?>" onclick="confirm_proceed();"><i class="fa fa-times"></i></a>
                </div>

             </div>

             <?php
             }

            }else{
             ?>
             <div class="" style="text-align:center;margin-bottom:50px;min-height:50vh">
                 <h3>There are no new complains to show.</h3>
             </div>

             <?php
            }
            }
              ?>

              <div id="student" style="min-height: 100vh;margin-bottom:30px;padding-top:20px">

                  <div class="container" style="margin-bottom:20px">
                      <div class="row">

                          <div class="col-lg-10">
                              <form action="" method="GET" id="search" name="search" style="padding-top:20px;">
                                  <div class="autocomplete">
                                      <input autocomplete="off" style="padding-right:200px" type="text" name="input" id="input" onkeyup="match();"  class="form-control" placeholder="Search for students...">
                                      </div>
                                      <button  name="button" class="btn btn-default" disabled ><i class="fa fa-search"></i></button>

                              </form>




                              <div id="result" class="autocomplete-items"></div>
                          </div>
                      </div>
                  </div>


                  <h2><u>Here are the list of students:</u></h2>

                   <?php

                      $query = "SELECT * FROM  `student`";


                      /*If the above query runs*/
                      if ($query_run = mysqli_query($con, $query)) {

                          if(mysqli_num_rows($query_run)){


                          ?>

                  <table>
                     <tr>
                         <th style="text-align:center;">Serial Number</th>
                         <th>Student Id</th>
                         <th>Name</th>
                         <th></th>

                     </tr>


                      <?php

                           $i=1;

                              /*Showing the data from the table*/
                              while ($query_row = mysqli_fetch_assoc($query_run)) {


                                  $id = $query_row['Student_id'];
                                  $f_name = $query_row['F_name'];
                                  $l_name = $query_row['L_name'];
                             ?>

                       <tr>
                          <td style="text-align:center;"><?php echo $i;  ?></td>
                          <td><?php echo $id; ?></td>
                          <td><?php echo $f_name;echo ' '.$l_name; ?></td>
                           <td style="text-align:center;">
                               <a href="other_student_profile.php?Student_id=<?php echo $id;?>"><button class="btn  btn-success"><i class="fa fa-info-circle"></i> Info</button></a>

                           </td>
                         </tr>
                          <?php
                             $i++;
                         }
                     }else{ ?>
                         <div class="" style="text-align:center;">
                             <h3>There are no students</h3>
                         </div>
                         <?php
                     }
                      }
                          ?>
                  </table>


              </div>






        </div>
        <!-- jQuery -->
            <script src="js/jquery-2.2.0.min.js"></script>
            <!-- Bootstrap -->
            <script src="js/bootstrap.min.js"></script>

            <!-- Custom Theme Scripts -->
            <script src="js/custom.js"></script>
        </div>
</body>
</html>
<?php }

else{
    header("Location: editor_login.php?err=".rawurldecode("You must be login to continue"));

}

?>
