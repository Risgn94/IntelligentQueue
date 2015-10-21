<div class="jumbotron" style="margin-bottom: 20px;">
<h2>Please select a service below</h2>

<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Service Selection
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="#">Sale</a></li>
    <li><a href="#">Warranty</a></li>
    <li><a href="#">Consultancy</a></li>
    <li><a href="#">Other</a></li>
  </ul>
</div>

<?php

$timeArray = array("15","30","45", "00");
$emptyTimeArray = array();

for($i=0; $i<25; $i++){
  if($i<10){

    


    $i = "0".$i;


    //echo $i."<br>";
  }
else{

  //echo $i."<br>";
}
for($j = 0 ; $j<4 ; $j++)
    {
      //echo $i.":".$timeArray[$j]."<br>";
      $emptyV = $i.":".$timeArray[$j];
      array_push($emptyTimeArray, $emptyV);
    }

}
for($e=0; $e<count($emptyTimeArray); $e++){

  echo $emptyTimeArray[$e]."<br>";
}

?>


<h2>Please select a time interval</h2>

<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Service Selection
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="#"></a></li>
    <li><a href="#">Warranty</a></li>
    <li><a href="#">Consultancy</a></li>
    <li><a href="#">Other</a></li>
  </ul>
</div>

<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Service Selection
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
  <?php
  echo $emptyTimeArray[0];
  for($e=0 ; $e<count($emptyTimeArray); $e++)
  {
    echo "<li><a href=\"#\">".$emptyTimeArray[$e]."</a></li>";
  }

  ?>
  </ul>
</div>
</div>