<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - Sir Arthur Lewis Trading Circle</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="font-sans bg-slate-400 h-screen">
    <header>
        <div class="bg-green-600 justify-between decoration-solid grid auto-cols-max col-span-3">
            <div>
                <img src="img/logo.webp" alt="SALCC Trading Circle Logo" class="h-25 w-40">                
            </div>
        </div>
    </header>
    <br><br>
    
    <div class="flex place-content-center">
    <div class="bg-white border-4 rounded-sm border-black shadow-md text-black h-50vh w-lg">
        
        <h2 class="font-bold text-lg text-center">Log In</h2>
        <hr class="border-solid border-2 w-full">
        
        
        <br>
        <form action="includes/verifyingat.php" onsubmit="return loginValidation()" method="post" class="m-2">
                                
                    <label for="email" class="font-medium block text-base">Email</label><br>
                    <input type="text" placeholder="Enter Email" name="email" id="email"  pattern="[^@\s]+@[^@\s]+\.[^@\s]+"  autofocus required class="w-full focus:outline-none focus:ring-2 focus:ring-green-500">
                
                <br><br>
                
                <label for="pwd" class="font-medium block text-base">Password</label><br>
                <input type="password" placeholder="Enter Password (8-20 characters)"  name="pwd" id="pwd" minlength="8" maxlength="20" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,} required class="w-full focus:outline-none focus:ring-2 focus:ring-green-500">
                
                <br><br>
                
                <label for="pwd-rep" class="font-medium block text-base">Repeat Password</label><br>
                <input type="password" placeholder="Repeat Password" id="pwd-rep" name="pwd-rep" minlength="8" maxlength="20" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,} required class="w-full focus:outline-none focus:ring-2 focus:ring-green-500">
                
                <br><br>

                <div>
                    <input type="submit" name="Login" value="Login" class="w-full flex justify-center border border-transparent rounded-sm py-2 px-4 bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 text-base text-center text-white"><br><br><br>
                    <p>No account?</p><a href="signup.php" class="active:text-orange-600 underline text-blue-700 hover:text-orange-500">Sign Up</a>
                </div>
                <br>

                <div id="passwordError" class="items-center"></div>
        </div>
        
        </form>
        
    </div>
    </div>
    </div>
        

</body>
<script src="js/main.js"></script>
</html>