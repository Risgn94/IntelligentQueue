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
            <th><h2>Organizations</h2></th>
        </tr>
      </thead>
      <tbody>
          <?php
          include './configL.php';
          $conn;
          $organizationData = "SELECT Name, ImgLink, Address, AddressNumber, PostalCode, City FROM Organizations ORDER BY Name ASC;";
          $organizationsResult = $conn->query($organizationData);
          if ($organizationsResult->num_rows > 0) {
              // output data of each row
              while ($oRow = $organizationsResult->fetch_assoc()) {
                  echo "<tr class='active'>";
                  echo "<td>"
                  . "<div class='row'>"
                  . "<h3 class='col-xs-7'>".$oRow['Name']."<img style='margin-left: 5%' src='Img/OrganizationLogos/".$oRow['ImgLink']."' height='30px' class='img-responsive' alt='Responsive image'></h3><a href='?page=Departments' style='margin-top: 8px;' class='col-xs-offset-2 col-xs-2'><span style='font-size: 30px; color: black;' class='glyphicon glyphicon-chevron-right' aria-hidden='true'><p style='font-size: 12px;'></p></span></a><div class='col-xs-1'></div>"
                  . "<p class='col-xs-12'>".$oRow['Address']." ".$oRow['AddressNumber'].", ".$oRow['PostalCode']." ".$oRow['City']."</p>"
                  . "</div>"
                  . "</td>"
                  . "</tr>";
              }
          } else {
              echo "No Pepes has yet been added to this category... :(";
          }
          ?>
      </tbody>
    </table>
  </div>
<script>
    window.onload = (function() {document.getElementById('favoButton').style.backgroundColor = "rgba(255, 255, 255, 0.3)";} );
</script>