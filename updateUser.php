<?php
include_once 'includes/autoLoader.inc.php';
session_start();
$obj=new SessionContr();
$obj->checkSuperAdminRole();
$option=$_GET['option'];
if($option=='update')
    {
        $obj=new UsersContr();
        $obj->updateUserRole();
    }
?>