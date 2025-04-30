<?php
session_start();
//Is the user is logged in
if (isset($_SESSION['email'])) {
    $uName = $_SESSION['uName'];
    $id = $_SESSION['accID'];
} else {
    header("location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Registration - Sir Arthur Lewis Trading Circle</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="font-sans bg-green-700">
    <header>
        <div class="bg-green-600 justify-between decoration-solid grid auto-cols-max">
            <div>
                <img src="" alt="SALCC Trading Circle Logo" class="logo">
                <h2 class="capitalize absolute h-1 m-5 text-white">Sir Arthur Lewis Trading Circle</h1>
            </div>
            <a href="policies.php">FAQ</a>
        </div>
    </header>
    <br><br>
    
    <div class="items-center bg-slate-200 md:border-8 self-center border-black md:h-1/2 text-black">
    
    <h2 class="font-bold text-lg">Seller Registration</h2>
    <hr class="border-solid border-2">    
    <br><br>

        <form action="includes/sellerverify.php" method="post">
           
           
            <div>
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" id="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" autofocus required>
            </div>
            <br>
            <div> <label for="pwd"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="pwd" id="pwd" maxlength="20" required>
            </div>
            <br>
            <div>
                <label for="govCard">Please upload your government ID card here</label>
                <input type="file" placeholder="Upload Gov ID Here" name="govCard" id="govCard" accept=".png,.jpg,.jpeg" required>
            </div>
            <div>
                <label for="salCard">Please upload your SALCC ID card here</label>
                <input type="file" placeholder="Upload SALCC ID Here" name="salCard" id="salCard" accept=".png,.jpg,.jpeg" required>
            </div>

            <div class="flex-auto">
            <input type="submit" name="Register" value="Register" class="bg-yellow-300 hover:bg-yellow-500 text-center text-black"><br><br>
            </div>
    
    </form>
    </div>
</body>
<script src="js/main.js"></script>
</html>