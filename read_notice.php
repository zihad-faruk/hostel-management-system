<?php
include 'header2.inc.php';

if(isset($_GET['NID'])){
    $nid = $_GET['NID'];

    if(!empty($nid)){
?>
<div class="row" style="min-height:100vh;background-image:url('images/n.jpg');">
    <div class="row" style="margin-top:30px;">
        <div class="col-lg-1">

        </div>
        <div class="col-lg-2">
            <a href="notice_board.php"><button type="button" class="btn btn-primary " name="button"><i class="fa fa-arrow-left"></i> Back</button></a>
        </div>
        <div class="col-lg-6">

        </div>
        <div class="col-lg-2">
            <a href="home.php"><button type="button" class="btn btn-success" name="button"><i class="fa fa-home"></i> Home</button></a>
        </div>
        <div class="col-lg-1">

        </div>
    </div>


    <div class="row">

        <i class="fa fa-pencil fa-5x" style="padding-top:200px;margin-bottom:20px;color:aliceblue"></i>
        <h1 style="font-size:30px;font-weight:600;margin-bottom:20px;color:aliceblue;text-transform:capitalize"><?php echo notice_get_field('Title',$nid)?></h1>

        <h3  style="font-size:15px;font-weight:300;color:aliceblue"><i class="fa fa-calendar"></i> Published on: <span style="font-weight:600"><?php
            $q= "SELECT `date`,DATE_FORMAT(`date`, '%e %M, %Y') AS `dateToPrint` FROM `notice` WHERE `NID`='$nid' ";
            if($query_run=mysqli_query($con,$q)){
                if($row= mysqli_fetch_assoc($query_run)){
                     echo $row['dateToPrint'];
                }
            }

        ?></span></h3>

    </div>
</div>
<div class="row" style="background-color:white">

<div class="col-lg-2">

</div>

<div class="col-lg-8" style="column-count:2;text-align:left;padding-top:30px;">
    <p style="font-size:20px;padding:10px;padding-top:30px;padding-bottom:30px"><?php echo notice_get_field('Content',$nid)?></p>
</div>

<div class="col-lg-2">

</div>

</div>



<div class="row" style="background-image:url('images/n.jpg');">
    <!---Div for showing comments---->
    <?php
     if(admin_logged_in() || editor_logged_in() || student_logged_in() || stuff_logged_in() ){
         if(admin_logged_in()){
             $cid= $_SESSION['ASSN'];
             $name = admin_get_field('F_name');
             $pos= 'Admin';
             $url="admin_profile.php";
         }elseif(editor_logged_in()){
             $cid= $_SESSION['ESSN'];
             $name = editor_get_field('F_name');
             $pos= 'Editor';
             $url="editor_profile.php";
         }elseif(student_logged_in()){
             $cid= $_SESSION['Student_id'];
             $name= student_get_field('F_name');
             $pos= 'Student';
             $url="student_profile.php";
         }elseif(stuff_logged_in()){
             $cid= $_SESSION['SSN'];
             $name = stuff_get_field('F_name');
             $pos= 'Stuff';
             $url="stuff_profile.php";
         }


              if(isset($_POST['content'])){

                  $content = $_POST['content'];
                  $date = date('Y-m-d');
                  if(!empty($content)){

                      $q ="INSERT INTO `notice_comments` VALUES('','$nid','$cid','$name','$pos','$content','$date')";
                      if(mysqli_query($con,$q)){
                          ?>
         <div class="error_msg_div"><h4 style="color:green"><span style="font-weight: 900">Success!!!</span> Comment was Successfully updated.</h4></div>
                          <?php
                      }else{
                          ?>
         <div class="error_msg_div"><h4><span style="font-weight: 900">WARNING!!!</span> There was a problem.</h4></div>

                          <?php

                      }
                  }else{
                      ?>

                      <div class="error_msg_div"><h4><span style="font-weight: 900">WARNING!!!</span> Please write something in comment box.</h4></div>
                      <?php
                  }

              }

              ?>
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
        <?php

           $query = "SELECT `CID`,`Name`,`Position`,`Comment`,`date`,DATE_FORMAT(`date`, '%e %M, %Y') AS `dateToPrint` FROM `notice_comments` WHERE `NID`='$nid' ";


           /*If the above query runs*/
           if ($query_run = mysqli_query($con, $query)) {





                       /*Showing the data from the table*/
                       while ($query_row = mysqli_fetch_assoc($query_run)) {

                           $cid= $query_row['CID'];
                           $name = $query_row['Name'];
                           $pos = $query_row['Position'];
                           $content = $query_row['Comment'];
                           $date= $query_row['dateToPrint'];
                      ?>
                      <div class="row">
                          <div class="col-lg-2">

                          </div>



        <div class="col-lg-8" style="opacity:.8;background-color:white;margin-top:30px;text-align:left;border:2px solid grey;border-readius:10px">
            <h2 style="padding-top: 10px;font-size:20px;font-weight:700;"><?php echo $name;?> | <span style="color:green"><?php echo $pos;?></span></h2>
            <h4><i class="fa fa-calendar"></i> <?php echo $date;?></h4>
            <p style="font-size:15px;font-weight:600;padding:5px"><?php echo $content;?></p>
        </div>



        <div class="col-lg-2">
<?php if(admin_logged_in()){
    ?>
<a  href="delete_comment.php?CID=<?php echo $cid;?>" onclick="confirm_proceed();"><i style="margin-top:35px" class="fa fa-times"></i></a>
    <?php
}?>
        </div>

    </div>
<?php
        }

    }else{
        echo "string";
    }
         ?>


    <div class="col-lg-3">

    </div>
    <div class="col-lg-6">

             <form id="contact-form" method="post" action="read_notice.php?NID=<?php echo $nid;?>" style="text-align:center;padding-top:50px;padding-bottom:50px;">


                         <div class="form-group">
                             <textarea style="resize:none;" maxlength="160" rows="6" placeholder="Leave a comment...." class="form-control" name="content" id="message"></textarea>
         <span id='remainingC' style="color:black;font-weight:900"></span>

                         </div>


                             <!---Script for showing how many characters are left--->
                         <script>
                         $('textarea').keypress(function(){

                             if(this.value.length > 500){
                                 return false;
                             }
                             $("#remainingC").html("Remaining characters : " +(160 - this.value.length));
                         });
                     </script>

                         <input type="submit" name="" value="Comment" class="btn btn-large btn-primary">


                     </form>
<?php
         }else{
             ?>

        <div class="" style="background-color:white;border-radius:6px;border:1px solid grey;margin-top:50px;margin-bottom:50px">
                 <h2 style="font-size:20px;padding-top:30px;padding-bottom:30px;font-weight:500">You must be logged in to post a comment</h2>
        </div>

             <?php
         }

        ?>

    </div>
    <div class="col-lg-3">

    </div>
</div>
<?php
    }else{

        ?>
<h1 style="font-size:30px;font-weight:700;margin-top:250px">There is nothing to show</h1>
        <?php


    }

}else{

    ?>
<h1 style="font-size:30px;font-weight:700;margin-top:250px">There is nothing to show</h1>
    <?php


}
?>
