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
        else Message::error("No users found.");
    }
    public function insertUsers($username,$email,$password) {
        $sql="SELECT username,email FROM users WHERE username='$username' AND email='$email'";
        $stmt = $this->connect()->query($sql);
        if(rowCount($this->connect(),$sql)!=0)
            {
                Message::error("Username/email already exists, please change.");
            }
        else
            {
                $sql="INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";
                $stmt = $this->connect()->query($sql);
                if($stmt) Message::success("Registration successfull.");
                else Message::error("Registration failed.");
            }
        }
    public function updateUser($username,$email)    {
        $sql="SELECT * FROM users";
        if(rowCount($this->connect(),$sql)!=0)
            {
                $sql="UPDATE users SET username='$username', email='$email' ";
                $stmt = $this->connect()->query($sql);
                if($stmt) Message::success("Updated username and email successfull.");
                else Message::error("Failed to update.");
            }
        else Message::error("No users found to update.");
    }
}
?>