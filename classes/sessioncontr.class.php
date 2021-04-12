<?php

class SessionContr extends UsersView{

    public function destroySession(){
        session_start();
        session_unset();
        session_destroy();
        header("Location: login.php");
        }
    
    public function checkSessionRole(){
        if(isset($_SESSION['role']))
            {
                if($_SESSION['role']==1)
                    {
                        echo '<div id="menu">';
                        echo '<ul class="one">';
                        echo '<li class="home"><a class="btn btn-primary" href="home.php">Home</a></li>';
                        echo '<li><a class="btn btn-primary" href="logout.php">Logout</a></li>';
                        echo '<li><a class="btn btn-primary" href="adminPanel.php">Admin Panel</a></li>';
                        echo '</ul>';
                        echo '</div>';
                    }
                elseif($_SESSION['role']==2)
                    {
                        echo '<div id="menu">';
                        echo '<ul class="one">';
                        echo '<li class="home"><a class="btn btn-primary" href="home.php">Home</a></li>';
                        echo '<li><a class="btn btn-primary" href="logout.php">Logout</a></li>';
                        echo '<li><a class="btn btn-primary" href="adminPanel.php">Admin Panel</a></li>';
                        echo '</ul>';
                        echo '</div>';
                    }
                elseif($_SESSION['role']==3)
                    {
                        echo '<div id="menu">';
                        echo '<ul class="one">';
                        echo '<li class="home"><a class="btn btn-primary" href="home.php">Home</a></li>';
                        echo '<li><a class="btn btn-primary" href="logout.php">Logout</a></li>';
                        echo '</ul>';
                        echo '</div>';
                    }
                elseif($_SESSION['role']==4)
                    {
                        echo '<div id="menu">';
                        echo '<ul class="one">';
                        echo '<li class="home"><a class="btn btn-primary" href="home.php">Home</a></li>';
                        echo '<li><a class="btn btn-primary" href="logout.php">Logout</a></li>';
                        echo '</ul>';
                        echo '</div>';
                    }
            }
        else
            {
                echo '<div id="menu">';
                echo '<ul class="one">';
                echo '<li class="home"><a class="btn btn-primary" href="home.php">Home</a></li>';
                echo '<li><a class="btn btn-primary" href="login.php">Login</a></li>';
                echo '<li><a class="btn btn-primary" href="register.php">Register</a></li>';
                echo '</ul>';
                echo '</div>';
            }
    }

    public function checkSession(){
        if(isset($_SESSION['id']) and isset($_SESSION['username']) and isset ($_SESSION['role'])) header("Location: home.php");
    }

    public function checkIfSessionExist(){
        if(!isset($_SESSION['id']) and !isset($_SESSION['username']) and !isset ($_SESSION['role'])) header("Location: home.php");
    }

    public function checkUsersRole(){
        if(isset($_SESSION['role'])) 
            {
                if($_SESSION['role']!=1 and $_SESSION['role']!=2) header("Location: home.php");

                elseif($_SESSION['role']==1)
                    {
                        echo "<br>";
                        echo UsersView::showUsers();
                    }
                elseif($_SESSION['role']==2)
                    {
                        echo "ovo je admin";
                    }
            }
        else header("Location: home.php");
    }

    public function checkSuperAdminRole(){
        if(isset($_SESSION['role'])) 
            {
                if($_SESSION['role']!=1) header("Location: home.php");
            }
        else header("Location: home.php");
    }

}

?>