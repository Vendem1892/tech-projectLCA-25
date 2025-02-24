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
        <div class="head">
            <img src="" alt="SALCC Trading Circle Logo" class="logo">
            <h1 class="cName">Sir Arthur Lewis Trading Circle</h1>
        </div>
        <br><br>
    </header>
    <div class="box-for-forms"></div>
    <form action="includes/signup_handler.php" style="border:1px solid #ccc" method="post">
        <div class="container">
            <h1>Sign Up</h1>
            <br>
            <hr>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" id="email" required>

            <label for="pwd"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="pwd" id="pwd" required>

            <label for="pwd-rep"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" id="pwd-rep" name="pwd-rep" required>
            <br>

            <label for="fName">Enter First Name</label><br>
            <input type="text" placeholder="Ex. John" maxlength=30 id="fName" name="fName">

            <label for="lName">Enter Last Name</label><br>
            <input type="text" placeholder="Ex. Doe" maxlength=30 id="lName" name="lName">

            <label for="dob">Date of Birth</label>
            <input type="date" id="dob" name="dob">


            <div class="clearfix">
                <button type="submit" class="l-sbuttons" onclick="checkPassword()">Sign Up</button><br><br><br><br><br>
                <p>Already have an account? </p><button class="l-sbuttons" onclick="window.location.replace('login.php');">Login</button>
            </div>
        </div>
    </form>
</body>
<script src="js/main.tsx"></script>
</html>