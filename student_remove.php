<?php
include 'core.inc.php';
include 'connect.inc.php';

if(admin_logged_in()){
  if(isset($_GET["Student_id"])){

      $id = $_GET["Student_id"];

      if(!empty($id)){

          $query = "DELETE FROM `student` WHERE `Student_id`='$id'";
          $q1= "DELETE FROM `complain` WHERE `id`='$id'";
          $q2= "DELETE FROM `due` WHERE `Student_id`='$id'";
          $q3= "DELETE FROM `notice_comments` WHERE `PID`='$id'";
          $q4= "DELETE FROM `token` WHERE `Student_id`='$id'";
          $q5= "DELETE FROM `token_cancel` WHERE `Student_id`='$id'";
          $q6= "DELETE FROM `token_checked` WHERE `Student_id`='$id'";
          if($query_run= mysqli_query($con,$query)){
                mysqli_query($con,$q1);
                mysqli_query($con,$q2);
                mysqli_query($con,$q3);
                mysqli_query($con,$q4);
                mysqli_query($con,$q5);
                mysqli_query($con,$q6);


                 header("Location: admin_profile.php?msg=".rawurlencode('Successfully removed the student.'));
                }
                else{
                    header("Location: admin_profile.php?msg=".rawurlencode("There was an internal problem."));
                }


      }else{

          header("Location: admin_profile.php?msg=".rawurlencode("Invalid student id"));



      }

  }



}else{
  header("Location: admin_login.php?err=".rawurlencode("You have to login to continue"));
}
?>
