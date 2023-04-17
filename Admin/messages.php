<?php
    define('TITLE','Messages');
    define('PAGE','messages');
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
    <p class="bg-dark text-white p-2" style="font-size:1.5rem;">Data of Messages</p>
    <?php 
        $sql = "SELECT * FROM contactus";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            echo '
            <table class="table">
                <thead>
                    <tr>   
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email ID</th>
                        <th scope="col">Message</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>';
                while($row = $result->fetch_assoc()){
                    echo '<tr>';
                        echo '<td>'.$row["c_id"].'</td>';
                        echo '<td>'.$row["c_fname"].'</td>';
                        echo '<td>'.$row["c_lname"].'</td>';
                        echo '<td>'.$row["c_email"].'</td>';
                        echo '<td>'.$row["c_message"].'</td>';
                        echo '<td>';
                            echo '<form action="" method="POST">';
                                echo '<input type="hidden" name="id" value='.$row['c_id'].'/>';
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
            $sql = "DELETE FROM contactus WHERE c_id = {$_REQUEST['id']}";
            if($conn->query($sql) == TRUE){
                echo '<meta http-equiv="refresh" content= "0;URL=?deleted"/>';
            }else{
                echo '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to delete data.</div>';
            }
        }
    ?>
</div> <!-- End 2nd Column -->

<?php include('Includes/footer.php');  ?>