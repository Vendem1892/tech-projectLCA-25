<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Sir Arthur Lewis Trading Circle</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="bg-green-600 justify-between decoration-solid grid auto-cols-max">
            <div>
                <img src="" alt="SALCC Trading Circle Logo" class="logo">
                <h2 class="capitalize absolute h-1 m-5 text-white">Sir Arthur Lewis Trading Circle</h1>
            </div>
        </div>
    </header>

    <div class="grid columns-7">
        <div class="bg-green-700 border-2 border-amber-50 text-stone-900 py-4 px-2 col-span-3 col-end-6">
            <form action="includes/signup_handler.php" onsubmit="return checkPassword()" method="post">

                <h2>Sign Up</h2>
                <hr>
                <br><br>


                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" id="email" required>


                <br>

                <label for="pwd"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="pwd" id="pwd" required>


                <br>


                <label for="pwd-rep"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" id="pwd-rep" name="pwd-rep" required>


                <br>

                <label for="fName">Enter First Name</label><br>
                <input type="text" placeholder="Ex. John" maxlength=30 id="fName" name="fName">


                <br>

                <label for="lName">Enter Last Name</label><br>
                <input type="text" placeholder="Ex. Doe" maxlength=30 id="lName" name="lName">


                <br>

                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob">



                <br><br>
                <div class="clearfix">
                    <button type="submit"  onclick="checkPassword()">Sign Up</button><br><br><br><br><br>
                    <p>Already have an account?</p><a href="login.php" class="focus:text-yellow-300 focus:underline "></a>Log In</button>
                </div>
        </div>
        </form>
    </div>




</body>
<script src="js/main.tsx"></script>

</html>