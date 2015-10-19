
<script type="text/javascript">
$(document).ready(function() {
        function updateDiv(){
            $.ajax({
                url: "./Json/generateCurrentNumber.php",
                dataType: "json",
                cache: false,
                success: function(data) {
                    console.log(data);
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

<div class="icon-preview"><i class="mdi-image-timer"></i><span>mdi-image-timer</span></div>
                   

<h1>Queue progress </h1>

<div class="progress progress-striped">
    <div class="progress-bar progress-bar-success" style="width: 40%"></div>
</div>

<h3 id="numberDisplay" > </h3>

