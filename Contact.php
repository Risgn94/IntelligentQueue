<?php
$_SESSION['last_question'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
echo $_SESSION["last_question"];
?>
<h1>Contact Rare Pepe</h1>
<p>If you would like to contact the artists behind rarepepe.org, we would like you to complete the form below, and we will contact you as fast as possible.</p>
<p style="font-size: 12px;">*If the request is regarding the validation of our pepes rarity we can confirm that all of our pepes has a degree of rarity on atleast 13 on the EU scale of rarity.</p>
<h2>Contact Formular</h2>
<form class="form-horizontal" method="post" action="Logic/sendMail.php" onsubmit="return validate(this)">
    <div class="form-group col-lg-6 row">
        <label for="Email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="Email" name="Email" placeholder="Email">
        </div>
    </div>
    <div class="form-group col-lg-6 row">
        <label for="name" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="Name" placeholder="Name">
        </div>
    </div>
    <div class="form-group col-lg-6 row">
        <label for="subject" class="col-sm-2 control-label">Subject</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="subject" name="Subject" placeholder="Subject">
        </div>
    </div>
    <div class="form-group col-lg-12 row">
        <label for="Description" class="col-sm-2 col-lg-1 control-label">Description</label>
        <div class="col-sm-10 col-lg-11">
            <textarea class="form-control" rows="3" id="Description" name="Description" placeholder="Description"></textarea>
        </div>
    </div>
    <div  class="form-group">
        <label for="inputPassword3" class="col-xs-2 col-sm-3 control-label"></label>
        <div class="col-xs-8 row col-sm-6 row" >
            <button type="submit" class="btn btn-primary btn-lg btn-block">Send Us An Request</button>
        </div>
    </div>
</form>
<script type="text/javascript">
    document.getElementById("menuContact").className = "active";
    
    function validate(form)
    {
        console.log("validate is running");
        function printError(message)
        {
            var para = document.createElement("p");
            para.id = "errorMessage";
            var node = document.createTextNode(message);
            para.appendChild(node);
            var element = document.getElementsByClassName("jumbotron")[0];
            element.appendChild(para);

        }
        if(form.Email.value == "")
        {
            console.log("Please enter your email");
            printError("Please enter your email");
            return false;
        }
        else if(form.Name.value == "")
        {
            console.log("Please enter your name");
            printError("Please enter your name");
            return false;
        }
        else if(form.Subject.value == "")
        {
            console.log("Please enter your subject");
            printError("Please enter your subject");
            return false;
        }
        else if(form.Description.value == "")
        {
            console.log("Please enter an description");
            printError("Please enter an description");
            return false;
        }
        else
        {
            console.log("Your request has been send!");
            alert("Your request has been send!");
            return true;
        }
    }
</script>