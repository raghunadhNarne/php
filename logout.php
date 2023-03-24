<?php   
    session_start();
    if(!empty($_SESSION['logged_in']) && $_SESSION['logged_in'] === true){
        $_SESSION = array();

        if(!empty($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 10000, '/');
        }
    }
    session_destroy();
    header("Location: login.php"); 
    exit();
?>