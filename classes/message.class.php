<?php
class Message{
    public static function error($str){
        return "<div style='background-color:red'>$str</div>";
    }
    public static function info($str){
        return "<div style='background-color:blue'>$str</div>";
    }
    public static function success($str){
        return "<div style='background-color:green'>$str</div>";
    }
}
?>