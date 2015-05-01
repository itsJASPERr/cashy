<?php
/**
 * @author Jasper Meyer, 30.04.2015
 * Form for database information.
 */
if (isset($_GET["a"])) {
    $action = $_GET["a"];
}
?>

<html>
    <head>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script>
            $(document).ready(function () {
                $form = $('#dbForm');
                $host = $form.find("input[name='dbHost']");
                $port = $form.find("input[name='dbPort']");
                $user = $form.find("input[name='dbUser']");
                $pass = $form.find("input[name='dbPass']");
                $name = $form.find("input[name='dbName']");

                $("#dbSubmit").click(function (e) {
                    e.stopPropagation();
                    e.preventDefault();
                    submitForm();
                });

                $('#dbTest').click(function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    testConnection();
                });
            });

            function testConnection() {
                changeFieldState(true);
                $.ajax({
                    type: "POST",
                    url: "testconnection.php",
                    data: {host: $host.val(), port: $port.val(), user: $user.val(), pass: $pass.val(), name: $name.val()},
                    success: function (response) {
                        var message = $('#message');
                        message.replaceWith(response);
                        changeFieldState(false);
                    }
                });
            }

            function submitForm() {
                changeFieldState(true);
                $.ajax({
                    type: "POST",
                    url: "install.php",
                    data: {host: $host.val(), port: $port.val(), user: $user.val(), pass: $pass.val(), name: $name.val()},
                    success: function (response) {
                        //go result page
                        //sucess or failure
                        var message = $('#message');
                        message.replaceWith(response);
                        changeFieldState(false);
                    }
                });
            }

            function changeFieldState($disabled) {
                $('#dbForm :input').attr("disabled", $disabled);
            }

        </script>
    </head>
</html>



<h1>Database Setup <small>configure your database connection</small></h1>

<div id="message"></div>

<form class="form-horizontal" action="install.php" id="dbForm">

    <div class="form-group">
        <label for="dbhost" class="col-sm-2 control-label">Host</label>
        <div class="col-sm-10">
            <input type="text" name="dbHost" class="form-control" id="dbhost" placeholder="localhost">
        </div>
    </div>

    <div class="form-group">
        <label for="dbPort" class="col-sm-2 control-label">Port</label>
        <div class="col-sm-10">
            <input type="number" name="dbPort" class="form-control" id="dbPort" placeholder="3306">
        </div>
    </div>

    <div class="form-group">
        <label for="dbUser" class="col-sm-2 control-label">User</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="dbUser" id="dbUser" placeholder="root">
        </div>
    </div>

    <div class="form-group">
        <label for="dbPassword" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="dbPass" id="dbPassword" placeholder="Password">
        </div>
    </div>

    <div class="form-group">
        <label for="dbhost" class="col-sm-2 control-label">Database</label>
        <div class="col-sm-10">
            <input type="text" name="dbName" class="form-control" id="dbName" placeholder="Database name">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button id="dbSubmit" class="btn btn-primary">
                <span class="glyphicon glyphicon-play"></span> 
                Install
            </button>

            <button class="btn btn-info" id="dbTest">
                <span class="glyphicon glyphicon-globe"></span> 
                Check Connection
            </button>
        </div>
    </div>

</form>