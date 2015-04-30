<html>
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#dbTest').click(function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    testConnection();
                });
            });

            function testConnection() {
                $.ajax({
                    type: "POST",
                    url: "testconnection.php",
                    data: {"get": "runfunction", "host" : $('#dbHost').val()},
                    success: function(response) {
                        $('#dbTest').removeClass('btn-info').addClass(response);
                    }
                });
            }
        </script>
    </head>
</html>

<?php
/**
 * @author Jasper Meyer, 30.04.2015
 * Form for database information.
 */
if (isset($_GET["a"])) {
    $action = $_GET["a"];
}
?>


<h1>Database Setup <small>configure your database connection</small></h1>

<form class="form-horizontal" action="?install">

    <div class="form-group">
        <label for="dbhost" class="col-sm-2 control-label">Host</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="dbhost" placeholder="localhost">
        </div>
    </div>

    <div class="form-group">
        <label for="dbPort" class="col-sm-2 control-label">Port</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="dbPort" placeholder="3306">
        </div>
    </div>

    <div class="form-group">
        <label for="dbUser" class="col-sm-2 control-label">User</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="dbUser" placeholder="root">
        </div>
    </div>

    <div class="form-group">
        <label for="dbPassword" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="dbPassword" placeholder="Password">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col-sm-2">
            <button class="btn btn-info" id="dbTest">Test Connection</button>
        </div>
    </div>
    
</form>