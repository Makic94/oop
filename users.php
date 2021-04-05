<?php
include_once 'includes/autoLoader.inc.php';
session_start();
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
    <h1>Users</h1>
    <?php
    $obj=new SessionContr();
    $obj->checkSessionRole();
    ?>
    <form action="users.php" method="POST">
    <input type="text" name="username" placeholder="Type the Username"><br><br>
    <button>Search</button>
    </form>
    <?php
    $obj=new SessionContr();
    $obj->checkSuperAdminRole();
    ?>
</body>
</html>