<?php
include_once("functions/sqlFunctions.php");
class Test extends Base {
    public function getUsers()  {
    $sql="SELECT * FROM users";
    if(rowCount($this->connect(),$sql)!=0)
        {
            $stmt = $this->connect()->query($sql);
            while($row = $stmt->fetch())
                {
                    echo $row->username."<br>";
                }
        }
        else echo "No users found.<br>";
    }
    public function insertUsers($username,$email,$password) {
        $sql="INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";
        $stmt = $this->connect()->query($sql);
        if($stmt)   echo "Registration completed.<br>";
        else echo "Failed to register.<br>";
    }
    public function updateUser($username,$email)    {
        $sql="SELECT * FROM users";
        if(rowCount($this->connect(),$sql)!=0)
            {
                $sql="UPDATE users SET username='$username', email='$email' ";
                $stmt = $this->connect()->query($sql);
                if($stmt)   echo "Updated username and email.<br>";
                else echo "Failed to update.<br>";
            }
        else echo "No users found to update.<br>";
    }
}
?>