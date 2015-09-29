<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './configL.php';
$organization = $_GET["Organization"];
          $conn;
          //Get the name from URL, and find the organization id by the name. We really need some sort of database Structure.
          $organizationData = "SELECT DepartmentName, Street, StreetNumber, City, PostalCode FROM Departments where DepartmentName = ".$organization." ORDER BY Name ASC;";
          $organizationsResult = $conn->query($organizationData);
          if ($organizationsResult->num_rows > 0) {
              // output data of each row
              while ($oRow = $organizationsResult->fetch_assoc()) {
                  echo "<tr class='active'>";
                  echo "<td>"
                  . "<div class='row'>"
                  . "<h3 class='col-xs-10'>".$oRow['DepartmentName']."</h3><a href='#' style='margin-top: 8px;' class='col-xs-offset-2 col-xs-2'><span style='font-size: 30px; color: black;' class='glyphicon glyphicon-chevron-right' aria-hidden='true'><p style='font-size: 12px;'></p></span></a><div class='col-xs-2'></div>"
                  ."<p class='col-xs-12'>".$oRow['Street']." ".$oRow['StreetNumber'].", ".$oRow['City']."".$oRow['PostalCode']."</p>"
                  . "</div>"
                  . "</td>"
                  . "</tr>";
              }
          } else {
              echo "No Pepes has yet been added to this category... :(";
          }
?>
<script type="text/javascript">
    window.onload = (
            function() 
    {
        document.getElementById('backButton').href = "?page=Home";
        
    } 
            );
</script>