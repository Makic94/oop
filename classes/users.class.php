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

    protected function showUsername($username)
    {
        $sql="SELECT username FROM users WHERE username = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['username'];
    }

    protected function showUserRole($username)
    {
        $sql="SELECT role_id FROM users WHERE username = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['role_id'];
    }

    protected function showUserID($username)
    {
        $sql="SELECT id FROM users WHERE username = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['id'];
    }

    protected function showUsersByUsername($username)
    {
        $sql="SELECT id,username,role_id FROM users WHERE username LIKE '%$username%' ORDER BY id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        $num = $stmt->rowCount();
        for($i=0;$i<$num;$i++)
            {
                $row = $stmt->fetch(PDO::FETCH_OBJ);
                if($row->role_id==1){$row->role_id='super_admin';}
                if($row->role_id==2){$row->role_id='admin';}
                if($row->role_id==3){$row->role_id='premium';}
                if($row->role_id==4){$row->role_id='user';}
                echo "<div class='users' data-id='{$row->id}' data-username='{$row->username}' data-role='{$row->role_id}'>ID: {$row->id}<br> Username: {$row->username}<br> Role: {$row->role_id}</div><br>";
            }
    }

    protected function checkUnameByLike($username)
    {
        $sql="SELECT username FROM users WHERE username LIKE '%$username%' ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->rowCount();
    }
}
?>