<p id="userID" class="hidden"><?php echo $_SESSION['userId']; ?></p>
<p id="department" class="hidden"><?php echo $_GET['department']; ?></p>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Service Desk 1 Currently Serving:</h3>
    </div>
    <div class="panel-body">
        <h2></h2>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Service Desk 2 Currently Serving:</h3>
    </div>
    <div class="panel-body">
        <h2></h2>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Service Desk 3 Currently Serving:</h3>
    </div>
    <div class="panel-body">
        <h2></h2>
    </div>
</div>

<a href="#" onclick="runRow();" class="btn btn-primary btn-lg active" style="font-size: 25px; border-radius: 5px; width: 100%; height: 100px; line-height: 84px;" role="button">Pick A Number</a>
                   
<h1><center>Queue progress</center> </h1>
<h1><center id="yourNumber"></center> </h1>
<br>
<br>

<div class="progress progress-striped">
    <div class="progress-bar progress-bar-success" style="width: 50%"></div>
</div>
<div class="row">
    <h3 class="col-xs-6" id="numberDisplay"></h3>
    <h3 class="col-xs-6" id="serviceDisplay"></h3>
</div>

</div>
<script>
    function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function runRow()
{
    id = document.getElementById("userID").innerHTML;
    dep = document.getElementById("department").innerHTML;
    $.ajax({
                url: "json/jsonData.php?data=getInLine&Department="+dep+"&User="+id,
                dataType: "json",
                cache: false,
                success: function(data) {
                    console.log("Det virker?");
                }             
            });
}

var departmentId = getParameterByName('department');


    // Hvis AJAX kaldet er lig med det nummer som allerede bliver serviceret så skal der intet ske.
 function CalculateWaitingTime(x, y){
     globalCounter = x - y;
     
 }
 
 function ObjectLength( object ) {
    var length = 0;
    for( var key in object ) {
        if( object.hasOwnProperty(key) ) {
            ++length;
        }
    }
    return length;
};
 
 $(document).ready(function() {
     
     waitingArray = ["ID", "DepartmentId", "WaitNr", "UserID"];
     serviceArray = ["ID", "DepartmentId", "CurrentServiced", "RegisterNr"];
     
     function setServiceNumber(param)
    {
        for(i=0 ; i<param.length ; i++)
        {
            document.getElementsByClassName("panel-body")[i].innerHTML = "<h2>"+param[i]["CurrentServiced"]+"</h2>";
        }
    }
     
     function doSomething(param, elementID, nameArray)
     {
         for(i = 0 ; i<param.length ; i++)
         {
             var formerText = document.getElementById(elementID).innerHTML;
             document.getElementById(elementID).innerHTML = formerText+"<br>";
             
             for(j = 0 ; j<ObjectLength(param[i]) ; j++)
             {
                var formerText = document.getElementById(elementID).innerHTML;
                document.getElementById(elementID).innerHTML = formerText+param[i][nameArray[j]]+", ";
             }
         }
     }
        function getQueuees(innerDepartmentID){
            $.ajax({
                url: "json/jsonData.php?data=getWaitingNumbers&Department="+innerDepartmentID,
                dataType: "json",
                cache: false,
                success: function(data) {                  
                    doSomething(data, "numberDisplay", waitingArray);
                }             
            });
        }
        function getServicee(innerDepartmentID){
            $.ajax({
                url: "json/jsonData.php?data=getServicedNumber&Department="+innerDepartmentID,
                dataType: "json",
                cache: false,
                success: function(data) {
                    setServiceNumber(data);
                    doSomething(data, "serviceDisplay", serviceArray);
                }             
            });
        }
        function createWaitRow(userID, department){
            $.ajax({
                url: "json/jsonData.php?data=getInLine&Department="+department+"&User="+userID,
                dataType: "json",
                cache: false,
                success: function(data) {
                    console.log("Det virker?");
                }             
            });
        }
        function getServicee(innerDepartmentID){
            $.ajax({
                url: "json/jsonData.php?data=getServicedNumber&Department="+innerDepartmentID,
                dataType: "json",
                cache: false,
                success: function(data) {
                    setServiceNumber(data);
                    doSomething(data, "serviceDisplay", serviceArray);
                }             
            });
        }
        getQueuees(departmentId);
        getServicee(departmentId);
    });
    
     </script>
 