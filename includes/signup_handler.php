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
       header("Location: ../signup.php?formfield=empty"); 
       
    }
    
    if($pwd !== $pwd_rep){
        die('No reapated password');        
        header("Location: ../signup.php?repeatpassword=empty");
    }          

    $hash_pwd = password_hash($pwd,PASSWORD_DEFAULT);
    

    // Insert signup data into database
    $sql = "INSERT INTO accounts (accID,accfName,acclName,email,pwd,dob) 
    VALUES ('$accID','$fName','$lName','$email', '$hash_pwd','$dob')";    

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Signup successful')
        window.replace('../index.php');
        </script><br>";
        
    } else {
        echo "Error creating account: " . mysqli_error($conn);
        header("refresh:3; url=../index.php?signup=failed");
    }
}


$cookie_value = $email;
session_start();
setcookie('user', $cookie_value, time() + 3600,"/");
$_SESSION['id'] = $accID;
$_SESSION['email'] = $email;
$_SESSION['name'] = $fName.' '.$lName;
$_SESSION['uType'] = 'user';

$msg = "$fName $lName, your account has been registered.<br><br>
Please view the 'Sell' page if you wish to gain vendor priviliges.";

echo "<script>alert('$msg');
window.replace('../index.php');
</script>";
header("refresh:3; url=../index.php?signup=successful");
mysqli_close($conn);
?>