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
    <?php
    $fname="caa";
    $lname="bbaaa";
    $username="bbaa";
    $email="aaaa@gmail.com";
    $password="+-,.!@#$&*^?(?";
    $password2="+-,.!@#$&*^?(?";
    $avatar="";
    $gender="male";
    $obj=new UsersContr();
    $obj->createUser($fname,$lname,$username,$email,$password,$password2,$avatar,$gender);
    ?>
</body>
</html>