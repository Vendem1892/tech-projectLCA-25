<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - Sir Arthur Lewis Trading Circle</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="font-sans bg-green-700">
    <header>
        <div class="bg-green-600 justify-between decoration-solid grid auto-cols-max">
            <div>
                <img src="" alt="SALCC Trading Circle Logo" class="logo">
                <h2 class="capitalize absolute h-1 m-5 text-white">Sir Arthur Lewis Trading Circle</h1>
            </div>
        </div>
    </header>
    <br><br>
    
        <div class="items-center bg-slate-200 md:border-8 self-center border-black md:h-1/2 text-black">
        
        <h2 class="font-bold text-lg">Log In</h2>
        <hr class="border-solid border-2">    
        <br><br>
        <form action="includes/veryfyingat.php" onsubmit="return loginValidation()" method="post">
                                
                    <label for="email">Email</label>
                    <input type="text" placeholder="Enter Email" name="email" id="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" autofocus required>
                
                <br>
                
                <label for="pwd">Password</label>
                <input type="password" placeholder="Enter Password (8-20 characters)" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="pwd" id="pwd" minlength="8" maxlength="20" required>
                
                <br>
                
                <label for="pwd-rep">Repeat Password</label>
                <input type="password" placeholder="Repeat Password" id="pwd-rep" name="pwd-rep" maxlength="20" required>
                
                <br>

                <div class="flex-auto">
                    <input type="submit" name="Login" value="Login" class="bg-yellow-300 hover:bg-yellow-500 text-center text-black"><br><br><br>
                    <p>No account?</p><a href="signup.php" class="active:text-orange-600 underline text-blue-700 hover:text-orange-500">Sign Up</a>
                </div>
        </div>
        </form>
        <div id="passwordError" class="items-center"></div>
    </div>
    </div>

</body>
<script src="js/main.js"></script>
</html>