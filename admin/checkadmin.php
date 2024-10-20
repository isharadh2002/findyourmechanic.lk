<?php
$isAdmin = false;
session_start();
if (isset($_SESSION['username'])) {
    if($_SESSION['UserType'] == 'admin'){
        $isAdmin = true;
    }
    else{
        $isAdmin = false;
    }
}
?>