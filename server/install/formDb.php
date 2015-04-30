<?php
/**
 * @author Jasper Meyer, 30.04.2015
 * Form for database information.
 */
?>

<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>

        <form>
            <div class="form-group">
                <label for="dbhost">Host</label>
                <input type="text" class="form-control" id="dbhost" placeholder="Your Database Host (usually localhost)">
            </div>
            <div class="form-group">
                <label for="dbPort">Port</label>
                <input type="number" class="form-control" id="dbPort" placeholder="Host (usually 3306)">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>

    </body>
</html>