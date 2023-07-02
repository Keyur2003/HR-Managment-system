<?php
error_reporting(0); 
    $con = mysqli_connect('localhost','root','');
    mysqli_select_db($con,'HRM2');
    
    //echo '<pre>'; print_R($_SESSION);exit;
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache"); 
?>