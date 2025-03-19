<?php
include_once 'dbh.inc.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Retrieve signup form data
    $accID = 'SLT'. substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 18);
    $fName = mysqli_real_escape_string($conn,$_POST['fName']);    
    $lName = mysqli_real_escape_string($conn,$_POST['lName']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
    $pwd_rep = mysqli_real_escape_string($conn,$_POST['pwd-rep']);
    $dob = mysqli_real_escape_string($conn,$_POST['dob']);

    // Error handler for checking if user forgot to insert data
    if(empty($fName) || empty($lName) || empty($email) || empty($pwd) || empty($pwd_rep) || empty($dob)){
       die('Failed Registration');
       
    }
    if($pwd != $pwd_rep){
        header("Location: ../signup.php?repeatpasswordincorrect=empty");
    }                
    // Insert signup data into database
    $sql = "INSERT INTO accounts (accID,accfName,acclName,email,pwd,dob) 
    VALUES ('$accID','$fName','$lName','$email', '$pwd','$dob')";


    if ($conn->query($sql) === TRUE) {
        echo "Signup successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
$uName = $fName . ' ' . $lName;
session_start();
setcookie('User', $uName, time() + (4 * 3600),"/");
$_SESSION['id'] = $accID;
$_SESSION['email'] = $email;
$_SESSION['name'] = $uName;

mysqli_close($conn);

$msg = "$uName, your account has been registered.<br><br>
Please view the 'Sell' page if you wish to gain vendor priviliges.";

$msg = wordwrap($msg, 70);
$sent = mail($email, "SALTC Account Creation Successful", $msg);
if (!$sent) {
    $errorMessage = error_get_last()['message'];
    header("Location: ../index.php?WelcomeEmail=failed");
} else {    
    header("Location: ../index.php");

}
?>