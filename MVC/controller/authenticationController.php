<?php
    class AuthenticationController
    {
        public $Obj;
        function __construct()
        {
            if(file_exists("./model/AuthenticationModel.php"))
            {
                include_once "./model/AuthenticationModel.php";
            }
            $this->Obj=new AuthenticationModel();
        }

        //This function is for login purpose
        function login()
        {
            if(isset($_SESSION["Name"]))
            {
                header("Location: index.php?mod=student&view=studentList");
            }
            else
            {
                if(isset($_POST['email']) && isset($_POST['password']))
                {
                    $email=$_POST['email'];
                    $user_name=explode("@",$email);
                    $givenpassword=$_POST['password'];
                    $dbPassword=$this->Obj->login($email);
                    //base64_decode - decode the password
                    if($givenpassword==base64_decode($dbPassword['password']))
                    {
                        $_SESSION["Name"]=ucfirst($user_name[0]);
                        $_SESSION["User_Type"]=$dbPassword['user_type'];
                        $_SESSION["Id"]=$dbPassword['id'];
                        if($_SESSION["User_Type"]=="Admin")
                        {
                            echo "<script> alert('Login Successfully'); window.location.href = 'index.php?mod=student&view=studentList'; </script>";
                        }
                        else
                        {
                            echo "<script> alert('Login Successfully'); window.location.href = 'index.php?mod=student&view=viewStudent&id={$dbPassword['id']}'; </script>";
                        }
                    }
                    else
                    {
                        $this->redirect_login();
                        echo "<script> window.onload=function() { alert('Please Give Correct Username or Password'); } </script>";
                    }
                }
                else
                {
                    $this->redirect_login();
                }
            }
        }

        //This function is for show the login page if the user not logged in
        function redirect_login()
        {
            if(file_exists("view/login.php"))
            {
                include_once "view/login.php";
            }
        }

        //This function is for logout purpose
        function logout()
        {
            //session_destroy - delete all data's that are stored in session
            session_destroy();
            header("Location: index.php?mod=authentication&view=login");
        }

        //This magic method will execute if user call undefined view
        function __call($name, $arguments)
        {
            isset($_SESSION["Name"]) ? header("Location: index.php?mod=student&view=studentList") : header("Location: index.php?mod=authentication&view=login");
        } 
    }
?>