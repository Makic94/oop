<?php
include_once 'includes/autoLoader.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <div id='login'>
    <form action="login.php" method="POST">
    <input type="text" name="username" placeholder="Username *"><br><br>
    <input type="password" name="password" placeholder="Password *"><br><br>
    <button>Login</button>
    </form>
    </div>
    <?php
    $obj=new UsersContr();
    $obj->checkUser();
    ?>
</body>
</html>