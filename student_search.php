<?php
include 'connect.inc.php';
include 'core.inc.php';
if(isset($_GET['input'])){
    $input= $_GET['input'];

    if(!empty($input)){
        $query = "SELECT `Student_id`,`F_name`,`L_name` FROM `student` WHERE  `Student_id` LIKE '$input%'";

        if($query_run = mysqli_query($con,$query)){
$i=1;
            while($row = mysqli_fetch_assoc($query_run)){
                ?>

                <?php if($i<=3){
?>
<a href="other_student_profile.php?Student_id=<?php echo $row['Student_id'];?>">
    <div class="" style="">
        <?php echo $row['F_name']." ".$row['L_name']."<br>";
              echo "ID: ".$row['Student_id'];
            ?>
    </div>
</a>

        <?php
    }else{
?>
<a href="other_student_list.php?input=<?php echo $input;?>">
    <div class="" style="text-align:center;background-color:aliceblue">
        See all Results
    </div>
</a>

<?php



    }?>




                <?php
                $i++;
            }
        }

        else{
            echo 'Something went wrong';
        }
    }
}else{
    header("Location: $refer");
}




?>
