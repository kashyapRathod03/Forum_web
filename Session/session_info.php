<?php
// Start the session and get the data
    
session_start();

if(isset($_SESSION['username'])){
    if((time() - $_SESSION['last_login'])>10){
    requires 'delete_session.php';
        // header('Location:/firstproject/Session/delete_session.php');
    }
    else{
        echo "Welcome ". $_SESSION['username'];
        echo "<br> Your favorite category is ". $_SESSION['favCat'];
        echo "<br>";
    }
}
else{
    echo "Please login to continue";
}
?>
