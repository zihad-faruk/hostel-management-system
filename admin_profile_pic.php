<?php
include 'header.inc.php';

admin_get_field("ASSN");
@$name = $_FILES["file"]["name"];
@$type = $_FILES["file"]["type"];
@$tmp_name = $_FILES["file"]["tmp_name"];
 @$size = $_FILES["file"]["size"];
$n="img";

$max_size = 1000000;
$extension = strtolower(substr($name,stripos($name,'.')+1));
if(isset($_POST['up'])) {
   if(!empty($name)){
       if ($size < $max_size && ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png') && ($type == 'image/jpeg' || $type == 'image/png')) {
           $target = "uploads/" . admin_get_field("F_name") . "_" . basename($name);
           $con = mysqli_connect("localhost", "root", "", "hostel");


           $s = "UPDATE `admin` SET `profile_pic` = '" . admin_get_field("F_name") . "_$name' WHERE `ASSN` = '" . admin_get_field('ASSN') . "'  ";
           if ($q = mysqli_query($con, $s)) {

               if (move_uploaded_file($tmp_name, $target)) {
                   header('Location: admin_profile.php?msg='.rawurlencode("Picture was updated successfully."));
               } else { ?>
                   <div class="error_msg_div"><h4><span style="font-weight: 900">Error!!!</span> There was an internal problem.Please try again later !</h4></div>
                   <?php
               }
           } else { ?>
               <div class="error_msg_div"><h4><span style="font-weight: 900">Error!!!</span> There was an internal problem.Please try again later !</h4></div>
           <?php }
       } else {
           ?>
           <div class="error_msg_div"><h4><span style="font-weight: 900">WARNING!!!</span> Please select a valid file type/
                   File must be less then 1MB</h4></div>
           <?php
       }

   }



    else { ?>
        <div class="error_msg_div"><h4><span style="font-weight: 900">WARNING!!!</span> Please select an image for
                uploading</h4></div>
        <?php

    }
}


?>


<!--If stuff is logged in-->
<?php
if (admin_logged_in()) {
?>
<div class="row">
    <div class="col-lg-12"><div>
            <a href="admin_profile.php"><button class="btn btn-large btn-primary" style="float: left;margin-left: 100px;margin-top:20px"><i class="fa fa-arrow-left"></i> Profile</button></a>
            <a href="admin_logout.php"><button class="btn btn-large btn-danger" style="float: right;margin-right: 100px;margin-top:20px"><i class="fa fa-power-off"></i>  Log Out</button></a>
        </div></div>
</div>
   <div class="change_profile_pic">

      <div class="row">
          <div class="col-lg-12">
              <h1 style="margin-top:150px;font-size: 30px"><span class="animated bounceIn" style="font-size:80px;color: #66BC6D;">U</span>pdate <span class="animated bounceIn" style="font-size:80px;color: #66BC6D;">P</span>rofile
                  <span class="animated bounceIn" style="font-size:80px;color: #66BC6D;">P</span>icture</h1>
          </div>
      </div>


       <form action="<?php $current_file; ?>" method="POST" enctype="multipart/form-data" style="margin-bottom:150px">
           <div class="form-group">
               <input type="file" name="file" style="margin: 0 auto;margin-top:15px" ><br><br>

               <input type="submit" value="Upload" name="up" class="btn btn-large btn-success">
           </div>
       </form>


   </div>

    <!--*********-->


    <?php


} /*If stuff is not logged in then redirect to the login page*/
else {
    header("Location: admin_login.php");

}


?>

<!--Including the footer files-->
<?php include 'footer.inc.php'?>
