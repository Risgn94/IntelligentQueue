<!DOCTYPE html>
<html lang="en">
    <?php
    if(isset($_GET['i']))
    {
        $i = $_GET["i"];
    }
 else {
     $i = "";
 }
      require_once "Header.php";
    ?>
  <body>
<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-bottom ">
          <a href="javascript:void(0)" class="btn btn-primary">Primary</a>
          <a href="javascript:void(0)" class="btn btn-primary">Primary</a>
          <a href="javascript:void(0)" class="btn btn-primary">Primary</a>
          <a href="javascript:void(0)" class="btn btn-primary">Primary</a>
          <a href="javascript:void(0)" class="btn btn-primary">Primary</a>
    </nav>

    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
          <?php
        include 'Functions.php';
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if($i == "" || $i == "Login")
        {      
            include_once("Login.php");
        }
        elseif ($i == "About")
        {
            include_once("About.php");
        }
        elseif ($i == "Contact")
        {
            include_once("Contact.php");
        }
        elseif ($i == "Login")
        {
            include_once 'Login.php';
        }
        elseif ($i == "Apply")
        {
            include_once './ApplyMembership.php';
        }
        elseif ($i == "Support")
        {
            include_once './Support.php';
        }
        elseif ($i == "Era")
        {
            include_once './EraTemplate.php';
            getEra($_GET['category']);
        }
        else
        {
            include_once './ErrorPage.php';
        }
        ?>    
      </div>
    </div> <!-- /container -->
    <?php
      include_once "Footer.php";
    ?>
  </body>
</html>