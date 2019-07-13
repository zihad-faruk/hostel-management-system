<?php
include 'core.inc.php';
include 'connect.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Notice | Begum Sufia Kamal Hall</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="css/te.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">


    <!--Scripts added when making student profile page-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="js/scripts.js"></script>
    <![endif]-->


    <script src="js/jquery-2.2.0.min.js"></script>

    <!--Script for smooth loading of links as menus-->
    <script>$(document).ready(function(){
            $("a").on("click",function(a){
                if(this.hash!==""){
                    a.preventDefault();
                    var b=this.hash;
                    $("html, body").animate({scrollTop:$(b).offset().top},800,function(){window.location.hash=b})}})});
    </script>

    <!--Script for broken image-->
    <script>
        function imgError(image) {
            image.onerror = "";
            image.src = "images/no_image.png";
            return true;
        }
    </script>





</head>
<body style="text-align: center">
