<?php
include("../connection.php");
session_start();

session_unset();
session_destroy();
session_destroy();
header('Location: ../employer_login.php');  
?>