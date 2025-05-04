<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg-red-600">
<div class="bg-white border-4 rounded-sm border-black shadow-md items-center text-black">
        
        <h2 class="font-bold text-lg">Admin Login</h2>
        <hr class="border-solid border-2">    
        <br><br>
        <form action="includes/veryfyingat.php" onsubmit="return loginValidation()" method="post" class="self-center">
                                
                    <label for="email">ID Number</label>
                    <input type="text" placeholder="Enter ID Number" name="email" id="email" autofocus required>
                
                <br>
                
                <label for="pwd">Password</label>
                <input type="password" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="pwd" id="pwd" minlength="8" maxlength="20" required>
                
                <br>
                
                <label for="pwd-rep">Repeat Password</label>
                <input type="password" placeholder="Repeat Password" id="pwd-rep" name="pwd-rep" maxlength="20" required>
                
                <br>

                <div>
                    <input type="submit" name="Login" value="Login" class="bg-blue-500 hover:bg-blue-600 text-center text-white float-left"><br><br>
                </div>
        </div>
        </form>
        <div id="passwordError" class="items-center"></div>
    </div>
    </div>
</body>
<script src="../js/main.js"></script>
</html>