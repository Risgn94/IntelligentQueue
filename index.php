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
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="?i=Home">Rare pepes</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li id="menuAbout"><a  href="?i=About">About</a></li>
            <li id="menuContact"><a  href="?i=Contact">Contact</a></li>
            <li class="dropdown" id="menuGallery">
              <a class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >Gallery <span class="caret"></span></a>
              <ul class="dropdown-menu">
              	<li class="dropdown-header">Early Rare Pepes</li>
              	<li id="Biblical Era"><a name="" href="?i=Era&category=Biblical%20Era">Biblical Era</a></li>
                <li id="Post Jesus Era"><a href="?i=Era&category=Post%20Jesus%20Era">Post Jesus Era</a></li>
                <li id="Post Viking Era"><a href="?i=Era&category=Post%20Viking%20Era">Post Viking Era</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Medieval Rare Pepes</li>
                <li id="Feudal Era"><a href="?i=Era&category=Feudal%20Era">Feudal Era</a></li>
                <li id="Period of forgetfulness"><a href="?i=Era&category=Period%20of%20Era">Period of forgetfulness</a></li>
                <li id="Age Of Enlightning"><a href="?i=Era&category=Age%20Of%20Era">Age Of Enlightning</a></li>
                <li id="Colonial Pepes"><a href="?i=Era&category=Colonial%20Pepes">Colonial Pepes</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Various Pepes</li>
                <li id="Exclusive Pepes"><a href="?i=Era&category=Exclusive%20Pepes">Exclusive Pepes</a></li>
                <li id="NSFW Pepes"><a href="?i=Era&category=NSFW%20Pepes">NSFW Pepes</a></li>
                <li id="all"><a href="?i=Era&category=all">Literature</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li id="menuConstribute"><a  href="?i=Constribute">Constribute</a></li>
            <li id="menuApply"><a  href="?i=Apply">Apply For Membership</a></li>
            <li id="menuSupport"><a  href="?i=Support">Support<span class="sr-only"></span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
          <?php
        include 'Functions.php';
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if($i == "" || $i == "Home")
        {      
            include_once("Home.php");
        }
        elseif ($i == "About")
        {
            include_once("About.php");
        }
        elseif ($i == "Contact")
        {
            include_once("Contact.php");
        }
        elseif ($i == "Constribute")
        {
            include_once './Constribute.php';
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