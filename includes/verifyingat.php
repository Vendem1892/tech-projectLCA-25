<?php

include_once 'dbh.inc.php';
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input data from login form
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $pwdRep = mysqli_real_escape_string($conn, $_POST['pwd-rep']);    

    //Query to check if user exists in the database with given username and password
    $sql = "SELECT * FROM accounts WHERE email = '$email'";
    $result = mysqli_query($conn,$sql);    
    
    if (mysqli_num_rows($result) > 0) {
        //Email exists
        $row = mysqli_fetch_assoc($result);
        $verify = password_verify($pwd,$row['pwd']);                        
            if($verify){
                echo"<script type='text/javascript'>
                alert('Login sucessful');
                window.replace('../index.php');
                </script>";                
            $_SESSION['id'] = $row['accID'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['accfName'].$row['acclName'];
            $_SESSION['uType'] = 'user';
            
            if($row['sellerID'] != NULL){
                $_SESSION['sellID'] = $row['sellerID'];
            }
            }else{
                echo"<script type='text/javascript'>alert('Incorrect Password')
                window.replace('../index.php');
                </script>";
                
                header("refresh:3; url=../index.php?loginpwd=incorrect");
            }
        }

        //Creating a Cookie           
        $cookie_value = $email;
        setcookie('user', $cookie_value, time() + 3600, "/"); // 3600 = 1 hour

        // Redirect the user to a dashboard or home page
        header("refresh:3; url=../index.php?login=successful");
        exit(); // Ensure script execution stops after redirect
    
    } else {
        // No user found with given credentials, login failed
        die("Invalid email or password");
        header("Location: ../login.php?login=failed");        
    }


// Close connection
mysqli_close($conn);
?>