<?php
session_start();
require 'dbcon.php';

if(isset($_POST['save_credit']))
{
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $amount = mysqli_real_escape_string($con, $_POST['amount']);
    
    
   
    $query = "INSERT INTO `credit` (`First`, `Last`, `DateTime`, `Amount`) VALUES ('$first_name', '$last_name', current_timestamp(), '$amount');";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Credit Added Successfully";
        header("Location: filter-sort.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Credit Not Added";
        header("Location: filter-sort.php");
        exit(0);
    }
}

?>