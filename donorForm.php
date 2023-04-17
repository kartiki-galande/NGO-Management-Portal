<?php 

    include('dbConnection.php');

    if(isset($_REQUEST['dpay'])){
        //Checking empty fields
        if(($_REQUEST['dfname'])=="" || ($_REQUEST['dlname'])=="" || ($_REQUEST['dpan'])=="" || ($_REQUEST['demail'])=="" || ($_REQUEST['daddress'])=="" || ($_REQUEST['dcity'])=="" || ($_REQUEST['dstate'])=="" || ($_REQUEST['dcountry'])=="" || ($_REQUEST['dpincode'])=="" || ($_REQUEST['dsupport'])=="" || ($_REQUEST['damount'])=="" || ($_REQUEST['dcomment'])==""){
            $regmsg = '<div class="alert alert-warning mt-2" role="alert">All Fields are Required..!!</div>';
        }else{
            $dFname = $_REQUEST['dfname'];
            $dLname = $_REQUEST['dlname'];
            $dPan = $_REQUEST['dpan'];
            $dEmail = $_REQUEST['demail'];
            $dAddress = $_REQUEST['daddress'];
            $dCity = $_REQUEST['dcity'];
            $dState = $_REQUEST['dstate'];
            $dCountry = $_REQUEST['dcountry'];
            $dPincode = $_REQUEST['dpincode'];
            $dSupport = $_REQUEST['dsupport'];
            $dAmount = $_REQUEST['damount'];
            $dComment = $_REQUEST['dcomment'];

            $sql = "INSERT INTO donor(d_fname,d_lname,d_pan,d_email,d_address,d_city,d_state,d_country,d_pincode,d_support,d_amount,d_comment)VALUES('$dFname','$dLname','$dPan','$dEmail','$dAddress','$dCity','$dState','$dCountry','$dPincode','$dSupport','$dAmount','$dComment')";
            if($conn->query($sql)==TRUE){
                $regmsg = '<div class="alert alert-success mt-2" role="alert">Donor Registration Successful..!!</div>';
            }else{
                $regmsg = '<div class="alert alert-danger mt-2" role="alert">Unable to Proceed..!!</div>';
            }
        }    
    }
    

?>
<style>
.required label {
    font-weight: bold;
}
.required label:after {
    color: #e32;
    content: ' *';
    display:inline;
}
</style>
<!-- donor form start -->
<div class="required">
    <form>
    <div class="form">
        <br>
        <h2>Personal Details</h2><br>
        <hr>
        <label class="fname"> First Name </label><label class="lname"> Last Name </label><br>
        <input type="text" name="dfname" id="fname" required>
        <input type="text" name="dlname" id="lname" required><br>
        <label class="pan"> PAN </label><label class="eid"> Email </label><br>
        <input type="text" name="dpan" id="pan" maxlength="10" pattern="[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}" required>
        <input type="email" name="demail" id="eid" required><br>
        <label class="add"> Address </label><br>
        <input type="text" name="daddress" size="46" id="add" required><br>
        <label class="city"> City </label><label class="state"> State </label><br>
        <input type="text" name="dcity" id="city" required>
        <input type="text" name="dstate" id="state" required> 
        <!-- <select class="state" name="dstate" id="state">
            <option value="Maharashtra" selected>Maharashtra</option>
            <option value="Goa">Goa</option>
            <option value="Gujarat">Gujarat</option>
            <option value="Karnataka">Karnataka</option>
            <option value="Jharkhand">Jharkhand</option>
        </select> --><br>
        <label class="country"> Country </label><label class="code"> Postal Code </label><br>
        <!-- <input type="text" name="dcountry" id="country" value="India"> -->
        <select class="country" name="dcountry" id="country">
            <option value="India" selected>India</option>
            <option value="U.S.A.">U.S.A.</option>
            <option value="Nepal">Nepal</option>
            <option value="Australia">Australia</option>
        </select>
        <input type="text" name="dpincode" id="code" inputmode="numeric" maxlength="6" required><br>
        <label class="areas"> Area to support </label><label class="amt"> Donation Amount </label><br>
        <select class="areas" name="dsupport" id="areas">
            <option value="Women Empowerment" selected>Women Empowerment</option>
            <option value="Disaster Management">Disaster Relief</option>
            <option value="Environmental Conservation">Environmental Conservation</option>
            <option value="Education">Education</option>
        </select>
        <input type="number" min="0" max="100000" step="1" name="damount" id="amt" required><br>
        <label class="comment"> Comment </label><br>
        <textarea name="dcomment" cols="48" rows="2" id="comment" required></textarea><br><br>
        <button type="submit" value="pay" class="pay" name="dpay">Submit</button><br>
        <?php if(isset($regmsg)){echo $regmsg;} ?>
    </div>
    </form>
</div>
<!-- donor form end -->

