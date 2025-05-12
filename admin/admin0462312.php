<?php
if(isset($_SESSION['email'])){
    if($_SESSION['uType'] == null){
      $er=null;  
    }else{
        echo "<script>alert('Admin access denied')</script><br>";
        header("refresh: 5; url=../index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="font-sans">
    
    <div class="flex relative m-2 place-content-center">
        <div class="bg-white border-4 rounded-sm border-black shadow-md text-black h-50vh w-lg">

            <h2 class="font-bold text-lg text-center">Admin Login</h2>
            <hr class="border-solid border-2 w-full">


            <br>
            <form action="adformValidate.php" method="post" class="m-2">
                <input type="hidden" name="adID" id="adID" value="AD0462312">
                <label for="pwd" class="font-medium block text-base">Password</label>
                <br>
                <input type="password" placeholder="Enter Password (8-20 characters)" name="pwd" id="pwd" minlength="8" maxlength="20" required class=" w-full outline-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                <br><br>
                <div>
                    <input type="submit" name="Login" value="Login" class="w-full flex justify-center border border-transparent rounded-sm py-2 px-4 bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 text-base text-center text-white">
                    <br><br>
                </div><br>

                <div id="passwordError" class="items-center"></div>
            </form>
        </div>    
    </div>        
</body>
<script src="../js/main.js"></script>
</html>