<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include "configL.php";
$error = $inputEmail = $inputPassword = "";

if (isset($_POST['inputEmail']))
{
    $inputEmailUF = $_POST['inputEmail'];
    $inputEmail = filter_input(INPUT_POST, 'inputEmail');
    $inputPasswordUF = $_POST['inputPassword'];
    $inputPassword = filter_input(INPUT_POST, 'inputPassword');
    
    if($inputEmail == "" || $inputPassword == "")
    {
        $error = "Not all fields were entered";
    }
    else
    {
        $query = "SELECT ID, Email, Password, FirstName, LastName from UserData WHERE Email='$inputEmail' AND Password = '$inputPassword'";
        $queryResults = $conn->query($query);
        if($queryResults->num_rows == 0)
        {
            $error = "Email/Password is incorrect.";
        }
        else
        {
            $queryData = $queryResults->fetch_assoc();
            $_SESSION['user'] = $inputEmail;
            $_SESSION['pass'] = $inputPassword;
            $_SESSION['FN'] = $queryData['FirstName'];
            $_SESSION['LN'] = $queryData['LastName'];
            $_SESSION['userId'] = $queryData['ID'];
            $error = '';
            echo '<script>window.location.href = "?page=Home";</script>';
            //$url = "?page=Home";
            //header( "Location: $url" );
        }
    }
}
?>

<div class="jumbotron">
    <div style="text-align: center;">
        <h1>Welcome!</h1>
        <p id="loginError"> <?php echo $error; ?></p>
        <div class="toggler">
            <div id="effect" class="ui-widget-content ui-corner-all">
                <form class="form-horizontal" action="?page=Welcome" method="post">
                    <fieldset>
                        <div class="form-group">
                            <label for="inputEmail"  class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-10">
                                <input type="email" value="<?php $_SESSION['user']; ?>" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                            <div class="col-lg-10">
                                <input type="password" value="<?php $_SESSION['password']; ?>" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password">
                            </div>
                        </div>
                        <p id="hideLogin">Hide</p>
                        <button id="loginBtn" type="submit" class="col-xs-12 btn-lg btn-primary">Login</button>
                    </fieldset>
                </form>
            </div>
        </div>
        <a id="loginExpander" class="col-xs-12 btn-lg btn-primary">Login</a>
        <p>Or if you do not yet have an account</p>
        <a href="?page=CreateUser" class="col-xs-12 btn-lg btn-success">Create User</a>
        <p>Or if you simply want to be</p>
        <a href="./Logic/clearSessions.php" class="col-xs-12 btn-lg btn-info">Anomynous</a>        
        <p>Want to have you organization on this app? <a href="#">Follow this link</a></p>
    </div>
</div>

<script type="text/javascript">

        window.onload = ( function() {
        $('.navbar-fixed-bottom').addClass('hidden');
        $( 'span' ).removeClass( "glyphicon-chevron-left" );
        $( "span" ).find( "p" ).remove();
    });
    
    function myAjax() {
      $.ajax({
           type: "POST",
           url: './Logic/clearSessions.php',
           

      });
 }
    
    $( function() {
    // run the currently selected effect
    function runEffect() {
      // get effect type from
      var selectedEffect = "blind";
 
      // most effect types need no options passed by default
      var options = {};
      // some effects have required parameters
      if ( selectedEffect === "scale" ) {
        options = { percent: 100 };
      } else if ( selectedEffect === "size" ) {
        options = { to: { width: 280, height: 185 } };
      }
 
      // run the effect
      $( "#loginBtn" ).show();
      $( "#effect" ).show( selectedEffect, options, 700 );
      
      $( "#loginExpander" ).hide();
      $( "#hideLogin" ).click(function() {
          $( "#loginBtn" ).hide();
          $( "#effect" ).hide(400);
          $( "#loginExpander" ).show();
    });
    };
 
    //callback function to bring a hidden box back
    function callback() {
      setTimeout(function() {
        $( "#effect:visible" ).removeAttr( "style" ).fadeOut();
      }, 1000 );
    };
 
    // set effect from select menu value
    $( "#loginExpander" ).click(function() {
      runEffect();
    });
 
    $( "#effect" ).hide();
  });
     
</script>