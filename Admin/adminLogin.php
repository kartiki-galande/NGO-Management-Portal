<?php 
    include("../dbConnection.php");
    session_start();
    if(!isset($_SESSION['is_login'])){
        if(isset($_REQUEST['aemail'])){
            $aEmail = mysqli_real_escape_string($conn,trim($_REQUEST['aemail']));
            $aPassword = mysqli_real_escape_string($conn,trim($_REQUEST['apassword']));
            $sql = "SELECT a_email, a_password FROM admin WHERE a_email = '".$aEmail."' AND a_password = '".$aPassword."' limit 1";
            $result = $conn->query($sql);
            if($result->num_rows == 1){
                $_SESSION['is_login'] = true;
                $_SESSION['aemail'] = $aEmail;
                echo "<script> location.href='dashboard.php';</script>";
                exit;
            }else{
                $msg = '<div class="alert alert-warning mt-2">Enter Valid Email and Password..!! </div>';
            }
        }
    }else{
        echo "<script> location.href='dashboard.php';</script>";
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/7bef94379f.js" crossorigin="anonymous"></script>
    <title>Admin LogIn</title>
</head>
<body>
    <div class="mb-3 mt-5 text-center" style="font-size: 30px;">
        <i class="fas fa-hand-holding-heart"></i>
        <span><strong>Happy to Help</strong> Activity Management Portal</span>
    </div>
    <p class="text-center" style="font-size:20px;"><i class="fa fa-user-circle-o" style="margin-right:0.5rem; color:#ff0000"></i>Admin Area</p>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-4">
                <form action="" class="shadow-lg p-4" method="POST">
                    <div class="form-group" style="margin-bottom:0.5rem;">
                        <i class="fas fa-user" style="margin-right:0.5rem;"></i><label for="email" class="ml-2 font-weight-bold">Email</label><input type="email" class="form-control" placeholder="Email" name="aemail">
                        <small class="form-text">We'll never share your email with anyone.</small>
                    </div>
                    <div class="form-group" style="margin-bottom:1rem;">
                        <i class="fas fa-key" style="margin-right:0.5rem;"></i><label for="pass" class="font-weight-bold ml-2">Password</label><input type="password" class="form-control" placeholder="Password" name="apassword">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-outline-danger mt-3 font-weight-bold shadow-sm">Login</button>
                    </div>
                    <?php if(isset($msg)) {echo $msg;} ?>
                </form>
                <div class="text-center">
                    <a href="../index.html" class="btn btn-info mt-3 font-weight-bold shadow-lg">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>