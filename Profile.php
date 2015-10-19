<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './configL.php';
$query = "SELECT * from UserData WHERE Email='".$_SESSION['user']."';";
        $userResults = $conn->query($query);
        $userInfo = $userResults->fetch_assoc();
?>
<div class="jumbotron">
    <h1>Hello <?php echo $_SESSION['FN']; ?></h1>
    
    <form class="form-horizontal" action="./Logic/_CreateUser.php" method="get">
    <fieldset>
        <legend>User Information</legend>
        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
            <div class="col-lg-10">
                <input type="email" value="<?php echo $userInfo['Email']; ?>" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputUsername" class="col-lg-2 control-label">Username</label>
            <div class="col-lg-10">
                <input type="email" value="<?php echo $userInfo['Username']; ?>" class="form-control" name="inputEmail" id="inputEmail" placeholder="None">
            </div>
        </div>
        <div class="form-group">
            <label for="inputFN" class="col-lg-2 control-label">Firstname</label>
            <div class="col-lg-10">
                <input type="text" value="<?php echo $userInfo['FirstName']; ?>" class="form-control" name="inputFPassword" id="inputFPassword" placeholder="Password">
            </div><br>
            <label for="inputLN" class="col-lg-2 control-label">Lastname</label>
            <div class="col-lg-10">
                <input type="text" value="<?php echo $userInfo['Lastname']; ?>" class="form-control" name="inputRPassword" id="inputRPassword" placeholder="Repeat Password">
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label for="firstname" class="col-lg-2 control-label">Firstname</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname">
            </div><br>
            <label for="lastname" class="col-lg-2 control-label">Lastname</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname">
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label for="phone" class="col-lg-2 control-label">Phone Number</label>
            <div class="col-lg-10">
                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone Number">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12" style="text-align: center;">
                <button type="submit" class="btn btn-primary">Update Info</button>
            </div>
        </div>
    </fieldset>
</form>
</div>





<script>
    window.onload = (function() {document.getElementById('profileButton').style.backgroundColor = "rgba(255, 255, 255, 0.3)";} );
</script>