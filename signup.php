<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Sir Arthur Lewis Trading Circle</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    label {
        text-decoration: solid;
        text-size-adjust: 16px;
    }
</style>

<body class="bg-green-700 font-sans">
    <header>
        <nav>
            <div class="bg-green-600 sticky text-white">
                <div class="col-auto inline-grid"><img src="img/saltc_logo.webp" alt="SALCC Trading Circle Logo" class="logo">
                    <h2 class="capitalize absolute h-1 m-5 text-white">Sir Arthur Lewis Trading Circle</h1>
                </div>
                <div>
                    <a href="policies.php" class=" col-span-1 text-green-700 bg-white hover:bg-gray-300 focus:ring-4 focus:ring-gray-400 font-medium float-left px-5 me-2 mb-2 p-2 focus:outline-solid inline-flex border-solid rounded-md">FAQ</a>
                </div>
            </div>
        </nav>
    </header>
    <br><br>

    <div class="items-center bg-slate-200 md:border-8 self-center border-black md:h-1/2 text-black">
    
        <h2 class="font-bold text-lg">Sign Up</h2>
        <hr class="border-solid border-2">        
        <br><br>
            <form action="includes/signup_handler.php" onsubmit="return regValidation()" method="post">
                
                        
                <label for="email">Email</label>
                <input type="text" placeholder="Enter Email" name="email" id="email" maxlength="50" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" autofocus required>
                <br>
                <label for="pwd">Password</label>
                <input type="password" placeholder="Enter Password (8-20 characters)" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="pwd" id="pwd" minlength="8" maxlength="20" required>
                <br>
                <label for="pwd-rep">Repeat Password</label>
                <input type="password" placeholder="Repeat Password" id="pwd-rep" name="pwd-rep" maxlength="20" required>
                <br>
                <label for="fName">Enter First Name</label><br>
                <input type="text" placeholder="Ex. John" maxlength="30" id="fName" name="fName" required>
                <br>
                <label for="lName">Enter Last Name</label><br>
                <input type="text" placeholder="Ex. Doe" maxlength="40" id="lName" name="lName" required>
                <br>
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" required>
                <br><br>

                <input type="submit" name="Sign Up" value="Sign Up" class="bg-green-500 text-white hover:bg-green-600 active:bg-green-600 focus:outline-2 focus:outline-green-600 text-center"><br><br><br>
                <p>Already have an account?</p><a href="login.php" class="active:text-orange-600 underline text-blue-700 hover:text-orange-500">Log In</a>
            </form>
            <div id="passwordError" class="items-center"></div>
        

    </div>

</body>
<script src="js/main.js"></script>

</html>