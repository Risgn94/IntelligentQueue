<?php
header('X-Frame-Options: GOFORIT'); 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.

          
          
          
          
          //Get the name from URL, and find the organization id by the name. We really need some sort of database Structure.
          
          $organizationsResult = $conn->query($organizationData);
           */
    ?>
<div class="jumbotron" style="margin-bottom: 70px;">
    <?php
        include './configL.php';
        $department = stripcslashes($_GET["department"]);
        $conn;
        $departmentData = "SELECT ID, DepartmentName, Street, StreetNumber, City, PostalCode, QueueActive, LivechatActive, LocationActive, OpeningHoursActive, BookingActive FROM Departments where ID = " . $department . ";";
        $departmentResult = $conn->query($departmentData);
        
        $depInfo = $departmentResult->fetch_assoc();
        
       /* if ($departmentResult->num_rows > 0) {
              // output data of each row
            
            
              while ($oRow = $organizationsResult->fetch_assoc()) {
                  echo "<tr class='active'>";
                  echo "<td>"
                  . "<div class='row'>"
                  . "<h3 class='col-xs-8'>" . $oRow['DepartmentName'] . "</h3>"
                          . "<a href='?page=departmentPage&department=".$oRow['ID']."' style='margin-top: 12px;' class='col-xs-4'><span style='font-size: 30px; color: black;' class='glyphicon glyphicon-chevron-right' aria-hidden='true'>"
                          . "<p style='font-size: 12px;'></p></span></a>"
                          . "<p class='col-xs-12'>" . $oRow['Street'] . " " . $oRow['StreetNumber'] . ", " . $oRow['City'] . " " . $oRow['PostalCode'] . "</p>"
                  . "</div>"
                  . "</td>"
                  . "</tr>";
              }
          } else {
              echo "This Department has no plugins, or does not exist.";
          }*/
        ?>
    <h1><?php echo $depInfo['DepartmentName']; ?></h1>
    <h3 id="address"><?php echo $depInfo['Street']. " " . $depInfo['StreetNumber'] . ", " . $depInfo['PostalCode'] . " " . $depInfo['City']; ?></h3><br>
    <?php
        
        function printIcon($class, $name, $link, $ID)
        {
            echo '<a href="?page='.$link.'&department='.$ID.'"><div style="text-align: center;"class="col-xs-4">
                            <span style="height: auto; width: auto; font-size: 50px;" class="'.$class.'"></span><br>
                            <p>'.$name.'</p>
                        </div></a>';
        }
        
        $classArray = array("glyphicon glyphicon-transfer", "glyphicon glyphicon-comment", "glyphicon glyphicon-calendar", "glyphicon glyphicon-user");
        $nameArray = array("Queue", "Livechat", "Opening Hours", "Booking");
        $linkArray = array("queueFunction", "Livechat", "OpeningHours", "BookingPage");
        $plugInArray = array($depInfo['QueueActive'], $depInfo['LivechatActive'], $depInfo['OpeningHoursActive'], $depInfo['BookingActive']);
    ?>
        <div class="row" style="height: 100px;">
    <?php
        $counterBolean = 0;
        for($i = 0; $i<4 ; $i++)
        {
            if($counterBolean<3)
            {
                printIcon($classArray[$i], $nameArray[$i],$linkArray[$i], $depInfo['ID']);
                $counterBolean++;
            }
            else
            {
                echo '</div><br>';
                echo '<div class="row" style="height: 100px;">';
                printIcon($classArray[$i], $nameArray[$i],$linkArray[$i], $depInfo['ID']);
            }
        }
        echo '</div><br>';
        
    if($depInfo['LocationActive'] == 1)
    {
        
    }
    else {
    //do nothing    
    }
    ?>
    <div id="google_Container">
        <div class="row" style="margin: 5px;">
        <div class="google_wrapper">
            <iframe id="map" width="600" height="450"></iframe>
        </div>
            <p id="currentPosition"></p>
    </div>
<script  type="text/javascript">
    
    var x = document.getElementById("demo");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
    jQuery(
  function($)
  {
       var q=encodeURIComponent($('#address').text());
       $('#map')
        .attr('src',
             'https://www.google.com/maps/embed/v1/directions?key=AIzaSyAcp7D0pHYoY2tc-a5C5XYowjJdtekQsvw&origin='+position.coords.latitude+","+position.coords.longitude+"&destination="+q);

  }
);
}
    getLocation();
</script>
    </div>
</div>