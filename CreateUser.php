<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="jumbotron">
    <form class="form-horizontal" action="./Logic/_CreateUser.php" method="get">
    <fieldset>
        <legend>Create User</legend>
        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
            <div class="col-lg-10">
                <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputFPassword" class="col-lg-2 control-label">Password</label>
            <div class="col-lg-10">
                <input type="password" class="form-control" name="inputFPassword" id="inputFPassword" placeholder="Password">
            </div><br>
            <label for="inputRPassword" class="col-lg-2 control-label">Repeat Password</label>
            <div class="col-lg-10">
                <input type="password" class="form-control" name="inputRPassword" id="inputRPassword" placeholder="Repeat Password">
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
                <button type="submit" class="btn btn-primary">Create User</button>
            </div>
        </div>
    </fieldset>
</form>
</div>
<?php

?>
<script type="text/javascript">
    window.onload = function() {
  //YOUR JQUERY CODE
  $('.navbar-fixed-bottom').addClass('hidden');
 }
</script>