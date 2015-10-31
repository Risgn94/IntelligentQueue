//Function which enables us to read from the url
function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

Array.max = function( array ){
    return Math.max.apply( Math, array );
};

//Function which runs when button is clicked
function runRow()
{
    //Creates an empty array
    lineArray = [];
    //run function
    updateWaitingNumber();
    //Add new class' to 2 elements
    $("#numberBtn").addClass( "hidden" );
    $("#yourNumber").removeClass( "hidden" );

    //Function which updates the process bar and show the percentage.
    function updateProcess()
    {
        //for loop which gets the highest served number from elements.
        for(k = 0 ; k<document.getElementsByClassName("panel-number").length ; k++)
        {
            lineArray.push(parseInt(document.getElementsByClassName("panel-number")[k].innerHTML));
        }

        //get the current number and convert it to something usefull, and updates process bar.
        yourNumber = document.getElementById("yourNumber").innerHTML;
        yourNumberFinal = (yourNumber.substring(13, yourNumber.length))

        highestNumber = Math.max.apply(null, lineArray);
        barLength = Math.round((highestNumber/yourNumberFinal)*100);

        procentLeft = barLength;
        document.getElementsByClassName("progress-bar progress-bar-success")[0].style.width = Math.round(procentLeft) + "%";
        document.getElementById("progressPercentage").innerHTML = procentLeft+"%";

    }
    //Runs the function and sets a timer which runs the function every 5 seconds.
    updateProcess();
    setInterval(updateProcess, 5000);        
}

//Function which updates current serviced numbers
function updateWaitingNumber()
{
    //gets the id's of elements
    id = document.getElementById("userID").innerHTML;
    dep = document.getElementById("department").innerHTML;

    //do an ajax call which recieves the data of numbers currently being served.
    $.ajax(
    {
        url: "json/jsonData.php?data=getInLine&Department="+dep+"&User="+id,
        dataType: "json",   
        cache: false,
        success: function(data)
        {
            document.getElementById("yourNumber").innerHTML = "YOUR NUMBER: "+data;
        }       
    }
    );
}

var departmentId = getParameterByName('department');

function ObjectLength( object )
{
    var length = 0;
    for( var key in object )
    {
        if( object.hasOwnProperty(key) )
        {
            ++length;
        }
    }
    return length;
}
     
$(document).ready(function() {
 
    waitingArray = ["ID", "DepartmentId", "WaitNr", "UserID"];
    serviceArray = ["ID", "DepartmentId", "CurrentServiced", "RegisterNr"];
 
function setServiceNumber(param)
{
    for(i=0 ; i<param.length ; i++)
    {
        document.getElementsByClassName("panel-number")[i].innerHTML = param[i]["CurrentServiced"];
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

function getServicee(innerDepartmentID)
{
    $.ajax(
    {
        url: "json/jsonData.php?data=getServicedNumber&Department="+innerDepartmentID,
        dataType: "json",
        cache: false,
        success: function(data) {
            setServiceNumber(data);
        }             
    }
    );
}

getServicee(departmentId);
setInterval(function () {getServicee(departmentId);}, 5000);
}
);