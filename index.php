<?php
include_once 'includes/autoLoader.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Helo</h1>
    <?php
        $username="nidzao";
        $email="nidazic@gmail.com";
        $obj = new Test();
        $obj->updateUser($username,$email);
    ?>
</body>
</html>