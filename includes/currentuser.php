<?php

session_start();

//Is the user is logged in
if(isset($_SESSION['email'])){
    $uName = $_SESSION['uName'];
    $id = $_SESSION['id'];
    echo "<p>Welcome, $username!</p>"; // Displaying username
    echo "<a href='logout.php'>Logout</a>"; 
} else {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit;
}
?>