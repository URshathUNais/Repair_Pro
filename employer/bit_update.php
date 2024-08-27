<?php
    include("../connection.php");
    $Bit_ID ="";
    if(isset($_GET['bitid']))
    {
        $Bit_ID = $_GET['bitid'];
        $jobid = $_GET['jobid'];
        $query = "UPDATE bit set Employer_Selection = 'Selected' WHERE Bit_ID = $Bit_ID";

        $res = $conn->query($query);
        if($res)
        { 
            header("location: job_table.php?viewbitid=$jobid");
        }
    }
?>