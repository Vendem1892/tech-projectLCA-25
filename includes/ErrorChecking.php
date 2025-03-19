<?php

// 1. Error handler for checking if the form has been submitted (name of button: submit)
if(isset($_POST['submit'])){

    //include database connection
    include_once 'dbh.inc.php';

    //Getting data from form
     $email = $_POST['email'];
     $pwd = $_POST['psw'];
     $pwd_repeat = $_POST['psw_repeat'];
     $role = $_POST['role']; 

     // 2. Error handler for checking if user forgot to insert data
     if(empty($email) || empty($psw) || empty($psw_repeat) || empty($role) ){
        header("Location: ../signup.php?signup=empty");

     }
}
?>