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
    <link rel="stylesheet" href="css/adminPanel.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>TimeSell</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php
    $obj=new SessionContr();
    $obj->checkSessionRole();
    ?>
    <div id="usersearch">
    <br>
    <br>
    <p>Search for the User:</p>
    <form action="adminPanel.php" method="POST">
    <input type="text" name="username" placeholder="Type the Username"><br><br>
    <button class="btn btn-secondary">Search</button>
    </form>
    </div>
    <?php
    $obj=new SessionContr();
    $obj->checkUsersRole();
    ?>
    <div id="roleUpdate">
    <input type="text" id="id" placeholder="ID" disabled><br><br>
    <input type="text" id="username" placeholder="Username" disabled><br><br>
    <select class="form-select" name="role" id="role">
    <option value="0">Select the role</option>
    <option value="super_admin">super_admin</option>
    <option value="admin">admin</option>
    <option value="premium">premium</option>
    <option value="user">user</option>
    </select>
    <p></p>
    <button id="d1" class="btn btn-info">Update</button>
    </div>
    <div id="result"></div>
</body>
</html>
<script src="js/updateUser.js"></script>