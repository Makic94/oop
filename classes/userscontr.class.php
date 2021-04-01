<?php
class UsersContr extends Users {

    public function createUser($fname,$lname,$username,$email,$password,$password2,$avatar,$gender){

        //Sanitization and blank space removing
        $cFname=trim($fname);
        $cFname=filter_var($cFname,FILTER_SANITIZE_STRING);
        $cLname=trim($lname);
        $cLname=filter_var($cLname,FILTER_SANITIZE_STRING);
        $cUsername=trim($username);
        $cUsername=filter_var($cUsername,FILTER_SANITIZE_STRING);
        $cPassword=trim($password);
        $cPassword=filter_var($cPassword,FILTER_SANITIZE_STRING);
        $cPassword2=trim($password2);
        $cPassword2=filter_var($cPassword2,FILTER_SANITIZE_STRING);

        //allowed characters in username
        $allowedCharacters = "/^[a-zA-Z0-9]*$/";

        //checking the first and last name (lenght,if it's blank space)
        if(empty($cFname)) die(Message::error("You must enter your first name!"));
            elseif(strlen($cFname)>20) die(Message::error("First name can't contain more than 20 characters!"));
            elseif(strpos($cFname, " ")==true) die(Message::error("First name can not contain any blank space!"));
        if(empty($cLname)) die(Message::error("You must enter your last name!"));
            elseif(strlen($cLname)>20) die(Message::error("Last name can't contain more than 20 characters!"));
            elseif(strpos($cLname, " ")==true) die(Message::error("Last name can not contain any blank space!"));

        //checking the username (lenght,allowed characters, blank space)
        if(empty($cUsername)) die(Message::error("You must enter your username!"));
            elseif(strpos($cUsername, " ")==true) die(Message::error("Username can not contain any blank space!"));
            elseif(strlen($cUsername)>20) die(Message::error("Username can't contain more than 25 characters!"));
            elseif(!preg_match($allowedCharacters, $cUsername)) die(Message::error("Username can only contain letters and numbers!"));
            elseif($this->checkUname($username)!=0) die(Message::error("This username already exists, please change."));
        
        //checking the email (lenght,correct format,blank space)
        if(empty($email)) die(Message::error("You must enter your email adress!"));
            elseif(strpos($email, " ")==true) die(Message::error("Email adress can not contain any blank space!"));
            elseif((!filter_var($email, FILTER_VALIDATE_EMAIL))) die(Message::error("Email adress is not the correct format!"));
            elseif(strlen($email)>30) die(Message::error("Email adress can not contain more than 30 characters!"));
            elseif($this->checkEmail($email)!=0) die(Message::error("This email adress already exists, please change."));
        
        //checking the password (lenght,allowed characters,blank space,password match and hashing the password)
        if(empty($cPassword)) die(Message::error("You must enter the password!"));
            elseif(strpos($cPassword, " ")==true) die(Message::error("Password can not contain any blank space!"));
            elseif(strlen($cPassword)<8) die(Message::error("Password must be at least 8 characters long!"));
            elseif(strcspn($cPassword,'+-,.!@#$&*^?')==mb_strlen($cPassword)) die(Message::error("Password must have some of special carracters +-,!#$&*^."));
            elseif($cPassword!=$cPassword2) die(Message::error("Passwords do not match!"));

        else{
            $cPassword=password_hash($cPassword, PASSWORD_DEFAULT);
            $this->setUser($cFname,$cLname,$cUsername,$email,$cPassword,$avatar,$gender);Message::success("Registration successfull.");
            }
            
}
}
?>