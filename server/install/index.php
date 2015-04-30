<?php
/*
 * @author Jasper Meyer, 30.04.2015
 * Installation index file that leads through an installation process.
 * 
 * Need to insert all database infos, checks connection and rights.
 * If everything works, it will create the database and tables.
 * 
 */

$page = "start";
if (isset($_GET["p"])) {
    $page = $_GET["p"];
}
$filename = $page . ".php";
?>

<html>
    <head>
        
        <title>Cashy Installation</title>
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">

            <?php
            if (file_exists($filename)) {
                include_once $page . ".php";
            }
            ?>

        </div>
    </body>

</html>