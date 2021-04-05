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
                        echo '<ul>';
                        echo '<li><a href="index.php">Index</a></li>';
                        echo '<li><a href="users.php">Users</a></li>';
                        echo '<li><a href="logout.php">Logout</a></li>';
                        echo '</ul>';
                        echo '</div>';
                    }
                elseif($_SESSION['role']==2)
                    {
                        echo '<div id="menu">';
                        echo '<ul>';
                        echo '<li><a href="index.php">Index</a></li>';
                        echo '<li><a href="users.php">Users</a></li>';
                        echo '<li><a href="logout.php">Logout</a></li>';
                        echo '</ul>';
                        echo '</div>';
                    }
                elseif($_SESSION['role']==3)
                    {
                        echo '<div id="menu">';
                        echo '<ul>';
                        echo '<li><a href="index.php">Index</a></li>';
                        echo '<li><a href="logout.php">Logout</a></li>';
                        echo '</ul>';
                        echo '</div>';
                    }
                elseif($_SESSION['role']==4)
                    {
                        echo '<div id="menu">';
                        echo '<ul>';
                        echo '<li><a href="index.php">Index</a></li>';
                        echo '<li><a href="logout.php">Logout</a></li>';
                        echo '</ul>';
                        echo '</div>';
                    }
            }
        else
            {
                echo '<div id="menu">';
                echo '<ul>';
                echo '<li><a href="index.php">Index</a></li>';
                echo '<li><a href="register.php">Register</a></li>';
                echo '<li><a href="login.php">Login</a></li>';
                echo '</ul>';
                echo '</div>';
            }
    }

    public function checkSession(){
        if(isset($_SESSION['id']) and isset($_SESSION['username']) and isset ($_SESSION['role'])) header("Location: index.php");
    }

    public function checkSuperAdminRole(){
        if(isset($_SESSION['role'])) 
            {
                if($_SESSION['role']!=1 and $_SESSION['role']!=2) header("Location: index.php");

                elseif($_SESSION['role']==1)
                    {
                        echo "<div id='userSet'>";
                        echo UsersView::showUsers();
                        echo "</div>";
                    }
                elseif($_SESSION['role']==2)
                    {
                        echo "ovo je admin";
                    }
            }
        else header("Location: index.php");
    }

}

?>