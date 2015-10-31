        <p id="userID" class="hidden"><?php echo $_SESSION['userId']; ?></p>
        <p id="department" class="hidden"><?php echo $_GET['department']; ?></p>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Service Desk 1 Currently Serving:</h3>
            </div>
            <div class="panel-body">
                <h2 class="panel-number"></h2>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Service Desk 2 Currently Serving:</h3>
            </div>
            <div class="panel-body">
                <h2 class="panel-number"></h2>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Service Desk 3 Currently Serving:</h3>
            </div>
            <div class="panel-body">
                <h2 class="panel-number"></h2>
            </div>
        </div>

        <a href="#" id="numberBtn" onclick="runRow();" class="btn btn-primary btn-lg active" role="button">Pick A Number</a>
        <h2 style="text-align: center;" class="hidden" id="yourNumber"></h2>
                           
        <h1><center>Queue progress</center> </h1>
        <h2><center id="yourProgress"></center></h2>
        <div class="progress progress-striped">
            <div class="progress-bar progress-bar-success" style="width: 50%"></div>
        </div>
        <h3 style="text-align: center;" id="progressPercentage"></h3>
        <p id="processNumber"></p>
        <div class="row">
            <h3 class="col-xs-6" id="numberDisplay"></h3>
            <h3 class="col-xs-6" id="serviceDisplay"></h3>
        </div>

        </div>
        <script language="javascript" type="text/javascript" src="http://localhost/intelligentQueue/js/NumberLogic.js"></script>