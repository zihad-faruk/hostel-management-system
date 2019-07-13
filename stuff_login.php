
<!DOCTYPE html>
<html>


<head><title>Stuff | Login Page</title></head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="images/favicon(2).ico" />

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

<!--CSS and Scripts for slider-->

<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/style3.css" />
<script type="text/javascript" src="js/modernizr.custom.86080.js"></script>

<body>

    <div class="row">
        <a href="home.php"><button type="button" name="button" class="btn btn-primary" style="float:left;margin-left:70px;margin-top:20px"> <i class="fa fa-home"></i>  Home</button></a>
        <a href="stuff_reg.php"><button type="button" name="button" class="btn btn-primary" style="float:right;margin-right:70px;margin-top:20px"> <i class="fa fa-pencil"></i>  Register</button></a>
    </div>
<!--Form Title--->
<div class="title text-center wow fadeIn" data-wow-duration="500ms" style="text-align: center;margin-top: 27vh">
    <h2>Stuff  <span class="color">Log In</span> Page</h2>
    <div class="border"></div>
</div>

<!--PHP codes for form validation-->
<?php
include "core.inc.php";
include 'connect.inc.php';
if (isset($_GET['email']) && isset($_GET['pass'])) {

 $email = $_GET['email'];
 $pass = $_GET['pass'];
 $pass_hash = md5($pass);



if (!empty($email) && !empty($pass)) {

    $query = "SELECT `SSN` FROM `stuff` WHERE `Email`='".mysqli_real_escape_string($con,$email)."' AND `Password`='".mysqli_real_escape_string($con,$pass_hash)."'";
    if ($query_run = mysqli_query($con, $query)) {


       echo $result = mysqli_num_rows($query_run);

        if ($result == 1) {

            $row = mysqli_fetch_row($query_run);
           echo  $id = $row[0];

                      session_start();
                      session_unset();
            $_SESSION['SSN'] = $id;
            header('Location: stuff_profile.php');
        } else if ($result == 0) {

            ?>
            <div style="margin-bottom:10px;text-align: center;" class="error_msg"><h4 style="color: red;"><span style="font-weight: 900">ERROR!!!</span> Invalid Username or Password !</h4></div>

<?php

        } else {?>
            <div style="margin-bottom:10px;text-align: center;" class="error_msg"><h4 style="color: red;"><span style="font-weight: 900">ERROR!!!</span> There was an internal problem.Try Again !</h4></div>
        <?php

        }
        } else {?>
        <div style="margin-bottom:10px;text-align: center;" class="error_msg"><h4 style="color: red;"><span style="font-weight: 900">ERROR!!!</span> There was a problem with the query ! Try again later !</h4></div>

        <?php
            echo "The query couldn't execute";
            }
        } else { ?>

    <div style="margin-bottom:10px;text-align: center;" class="error_msg"><h4 style="color: red;"><span style="font-weight: 900">ERROR!!!</span> Please fill all the fields and Try Again !</h4></div>

<?php

    }

}
?>

<?php

if(isset($_GET['m'])){
    $err= $_GET['m'];
    if(!empty($err)){
        ?>

        <div style="margin-bottom:10px;text-align: center;" class="error_msg_div"><h4 style="color: green;"><span style="font-weight: 900">Success!!!</span><?php echo $err;?> </h4></div>
<?php
    }
}
?>

<?php

if(isset($_GET['err'])){
    $err= $_GET['err'];
    if(!empty($err)){
        ?>

        <div style="margin-bottom:10px;text-align: center;" class="error_msg"><h4 style="color: red;"><span style="font-weight: 900">WARNING!!!</span><?php echo $err;?> </h4></div>
<?php
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <!-- Contact Form -->
        <div class="contact-form col-md-6 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
            <form id="contact-form" method="GET" action="">

                <div class="form-group">
                    <input type="email" placeholder="Your email adress" class="form-control" name="email" id="email">
                </div>

                <div class="form-group">
                    <input type="password" placeholder="Your password" class="form-control" name="pass" id="email">
                </div>

                <div id="cf-submit">
                    <input type="submit" id="contact-submit" class="btn btn-transparent" value="Log In">
                </div>

                <div class="" style="text-align:center">
                    <a href="stuff_reg.php">Not yet registered ? Register here</a>
                </div>

            </form>
        <div class="col-md-3"></div>
    </div>
</div>
</body>
</html>
