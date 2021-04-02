<?php
class Users extends Base {

    protected function setUser($fname,$lname,$username,$email,$password,$gender)
    {
        $sql="INSERT INTO users(fname,lname,username,email,password,gender,deleted,role_id) VALUES (?,?,?,?,?,?,0,4)";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$fname,$lname,$username,$email,$password,$gender]);
    }
    protected function checkUname($username)
    {
        $sql="SELECT username FROM users WHERE username = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->rowCount();
    }
    protected function checkEmail($email)
    {
        $sql="SELECT email FROM users WHERE email = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->rowCount();
    }
    protected function checkPassword($username)
    {
        $sql="SELECT password FROM users WHERE username = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['password'];
    }
}
?>