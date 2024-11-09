<?php
$isAdmin = false;
session_start();
if (isset($_SESSION['username'])) {
    if($_SESSION['UserType'] == 'admin'){
        $isAdmin = true;
        
    }
    else{
        $isAdmin = false;
        echo "<script>window.prompt(\"You don't have access to this page!!!\");
        windows.location.href='../';</script>";

    }
}
?>