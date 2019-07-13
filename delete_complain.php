<?php include 'header.inc.php';

if(admin_logged_in() || editor_logged_in()){


if(isset($_GET['CID'])){
    $cid= $_GET['CID'];
    if(!empty($cid)){

        $q= "DELETE FROM `complain` WHERE `CID`='$cid'";
        if(mysqli_query($con,$q)){
            header("Location: admin_profile.php?msg=".rawurlencode("Complain was deleted Successfully"));
        }
    }else{
        ?>
        <div class="" style="text-align:center">
            <a href="<?php echo $refer;?>"><button type="button" name="button" class="btn btn-danger" style="margin-bottom:50px"><i class="fa fa-arrow-left"></i> Back</button></a>
            <h1>Please select a complain to delete .</h1>
        </div>

        <?php


    }


}else{
    ?>

    <div class="" style="text-align:center">
        <a href="<?php echo $refer;?>"><button type="button" name="button" class="btn btn-danger" style="margin-bottom:50px"><i class="fa fa-arrow-left"></i> Back</button></a>
        <h1>You can't see this page now</h1>
    </div>

    <?php
}
}else{
    ?>
    <div class="" style="text-align:center">
        <a href="<?php echo $refer;?>"><button type="button" name="button" class="btn btn-danger" style="margin-bottom:50px"><i class="fa fa-arrow-left"></i> Back</button></a>
        <h1 style="font-size:30px">You don't have the permission to see this page.Please login.</h1>
    </div>

    <?php
}


?>
