<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - Sir Arthur Lewis Trading Circle</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js"></script>
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
    <br><br>
    <div class="grid columns-7">
        <div class="bg-green-700 border-2 border-amber-50 text-stone-900 py-4 px-2 col-span-3 col-end-6">
            <form action="includes/veryfyingat.php" onsubmit="return checkPassword()" method="post">
                <h1>Log In</h1>
                <hr>
                <br><br>
                <div>
                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email" id="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" autofocus required>
                </div>
                <br>
                <div> <label for="pwd"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="pwd" id="pwd" maxlength="20" required>
                </div>
                <br>

                <div class="flex-auto">
                    <button type="submit" class="text-green-700 bg-white">Login</button><br><br><br><br><br>
                    <p>No account?</p><a href="signup.php" class="focus:text-yellow-300 focus:underline ">Sign Up</a>
                </div>
        </div>
        </form>
    </div>
    </div>

</body>

</html>