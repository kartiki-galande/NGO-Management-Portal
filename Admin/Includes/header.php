
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
    <title><?php echo TITLE; ?></title>
</head>
<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" style="margin:1rem; font-size:1.5rem;" href="dashboard.php"><i class="fas fa-hand-holding-heart" style="padding-right:0.5rem;"></i>Happy to Help</a>
    </nav>

    <!-- Start Container -->
    <div class="container-fluid" style="margin-top:5rem;">
        <div class="row">
            <nav class="col-sm-2 bg-light sidebar py-5"> <!-- Start SideBar 1st Column-->
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'dashboard'){echo 'bg-info bg-gradient';} ?>" href="dashboard.php"><i class="fas fa-tachometer-alt" style="margin-right:0.5rem;">Dashboard</i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'volunteers'){echo 'bg-info bg-gradient';} ?>" href="volunteers.php"><i class="fa fa-users" style="margin-right:0.5rem;">Volunteers</i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'donors'){echo 'bg-info bg-gradient';} ?>" href="donors.php"><i class="fa fa-credit-card" style="margin-right:0.5rem;">Donors</i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'messages'){echo 'bg-info bg-gradient';} ?>" href="messages.php"><i class="fa fa-comments" style="margin-right:0.5rem;">Messages</i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'changePass'){echo 'bg-info bg-gradient';} ?>" href="changePass.php"><i class="fa fa-key" style="margin-right:0.5rem;">Change Password</i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'logout'){echo 'bg-info bg-gradient';} ?>" href="logout.php"><i class="fa fa-sign-out" style="margin-right:0.5rem;">Logout</i></a>
                        </li>
                    </ul>
                </div>
            </nav>  <!-- End SideBar 1st Column-->
