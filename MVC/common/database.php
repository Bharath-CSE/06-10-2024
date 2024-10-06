<?php
class database_connection
{
    function connect()
    {
        $db = new PDO("mysql:host=localhost:3308;dbname=student_management", "root", "12345");
        if(!$db)
        {
            echo "Failed To Connect DB";
        }
        
        return $db;
    }
}
?>