<?php 
function connectDb()
{
    $conn = null;

    try 
    {
        $conn = new mysqli("127.0.0.1","root","","class_b","3306");

        if($conn->connect_error)
        {
          echo "Connection failed ". $conn->connect_error;
            return false;
        }
    }   
    catch (Exception $e) 
    {
        echo "connection to db failed  ==>> ". $e;
        return false;
    }

    return $conn;
}