<?php
ob_start();
session_start();
$timezone= 'Asia/Dhaka';
date_default_timezone_set($timezone);

$current_file = $_SERVER['SCRIPT_NAME'];
if(isset($_SERVER['HTTP_REFERER'])) {
      $refer=$_SERVER['HTTP_REFERER'];
  }


/****Functions related to admin****/
/*Function for checking if admin is logged in or not*/
function admin_logged_in()
{
    if (isset($_SESSION['ASSN']) && !empty($_SESSION['ASSN'])) {
        return true;
    } else {
        return false;
    }
}


function admin_get_field($field)
{
    include "connect.inc.php";
    $ad_id = $_SESSION['ASSN'];

    $query = "SELECT `$field` FROM `admin` WHERE `ASSN`='$ad_id'";
    if ($query_run = mysqli_query($con, $query)) {
        if ($row = mysqli_fetch_row($query_run)) {
            return $row[0];
        } else {

        }
    } else {
        echo "There was a problem";
    }
}



function stuff_is_admin($field){
    include "connect.inc.php";

    $query =  "SELECT `ASSN` FROM `admin` WHERE `ASSN`='$field'";

    if ($query_run = mysqli_query($con, $query)) {
        if (mysqli_num_rows($query_run)>0) {

            return true;
        } else {

            return false;

        }
    } else {
        echo "There was a problem";
    }

}

function stuff_is_editor($field){
    include "connect.inc.php";

    $query =  "SELECT * FROM `editor` WHERE `ESSN`='$field'";

    if ($query_run = mysqli_query($con, $query)) {
        if (mysqli_num_rows($query_run)>0) {

            return true;
        } else {

            return false;
        }
    } else {
        echo "There was a problem";
    }

}


/****Functions related to editors****/
function editor_logged_in()
{
    if (isset($_SESSION['ESSN']) && !empty($_SESSION['ESSN'])) {
        return true;
    } else {
        return false;
    }
}


function editor_get_field($field)
{
    include "connect.inc.php";
    $ad_id = $_SESSION['ESSN'];

    $query = "SELECT `$field` FROM `editor` WHERE `ESSN`='$ad_id'";
    if ($query_run = mysqli_query($con, $query)) {
        if ($row = mysqli_fetch_row($query_run)) {
            return $row[0];
        } else {

        }
    } else {
        echo "There was a problem";
    }
}





/****Functions related to students****/
/*Function for getting student field of the student who is logged in*/
function student_get_field($field)
{
    include "connect.inc.php";
    $student_id = $_SESSION['Student_id'];

    $query = "SELECT `$field` FROM `student` WHERE `Student_id`='$student_id'";
    if ($query_run = mysqli_query($con, $query)) {
        if ($row = mysqli_fetch_row($query_run)) {
            return $row[0];
        } else {

        }
    } else {
        echo "There was a problem";
    }
}

/*Function for getting student field who are not logged in or accessing externally*/
function other_student_get_field($field, $stu_id)
{
    include "connect.inc.php";


    $query = "SELECT `$field` FROM `student` WHERE `Student_id`='$stu_id'";
    if ($query_run = mysqli_query($con, $query)) {
        if ($row = mysqli_fetch_row($query_run)) {
            return $row[0];
        } else {

        }
    } else {
        echo "There was a problem";
    }
}

/*Function for checking if a student is logged in or not*/
function student_logged_in()
{
    if (isset($_SESSION['Student_id']) && !empty($_SESSION['Student_id'])) {
        return true;
    } else {
        return false;
    }
}


/****Functions related to stuffs****/

function stuff_get_field($field)
{
    include "connect.inc.php";
    $id = $_SESSION['SSN'];

    $query = "SELECT `$field` FROM `stuff` WHERE `SSN`='$id'";
    if ($query_run = mysqli_query($con, $query)) {
        if ($row = mysqli_fetch_row($query_run)) {
            return $row[0];
        } else {

        }
    } else {
        echo "There was a problem";
    }
}

function other_stuff_get_field($field, $stu_id)
{
    include "connect.inc.php";


    $query = "SELECT `$field` FROM `stuff` WHERE `SSN`='$stu_id'";
    if ($query_run = mysqli_query($con, $query)) {
        if ($row = mysqli_fetch_row($query_run)) {
            return $row[0];
        } else {

        }
    } else {
        echo "There was a problem";
    }
}



/*Function for checking if a student is logged in or not*/
function stuff_logged_in()
{

    if (isset($_SESSION['SSN']) && !empty($_SESSION['SSN'])) {
        return true;
    } else {
        return false;
    }
}




/****Functions related to notice ****/
function notice_get_field($field,$id)
{
    include "connect.inc.php";


    $query = "SELECT `$field` FROM `notice` WHERE `NID`='$id'";
    if ($query_run = mysqli_query($con, $query)) {
        if ($row = mysqli_fetch_row($query_run)) {
            return $row[0];
        } else {

        }
    } else {
        echo "There was a problem";
    }
}


/***Functions related to menu***/
function menu_get_field($field,$date,$time)
{
    include "connect.inc.php";


    $query = "SELECT `$field` FROM `menu` WHERE `Date`='$date' AND `Time`='$time'";
    if ($query_run = mysqli_query($con, $query)) {
        if ($row = mysqli_fetch_row($query_run)) {
            return $row[0];
        } else {

        }
    } else {
        echo "There was a problem";
    }
}


/***Functiuons related to dues***/

function has_due($field){
    include "connect.inc.php";

    $query =  "SELECT `Student_id` FROM `due` WHERE `Student_id`='$field'";

    if ($query_run = mysqli_query($con, $query)) {
        if (mysqli_num_rows($query_run)>0) {

            return true;
        } else {

            return false;

        }
    } else {
        echo "There was a problem";
    }

}

function due_get_field($field,$id)
{
    include "connect.inc.php";


    $query = "SELECT `$field` FROM `due` WHERE `Student_id`='$id'";
    if ($query_run = mysqli_query($con, $query)) {
        if ($row = mysqli_fetch_row($query_run)) {
            return $row[0];
        } else {

        }
    } else {
        echo "There was a problem";
    }
}


/***Token Get Field***/
/***Functions related to menu***/
function token_get_field($field,$month,$id)
{
    include "connect.inc.php";


    $query = "SELECT `$field` FROM `token` WHERE `Month`='$month' AND `Student_id`='$id'";
    if ($query_run = mysqli_query($con, $query)) {
        if ($row = mysqli_fetch_row($query_run)) {
            return $row[0];
        } else {

        }
    } else {
        echo "There was a problem";
    }
}


function has_token($month,$id){
    include "connect.inc.php";

    $query =  "SELECT * FROM `token` WHERE `Month`='$month' AND `Student_id`='$id'";

    if ($query_run = mysqli_query($con, $query)) {
        if (mysqli_num_rows($query_run)>0) {

            return true;
        } else {

            return false;

        }
    } else {
        echo "There was a problem";
    }

}


function compare_token($id,$curr_date){
    $mon= date('Y-m');

    $start = token_get_field('Starting',$mon,$id);
    $day =token_get_field('Days',$mon,$id);
    $finish = date('Y-m-d',strtotime($start.'+'.$day.' Days'));
    if(($curr_date >= $start) && ($curr_date <= $finish)){

        return true;
    }else{
        return false;
    }
}

function token_checked($date,$id){
    include "connect.inc.php";

    $query =  "SELECT * FROM `token_checked` WHERE `date`='$date' AND `Student_id`='$id'";

    if ($query_run = mysqli_query($con, $query)) {
        if (mysqli_num_rows($query_run)>0) {

            return true;
        } else {

            return false;

        }
    } else {
        echo "There was a problem";
    }
}


/***Cancel Token Get Field***/
function token_cancel_get_field($field,$month,$id)
{
    include "connect.inc.php";


    $query = "SELECT `$field` FROM `token_cancel` WHERE `Month`='$month' AND `Student_id`='$id'";
    if ($query_run = mysqli_query($con, $query)) {
        if ($row = mysqli_fetch_row($query_run)) {
            return $row[0];
        } else {

        }
    } else {
        echo "There was a problem";
    }
}


function cancel_token($month,$id){
    include "connect.inc.php";

    $query =  "SELECT * FROM `token_cancel` WHERE `Month`='$month' AND `Student_id`='$id'";

    if ($query_run = mysqli_query($con, $query)) {
        if (mysqli_num_rows($query_run)>0) {

            return true;
        } else {

            return false;

        }
    } else {
        echo "There was a problem";
    }

}
