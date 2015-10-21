
<script type="text/javascript">


</script>

<div class="icon-preview"><i class="mdi-image-timer"></i></div>
                   

<h1><center>Queue progress</center> </h1>
<br>
<br>

<div class="progress progress-striped">
    <div class="progress-bar progress-bar-success" style="width: 50%"></div>
</div>
<div class="row">
    <h3 class="col-xs-6" id="numberDisplay"></h3>
    <h3 class="col-xs-6" id="serviceDisplay"></h3>
</div>
<a href="#" class="btn btn-primary btn-lg active" role="button">Primary link</a>
<script>
    function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
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
                    doSomething(data, "serviceDisplay", serviceArray);
                }             
            });
        }
        getQueuees(departmentId);
        getServicee(departmentId);
    });
    
     </script>
 