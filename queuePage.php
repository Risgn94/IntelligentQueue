
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
    var globalCounter = 0;
    var restCounter = 0;
    // Hvis AJAX kaldet er lig med det nummer som allerede bliver serviceret så skal der intet ske.
 function CalculateWaitingTime(x, y){
     globalCounter = x - y;
     
 }
 $(document).ready(function() {
        function updateDiv(){
            $.ajax({
                url: "./Json/generateCurrentNumber.php",
                dataType: "json",
                cache: false,
                success: function(data) {
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
                    //$('#trade_pp').html(data.trade);
                    //$('#ect_pp').html(data.ect);
                }             
            });
        }
        updateDiv();
        setInterval(updateDiv, 10000);
    });
     </script>
 