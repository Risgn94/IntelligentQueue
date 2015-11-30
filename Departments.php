<div class="bs-example" style="margin-bottom: 60px;" data-example-id="contextual-table">
    <table class="table table table-hover">
      <thead>
        <tr>
            <th><h2>Departments</h2>
            <?php
              include './configL.php';
              $organization = stripcslashes($_GET["Organization"]);
              $conn;
              //Get the organization name and icon image path
              $orgNameIcon = "SELECT Name, ImgLink FROM Organizations WHERE ID = " . $organization . ";";
              $orgNameIconResult = $conn->query($orgNameIcon);
              $orgNI = $orgNameIconResult->fetch_assoc();
                    //"<h3 class='col-xs-7'>Post DK<img style='margin-left: 5%' src='Img/OrganizationLogos/imageLink.png' height='30px' class='img-responsive' alt='Responsive image'></h3>"
              echo '<h3 class="col-xs-12 organizationName">'.$orgNI['Name'].'<img style="margin-left: 5%;" src=Img/OrganizationLogos/'.$orgNI['ImgLink'].' height="30px" class="img-responsive" alt="Responsive image"><h3/>';
            ?>
            </th>
        </tr>
      </thead>
      <tbody>
          <?php
          //Get the name from URL, and find the organization id by the name. We really need some sort of database Structure.
          $organizationData = "SELECT ID, DepartmentName, Street, StreetNumber, City, PostalCode FROM Departments where OrganizationID = " . $organization . " ORDER BY DepartmentName ASC;";
          $organizationsResult = $conn->query($organizationData);
          if ($organizationsResult->num_rows > 0) {
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
              echo "No Pepes has yet been added to this category... :(";
          }
          ?>
      </tbody>
    </table>
  </div>

<script type="text/javascript">
    window.onload = (
            function() 
    {
        document.getElementById('backButton').href = "?page=Home";
        
    } 
            );
</script>