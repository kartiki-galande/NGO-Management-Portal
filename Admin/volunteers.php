<?php
    define('TITLE','Volunteers');
    define('PAGE','volunteers');
    include('Includes/header.php');
    include('../dbConnection.php');
    session_start();
    if(isset($_SESSION['is_login'])){
        $aEmail = $_SESSION['aemail'];
    }else{
        echo "<script> location.href='adminLogin.php';</script>";
    }
?>

<!-- Start 2nd Column -->
<div class="col-sm-9 col-md-10 mt-5 text-center">
    <p class="bg-dark text-white p-2" style="font-size:1.5rem;">Data of Volunteers</p>
    <?php 
        $sql = "SELECT * FROM volunteer";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            echo '
            <table class="table">
                <thead>
                    <tr>   
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email ID</th>
                        <th scope="col">Phone No.</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">Pincode</th>
                        <th scope="col">Skills</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>';
                while($row = $result->fetch_assoc()){
                    echo '<tr>';
                        echo '<td>'.$row["v_id"].'</td>';
                        echo '<td>'.$row["v_name"].'</td>';
                        echo '<td>'.$row["v_email"].'</td>';
                        echo '<td>'.$row["v_phone"].'</td>';
                        echo '<td>'.$row["v_address"].'</td>';
                        echo '<td>'.$row["v_city"].'</td>';
                        echo '<td>'.$row["v_pincode"].'</td>';
                        echo '<td>'.$row["v_skills"].'</td>';
                        echo '<td>';
                            echo '<form action="" method="POST">';
                                echo '<input type="hidden" name="id" value='.$row['v_id'].'/>';
                                echo '<button class="btn btn-secondary" name="delete" value="Delete" type="submit"><i class="fa fa-trash-alt"></i></button>';
                            echo '</form>';
                        echo '</td>';
                    echo '</tr>';
                    }
                echo '</tbody>
            </table>';
        }else{
            echo "0 Results";
        }
        if(isset($_REQUEST['delete'])){
            $sql = "DELETE FROM volunteer WHERE v_id = {$_REQUEST['id']}";
            if($conn->query($sql)==='TRUE'){
                echo '<meta http-equiv="refresh" content= "0;URL=?deleted"/>';
            }else{
                echo '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to delete data.</div>';
            }
        }
    ?>
</div> <!-- End 2nd Column -->


<?php include('Includes/footer.php');  ?>