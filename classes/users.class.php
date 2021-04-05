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
        $sql="SELECT username,role_id FROM users WHERE username LIKE '%$username%' ORDER BY id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['username'].' '.$row['role_id'];
    }

    protected function checkUnameByLike($username)
    {
        $sql="SELECT username FROM users WHERE username LIKE '%$username%' ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->rowCount();
    }

    public function get_where_custom($column, $value, $operator='=', $order_by='id', $target_tbl=NULL, $limit=NULL, $offset=NULL) {
 
        if (!isset($target_tbl)) {
            $target_tbl = $this->get_table_from_url();
        }
 
        $data[$column] = $value;
        $sql = "SELECT * FROM $target_tbl where $column $operator :$column order by $order_by";
 
        if ((isset($limit))) {
 
            if (!isset($offset)) {
                $offset = 0;
            }
 
            $sql = $this->add_limit_offset($sql, $limit, $offset);
        }
 
        
        $result = $this->prepare_and_execute($sql, $data);
 
        if ($result == true) {
            $items = $this->stmt->fetchAll(PDO::FETCH_OBJ);
            return $items;
        }
 
    }
}
?>