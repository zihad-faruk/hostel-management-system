<?php
include 'connect.inc.php';
include 'core.inc.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Notice Board</title>
        <link rel="stylesheet" href="plugins/themefisher-font/style.css">
        <!-- bootstrap.min css -->
        <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
        <!-- Animate.css -->
        <link rel="stylesheet" href="plugins/animate-css/animate.css">
        <!-- Magnific popup css -->
        <link rel="stylesheet" href="plugins/magnific-popup/dist/magnific-popup.css">
        <!-- Slick Carousel -->
        <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
        <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">
        <!-- Main Stylesheet -->

        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

        <!--CSS and Scripts for slider-->
<link rel="stylesheet" href="css/style.css">

        <link rel="stylesheet" type="text/css" href="css/style3.css" />
        <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
        <script src="js/jquery-2.2.0.min.js"></script>
        <style media="screen">
            h1{
                color:#353b43
            }
        </style>


    </head>
    <body  style="color:#353b43" >
        <div class="row" style="background-image:url('images/notice_board.jpg');height:100vh;">
<div class="col-lg-1">

</div>
            <div class="col-lg-6">
<?php
if(admin_logged_in()){
    $url="admin_profile.php";
}elseif(editor_logged_in()){
    $url="editor_profile.php";
}elseif(student_logged_in()){
    $url="student_profile.php";
}elseif(stuff_logged_in()){
    $url="stuff_profile.php";
}

?>


<a href="<?php echo $url;?>" style="margin-top:70vh"><img src="images/left.png" alt="" ></a>
            </div>
            <div class="col-lg-3" style="min-height:100vh">
                <i class="fa  fa-book fa-5x wow fadeInDown" style="padding-top:300px;margin-left:150px;" class=""  data-wow-duration="500ms" data-wow-delay="300ms"></i>
                <h1 class="wow fadeInUp"  data-wow-duration="800ms" data-wow-delay="300ms" style="font-size:100px !important;font-weight: 700;">Welcome</h1>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

<div class="row" style="background-image:url('images/board.jpg');text-align:center">

    <div class="title text-center wow fadeIn" data-wow-duration="1500ms" >
        <h2>ALL <span style="color:black">Notices</span> </h2>
        <div class="border"></div>
    </div>
    <?php

       $query = "SELECT `NID`,`Name`,`Title`,`Content`,`date`,DATE_FORMAT(`date`, '%e %M, %Y') AS `dateToPrint` FROM `notice` ORDER BY `NID` DESC ";


       /*If the above query runs*/
       if ($query_run = mysqli_query($con, $query)) {





                   /*Showing the data from the table*/
                   while ($query_row = mysqli_fetch_assoc($query_run)) {

                       $id = $query_row['NID'];
                       $name = $query_row['Name'];
                       $title = $query_row['Title'];
                       $content = $query_row['Content'];
                       $date= $query_row['dateToPrint'];
                  ?>

<div class="row" style="margin-bottom:100px">

    <div class="col-md-3">

    </div>



    <article class="col-md-6 col-sm-6 col-xs-12 clearfix wow lightSpeedIn" data-wow-duration="500ms" style="opacity:.8">
        <div class="post-block">


            <div class="content">



                <h3 style="font-size:30px;font-weight:600"><a href="read_notice.php?NID=<?php echo $id;?>"><?php echo $title?></a></h3>


                <h4><i class="fa fa-calendar"></i> Published on:<span style="color:white"> <?php echo $date?></span></h4>
                <a class="btn btn-transparent" href="read_notice.php?NID=<?php echo $id;?>">Read more</a>
            </div>
        </div>

    </article>



    <div class="col-md-3">

    </div>


</div>
<?php
}

}
 ?>







</div>

        		<!-- Main jQuery -->
        		<script type="text/javascript" src="plugins/jquery/dist/jquery.min.js"></script>
        		<!-- Bootstrap 3.1 -->
        		<script type="text/javascript" src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        		<!-- Slick Carousel -->
        		<script type="text/javascript" src="plugins/slick-carousel/slick/slick.min.js"></script>
        		<!-- Portfolio Filtering -->
        		<script type="text/javascript" src="plugins/mixitup/dist/mixitup.min.js"></script>
        		<!-- Smooth Scroll -->
        		<script type="text/javascript" src="plugins/smooth-scroll/dist/js/smooth-scroll.min.js"></script>
        		<!-- Magnific popup -->
        		<script type="text/javascript" src="plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
        		<!-- Google Map API -->
        		<script type="text/javascript"  src="http://maps.google.com/maps/api/js?sensor=false"></script>
        		<!-- Sticky Nav -->
        		<script type="text/javascript" src="plugins/Sticky/jquery.sticky.js"></script>
        		<!-- Number Counter Script -->
        		<script type="text/javascript" src="plugins/count-to/jquery.countTo.js"></script>
        		<!-- wow.min Script -->
        		<script type="text/javascript" src="plugins/wow/dist/wow.min.js"></script>
        		<!-- Custom js -->
        		<script type="text/javascript" src="js/script.js"></script>

    </body>
</html>
