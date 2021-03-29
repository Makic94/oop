<?php
include_once("functions/sqlFunctions.php");
class User extends Base {
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
    public function insertUsers($fname,$lname,$username,$email,$password,$avatar,$gender) {
        if(userRegCheck($fname,$lname,$username,$email,$password,$avatar,$gender))
        {
            $sqlU="SELECT username FROM users WHERE username='$username'";
            $stmt = $this->connect()->query($sqlU);
            $sqlE="SELECT email FROM users WHERE email='$email'";
            $stmt = $this->connect()->query($sqlE);
            if(rowCount($this->connect(),$sqlU)!=0)
                {
                    Message::error("This username already exists, please change.");
                }
            elseif(rowCount($this->connect(),$sqlE)!=0)
                {
                    Message::error("This email adress already exists, please change.");
                }
            else
                {
                    $sql="INSERT INTO users (fname,lname,username,email,password,avatar,role,gender,deleted) VALUES ('$fname','$lname','$username','$email','$password','$avatar','user','$gender',0)";
                    $stmt = $this->connect()->query($sql);
                    if($stmt) Message::success("Registration successfull.");
                    else Message::error("Registration failed.");
                }
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