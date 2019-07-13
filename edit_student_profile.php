<?php include 'header.inc.php';


if(student_logged_in()){
    $Student_id= $_SESSION['Student_id'];

    if(isset($_POST['fname']) &&
        isset($_POST['lname']) &&
        isset($_POST['sdept']) &&
        isset($_POST['sbatch']) &&
        isset($_POST['faname']) &&
        isset($_POST['moname']) &&
        isset($_POST['bloodgp']) &&
        isset($_POST['adrs']) &&
        isset($_POST['rno']) &&
        isset($_POST['scno'])
        ){


        $fname= $_POST['fname'];
        $lname =$_POST['lname'];
        $sdept =$_POST['sdept'];
        $sbatch= $_POST['sbatch'];
        $faname= $_POST['faname'];
        $moname =$_POST['moname'];
        $bloodgp =$_POST['bloodgp'];
        $adrs= $_POST['adrs'];
        $rno =$_POST['rno'];
        $scno =$_POST['scno'];



        if(!empty($fname) && !empty($lname)  && !empty($sdept) && !empty($sbatch) && !empty($faname) && !empty($moname) &&
        !empty($bloodgp) && !empty($adrs) && !empty($rno) && !empty($scno)){


            if(strlen($fname)>32 || strlen($lname)>32 || strlen($faname)>32 || strlen($moname)>32){ ?>
                    <div  class="error_msg"><h4 style="color: red"><span style="font-weight: 900">ERROR!!!</span> Names cannot exceed 32 characters.Try again !</h4></div>
                    <?php
                }else{


                    $query = "UPDATE `student` SET `F_name`='$fname',`L_name`='$lname',`Dept`='$sdept',`Batch`='$sbatch',`Father`='$faname',`Mother`='$moname',
                  `Blood_Grp`='$bloodgp',`Room_no`='$rno',`Address`='$adrs',`Contact_no`='$scno' WHERE `Student_id`='$Student_id'";

                    if($query_run = mysqli_query($con,$query)){
                        header("Location: student_profile.php?msg=".urlencode("Profile Information Updated"));

                    }else{ ?>
                        <div  class="error_msg"><h4 style="color: red"><span style="font-weight: 900">ERROR!!!</span> There was a internal problem  ..Try again !</h4></div>

                    <?php }

                }


        }else{?>
            <div style="text-align: center;" class="error_msg"><h4 style="color: red;"><span style="font-weight: 900">ERROR!!!</span> Fields cannot be empty !</h4></div>
        <?php }



    }

?>

<script type="text/javascript">
/*For firstname*/
function f_name_function() {

    var l_fname= document.getElementById('f_name').value ;

    if(l_fname.length<=32){
        document.getElementById('f_name_div').innerHTML="";
    }else if(l_fname.length>32){
        document.getElementById('f_name_div').innerHTML="<p style='color:red;background-color:#fbd6d6;font-weight: 500;font-size:20px;font-family: Calibri'><span style='margin-left:10px;font-weight: 900'>WARNING !!!</span>  Names can't be more then 32 characters</p>";
    }


}

/*For lastname*/
function l_name_function() {

    var l_lname= document.getElementById('l_name').value ;

    if(l_lname.length<=32){
        document.getElementById('l_name_div').innerHTML="";
    }else if(l_lname.length>32){
        document.getElementById('l_name_div').innerHTML="<p style='color:red;background-color:#fbd6d6;font-weight: 500;font-size:20px;font-family: Calibri'><span style='margin-left:10px;font-weight: 900'>WARNING !!!</span>  Names can't be more then 32 characters</p>";
    }


}


</script>

<div class="row" style="height:100vh;">
    <div class="col-lg-2">

    </div>
    <div class="col-lg-8" style="background-color:white;margin-top:50px;height:90vh;border:1px solid grey;border-radius:5px;">
        <div class="row">
            <a href="student_profile.php"><button type="button" name="button" style="float:left;margin:5px;" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button></a>
            <a href="student_logout.php"><button type="button" name="button" style="float:right;margin:5px;" class="btn btn-danger"><i class="fa fa-power-off"></i> Log Out</button></a>
        </div>
        <i class="fa fa-3x fa-edit" style="padding-top:20px;"></i> <h2 style="font-size:25px;margin-bottom:30px">Edit Information</h2>


<style media="screen">
.aa{
    background-color: transparent;
}
    .aa:hover {
        background-color: #57cbcc;
    }
</style>

        <form  action="edit_student_profile.php" method="POST" style="">
            <div class="form-group">

            </div>

            <div class="form-group row">

                <div class="col-lg-6">
                    <input type="text" placeholder="First name..." id="f_name" name="fname" onkeyup="f_name_function()" class="form-control" value="<?php echo student_get_field('F_name');?>">
                      <div id="f_name_div"></div>
                </div>
                <div class="col-lg-6">
                    <input type="text" placeholder="Last name..." class="form-control"  id="l_name" name="lname" onkeyup="l_name_function()" value="<?php echo student_get_field('L_name')?>">
                    <div id="l_name_div"></div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-6">
                    <input type="number" min="1100000" placeholder="Your Student Id" name="sid" class="form-control" value="<?php echo student_get_field('Student_id');?>">
                </div>
                <div class="col-lg-6">
                    <input type="number" min="11" max="17" placeholder="Your Batch"  name="sbatch" class="form-control" value="<?php echo student_get_field('Batch');?>">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-6">
                    <p><input type="text" placeholder="Father's Name" class="form-control" id="fa_name" name="faname" onkeyup="fa_name_function()"  value="<?php echo student_get_field('Father');?>"></p>
                    <div id="fa_name_div"></div>
                </div>
                <div class="col-lg-6">
                    <p><input type="text" placeholder="Mother's Name" class="form-control" id="mo_name" name="moname" onkeyup="mo_name_function()" value="<?php echo student_get_field('Mother');?>"></p>
                    <div id="mo_name_div"></div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-6">
                    <input type="text" placeholder="Adress...." class="form-control" name="adrs" value="<?php echo student_get_field('Address')?>">
                </div>
                <div class="col-lg-6">
                    <input type="number" min="0" placeholder="Contact Number.." class="form-control" name="scno" value="<?php echo student_get_field('Contact_no')?>">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-6">
                <input type="text" placeholder="Current Room Number.."class="form-control" name="rno" value="<?php echo student_get_field('Room_no');?>">
                </div>
                <div class="col-lg-6">
                    <select name="bloodgp" class="form-control">
                        <option value="<?php echo student_get_field('Blood_Grp')?>" hidden><?php echo student_get_field('Blood_Grp')?> (Current)</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>

                    </select>
                </div>
            </div>



            <div class="form-group row">
                <div class="col-lg-12">
                    <select name="sdept" class="form-control" >
                        <option value="<?php echo student_get_field('Dept')?>" hidden><?php echo student_get_field('Dept')?> (Current)</option>
                        <option value="EEE">EEE</option>
                        <option value="CSE">CSE</option>
                        <option value="ME">ME</option>
                        <option value="CE">CE</option>
                        <option value="ETE">ETE</option>
                        <option value="PME">PME</option>
                        <option value="URP">URP</option>
                        <option value="ARCHI">ARCHI</option>
                        <option value="MIE">MIE</option>
                        <option value="CWRE">CWRE</option>
                    </select>
                </div>

            </div>





            <input class="aa" type="submit" name="" value="Update">

        </form>

    </div>
    <div class="col-lg-2">

    </div>
</div>




<!---If student is not lgged in,redirect him to the login page--->
<?php
}else{
    header("Location: student_login.php");
}

?>
