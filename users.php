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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
    .users{
        border: 1px solid black;
        width: 150px;
        padding: 1px;
        margin: 1px;
        cursor: pointer;
    }
    .users:hover{
        background-color: lightgrey;
    }
    </style>
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
    $obj->checkUsersRole();
    ?>
    <hr>
    <form action="users.php" method="POST">
    <input type="text" id="id" placeholder="ID" disabled><br><br>
    <input type="text" id="username" placeholder="Username" disabled><br><br>
    <select name="role" id="role">
    <option value="0">Select the role</option>
    <option value="super_admin">super_admin</option>
    <option value="admin">admin</option>
    <option value="premium">premium</option>
    <option value="user">user</option>
    </select>
    <button id="d1">Update</button>
    </form>
</body>
</html>
<script>
   $(function(){
        $(".users").click(function(){
        let id=$(this).data("id");
        let username=$(this).data("username");
        let role=$(this).data("role");
        $("#id").val(id);
        $("#username").val(username);
        $("#role").val(role);
    })
})
</script>