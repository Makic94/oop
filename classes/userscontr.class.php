<?php
class UsersContr extends Users {

    public function createUser(){

        //declaring the data
        $data=[
            'firstname'=>'',
            'lastname'=>'',
            'username'=>'',
            'email'=>'',
            'password'=>'',
            'password2'=>'',
            'gender'=>''
        ];

        //passing the data into the function
        if($_SERVER['REQUEST_METHOD']==='POST')
            {
                $data=[
                    'firstname'=>$_POST['firstname'],
                    'lastname'=>$_POST['lastname'],
                    'username'=>$_POST['username'],
                    'email'=>$_POST['email'],
                    'password'=>$_POST['password'],
                    'password2'=>$_POST['password2'],
                    'gender'=>$_POST['gender']
                ];

                $fname=$data['firstname'];
                $lname=$data['lastname'];
                $username=$data['username'];
                $email=$data['email'];
                $password=$data['password'];
                $password2=$data['password2'];
                $gender=$data['gender'];

                //Sanitization
                $cFname=filter_var($fname,FILTER_SANITIZE_STRING);
                $cLname=filter_var($lname,FILTER_SANITIZE_STRING);
                $cUsername=filter_var($username,FILTER_SANITIZE_STRING);
                $cEmail=filter_var($email,FILTER_SANITIZE_EMAIL);
                $cPassword=filter_var($password,FILTER_SANITIZE_STRING);

                //allowed characters in username
                $allowedCharacters = "/^[a-zA-Z0-9]*$/";

                //checking the first and last name (lenght,if it has blank space)
                if(empty($fname)) die(Message::error("You must enter your first name!"));
                    elseif(strlen($fname)>20) die(Message::error("First name can't contain more than 20 characters!"));
                    elseif(strpos($fname, " ")==true) die(Message::error("First name can not contain any blank space!"));
                    elseif(trim($fname)===true) die(Message::error("First name can not contain any blank space!"));
                    elseif($cFname!=$fname) die(Message::error("First name contains invalid characters!"));
                if(empty($lname)) die(Message::error("You must enter your last name!"));
                    elseif(strlen($lname)>20) die(Message::error("Last name can't contain more than 20 characters!"));
                    elseif(strpos($lname, " ")==true) die(Message::error("Last name can not contain any blank space!"));
                    elseif(trim($lname)===true) die(Message::error("Last name can not contain any blank space!"));
                    elseif($cLname!=$lname) die(Message::error("Last name contains invalid characters!"));

                //checking the username (lenght,allowed characters, blank space)
                if(empty($username)) die(Message::error("You must enter your username!"));
                    elseif(strpos($username, " ")==true) die(Message::error("Username can not contain any blank space!"));
                    elseif(strlen($username)>20) die(Message::error("Username can't contain more than 25 characters!"));
                    elseif(trim($username)===true) die(Message::error("Username can not contain any blank space!"));
                    elseif(!preg_match($allowedCharacters, $username)) die(Message::error("Username can only contain letters and numbers!"));
                    elseif($cUsername!=$username) die(Message::error("Username contains invalid characters!"));
                    elseif($this->checkUname($username)!=0) die(Message::error("This username already exists, please change."));
                
                //checking the email (lenght,correct format,blank space)
                if(empty($email)) die(Message::error("You must enter your email adress!"));
                    elseif(strpos($email, " ")==true) die(Message::error("Email adress can not contain any blank space!"));
                    elseif((!filter_var($email, FILTER_VALIDATE_EMAIL))) die(Message::error("Email adress is not the correct format!"));
                    elseif($cEmail!=$email) die(Message::error("Email adress contains invalid characters!"));
                    elseif(strlen($email)>30) die(Message::error("Email adress can not contain more than 30 characters!"));
                    elseif(trim($email)===true) die(Message::error("Email adress can not contain any blank space!"));
                    elseif($this->checkEmail($email)!=0) die(Message::error("This email adress already exists, please change."));
                
                //checking the password (lenght,allowed characters,blank space,password match)
                if(empty($password)) die(Message::error("You must enter the password!"));
                    elseif(strpos($password, " ")==true or strpos($password2, " ")) die(Message::error("Password can not contain any blank space!"));
                    elseif(trim($password)===true or trim($password2)===true) die(Message::error("Password can not contain any blank space!"));
                    elseif(strlen($password)<8) die(Message::error("Password must be at least 8 characters long!"));
                    elseif(strcspn($password,'+-,.!@#$&*^?')==mb_strlen($password)) die(Message::error("Password must have some of special carracters +-,!#$&*^."));
                    elseif($cPassword!=$password) die(Message::error("Password contains invalid characters!"));
                    elseif($password!=$password2) die(Message::error("Passwords do not match!"));

                else{
                    $cPassword=password_hash($password, PASSWORD_DEFAULT);
                    $this->setUser($fname,$lname,$username,$email,$cPassword,$gender);header("Location: login.php");
                    }

            }
            
    }

    public function checkUser(){

        //declaring the data
        $data=[
            'username'=>'',
            'password'=>''
        ];

        //passing the data into the function
        if($_SERVER['REQUEST_METHOD']==='POST')
            {
                $data=[
                    'username'=>$_POST['username'],
                    'password'=>$_POST['password']
                ];

                $username=$data['username'];
                $password=$data['password'];

                //sanitization
                $cUsername=filter_var($username,FILTER_SANITIZE_STRING);
                $cPassword=filter_var($password,FILTER_SANITIZE_STRING);

                //allowed characters in username
                $allowedCharacters = "/^[a-zA-Z0-9]*$/";

                //checking the username (lenght,allowed characters, blank space)
                if(empty($username)) die(Message::error("You must enter your username!"));
                    elseif(strpos($username, " ")==true) die(Message::error("Username can not contain any blank space!"));
                    elseif(strlen($username)>20) die(Message::error("Username can't contain more than 25 characters!"));
                    elseif(trim($username)===true) die(Message::error("Username can not contain any blank space!"));
                    elseif(!preg_match($allowedCharacters, $username)) die(Message::error("Username can only contain letters and numbers!"));
                    elseif($cUsername!=$username) die(Message::error("Username contains invalid characters!"));
                    elseif($this->checkUname($username)==0) die(Message::error("This username does not exist, please try again."));

                //checking the password (lenght,allowed characters,blank space,password match)
                if(empty($password)) die(Message::error("You must enter the password!"));
                    elseif(strpos($password, " ")==true) die(Message::error("Password can not contain any blank space!"));
                    elseif(trim($password)===true) die(Message::error("Password can not contain any blank space!"));
                    elseif(strlen($password)<8) die(Message::error("Password must be at least 8 characters long!"));
                    elseif(strcspn($password,'+-,.!@#$&*^?')==mb_strlen($password)) die(Message::error("Password must have some of special carracters +-,!#$&*^."));
                    elseif($cPassword!=$password) die(Message::error("Password contains invalid characters!"));
                    elseif(password_verify($password,$this->checkPassword($username))!=true) die(Message::error("Wrong password, please try again.")); 

                //passing the user to index page and creating the session
                else{
                    $this->createSession($username);
                    }
            }

    }

    public function updateUserRole()   {
        //$sql="SELECT * FROM users";
        //if(rowCount($this->connect(),$sql)!=0)
            //{
                if($_SERVER['REQUEST_METHOD']==='POST')
                {
                $id=$_POST['id'];
                $role=$_POST['role'];
                if($role=='super_admin'){$role=1;}
                if($role=='admin'){$role=2;}
                if($role=='premium'){$role=3;}
                if($role=='user'){$role=4;}
                $sql="UPDATE users SET role_id='$role' WHERE id='$id'";
                $stmt = $this->connect()->query($sql);
                if($stmt) Message::success("Updated the role successfully.");
                else Message::error("Failed to update.");
                }
            }
            //else Message::error("No users found to update.");
    //}

    public function createSession($username){
        session_start();
        $_SESSION['id']=$this->showUserID($username);
        $_SESSION['username']=$this->showUsername($username);
        $_SESSION['role']=$this->showUserRole($username);
        header("Location: index.php");
    }

}
?>