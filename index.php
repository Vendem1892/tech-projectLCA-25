<?php
include_once 'includes/dbh.inc.php';
session_start();
//Is the user is logged in
if (isset($_SESSION['email'])) {
    $uName = $_SESSION['accfName'] . ' ' . $_SESSION['acclName'];
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
    <script src="js/main.js"></script>
</head>

<body>
    <header>

        <!--         
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
         -->


        <div class="bg-green-600 justify-between decoration-solid grid auto-cols-max sticky">
            <div>
                <img src="" alt="SALCC Trading Circle Logo" class="logo">
                <h2 class="capitalize absolute h-1 m-5 text-white">Sir Arthur Lewis Trading Circle</h1>
            </div>
            <table class="text-green-700 bg-white hover:bg-gray-300 focus:ring-4 focus:ring-gray-400 font-medium float-left px-5 me-2 mb-2 p-2 focus:outline-solid inline-flex border-solid rounded-md">
                <tr>
                    <nav>
                        <td><a href="#" class="active:text-yellow-500">Home</a></td>
                        <td></td><a href="aboutus.php">About Us</a>
                        <td></td><a href="policies.php">FAQ</a>
                        <td><a href="sell.php">Sell</a></td>
                    </nav>
                </tr>
            </table>

            <div class="text-green-700 bg-white hover:bg-gray-300 focus:ring-4 focus:ring-gray-400 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-slate-300 dark:hover:bg-slate-400 focus:outline-solid">
                <a href="sell/dashboard.php">
                    <img src="img/dashboard-icon.svg" alt="Dashboard Icon">
                </a>
            </div>
            <a href="cart.php">
                <img src="img/shopping-cart-icon.svg" alt="Shopping Cart Icon">
            </a>
            <div class="text-white bg-yellow-500 hover:bg-yellow-700 focus:ring-4 focus:ring-yellow-500 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-amber-700 dark:hover:bg-amber-900 focus:outline-solid">
                <a href="logout.php">Log Out</a>
            </div>

        </div>


    </header>
    <br><br>

    <div class=" md:bg-slate-500 ">
        <span>

        </span>

        <?php        
        $sql = "SELECT * FROM items ORDER BY itemDate DESC";
        $sql2 = "INSERT INTO shoppincart (itemID,accID) VALUES('$itemID','$accID')";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

        ?>
            <div>
                <h3 class="font-semibold font-sans text-lg float-left p-1" id="prodHeader">Most Recent Items</h3>
            </div>
            <div class="@container float-left p-1 bg-slate-700" id="itemContainer">
                <section>
                    <div class="bg-zinc-100 w-20 float-left">
                        <div>
                            <img src="<?php echo $img1_fName ?>" alt="<?php echo $img1_altText?>" class=" w-10 h-14 border-b-4 border-gray-700 p-2">
                        </div>
                        <div class=" w-10 h-9 p-2 font-sans">
                            <h4 class="itemName"><?php echo $row['itemName'] ?></h4>
                            <span class="category sr-only"><?php echo $row['itemCategory'] ?></span>
                            <br>
                            <p class="itemDesc"><?php echo $row['itemDescription']?> </p>
                            <span class="itemDate"><?php echo $row['itemDate'] ?></span>
                            <br>
                            <h5 class="price"><?php echo $row['itemPrice']?></h5>
                        </div>
                        <button class="bg-blue-800 active:bg-green-700 float-right add-to-cart-button" onclick="$sql2" type="button">
                            <span><img src="img/shopping-cart-icon.svg" alt="Add to Cart Icon" class="w-2 h-2"></span>
                            <span class="text-white font-sans add-to-cart">Add To Cart</span>
                            <span class="text-white font-sans added-to-cart">Added</span>
                        </button>
                    </div>
                </section>
            </div>
        <?php } ?>
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
    <ul>
        <span></span>
        <p>Page</p>
    </ul>

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