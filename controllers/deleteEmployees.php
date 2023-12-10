<?php
include_once('../config/dbContext.conf.php');

if(isset($_GET['id']))
{
    $sql = "DELETE FROM tbEmployees WHERE ID=".$_GET['id'];
    if(connectDb()->query($sql))
    {
        echo "<script>alert('Delete successfully!');</script>";
        header("refresh:0, ../index.php");
        exit();
    }

    echo "<script>alert('Can not delete data');</script>";
    header("refresh:0, ../index.php");
    exit();
}
else
{
    echo "<script>alert('Not found Id to delete');</script>";
    header("refresh:0, ../index.php");
    exit();
}