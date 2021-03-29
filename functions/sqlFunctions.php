<?php
include_once("classes/message.class.php");
function rowCount($pdo,$sql){
    $rowNum = $pdo->prepare($sql);
    $rowNum->execute();
    return $rowNum->rowCount();
}
function userRegCheck($fname,$lname,$username,$email,$password,$avatar,$gender){
    // first name sanitize
    if(empty($fname)){
        Message::error("First name is required.");
    }elseif(strlen($fname)>20){
        Message::error("Last name should not contain mor than 20 characters.");
    }else(!filter_var($fname,FILTER_SANITIZE_STRING)){
        Message::error("First name contains invalid characters.");
    }
    // last name sanitize
    if(empty($lname)){
        Message::error("Last name is required.");
    }elseif(strlen($lname)>20){
        Message::error("Last name should not contain mor than 20 characters.");
    }else(!filter_var($lname,FILTER_SANITIZE_STRING)){
        Message::error("Last name contains invalid characters.");
    }
}
?>