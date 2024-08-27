<?php
include("../connection.php");
if(isset($_POST['submit']))
{
    $username = $_POST['user'];
    $password= $_POST["pass"];

    $sql = "select * from employee where Username = '$username' and Password = '$password' and Approved_Status = 'true'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if($count==1)
    { 
        session_start();
        $_SESSION["user_id"] = $row["Employee_ID"];
        $_SESSION["user_type"] = $row["Employee_Type_ID_FK"];
        $_SESSION["name"] = $row["Employee_Name"];
        $_SESSION["username"] = $row["Username"];
        $_SESSION["image"] = $row["Image"];
        header("Location:admin_table.php");
        if(!isset($_SESSION["user_id"]))
        {
            header("Location:../employee_login.php");
        }

    }
    else
    {
        header("Location:../employee_login.php");
    }
}
?>