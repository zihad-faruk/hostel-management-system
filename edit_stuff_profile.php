<?php include 'header1.inc.php';


if(stuff_logged_in()){
    $ssn= $_SESSION['SSN'];

    if( isset($_POST['fname']) &&
        isset($_POST['lname']) &&
        isset($_POST['adrs']) &&
        isset($_POST['scno']) &&
        isset($_POST['sdept']) ){



        $fname= $_POST['fname'];
        $lname =$_POST['lname'];
        $sdept =$_POST['sdept'];
        $adrs= $_POST['adrs'];
        $scno =$_POST['scno'];

        if(!empty($fname) && !empty($lname) && !empty($sdept) && !empty($adrs) && !empty($scno)){


                            if(strlen($fname)>32 || strlen($lname)>32){ ?>
                                <div  class="error_msg"><h4 style="color: red"><span style="font-weight: 900">ERROR!!!</span> Names cannot exceed 32 characters.Try again !</h4></div>
                                <?php
                            }else{


                        $query = "UPDATE `stuff` SET `F_name`='$fname',`L_name`='$lname',`Position`='$sdept',`Address`='$adrs',`Contact_no`='$scno' WHERE `SSN`='$ssn'";

                                if($query_run = mysqli_query($con,$query)){
                                    header("Location: stuff_profile.php?msg=".rawurlencode("Profile Information Updated"));

                                }else{ ?>
                                    <div  class="error_msg"><h4 style="color: red"><span style="font-weight: 900">ERROR!!!</span> There was a internal problen !</h4></div>

                                <?php }

                            }

        }else{
            ?>
<div  class="error_msg"><h4 style="color: red"><span style="font-weight: 900">ERROR!!!</span> No fields can be empty!</h4></div>

            <?php
        }



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
    <div class="col-lg-8" style="background-color:white;margin-top:50px;height:80vh;border:1px solid grey;border-radius:5px;">
        <div class="row">
            <a href="stuff_profile.php"><button type="button" name="button" style="float:left;margin:5px;" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button></a>
            <a href="stuff_logout.php"><button type="button" name="button" style="float:right;margin:5px;" class="btn btn-danger"><i class="fa fa-power-off"></i> Log Out</button></a>
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

        <form  action="edit_stuff_profile.php" method="POST" style="">
            <div class="form-group">

            </div>

            <div class="form-group row">

                <div class="col-lg-6">
                    <input type="text" placeholder="First name..." id="f_name" name="fname" onkeyup="f_name_function()" class="form-control" value="<?php echo stuff_get_field('F_name');?>">
                      <div id="f_name_div"></div>
                </div>
                <div class="col-lg-6">
                    <input type="text" placeholder="Last name..." class="form-control"  id="l_name" name="lname" onkeyup="l_name_function()" value="<?php echo stuff_get_field('L_name')?>">
                    <div id="l_name_div"></div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-6">
                    <input type="text" placeholder="Adress...." class="form-control" name="adrs" value="<?php echo stuff_get_field('Address')?>">
                </div>
                <div class="col-lg-6">
                    <input type="number" min="0" placeholder="Contact Number.." class="form-control" name="scno" value="<?php echo stuff_get_field('Contact_no')?>">
                </div>
            </div>



            <div class="form-group row">
                <div class="col-lg-12">
                    <select name="sdept" class="form-control" >
                        <option value="<?php echo stuff_get_field('Position')?>" hidden><?php echo stuff_get_field('Position')?> (Current)</option>
                        <option value="Provost">Provost</option>
                        <option value="Additional Provost">Additional Provost</option>
                        <option value="Assistant Provost">Assistant Provost</option>
                        <option value="Office Clerk">Office Clerk</option>
                        <option value="Accountant">Accountant</option>
                        <option value="Dining Manager">Dining Manager</option>
                    </select>
                </div>

            </div>





            <input class="aa" type="submit" name="" value="Update">

        </form>

    </div>
    <div class="col-lg-2">

    </div>
</div>




<!---If stuff is not lgged in,redirect him to the login page--->
<?php
}else{
    header("Location: stuff_login.php");
}

?>
