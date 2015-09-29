<!DOCTYPE html>
<html lang="en">
    <?php
    if(isset($_GET['page']))
    {
        $page = $_GET["page"];
    }
 else {
     $page = "";
 }
      require_once "Header.php";
    ?>
  <body>
      <nav class="navbar navbar-default navbar-fixed-top ">
          <div class="container">
              <a id="backButton" href="?page=Home" style="margin-top: 8px;" class="col-xs-2"><span style="font-size: 30px; color: white;" class="glyphicon glyphicon-chevron-left" aria-hidden="true"><p style="font-size: 12px;">Back</p></span></a>
          <h2 class="col-xs-8" style="text-align: center; margin-top: 10px;">IQueue</h2>
          <a href="#" style="margin-top: 12px;" class="col-xs-2"><span style="font-size: 30px; color: white;" class="glyphicon glyphicon-align-justify" aria-hidden="true"><p style="font-size: 12px;"></p></span></a>
          </div>
      </nav>

    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
          <?php
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        switch ($page) {
            case "":
                include_once("Welcome.php");
                break;
            case "Login":
                include_once("Welcome.php");
                break;
            case "Home":
                include_once("Home.php");
                break;
            case "Favorites":
                include_once("Favorites.php");
                break;
            case "Profile":
                include_once("Profile.php");
                break;
            case "Settings":
                include_once("Settings.php");
                break;
            case "CreateUser":
                include_once("CreateUser.php");
                break;
            case "Departments":
                include_once("Departments.php");
                break;
            default:
                include_once 'ErrorPage.php';
                break;
            }
        ?>    
    </div> <!-- /container -->
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-bottom ">
          <div class="bottom-navbar" style="text-align: center;">
              <a href="?page=Home" id="homeButton" class="col-xs-3"><span style="font-size: 28px; color: white;" class="glyphicon glyphicon-home" aria-hidden="true"><p style="font-size: 12px;">Home</p></span></a>
              <a href="?page=Favorites" id="favoButton" class="col-xs-3"><span style="font-size: 28px; color: white;" class="glyphicon glyphicon-star" aria-hidden="true"><p style="font-size: 12px;">Favorites</p></span></a>
              <a href="?page=Profile" id="profileButton" class="col-xs-3"><span style="font-size: 28px; color: white;" class="glyphicon glyphicon-user" aria-hidden="true"><p style="font-size: 12px;">Profile</p></span></a>
              <a href="?page=Settings" id="settingsButton" class="col-xs-3"><span style="font-size: 28px; color: white;" class="glyphicon glyphicon-cog" aria-hidden="true"><p style="font-size: 12px;">Settings</p></span></a>
          </div>
    </nav>
    <?php
      include_once "Footer.php";
    ?>
  </body>
</html>