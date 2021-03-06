<?php
if (session_status() == PHP_SESSION_NONE || session_id() == '') {
        session_start();
    }
    else
    {
        //Do Nothing
    }
?>
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
      
        switch ($page) {
            case "":
                include_once("Welcome.php");
                break;
            case "BookingPage":
                include_once("bookingTime.php");
                break;
            case "Welcome":
                include_once("Welcome.php");
                break;
            case "ChatPage":
                include_once("ChatPage.php");
                break;
            case "Login":
                include_once("Welcome.php");
                break;
            case "Home":
                include_once("Home.php");
                break;
            case "Favorites":
                if (isset($_SESSION['user']) && $_SESSION['user'] != "") {
                    include_once("Favorites.php");
                } else {
                    include_once("ProfileAnon.php");
                }
                break;
            case "OpeningHours":
                  include_once("OpeningHours.php");
                  break;
            case "Profile":
                if (isset($_SESSION['user']) && $_SESSION['user'] != "") {
                    include_once("Profile.php");
                } else {
                    include_once("ProfileAnon.php");
                }
                break;
            case "Settings":
                if (isset($_SESSION['user']) && $_SESSION['user'] != "") {
                    include_once("Settings.php");
                } else {
                    include_once("ProfileAnon.php");
                }
                break;
            case "CreateUser":
                include_once("CreateUser.php");
                break;
            case "Departments":
                include_once("Departments.php");
                break;
            case "departmentPage":
                include_once("departmentPage.php");
                break;
            case "queueFunction":
              include_once("queuePage.php");
                break;
            case "getWaitingNumbers":
              include_once("./Json/getWaitingNumbers.php");
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
              <a href="?page=Home" id="homeButton" class="col-xs-3"><span class="navBarIcon glyphicon glyphicon-home" ><p>Home</p></span></a>
              <a href="?page=Favorites" id="favoButton" class="col-xs-3"><span class="navBarIcon glyphicon glyphicon-star" ><p>Favorites</p></span></a>
              <a href="?page=Profile" id="profileButton" class="col-xs-3"><span class="navBarIcon glyphicon glyphicon-user" ><p>Profile</p></span></a>
              <a href="?page=Settings" id="settingsButton" class="col-xs-3"><span class="navBarIcon glyphicon glyphicon-cog" ><p>Settings</p></span></a>
          </div>
    </nav>
    <?php
      include_once "Footer.php";
    ?>
  </body>
</html>