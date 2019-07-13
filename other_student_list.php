<?php
include 'header.inc.php';
if(isset($_GET['input'])){
    $input= $_GET['input'];

    if(!empty($input)){
        $query = "SELECT `Student_id`,`F_name`,`L_name` FROM `student` WHERE  `Student_id` LIKE '$input%'";

        if($query_run = mysqli_query($con,$query)){

?>
<style>
    table {

        border-collapse: collapse;
        width: 100%;
    }

    th{
        border: 1px solid #dddddd;
        background-color:#2A3H54;
        padding: 10px;
        text-align: center;
        font-weight:600;
        font-size:20px


    }


    td {
        border: 1px solid #dddddd;
        padding: 8px;
    }

    tr:nth-child(odd) {
        background-color:#B1FAB7;
    }
</style>

<table>
   <tr>
       <th>Student Id</th>
       <th>Name</th>
       <th>Action</th>

   </tr>

<?php


            while($row = mysqli_fetch_assoc($query_run)){
                ?>
<tr>
    <td><?php echo $row['Student_id'];?></td>
    <td>     <?php echo $row['F_name']." ".$row['L_name']; ?></td>
    <td><a href="other_student_profile.php?Student_id=<?php echo $row['Student_id'];?>"><button type="button" name="button" class="btn btn-success"><i class="fa fa-user"></i> Visit profile</button>
    </a></td>
</tr>




                <?php

            }


            ?>
</table>

            <?php
        }

        else{
            echo 'Something went wrong';
        }
    }
}else{
    header("Location: $refer;");
}




?>
