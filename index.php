<?php
include_once 'includes/autoLoader.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeSell</title>
</head>
<body>
    <h1>Welcome</h1>
    <?php
    session_start();
    $obj=new SessionContr();
    $obj->checkSessionRole();
    ?>
</body>
</html>