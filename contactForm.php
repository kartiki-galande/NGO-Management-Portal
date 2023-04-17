
<?php
    
    include('dbConnection.php');
    if(isset($_REQUEST['csubmit'])){
        if(($_REQUEST['cfname'])=="" || ($_REQUEST['clname'])=="" || ($_REQUEST['cemail'])=="" || ($_REQUEST['cmessage'])==""){
            $regmsg = '<div class="alert alert-warning mt-2" role="alert">All Fields are Required..!!</div>';
            //$regmsg = '<script type="text/Javascript">alert("All fields are required.");</script>';
        }else{
            $cFname = $_REQUEST['cfname'];
            $cLname = $_REQUEST['clname'];
            $cEmail = $_REQUEST['cemail'];
            $cMessage = $_REQUEST['cmessage'];

            $sql = "INSERT INTO contactUs(c_fname,c_lname,c_email,c_message)VALUES('$cFname', '$cLname','$cEmail','$cMessage')";
            if($conn->query($sql)==TRUE){
                $regmsg = '<div class="alert alert-success mt-2" role="alert">Message Sent Successfully..!!</div>';
            }else{
                $regmsg = '<div class="alert alert-danger mt-2" role="alert">Unable to Send Message..!!</div>';
                
            }
        }
    }

?>

<!-- contact form start -->
<div class="main">
        <form id="form" name="contactForm" onsubmit="return Validate()" >
            
            <input type="text" id="fname" name="cfname" placeholder="Your name.." required><br><br>
          
            <input type="text" id="lname" name="clname" placeholder="Your last name.." required><br><br>
         
            <input type="email" id="eid" name="cemail" placeholder="Your email id here.." required><br><br>
          
            <textarea id="subject" name="cmessage" placeholder="Message" style="height:170px" cols="22" required></textarea><br><br>
            <button class="submit" value="submit" id="submit" name="csubmit">Contact Us</button><br>
            <?php if(isset($regmsg)){echo $regmsg;} ?>
        </form>
    </div>
    <!-- contact form end -->

<script>
    function Validate()
    {
        // var fname = document.forms['contactForm']['cfname'];

        // if(fname == ""){
        //     windows.alert("Please enter your name");
        //     fname.focus();
        //     return false;
        // }
        // return true;
    }
</script>