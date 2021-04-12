<?php
include_once 'includes/autoLoader.inc.php';
session_start();
$obj=new SessionContr();
$obj->checkSession();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>TimeSell</title>
</head>
<body>
<?php
$obj=new SessionContr();
$obj->checkSessionRole();
?>
<br>
<div id='reg'>
<form action="register.php" method="POST">
<input type="text" name="firstname" placeholder="First name *"><br><br>
<input type="text" name="lastname" placeholder="Last name *"><br><br>
<input type="text" name="username" placeholder="Username *"><br><br>
<input type="email" name="email" placeholder="Email *"><br><br>
<input type="password" name="password" placeholder="Password *"><br><br>
<input type="password" name="password2" placeholder="Repeat the password *"><br><br>
<input type="radio" id="male" name="gender" value="male" checked>
<label for="male">Male</label><br>
<input type="radio" id="female" name="gender" value="female">
<label for="female">Female</label><br><br>
<button class="btn btn-primary">Register</button>
</form>
</div>
    <?php
    $obj=new UsersContr();
    $obj->createUser();
    ?>
</body>
</html>