<?php
    if(file_exists("common/database.php"))
    {
        include_once "common/database.php";
    }

    class AuthenticationModel extends database_connection
    {
        //This function is for login purpose
        function login($email)
        {
            $db=$this->connect();
            $data=$db->prepare("select password,user_type,id from user where email=:email");
            $data->bindParam(":email",$email);
            $data->execute();
            $row=$data->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
    }
?>