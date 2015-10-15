<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="bs-example" style="margin-bottom: 60px;" data-example-id="contextual-table">
    <table class="table table table-hover">
      <thead>
        <tr>
            <th><h2>Favorites</h2></th>
        </tr>
      </thead>
      <tbody>
          <?php
          include './configL.php';
          $departmentArray = array();

          $conn;
          $favoritesData = "SELECT DepartmentID from Favorites WHERE UserID = '".$_SESSION['userId']."';";
          $favoDataResult = $conn->query($favoritesData);
          $numberOfFavo = $favoDataResult->num_rows;
          while($oRow = $favoDataResult->fetch_assoc())
          {
              array_push($departmentArray, $oRow['DepartmentID']);
          }
          $depArrayLenght = count($departmentArray);
          
          for($i = 0 ; $i < $depArrayLenght ; $i++)
          {
              $departmentData = "SELECT DepartmentName, Street, StreetNumber, City, PostalCode from Departments WHERE ID = '".$departmentArray[$i]."';";
              $departmentDataResult = $conn->query($departmentData);
              if ($departmentDataResult->num_rows > 0) {
              // output data of each row
              while ($oRow = $departmentDataResult->fetch_assoc()) {
                  echo "<tr class='active'>";
                  echo "<td>"
                  . "<div class='row'>"
                  . "<h3 class='col-xs-7'>".$oRow['DepartmentName']."</h3><a href='?page=Departments' style='margin-top: 8px;' class='col-xs-offset-2 col-xs-2'><span style='font-size: 30px; color: black;' class='glyphicon glyphicon-chevron-right' aria-hidden='true'><p style='font-size: 12px;'></p></span></a><div class='col-xs-1'></div>"
                  . "<p class='col-xs-12'>".$oRow['Street']." ".$oRow['StreetNumber'].", ".$oRow['PostalCode']." ".$oRow['City']."</p>"
                  . "</div>"
                  . "</td>"
                  . "</tr>";
              }
          } else {
              echo "You have no favorites yet.";
          }
          }
          ?>
      </tbody>
    </table>
  </div>
<script>
    window.onload = (function() {document.getElementById('favoButton').style.backgroundColor = "rgba(255, 255, 255, 0.3)";} );
</script>