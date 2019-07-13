<?php
include 'connect.inc.php';
if(isset($_POST['fname']) &&
    isset($_POST['lname']) &&
    isset($_POST['sid']) &&
    isset($_POST['sdept']) &&
    isset($_POST['sbatch']) &&
    isset($_POST['faname']) &&
    isset($_POST['moname']) &&
    isset($_POST['bloodgp']) &&
    isset($_POST['adrs']) &&
    isset($_POST['rno']) &&
    isset($_POST['scno']) &&
    isset($_POST['email']) &&
    isset($_POST['pass']) &&
    isset($_POST['pass_again'])){


    $fname= $_POST['fname'];
    $lname =$_POST['lname'];
    $sid =$_POST['sid'];
    $sdept =$_POST['sdept'];
    $sbatch= $_POST['sbatch'];
    $faname= $_POST['faname'];
    $moname =$_POST['moname'];
    $bloodgp =$_POST['bloodgp'];
    $adrs= $_POST['adrs'];
    $rno =$_POST['rno'];
    $scno =$_POST['scno'];
    $email =$_POST['email'];
    $pass = $_POST['pass'];
    $pass_again = $_POST['pass_again'];
    $pass_hash = md5($pass);



    if(strlen($pass)>=6){


        if($pass!=$pass_again){ ?>
            <div  class="error_msg"><h4 style="color: red"><span style="font-weight: 900">ERROR!!!</span> Your passwords do not match.Try again !</h4></div>
        <?php }
        else{


            if(strlen($fname)>32 || strlen($lname)>32 || strlen($faname)>32 || strlen($moname)>32){ ?>
                <div  class="error_msg"><h4 style="color: red"><span style="font-weight: 900">ERROR!!!</span> Names cannot exceed 32 characters.Try again !</h4></div>
                <?php
            }else{


                $query = "INSERT INTO `student` VALUES ('$sid','$fname','$lname','$sdept','$sbatch','$faname','$moname',
              '$bloodgp','$rno','$adrs','$scno','$email','$pass_hash','')";

                if($query_run = mysqli_query($con,$query)){
                    header("Location: student_login.php?m=".rawurlencode("You can now log in."));

                }else{ ?>
                    <div  class="error_msg"><h4 style="color: red"><span style="font-weight: 900">ERROR!!!</span> There was a internal problem or you might have tried using id that already exists ..Try again !</h4></div>

                <?php }

            }
        }

    }else{?>
        <div style="text-align: center;" class="error_msg"><h4 style="color: red;"><span style="font-weight: 900">ERROR!!!</span> There was a problem with your password.Try Again !</h4></div>
    <?php }



}

?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<head>
    <title>Registration Panle</title>


<style>


#regForm {
  background-color:transparent;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>
</head>
<body>

<!--Javascript functions-->

<script type="text/javascript">

    /*Form validation functions*/

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


    /*For fathers name*/
    function fa_name_function() {

        var l_fname= document.getElementById('fa_name').value ;

        if(l_fname.length<=32){
            document.getElementById('fa_name_div').innerHTML="";
        }else if(l_fname.length>32){
            document.getElementById('fa_name_div').innerHTML="<p style='color:red;background-color:#fbd6d6;font-weight: 500;font-size:20px;font-family: Calibri'><span style='margin-left:10px;font-weight: 900'>WARNING !!!</span>  Names can't be more then 32 characters</p>";
        }


    }


    /*For mothers name*/

    function mo_name_function() {

        var l_fname= document.getElementById('mo_name').value ;

        if(l_fname.length<=32){
            document.getElementById('mo_name_div').innerHTML="";
        }else if(l_fname.length>32){
            document.getElementById('mo_name_div').innerHTML="<p style='color:red;background-color:#fbd6d6;font-weight: 500;font-size:20px;font-family: Calibri'><span style='margin-left:10px;font-weight: 900'>WARNING !!!</span>  Names can't be more then 32 characters</p>";
        }


    }


    /*For password validation*/
    function pass_function() {

        var l_pass= document.getElementById('pass').value ;

        if(l_pass.length==0){
            document.getElementById('pass_div').innerHTML="";
        }else if(l_pass.length<6){
            document.getElementById('pass_div').innerHTML="<p style='color:red;background-color:#fbd6d6;font-weight: 500;font-size:20px;font-family: Calibri'><span style='margin-left:10px;font-weight: 900'>WARNING !!!</span>  Passwords must be atleast 6 characters</p>";
        }
        else if(l_pass.length>32){
            document.getElementById('pass_div').innerHTML="<p style='color:red;background-color:#fbd6d6;font-weight: 500;font-size:20px;font-family: Calibri'><span style='margin-left:10px;font-weight: 900'>WARNING !!!</span>  Passwords can't be more then 32 characters</p>";
        }else{
            document.getElementById('pass_div').innerHTML="<p style='font-size:20px;color:green;font-family: Calibri;font-weight: 500;background-color: #c4f5cd'>Valid Password</p>";
        }


    }

    function pass_again_function() {

        var l_pass_again= document.getElementById('pass_again').value ;
        var l_pass= document.getElementById('pass').value ;

        if(l_pass_again.length==0){
            document.getElementById('pass_again_div').innerHTML="";
        }else if(l_pass_again!=l_pass){
            document.getElementById('pass_again_div').innerHTML="<p style='color:red;background-color:#fbd6d6;font-weight: 500;font-size:20px;font-family: Calibri'><span style='margin-left:10px;font-weight: 900'>WARNING !!!</span>  Passwords do not match.</p>";

        }else if(l_pass_again.length!=0 &&  l_pass_again==l_pass){

            document.getElementById('pass_again_div').innerHTML="<p style='font-size:20px;color:green;font-family: Calibri;font-weight: 500;background-color: #c4f5cd''>Password Mathced !</p>";

        }


    }

</script>



<!--Form Title--->
<div class="title text-center wow fadeIn" data-wow-duration="500ms" style="text-align: center;margin-top: 40vh">
    <h2>Registration  <span class="color">Form</span></h2>
    <div class="border"></div>
    <div class=""  style="padding:20px;font-size:20px">
        <a href="student_login.php">Already a registered? Sign in</a>
    </div>
</div>







<form id="regForm" action="student_reg.php" method="POST" style="margin-top:40vh">



  <!-- One "tab" for each step in the form: -->
  <div class="tab"><h1 style="font-weight: 600">Student <span class="color">Name</span></h1>
    <p><input type="text" placeholder="First name..." oninput="this.className = ''" id="f_name" name="fname" onkeyup="f_name_function()"></p>
      <div id="f_name_div"></div>
    <p><input type="text" placeholder="Last name..." oninput="this.className = ''"  id="l_name" name="lname" onkeyup="l_name_function()"></p>
      <div id="l_name_div"></div>
  </div>
  <div class="tab"><h1 style="font-weight: 600">Student <span class="color">Information</span></h1>
      <p><input type="number" min="1100000" placeholder="Your Student Id" oninput="this.className = ''" name="sid"></p>
      <p>Department</p> <select name="sdept">
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
      <p><input type="number" min="11" max="17" placeholder="Your Batch" oninput="this.className = ''" name="sbatch"></p>
      <p><input type="text" placeholder="Father's Name" oninput="this.className = ''" id="fa_name" name="faname" onkeyup="fa_name_function()"></p>
      <div id="fa_name_div"></div>
      <p><input type="text" placeholder="Mother's Name" oninput="this.className = ''" id="mo_name" name="moname" onkeyup="mo_name_function()"></p>
      <div id="mo_name_div"></div>
      <p>Blood Group <br></p><select name="bloodgp">
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
  <div class="tab"><h1 style="font-weight: 600">Contact <span class="color">Information</span></h1>
    <p><input type="text" placeholder="Adress...." oninput="this.className = ''" name="adrs"></p>
    <p><input type="text" placeholder="Current Room Number.." oninput="this.className = ''" name="rno"></p>
    <p><input type="number" min="0" placeholder="Contact Number.." oninput="this.className = ''" name="scno"></p>
  </div>

  <div class="tab"> <h1 style="font-weight: 600">Login <span class="color">Information</span></h1>
    <p><input type="email" placeholder="Your Email..." oninput="this.className = ''" name="email"></p>
    <p><input type="password" placeholder="Choose a Password..." oninput="this.className = ''" id="pass" name="pass" onkeyup="pass_function()"></p>
      <div id="pass_div"></div>
      <p><input type="password" placeholder="Confirm Password..." oninput="this.className = ''" id="pass_again" name="pass_again" onkeyup="pass_again_function()" ></p>
      <div id="pass_again_div"></div>
  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>


    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {

    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
   document.getElementById("regForm").submit();

    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

</body>
</html>
