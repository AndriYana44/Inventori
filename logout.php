<?php  

    session_start();
    session_destroy();
    session_unset();
    unset($_SESSION['login']);

    return header('location: login.php');

?>