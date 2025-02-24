<?php

session_start();

//Is the user is logged in
if(isset($_SESSION['accID'])){
    $uName = $_SESSION['accfName'] + ' ' + $_SESSION['acclName'];
    echo "<p>Welcome, $username!</p>"; // Displaying username
    echo "<a href='logout.php'>Logout</a>"; 
} else {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit;
}
?>