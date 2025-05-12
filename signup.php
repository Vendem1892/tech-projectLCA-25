<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Sir Arthur Lewis Trading Circle</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js"></script>
</head>

<body class="bg-slate-400 font-sans">
    <header>
        <nav>
            <div class="bg-green-600 text-lg px-2 decoration-solid flex justify-between">
                <div class="flex space-x-96">
                <div class=>
                    <img src="img/logo.webp" alt="Sir Arthur Lewis Trading Circle logo" class="h-25 w-40">
                </div>
                <div class="flex items-center py-3">
                    <a href="policies.php" class="text-white hover:text-yellow-500 transition">FAQ</a>
                </div>
                </div>
            </div>
        </nav>
    </header>
    <br><br>

<div class="flex place-content-center"> 
    <div class="bg-white border-4 rounded-sm border-black shadow-md text-black h-50vh w-lg">
    
        <h2 class="font-bold text-lg text-center">Sign Up</h2>
        <hr class="border-solid border-2 w-full">        
        <br><br>
            <form action="includes/signup_handler.php" onsubmit="return regValidation()" method="post" class="m-2">                
                        
                <label for="email" class="font-medium block text-base">Email<span class="text-red-500">*</span></label>
                <input type="text" placeholder="Enter Email" name="email" id="email" maxlength="50" pattern="^[a-zA-Z0-9]+@salcc+\.edu+\.lc$" autofocus required class="w-full outline-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                <br><br>
                <label for="pwd" class="font-medium block text-base">Password<span class="text-red-500">*</span></label>
                <input type="password" placeholder="Enter Password (8-20 characters)" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="pwd" id="pwd" minlength="8" maxlength="20" required class="w-full outline-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                <br><br>
                <label for="pwd-rep" class="font-medium block text-base">Repeat Password<span class="text-red-500">*</span></label>
                <input type="password" placeholder="Repeat Password" id="pwd-rep" name="pwd-rep" maxlength="20" required class="w-full outline-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                <br><br>
                <label for="fName" class="font-medium block text-base">Enter First Name<span class="text-red-500">*</span></label><br>
                <input type="text" placeholder="Ex. John" maxlength="30" id="fName" name="fName" required class="w-full outline-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                <br><br>
                <label for="lName" class="font-medium block text-base">Enter Last Name<span class="text-red-500">*</span></label><br>
                <input type="text" placeholder="Ex. Doe" maxlength="40" id="lName" name="lName" required class="w-full outline-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                <br><br>
                <label for="dob" class="font-medium block text-base">Date of Birth<span class="text-red-500">*</span></label>
                <input type="date" id="dob" name="dob" class="w-1/2 outline-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                <br><br>
                <div>
                <div class="text-base font-semibold text-black">
                    <span class="text-red-500">*</span> Required
                </div><br>
                <input type="submit" name="Sign Up" value="Sign Up" class="w-full flex justify-center border border-transparent rounded-sm py-2 px-4 bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 text-base text-center text-white"><br><br>
                <p>Already have an account?</p><a href="login.php" class="active:text-orange-600 underline text-blue-700 hover:text-orange-500">Log In</a>
                </div>
            </form>            
    </div>
</div>
</body>

</html>