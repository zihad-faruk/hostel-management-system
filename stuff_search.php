<?php
include 'connect.inc.php';
include 'core.inc.php';
if(isset($_GET['input'])){
    $input= $_GET['input'];

    if(!empty($input)){
        $query = "SELECT `SSN`,`F_name`,`L_name` FROM `stuff` WHERE  `F_name` LIKE '$input%'";

        if($query_run = mysqli_query($con,$query)){
$i=1;
            while($row = mysqli_fetch_assoc($query_run)){
                ?>

                <?php if($i<=3){
?>
<a href="other_stuff_profile.php?SSN=<?php echo $row['SSN'];?>">
    <div class="" style="">
        <?php echo $row['F_name']." ".$row['L_name']."<br>";

            ?>
    </div>
</a>

        <?php
    }else{
?>
<a href="other_stuff_list.php?input=<?php echo $input;?>">
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
