$(document).ready(function() {
        function updateDiv(){
            $.ajax({
                url: "./Json/generateCurrentNumber.php",
                dataType: "json",
                cache: false,
                success: function(data) {
                    console.log(data);
                    document.getElementsByClassName('btn btn-lg btn-primary')[0].innerHTML = data[1];
                    //$('#trade_pp').html(data.trade);
                    //$('#ect_pp').html(data.ect);
                }             
            });
        }
        updateDiv();
        setInterval(updateDiv, 10000);
    }); 