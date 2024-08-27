<?php
session_start();
    $s_name = "localhost";
    $u_name = "root";
    $p_word = ""; 
    $d_name = "project";

    $conn = mysqli_connect($s_name, $u_name, $p_word, $d_name);

    if(!$conn)
    {
        echo "Connection field";
    }
    