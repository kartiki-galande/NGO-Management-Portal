<?php
    define('TITLE','Dashboard');
    define('PAGE','dashboard');
    include('Includes/header.php');
    include('../dbConnection.php');
    session_start();
    if(isset($_SESSION['is_login'])){
        $aEmail = $_SESSION['aemail'];
    }else{
        echo "<script> location.href='adminLogin.php';</script>";
    }
    $sql = "SELECT count(v_id) FROM volunteer";
    $result = $conn->query($sql);
    $row = $result->fetch_row();
    $totalvol = $row[0];

    $sql = "SELECT count(d_id) FROM donor";
    $result = $conn->query($sql);
    $row = $result->fetch_row();
    $totaldonor = $row[0];

    $sql = "SELECT count(c_id) FROM contactus";
    $result = $conn->query($sql);
    $row = $result->fetch_row();
    $totalmsgs = $row[0];


?>

            <div class="col-sm-9 col-md-10">  <!-- Start Dashboard 2nd Column-->
                <div class="row text-center mx-5">
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-danger mb-3" style="max-width:18rem;">
                            <div class="card-header">Volunteers Registered</div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $totalvol;  ?></h4>
                                <a class="btn shadow text-white" href="volunteers.php">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-success mb-3" style="max-width:18rem;">
                            <div class="card-header">Donors Registered</div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $totaldonor;  ?></h4>
                                <a class="btn shadow text-white" href="donors.php">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-info mb-3" style="max-width:18rem;">
                            <div class="card-header">Messages Received</div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $totalmsgs;  ?></h4>
                                <a class="btn shadow text-white" href="messages.php">View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-5 mt-5 text-center">
                    <p class="bg-dark text-white p-2">List of Admins</p>
                    <?php  
                        $sql = "SELECT * FROM admin";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0){
                            echo '
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Admin ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                    while($row = $result->fetch_assoc()){
                                    echo '<tr>';
                                        echo '<td>'.$row["a_id"].'</td>';
                                        echo '<td>'.$row["a_name"].'</td>';
                                        echo '<td>'.$row["a_email"].'</td>';
                                    echo '</tr>';
                                    }
                                echo '</tbody>
                            </table>';
                        }else{
                            echo "0 Results";
                        }
                    ?>
                </div>
            </div> <!-- End Dashboard 2nd Column-->



<?php include('Includes/footer.php');  ?>