<?php
    define('TITLE','Change Password');
    define('PAGE','changePass');
    include('Includes/header.php');
    include('../dbConnection.php');
    session_start();
    if(isset($_SESSION['is_login'])){
        $aEmail = $_SESSION['aemail'];
    }else{
        echo "<script> location.href='adminLogin.php';</script>";
    }

    $aEmail = $_SESSION['aemail'];
    if(isset($_REQUEST['passUpdate'])){
        if($_REQUEST['apassword']== ""){
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill all the fields.</div>';
        }else{
            $aPass = $_REQUEST['apassword'];
            $sql = "UPDATE admin SET a_password='$aPass' WHERE a_email='$aEmail'";
            if($conn->query($sql) == TRUE){
                $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updates Successfully.</div>';
            }else{
                echo "Unable to Update.";
            } 
        }
    }

    

?>

<div class="col-sm-9 col-md-10"> <!-- Start 2nd Column -->
    <div class="col-sm-5 mt-5">
    <form class="mt-5 mx-5" action="" method="POST">
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" value="<?php echo $aEmail; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="inputNewPassword" style="padding-top:1rem;">New Password</label>
            <input type="password" class="form-control" id="inputNewPassword" placeholder="New Password" name="apassword">
        </div>
        <button type="submit" class="btn btn-danger mr-4 mt-4" name="passUpdate">Update</button>
        <button type="reset" class="btn btn-secondary mt-4" style="margin-left:1rem;">Reset</button> 
        <?php if(isset($passmsg)){echo $passmsg;} ?>
    </form>
    </div> 
</div> <!-- End of 2nd Column -->

<?php include('Includes/footer.php');  ?>