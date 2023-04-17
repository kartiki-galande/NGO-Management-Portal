<?php

include('dbConnection.php');
if(isset($_REQUEST['vsubmit'])){
    //Checking for empty fields
    if(($_REQUEST['vname'])=="" || ($_REQUEST['vemail'])=="" || ($_REQUEST['vphone'])=="" || ($_REQUEST['vaddress'])=="" || ($_REQUEST['vcity'])=="" || ($_REQUEST['vstate'])=="" || ($_REQUEST['vpincode'])=="" || ($_REQUEST['vskills'])==""){
        $regmsg = '<div class="alert alert-warning mt-2" role="alert">All Fields are Required..!!</div>';
    }else{
        //Email Already Registered
        $sql = "SELECT v_email FROM volunteer WHERE v_email='".$_REQUEST['vemail']."'";
        $result = $conn->query($sql);
        if($result->num_rows==1){
            $regmsg = '<div class="alert alert-warning mt-2" role="alert">EmailID is already Registered..!!</div>';
        }else{
            //Assigning User's values to variables
            $vName = $_REQUEST['vname'];
            $vEmail = $_REQUEST['vemail'];
            $vPhone = $_REQUEST['vphone'];
            $vAddress = $_REQUEST['vaddress'];
            $vCity = $_REQUEST['vcity'];
            $vState = $_REQUEST['vstate'];
            $vPincode = $_REQUEST['vpincode'];
            $vSkills = $_REQUEST['vskills'];

            $sql = "INSERT INTO volunteer(v_name,v_email,v_phone,v_address,v_city,v_state,v_pincode,v_skills) VALUES('$vName','$vEmail','$vPhone','$vAddress','$vCity','$vState','$vPincode','$vSkills')";
            if($conn->query($sql)==TRUE){
                $regmsg = '<div class="alert alert-success mt-2" role="alert">Volunteer Registration Successful..!!</div>';
            }else{
                $regmsg = '<div class="alert alert-danger mt-2" role="alert">Unable to Register..!!</div>';
            }
        }   
    }
}
?>

<style>
    .required label {
    font-weight: bold;
}
.required label:after {
    color: black;
    content: ' *';
    display:inline;
}
</style>

<!-- volunteering form start -->
<div class="main">
        <br>
    <h5>Join us as a Volunteer </h5>
<form class="required">
    <label for class="name">Name</label>
    <br>
    <input type="text" name="vname" id="fname" placeholder="Enter your name " required>
    <br>
   <br><br>
    <label for class="eid">Email</label>
    <input type="email" id="eid" class="eid" name="vemail" placeholder="Enter your email id" required><br>
    <br><br>
    <label for class="phn">Phone No</label><br>
    <input type="tel" pattern="[0-9]{10}" name="vphone" id="phn" placeholder="Enter your phone no" maxlength="10" required><br><br><br>
    <label for class="add">Address</label><br>
    <input type="text" name="vaddress" id="add" placeholder="Enter your address" maxlength="60" required><br><br><br>
    <label for id="city">City </label><label for id="state"> State</label><br>
    <input type="text" name="vcity" size="9" class="city" required>
    <select class="state" name="vstate">
        <option value="Maharashtra" selected>Maharashtra</option>
        <option value="Goa">Goa</option>
        <option value="Gujarat">Gujarat</option>
        <option value="Karnataka">Karnataka</option>
        <option value="Jharkhand">Jharkhand</option>
    </select><br><br>
    <label for id="code">Postal Code </label><label for id="country"> Country </label><br>
    <input type="text" name="vpincode" size="6" class="code" inputmode="numeric" maxlength="6" required>
    <input type="text" name="vcountry" size="5" class="country" value="INDIA" readonly><br><br>
    <label for id="area2">SkillSets OR Areas of Interests</label><br>
    <textarea name="vskills" cols="56" rows="2" class="area2" required></textarea><br><br>
    <button type="submit" value="Submit" class="submit" name="vsubmit">SUBMIT</button>
    <br>
    <?php if(isset($regmsg)){echo $regmsg;} ?>
</form>
</div>
<!-- volunteering form end -->


