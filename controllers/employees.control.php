<?php
    include_once("../config/dbContext.conf.php");

if(isset($_POST["submit"]))
{
    $empid = $_POST["empid"];
    $txtName = $_POST["txtName"];
    $txtSurname = $_POST["txtSurname"];
    $txtBirthday = $_POST["txtBirthday"];
    $txtAge = $_POST["txtAge"];
    $txtEmail = $_POST["txtEmail"];
    $txtMobile = $_POST["txtMobile"];
    $txtFlag = $_POST["txtFlag"] == "on" ? "1" :"0";
    $Id = $_POST["txtId"];

    if(empty($empid) || empty($txtName) || empty($txtMobile))
    {
        header("location: ../addEmployees.php?errType=E&msg=Empty");
        exit();
    }

    //insert script is set to default
    $sql = "INSERT INTO tbEmployees(EMPID,NAME,SURNAME,BIRTHDAY,AGE,FLAG, EMAIL, MOBILE,LASTUPDATE) VALUES('$empid','$txtName','$txtSurname','$txtBirthday',$txtAge,$txtFlag,'$txtEmail','$txtMobile', CURRENT_TIMESTAMP())";

    //update script is on has id
    if(!empty($Id))
    {
        $sql = "UPDATE tbEmployees SET EMPID='$empid',NAME='$txtName',SURNAME='$txtSurname',BIRTHDAY='$txtBirthday',AGE=$txtAge,FLAG=$txtFlag,EMAIL='$txtEmail', MOBILE='$txtMobile' WHERE ID=$Id";
    }

    $result = connectDb()->query($sql);

    if(!$result)
    {
        header("location: ../addEmployees.php?errType=E&msg=error");
        exit();
    }

    if(!empty($Id))
    {
        header("location: ../addEmployees.php?errType=O&msg=Updated");
        exit();
    }

    header("location: ../addEmployees.php?errType=O&msg=Success");
    exit();
}