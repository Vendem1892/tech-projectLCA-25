<?php
session_start();
//Is the user is logged in
if (isset($_SESSION['email'])) {
    $uName = $_SESSION['accfName'] + ' ' + $_SESSION['acclName'];
    $id = $_SESSION['accID'];
    
} else {
    header("location:login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Sir Arthur Local Trade Application</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.tsx"></script>
</head>
<script>
    if (isset($_SESSION['email'])){
        template2();
    }else{
        template();
    }
</script>
<body>
    <header>

        <template id="headerNoReg">
            <div class="bg-green-600 justify-between decoration-solid grid auto-cols-max sticky">
                <div>
                    <img src="" alt="SALCC Trading Circle Logo" class="logo">
                    <h2 class="capitalize absolute h-1 m-5 text-white">Sir Arthur Lewis Trading Circle</h1>
                </div>
                <div class=" inline-flex border-solid rounded-md">
                    <nav>
                        <a href="#" class="active:text-yellow-500">Home</a>
                        <a href="aboutus.php">About Us</a>
                        <a href="policies.php">Help</a>
                        <a href="sell.php">Sell</a>
                    </nav>
                </div>
                <div>
                    <div class="text-green-700 bg-white hover:bg-gray-300 focus:ring-4 focus:ring-gray-400 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-slate-300 dark:hover:bg-slate-400 focus:outline-solid">
                        <a href="signup.php">Sign Up</a>
                    </div>
                    <div class="text-white bg-yellow-500 hover:bg-yellow-700 focus:ring-4 focus:ring-yellow-500 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-amber-700 dark:hover:bg-amber-900 focus:outline-solid">
                        <a href="login.php">Log In</a>
                    </div>
                </div>
            </div>
        </template>

        <template id="headerLogIn">
            <div class="bg-green-600 justify-between decoration-solid grid auto-cols-max sticky">
                <div>
                    <img src="" alt="SALCC Trading Circle Logo" class="logo">
                    <h2 class="capitalize absolute h-1 m-5 text-white">Sir Arthur Lewis Trading Circle</h1>
                </div>
                <div class=" inline-flex border-solid rounded-md">
                    <nav>
                        <a href="#" class="active:text-yellow-500">Home</a>
                        <a href="aboutus.php">About Us</a>
                        <a href="policies.php">Help</a>
                        <a href="sell.php">Sell</a>
                    </nav>
                </div>

                <div class="text-green-700 bg-white hover:bg-gray-300 focus:ring-4 focus:ring-gray-400 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-slate-300 dark:hover:bg-slate-400 focus:outline-solid">
                    <a href="dashboard.php">
                        <svg src="#" alt="Dashboard Icon">
                    </a>
                </div>
                <div class="text-white bg-yellow-500 hover:bg-yellow-700 focus:ring-4 focus:ring-yellow-500 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-amber-700 dark:hover:bg-amber-900 focus:outline-solid">
                    <a href="logout.php">Log Out</a>
                </div>

            </div>
        </template>

    </header>
    <br><br>
    </div>
    <div>
        <div class="text-green-700 bg-white hover:bg-gray-300 focus:ring-4 focus:ring-gray-400 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-slate-300 dark:hover:bg-slate-400 focus:outline-solid">
            <a href="dashboard.php">
                <img src="#" alt="Dashboard Icon">
            </a>
        </div>

        <?php
        $sql = 'SELECT * shoppingcart ORDER BY itemDate';
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>

            <div class="h-full w-0 bg-white md:font-medium" id='cart'>
                <h2 class="text-3xl text-black"> </h2>
                <a href="javascript:void(0)" class="to-red-600 top-0 right-3" id="closeCart">&times;</a>

                <div class=" max-w-sm overflow-hidden shadow-lg">
                    <img href='<?php echo $row['img1_fName'] ?>' alt='<?php echo $row['img1_fName'] ?>'>
                </div>
                <div class="md:text-clip">
                    <h4><?php echo $row['itemName'] ?></h4>
                </div>
                <div>
                    <h6><?php echo $row['itemPrice'] ?></h6>
                </div>
                <div>
                    <a href="cart.php"></a>
                    <svg width='60' height='100' xmlns='http://w3.org/2000/svg'>
                        <img width='60' height='100' src="img/shopping-cart-icon.svg" alt="Shopping Cart Icon">
                    </svg>
                </div>
            </div> 
    </div>
<?php } ?>
<div>
    <div id="prodheader">
        <h3 class=" font-semibold">Most Recent Items</h3>
    </div>
    <div class="container flex flex-row columns-4">

    </div>

</div>
<!--
    <ul>
        <li>
            <div>
                <a href="">
                    <div><img src="" alt="Image Description"></div>
                    <div>
                        <h4>Product Title</h4>
                        <br>
                        <h5>Price</h5>
                    </div>
                </a>
            </div>
        </li>
</ul>
-->
<div>
    <p>Page</p>
    <br>
    <div class=" border-b-slate-500 border-2 border-solid text-sm text-green-700">
        <button type="button" id="prev" onclick="prevPage()" class="bg-gray-600 hover:bg-gray-800 font-medium rounded-lg text-sm active:bg-gray-950 active:text-green-800"></button>
        <button type="button" onclick="window.href.location('#');" class="bg-gray-600 hover:bg-gray-800 font-medium rounded-lg text-sm active:bg-gray-950 active:text-green-800">1</button>
        <button type="button" onclick="window.href.location('#');" class="bg-gray-600 hover:bg-gray-800 font-medium rounded-lg text-sm active:bg-gray-950 active:text-green-800">2</button>
        <button type="button" onclick="window.href.location('#');" class="bg-gray-600 hover:bg-gray-800 font-medium rounded-lg text-sm active:bg-gray-950 active:text-green-800">3</button>
        <button type="button" id="next" onclick="nextPage()" class="bg-gray-600 hover:bg-gray-800 font-medium rounded-lg text-sm active:bg-gray-950 active:text-green-800"></button>
    </div>

</div>
<br><br>
<footer>
    <div class="grid grid-cols-4 gap-5">
        <div>
            <ul class="md:list-outside">
                <li class="font-bold capitalize">Shop</li>
                <li><a href="#Trending Items">Trending</a></li>
                <li><a href="help/buy.php">How to Buy</a></li>
                <li><a href="signup.php">Create An Account</a></li>
            </ul>
        </div>
        <div>
            <ul class="md:list-outside">
                <li class="font-bold capitalize">Sell</li>
                <li><a href="sell/becomesell.php">Become a Seller</a></li>
                <li><a href="sell.php">How to Sell</a></li>
                <li><a href="sell/verify.php">Verification</a></li>
            </ul>
        </div>
        <div>
            <ul class="md:list-outside">
                <li class="font-bold capitalize">Help</li>
                <li><a href="help.php">All Articles</a></li>
                <li><a href="help/refund.php">Refunds</a></li>
                <li><a href="help/vendor.php">Vendor Guidelines</a></li>
                <li><a href="help/safety.php">Safety Guidelines</a></li>
            </ul>
        </div>
        <div>
            <ul class="md:list-outside">
                <li class="font-bold capitalize"><a href="aboutus.php"></a>About Us</li>
                <li><a href="contact.php">Contact Information</a></li>
                <li><a href="policies.php">Policies</a></li>
            </ul>
        </div>
    </div>
</footer>
</body>

</html>