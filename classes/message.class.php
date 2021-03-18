<?php
class Message{
    public static function error($str){
        echo "<div style='background-color: red; color: white;width: 400px; margin: 2px; padding:2px'>$str</div>";
    }
    public static function info($str){
        echo "<div style='background-color: blue; color: white;width: 400px; margin: 2px; padding:2px'>$str</div>";
    }
    public static function success($str){
        echo "<div style='background-color: green; color: white;width: 400px; margin: 2px; padding:2px'>$str</div>";
    }
}
?>