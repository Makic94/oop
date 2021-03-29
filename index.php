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
    $fname="boaaaraaaaaaaaaako";
    $lname="miaalaojaaaaaaaaako";
    $username="aaaaaiako";
    $emal="iaaaao@miko.com";
    $password="miaaaako123";
    $avatar="";
    $gender="female";
    $obj=new User();
    $obj->insertUsers($fname,$lname,$username,$emal,$password,$avatar,$gender);
    ?>
</body>
</html>