<?php
include_once 'includes/autoLoader.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Sell</title>
</head>
<body>
<h1>Time Sell</h1>
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
<button>Register</button>
</form>
</div>
    <?php
    $obj=new UsersContr();
    $obj->createUser();
    ?>
</body>
</html>