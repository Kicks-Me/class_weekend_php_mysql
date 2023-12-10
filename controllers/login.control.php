<?php
include_once("../config/dbContext.conf.php");

if(isset($_POST["Submit"]))
{
    $username = $_POST["txtUsername"];
    $password = $_POST["txtPassword"];

    if(empty($username) || empty($password))
    {
        header("location: ../login.php?type=E&err=empty");
        exit();
    }
  
    $query = "SELECT * FROM TBUSERS WHERE ";
    $query .= " USERNAME='$username' AND PASSWORD='$password' AND FLAG = 1";

    $result = connectDb()->query($query);
   
    if(!$result)
    {
        header("location: ../login.php?type=E&err=sqlerr");
        exit();
    }
    elseif($result->num_rows != 1)
    {
        header("location: ../login.php?type=W&err=nouser");
        exit();
    }

    //login pass condition
    $data = $result->fetch_assoc();
    session_start();

    $_SESSION["Username"] = $data["username"];
    $_SESSION["Role"] = $data["role"];

    header("location: ../login.php?type=O&err=pass");
    exit();
}