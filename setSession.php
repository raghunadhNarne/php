<?php
    require_once 'dbconn.php';
    session_start();
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    

    try{
        $collection = $db->selectCollection("users");

        $user_data = $collection->findOne([
            'email' => $user_email
        ]);
        // print_r($findOneResult);

        if(password_verify($user_password, $user_data['password'])){
            $_SESSION['USER_NAME'] = $user_data['username'];
            $_SESSION['USER_EMAIL'] = $user_data['email'];
            $_SESSION['logged_in'] = true;
            print "redirecting to home page...";
            header("Location: /home.php"); 
            exit();
        }
        else{
            echo "<script>alert('incorrect password...')</script>";
            header("refresh:0.3; login.php"); 
            exit();
        }
    }
    catch(Exception $e)
    {
        echo $e;
    }
?>