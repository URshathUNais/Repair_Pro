<?php
include("../connection.php");
if(isset($_POST['submit']))
{
    $username = $_POST['user'];
    $password= $_POST["pass"];

    $sql = "select * from employers where User_Name = '$username' and Password = '$password' and Approved_Status = 'true'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if($count==1)
    { 
        session_start();
        $_SESSION["user_id"] = $row["Employer_ID"];
        $_SESSION["name"] = $row["Employer_Name"];
        $_SESSION["username"] = $row["User_Name"];
        $_SESSION["image"] = $row["Image"];
        header("Location:admin_table.php");
        if(!isset($_SESSION["user_id"]))
        {
            header("Location:../employer_login.php");
        }

    }
    else
    {
        header("Location:../employer_login.php");
    }
}
?>