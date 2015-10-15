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
<div class="jumbotron">
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
        
        function printIcon($class, $name)
        {
            echo '<a href="#"><div style="text-align: center;"class="col-xs-4">
                            <span style="height: auto; width: auto; font-size: 50px;" class="'.$class.'"></span><br>
                            <p>'.$name.'</p>
                        </div></a>';
        }
        
        $classArray = array("glyphicon glyphicon-transfer", "glyphicon glyphicon-comment", "glyphicon glyphicon-calendar", "glyphicon glyphicon-user");
        $nameArray = array("Queue", "Livechat", "Opening Hours", "Booking");
        $plugInArray = array($depInfo['QueueActive'], $depInfo['LivechatActive'], $depInfo['OpeningHoursActive'], $depInfo['BookingActive']);
    ?>
        <div class="row" style="height: 100px;">
    <?php
        $counterBolean = 0;
        for($i = 0; $i<4 ; $i++)
        {
            if($counterBolean<3)
            {
                printIcon($classArray[$i], $nameArray[$i]);
                $counterBolean++;
            }
            else
            {
                echo '</div><br>';
                echo '<div class="row" style="height: 100px;">';
                printIcon($classArray[$i], $nameArray[$i]);
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
            <iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d18006.657359722474!2d12.546054151049253!3d55.65712796433043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e0!4m3!3m2!1d55.652671899999994!2d12.5207945!4m5!1s0x4652534b9386120b%3A0x46d5d4830eab67bd!2s%C3%85landsgade+45%2C+2300+K%C3%B8benhavn+S%2C+Danmark!3m2!1d55.662371!2d12.607132!5e0!3m2!1sen!2sdk!4v1444658795386" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>  
    </div>
        
<iframe id="map" width="600" height="450"></iframe>
<script  type="text/javascript">
    var currentLatitude;
    var currentLongitude;
    
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        //x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
    currentLatitude =  position.coords.latitude;
    currentLongitude = position.coords.longitude; 
}
getLocation();
    
    
    
jQuery(
  function($)
  {
       var q=encodeURIComponent($('#address').text());
       $('#map')
        .attr('src',
             'https://www.google.com/maps/embed/v1/directions?key=AIzaSyAcp7D0pHYoY2tc-a5C5XYowjJdtekQsvw&origin='+currentLongitude+","+currentLatitude+"&destination="+q);

  }
);
</script>
//&origin=Oslo+Norway
  &destination=Telemark+Norway
        <p>ABABABABB</p>
    </div>
</div>