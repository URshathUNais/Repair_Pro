<?php
include("../connection.php");
if(isset($_POST['submit']))
{
    $username = $_POST['user'];
    $password= $_POST["pass"];

    $sql = "select * from admin where Username = '$username' and Password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if($count==1)
    { 
        session_start();
        $_SESSION["user_id"] = $row["Admin_ID"];
        $_SESSION["name"] = $row["Name"];
        $_SESSION["username"] = $row["Username"];
        $_SESSION["image"] = $row["Image"];
        header("Location:first_layer/dashboard.php");

    }
    else
    {
        header("Location:../admin_login.php");
    }
}
?>