<?php
include 'connect.inc.php';
include 'core.inc.php';





if(admin_logged_in() || editor_logged_in()){



    if(isset($_POST['title']) && isset($_POST['content'])) {

        $title = $_POST['title'];
        $content = $_POST['content'];
        $date = date('Y-m-d');
        if(admin_logged_in()){
            $ssn= $_SESSION['ASSN'];
            $name= admin_get_field('F_name',$ssn);

        }elseif (editor_logged_in()) {
            $ssn= $_SESSION['ESSN'];
            $name = editor_get_field('F_name',$ssn);
        }


       if(!empty($title) && !empty($content)){
           if ($title<51 || $content<501 ) {



               $s = "INSERT INTO `notice` VALUES('','$ssn','$name','$title','$content','$date') ";
               if ($q = mysqli_query($con, $s)) {

                  if(admin_logged_in()){
                      header("Location: admin_profile.php?msg=".rawurlencode("Notice was successfully published."));
                  }elseif(editor_logged_in()){
                       header("Location: editor_profile.php?msg=".rawurlencode("Notice was successfully published."));

                  }
               } else { ?>
                   <div class="error_msg_div"><h4><span style="font-weight: 900">Error!!!</span> There was an internal problem.Please try again later !</h4></div>
               <?php }
           } else {
               ?>
               <div class="error_msg_div"><h4><span style="font-weight: 900">WARNING!!!</span> Number of characters exceeded their limit.</h4></div>
               <?php
           }

       }



        else { ?>
            <div class="error_msg_div"><h4><span style="font-weight: 900">WARNING!!!</span> Fields can not be empty.</h4></div>
            <?php

        }
    }








?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Create Notice | Begum Sufia Kamal Hall</title>

		<!-- Mobile Specific Meta
		================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Favicon -->
		<!-- <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" /> -->

		<!-- CSS
		================================================== -->
		<!-- Fontawesome Icon font -->
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
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

        <!--CSS and Scripts for slider-->


        <link rel="stylesheet" type="text/css" href="css/style3.css" />
        <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
        <script src="js/jquery-2.2.0.min.js"></script>

        <style media="screen">
        .error_msg_div{
margin-bottom:10px;
text-align: center;
background-color: #fff9d7;
border: 1px solid #e2c822;

}

.error_msg_div h4{
color: red;
padding: 10px
}
        </style>

    </head>

    <body id="body " data-spy="scroll" data-target=".navbar" data-offset="50">



<div class="row">
<div class="col-lg-2">

</div>
    <div class="col-lg-2" style="padding-top:20px">

        <?php
            if(admin_logged_in()){
                $url= "admin_profile.php";
            }elseif(editor_logged_in()){
                $url= "editor_profile.php";
            }
        ?>

        <a href="<?php echo $url;?>"><i class="fa fa-angle-double-left fa-5x"></i>Back</a>

    </div>
<div class="col-lg-4">

</div>

<div class="col-lg-2"  style="padding-top:20px">
    <a href="notice_board.php">Notices<i class="fa fa-angle-double-right fa-5x"></i></a>
</div>
<div class="col-lg-2">

</div>
</div>

<div class="row" style="text-align:center;margin-top:20vh">
    <i class="fa fa-edit fa-5x"></i>
    <h1>Create Notice</h1>

</div>




<div class="row">
    <div class="col-lg-3">

    </div>


        <div class="contact-form col-lg-6 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
            <form id="contact-form" method="post" action="create_notice.php" style="text-align:center">

                <div class="form-group">
                    <input type="text" placeholder="Title of the notice" class="form-control" name="title" id="name">
                </div>





                <div class="form-group">
                    <textarea maxlength="500" rows="6" placeholder="Content of the notice" class="form-control" name="content" id="message"></textarea>
<span id='remainingC' style="color:green;font-weight:900"></span>

                </div>


                    <!---Script for showing how many characters are left--->
                <script>
                $('textarea').keypress(function(){

                    if(this.value.length > 500){
                        return false;
                    }
                    $("#remainingC").html("Remaining characters : " +(500 - this.value.length));
                });
            </script>

                <input type="submit" name="" value="Create" class="btn btn-large btn-primary">


            </form>
        </div>

    <div class="col-lg-3">

    </div>

</div>










		<!--
		Essential Scripts
		=====================================-->

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

<?php }
else{
    header("Location: $refer");
}

?>
