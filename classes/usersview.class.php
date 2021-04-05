<?php
class UsersView extends Users {

    public function showUsers(){

        //Declaring the data
        $data=['username'=>''];

        //passing the data into the function
        if($_SERVER['REQUEST_METHOD']==='POST')
        {

            $data=['username'=>$_POST['username']];
            $username=$data['username'];
             //Sanitization
             $cUsername=filter_var($username,FILTER_SANITIZE_STRING);

             //allowed characters in username
             $allowedCharacters = "/^[a-zA-Z0-9]*$/";

             if(empty($username)) die(Message::error("You must enter the username!"));
                elseif(strpos($username, " ")==true) die(Message::error("Username can not contain any blank space!"));
                elseif(strlen($username)>20) die(Message::error("Username can't contain more than 25 characters!"));
                elseif(trim($username)===true) die(Message::error("Username can not contain any blank space!"));
                elseif(!preg_match($allowedCharacters, $username)) die(Message::error("Username can only contain letters and numbers!"));
                elseif($cUsername!=$username) die(Message::error("Username contains invalid characters!"));
                elseif($this->checkUnameByLike($username)==0) die(Message::error("This username does not exists, please try again."));

            //showing the username
            else 
            {
                $result=$this->showUsersByUsername($username);
                return $result;
            }
            
        }

    }

}
?>