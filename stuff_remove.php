<?php
include 'core.inc.php';
include 'connect.inc.php';

if(admin_logged_in()){
  if(isset($_GET["SSN"])){

      $id = $_GET["SSN"];

      if(!empty($id)){

          $query = "DELETE FROM `stuff` WHERE `SSN`='$id'";
          $q1= "DELETE FROM `admin` WHERE `ASSN`='$id'";
          $q2= "DELETE FROM `editor` WHERE `ESSN`='$id'";
          $q3= "DELETE FROM `notice_comments` WHERE `PID`='$id'";
          $q4= "DELETE FROM `notice` WHERE `PSSN`='$id'";



          if($query_run= mysqli_query($con,$query)){
              mysqli_query($con,$q1);
               mysqli_query($con,$q2);
                mysqli_query($con,$q3);
                 mysqli_query($con,$q4);

                 header("Location: admin_profile.php?msg=".rawurlencode('Successfully removed the stuff.'));
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
