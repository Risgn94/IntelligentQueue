<div class="jumbotron" style="padding: 0px;">    
    <!-- This is the search bar-->
    <div class="panel-body" style="padding: 5px;">
        <div class="form-group" style="margin-bottom: 0px;">
        <input placeholder="Search" class="form-control input-lg" type="text" id="inputLarge">
        <a href="javascript:void(0)" class="btn btn-primary">Search</a>
    </div>
    </div>
</div>
    <!-- This is supposed to be the ads-->
    <div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">Buy the new Audi!</h3>
    </div>
    <div class="panel-body">
        Do you also like cars? Click here, and buy the new Audi
    </div>
</div>
    <div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">Do you like pizza?</h3>
    </div>
    <div class="panel-body">
        We deliver the best pizzas right to your doorstep. Order now!
    </div>
</div>
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
                  . "<h3 class='col-xs-7'>".$oRow['Name']."<img style='margin-left: 5%' src='Img/OrganizationLogos/".$oRow['ImgLink']."' height='30px' class='img-responsive' alt='Responsive image'></h3><a href='?page=Departments&Organization=".$oRow['Name']."' style='margin-top: 8px;' class='col-xs-offset-2 col-xs-2'><span style='font-size: 30px; color: black;' class='glyphicon glyphicon-chevron-right' aria-hidden='true'><p style='font-size: 12px;'></p></span></a><div class='col-xs-1'></div>"
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
</div>
<script>
    window.onload = (function() {
        document.getElementById('homeButton').style.backgroundColor = "rgba(255, 255, 255, 0.3)";
        document.getElementById('backButton').href = "?page=Login"
        var childs = document.getElementById('backButton').childNodes[0];
        childs.className = "";
        childs.childNodes[0].innerHTML = "Log out";
        childs.childNodes[0].style.fontSize = "16px";
        childs.childNodes[0].style.lineHeight = "21px";
        childs.childNodes[0].style.fontWeight = "bold";
    });
</script>