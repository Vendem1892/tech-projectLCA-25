<?php
include_once 'includes/dbh.inc.php';
session_start();
//Is the user is logged in
if (isset($_SESSION['email'])) {
    $uName = $_SESSION['name'];
    $id = $_SESSION['id'];
} else {
    header("location:login.php");
    exit();
}

$itemHead = 'Cheapest Items';
$sortOpt = 'itemDate'; 
$sortDir = 'DESC';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sortOpt = mysqli_escape_string($conn,$_POST['sortOption']);
    if ($sortOpt == NULL) {
        $sortOpt = 'itemDate';
    }
    $sortDir = mysqli_escape_string($conn,$_POST['sortDirection']);
    if ($sortDir == NULL) {
        $sortDir = 'DESC';
    }
    if ($sortDir == 'itemDate' && $sortOpt == 'DESC') {
        $itemHead = 'Most Recent Items';
    } else if ($sortDir == 'itemDate' && $sortOpt == 'ASC') {
        $itemHead = 'Oldest Items';
    } else if ($sortDir == 'itemPrice' && $sortOpt == 'DESC') {
        $itemHead = 'Most Expensive Items';
    } else {
        $itemHead = 'Cheapest Items';
    }
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

<body class="font-sans">
    <header>
        <div class="bg-green-600 justify-between decoration-solid sticky text-white">
            <span>
                <img src="img/saltc_logo.webp" alt="SALCC Trading Circle Logo" class="logo">
            </span>

            <nav>
                <ul class="block">
                    <li><a href="#" class="text-yellow-500 active:text-yellow-500">Home</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="policies.php">FAQ</a></li>
                    <li>
                        <div class="relative inline-block text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3"/><circle cx="12" cy="10" r="3"/><circle cx="12" cy="12" r="10"/></svg>
                            <select class="flex justify-center rounded-md bg-zinc-400 p-10 font-semibold focus:ring-1 focus:ring-zinc-500 hover:bg-zinc-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                <option value="account">Account</option>
                                <option value="profile"><a href="profile.php">Profile</a></option>
                                <option value="cart"><a href="cart.php">Cart</a></option>
                                <option value="logout"><a href="logout.php">Logout</a></option>
                            </select>
                        </div>
        </div>
        </ul>
        <a href="cart.php">
        <!-- Shopping Cart Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10" cy="20.5" r="1"/><circle cx="18" cy="20.5" r="1"/><path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1"/></svg>
        </a>
        <button class="bg-yellow-400 active:bg-yellow-500 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-500 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-solid">
            <a href="logout.php">Log Out</a>
        </button>
        
        </nav>



        


        <!--<div class="focus:ring-4 focus:ring-gray-400 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-solid">
                <a href="sell/dashboard.php">
                    <img src="img/dashboard-icon.svg" alt="Dashboard Icon">
                </a>
            </div>-->



        </div>


    </header>
    <br><br>

    <div class='bg-slate-500 flex'>
        <section>
            <div>
                <div class='h-6 w-4 float-right inline'>
                    <img src='img/sortbut.png' alt='Sort button (Downward arrow with steps)'>
                    <h5 class='inline font-bold'>Sort</h5>
                    <div>
                        <form action='index.php' method='post'>
                            <select name='SortOption' id='sortOpt'>
                                <option value='itemDate'>Recency</option>
                                <option value='itemPrice'>Price</option>
                            </select>
                            <select name='SortDirection' id='sortDir'>
                                <option value='ASC' class="before:content-['↑']">Ascending</option>
                                <option value='DESC' class="before:content-['↓']">Descending</option>
                            </select>
                            <input type="submit" value="sortSubmit" class="bg-blue-500 text-center hover:bg-blue-600 focus:outine-2 focus:outline-offset-2 focus:outine-blue-600 active:bg-blue-700">
                        </form>
                    </div>
                </div>

            </div>
            <div class="p-5 bg-slate-300 grid grid-cols-4 justify-evenly" id="itemContainer">

                <?php
                
                echo "<table>
                <th><h3 class='font-bold text-lg float-left' id='prodHeader'>Most Recent Items</h3></th>";
                $sql = "SELECT * FROM items WHERE quantity > 0 ORDER BY $sortOpt $sortDir";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) <= 0) {
                    echo "<p class='self-center text-black italic'>No Items Available</p>";
                }
                while ($row = mysqli_fetch_assoc($result)) {
                    $itemID = $row['itemID'];
                    $iTitle = $row['itemName'];
                    $iDesc = $row['itemDescription'];
                    $iCat = $row['itemCategory'];
                    $iPrice = $row['itemPrice'];
                    $iDate = $row['itemDate'];
                    $quantity = $row['quantity'];
                    $img1 = $row['img1_fName'];
                    $imgAlt1 = $row['img1_altText'];
                    $sellID = $row['sellerID'];

                    echo " 
    <tbody>
    <td>
<div class='bg-slate-200 rounded-md border-4 size-10'>
<div>
<img src='img/$img1' alt='$imgAlt1' class='size-5 border-b-4 border-gray-600 p-4'>
</div>
<div class='p-2 font-sans text-black font-semibold'>
<p id='iID' class='hidden'>$itemID</p>
<h3 class='text-lg' id='itemName'>$iTitle</h3>
<span class='hidden'>$iCat</span>
<br>
<p id='itemDesc' class='text-base'> $iDesc </p>
<span id='itemDate' class='hidden'>$iDate</span>
<br>
<h5 class='text-lg' id='price'> '$'. $iPrice</h5>
</div>
<form action='includes/addcart.php' method='post'>
<input type='hidden' name='itemID' id='itemID' value='$itemID'>
<input type='hidden' name='accID' id='accID' value='$id'>
<input type='submit' name='Add to Cart' class='bg-blue-500 text-center hover:bg-blue-600 focus:outine-2 focus:outline-offset-2 focus:outine-blue-600 active:bg-green-700 add-to-cart-button float-right'>
</form>

</div>
</td>
</tbody>
</table>
";
                }
                /*<span><img src='img/shopping-cart-icon.svg' alt='Add to Cart Icon' class='w-2 h-2'></span>
                <span class='text-white add-to-cart'>Add To Cart</span>
<span class='text-white added-to-cart bg-green-600' aria-hidden='true'>Added</span>*/
                ?>

            </div>

        </section>

    </div>

    <!--<ul>
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
    </div>-->


    <br><br>
    <footer>
        <div class="grid grid-cols-4 gap-5 bg-green-600 text-white">
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