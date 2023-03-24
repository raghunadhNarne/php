<?php
    session_start();
    if(!empty($_SESSION['logged_in']) && $_SESSION['logged_in'] === true){
        echo "<h1>Hii... {$_SESSION['USER_NAME']} </h1>";
    }
    else{
        
        $session_name = session_name();
        if(!empty($_COOKIE[$session_name])){
            setcookie($session_name, '', time() - 1000, '/');
        }

        
        $_SESSION = array();
        session_destroy();

        // sleep(1);
        header("Location: login.php"); 
        exit();
    }
?>