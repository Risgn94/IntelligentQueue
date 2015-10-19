<div class="jumbotron">
<div class="bs-example" data-example-id="striped-table">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Day</th>
          <th>Opens</th>
          <th>Close</th>
        </tr>
      </thead>
      <tbody>
          <?php
          include './configL.php';
          $department = stripcslashes($_GET["department"]);
          $conn;
          
          $departmentData = "SELECT * FROM OpeningHours where DepartmentID = " . $department . ";";
          $departmentResult = $conn->query($departmentData);

          $depInfo = $departmentResult->fetch_assoc();
          ?>
        <tr>
          <td>Monday</td>
          <td><?php echo $depInfo['OpenMonday']; ?></td>
          <td><?php echo $depInfo['CloseMonday']; ?></td>
        </tr>
        <tr>
          <td>Tuesday</td>
          <td><?php echo $depInfo['OpenTuesday']; ?></td>
          <td><?php echo $depInfo['CloseTuesday']; ?></td>
        </tr>
        <tr>
          <td>Wednesday</td>
          <td><?php echo $depInfo['OpenWednesday']; ?></td>
          <td><?php echo $depInfo['CloseWednesday']; ?></td>
        </tr>
        <tr>
          <td>Thursday</td>
          <td><?php echo $depInfo['OpenThursday']; ?></td>
          <td><?php echo $depInfo['CloseThursday']; ?></td>
        </tr>
        <tr>
          <td>Friday</td>
          <td><?php echo $depInfo['OpenFriday']; ?></td>
          <td><?php echo $depInfo['CloseFriday']; ?></td>
        </tr>
        <tr>
          <td>Saturday</td>
          <td><?php echo $depInfo['OpenSaturday']; ?></td>
          <td><?php echo $depInfo['CloseSaturday']; ?></td>
        </tr>
        <tr>
          <td>Sunday</td>
          <td><?php echo $depInfo['OpenSunday']; ?></td>
          <td><?php echo $depInfo['CloseSunday']; ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<?php


?>