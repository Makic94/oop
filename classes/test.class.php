<?php
include_once("database.class.php");
class Test extends Base {
        public function getUsers()  {
        $sql="SELECT * FROM users";
        $stmt = $this->connect()->query($sql);
        while($row = $stmt->fetch()) {
            return $row['username'];
        }
    }    
}
?>