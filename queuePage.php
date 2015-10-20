
<script type="text/javascript">


</script>

<div class="icon-preview"><i class="mdi-image-timer"></i></div>
                   

<h1><center>Queue progress</center> </h1>
<br>
<br>

<div class="progress progress-striped">
    <div class="progress-bar progress-bar-success" style="width: 50%"></div>
</div>

<h3 id="numberDisplay" > </h3>
<script>
    var waitingData;
    var globalCounter = 0;
    var restCounter = 0;
    
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
     function doSomething(param)
     {
         document.getElementById('numberDisplay').innerHTML = param;
     }
        function getQueuees(innerDepartmentID){
            $.ajax({
                url: "json/jsonData.php?data=getWaitingNumbers&Department="+innerDepartmentID,
                dataType: "json",
                cache: false,
                success: function(data) {                  
                    console.log("Vi kører!");
                    console.log(data);
                    console.log(data.length);
                    console.log(ObjectLength(data[0]));
                    document.getElementById("numberDisplay").innerHTML = "Hello";
                    
                    console.log(data[0]["ID"].thumbnail_large);
                    thumb_url = data[0].thumbnail_large;
                    //returnData = data[0]["ID"];
                    
                    doSomething(data[0]["ID"]);
                    
                    /*
                    console.log(data);
                    if(document.getElementById('numberDisplay').innerHTML == data[0][currentServed])
                    {
                        //Do nothing
                    }
                    else
                    {
                      temp = data[0][currentServed] - document.getElementById('numberDisplay').innerHTML;
                      restCounter=+temp;
                        document.getElementById('numberDisplay').innerHTML = data[0][currentServed];
                        document.getElementsByClassName('progress-bar progress-bar-success')[0].style.width = CalculateWaitingTime(2, 5);
                        
                    }
                    document.getElementById('numberDisplay').innerHTML = 'Current number being serviced: ' + data[0];
                    */
                    //$('#trade_pp').html(data.trade);
                    //$('#ect_pp').html(data.ect);
                }             
            });
            //return  this.data;
        }
        getQueuees(departmentId);
        //setInterval(updateDiv, 10000);
        //document.getElementById("numberDisplay").innerHTML = getQueuees(departmentId)[0]["ID"];
    });
    
     </script>
 