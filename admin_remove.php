<?php
include 'core.inc.php';
include 'connect.inc.php';

if(admin_logged_in()){
  if(isset($_GET["ASSN"])){

      $id = $_GET["ASSN"];

      if(!empty($id)){

          $query = "DELETE FROM `admin` WHERE `ASSN`='$id'";
          if($query_run= mysqli_query($con,$query)){
                 header("Location: admin_profile.php?msg=".rawurlencode('Successfully removed the ADMIN.'));
                }
                else{
                    header("Location: admin_profile.php?msg=".rawurlencode("There was an internal problem."));
                }


      }else{

          header("Location: admin_profile.php?msg=".rawurlencode("Invalid SSN"));



      }

  }



}else{
  header("Location: admin_login.php?err=".rawurlencode("You have to login to continue"));
}
?>
