<?php
include_once 'includes/dbh.inc.php';

session_start();
//Is the user is logged in
if (isset($_SESSION['email'])) {
    $uName = $_SESSION['name'];
    $accID = $_SESSION['id'];
    if (isset($_SESSION['sellID'])) {
        $sellID = $_SESSION['sellID'];
    } else {
        $sellID = null;
    }
} else {
    header("location:login.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Your Shopping Cart - Sir Arthur Lewis Trading Circle</title>
    <link rel='stylesheet' href='css/style.css'>
    <script src='js/main.js'></script>
</head>

<body class='font-sans bg-slate-400'>
<header>
    <nav>
        <div class="bg-green-600 text-lg px-2">
            <div class="flex space-x-80 container">
                <div>
                    <img src="img/logo.webp" alt="Sir Arthur Lewis Trading Circle logo" class="h-25 w-40">
                </div>
                <div class="flex justify-between items-center py-3 space-x-4 text-white">
                    <a href="index.php" class="hover:text-yellow-400 transition">Home</a>
                    <a href="aboutus.php" class="hover:text-yellow-400 transition">About Us</a>
                    <a href="policies.php" class="hover:text-yellow-400 transition">FAQ</a>
                    <?php
                    if($sellID != null){
                        echo "
                        <div class='relative inline-block text-center'>
                        <div class='relative group rounded-md bg-green-400'>
                            <div class='flex flex-row'>
                                <!-- Account Icon -->
                                <svg xmlns='http://www.w3.org/2000/svg' class='relative top-2' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='#000000' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'>
                                    <path d='M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3' />
                                    <circle cx='12' cy='10' r='3' />
                                    <circle cx='12' cy='12' r='10' />
                                </svg>
                                <a class='text-md active:font-bold hover:text-zinc-400 text-lg
text-center w-full no-underline sm:w-auto px-2 py-2 sm:py-1 transition'>

                                    Account
                                </a>
                            </div>
                            <div class='absolute z-10 hidden bg-grey-200 group-hover:flex hover:transition'>
                                <div class='px-6 pt-2 pb-4 bg-green-400 shadow-lg'>
                                    <div class='dropdown-menu'>
                                        <ul class='flex flex-col justify-between space-y-1'>
                                            <li><a href='profile.php' class='hover:text-zinc-400 transition dropdown-item'>Profile </a></li>
                                            <li><a href='#' class='text-zinc-400 dropdown-item'>Cart</a></li>
                                            <li><a href='logout.php' class='hover:text-zinc-400 transition dropdown-item'>Logout</a></li>
                                            <ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        ";
                    }else{
                        echo "
                            <div class='relative inline-block text-center'>
                        <div class='relative group rounded-md bg-slate-400'>
                            <div class='flex flex-row'>
                                <!-- Account Icon -->
                                <svg xmlns='http://www.w3.org/2000/svg' class='relative top-2' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='#000000' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'>
                                    <path d='M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3' />
                                    <circle cx='12' cy='10' r='3' />
                                    <circle cx='12' cy='12' r='10' />
                                </svg>
                                <a class='text-md active:font-bold hover:text-yellow-400 text-lg
text-center w-full no-underline sm:w-auto px-2 py-2 sm:py-1 transition'>

                                    Account
                                </a>
                            </div>
                            <div class='absolute z-10 hidden bg-grey-200 group-hover:flex hover:transition'>
                                <div class='px-6 pt-2 pb-4 bg-slate-400 shadow-lg'>
                                    <div class='dropdown-menu'>
                                        <ul class='flex flex-col justify-between space-y-1'>
                                            <li><a href='profile.php' class='hover:text-yellow-400 transition dropdown-item'>Profile </a></li>
                                            <li><a href='#' class='text-yellow-400 dropdown-item'>Cart</a></li>
                                            <li><a href='logout.php' class='hover:text-yellow-400 transition dropdown-item'>Logout</a></li>
                                            <ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        ";
                    }
                    ?>
                    <a href="sell.php" class="hover:text-yellow-400 transition">Sell</a>
                    <div class="flex space-x-24 absolute right-4">
                        <div class="flex items-center">
                            <a href="#">
                                <!-- Shopping Cart Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="10" cy="20.5" r="1" />
                                    <circle cx="18" cy="20.5" r="1" />
                                    <path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1" />
                                </svg>
                            </a>
                        </div>
                        <div>
                            <button class="bg-yellow-400 active:bg-yellow-500 hover:bg-yellow-500 focus:ring-2 focus:ring-yellow-500 font-medium rounded-lg text-md  m-2 px-3 py-1 focus:outline-none">
                                <a href="logout.php">Log Out</a>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<br><br>

    <h2 class='text-3xl text-black ml-4'> All Items in Cart</h2>
    <div class='flex flex-row justify-between gap-4 space-x-5 ml-2 mt-2'>
        <?php
        $orderPrice = 0.00;
        $sql = "SELECT * FROM shoppingcart WHERE accID = '$accID';";
        $result = mysqli_query($conn, $sql);

        ?>



        <div class='bg-slate-200 flex flex-col ml-2 space-y-6 w-1/2' id='cart'>

            <?php
            if (mysqli_num_rows($result) <= 0) {
                echo "<p class='text-black mt-2 self-center italic'>No Items in Cart</p>";
            } else {

                while ($row = mysqli_fetch_assoc($result)) {
                    $itemID = $row['itemID'];
                    $sql2 = "SELECT * FROM items WHERE itemID = '$itemID';";
                    $resItem = mysqli_query($conn, $sql2);
                    while ($row2 = mysqli_fetch_assoc($resItem)) {
                        $iTitle = $row2['itemName'];                        
                        $iDesc = $row2['itemDescription'];                                        
                        $iCat = $row2['itemCategory'];
                        $iPrice = $row2['itemPrice'];
                        $iDate = $row2['itemDate'];
                        $img1 = $row2['img1_fName'];
                        $imgAlt1 = $row2['img1_altText'];
                        $iPrice=number_format((float)$iPrice, 2, '.', '');


                        echo "
            
                
                    <div class='flex flex-row items-start gap-x-6 shadow-lg text-black'>
                        <div class='flex w-xl h-44'>
                            <img src='img/$img1' alt='$imgAlt1'>
                        </div>
                            
                        <div class='flex flex-col wrap-anywhere overflow-auto justify-normal m-2'>
                                <h4 class='text-xl font-semibold'>$iTitle</h4>
                                <br>
                                <h5 class='text-base font-normal'>$iDesc </h5>
                                <br>
                                <h6 class='text-lg font-semibold'> $$iPrice</h6>
                                <br>
                                <br><br>                            
                        </div>                        
                        </div>";
                        $orderPrice += $iPrice;
                    }
                }
                $orderPrice = (float) $orderPrice;
            } ?>
        </div>


        <div class='bg-slate-200 items-center flex flex-col p-5 h-lvh mr-20 sticky' id='checkoutPage'>
            
                <button type="button" class='w-full py-5 px-2 flex justify-center border border-transparent rounded-sm bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-600 text-base text-white'>
                    <a href='checkout.php'>Checkout</a>
                </button>
            

            <br>
            <div class="text-2xl ml-1">
                <ul>
                    <li>
                        <label id='priceXCD' class="font-bold">XCD Price:</label>
                        <span class='text-black font-normal'><?php 
                        $orderPrice=number_format((float)$orderPrice, 2, '.', '');
                        echo "$$orderPrice"; ?></span>
                    </li>
                    <br>
                    <li>
                        <label id='priceUSD' class="font-bold">USD Price: </label>
                        <span class='text-black font-normal'>
                            <?php
                            $priceUSD = $orderPrice / 2.7;
                            $priceUS=number_format((float)$priceUSD, 2, '.', '');
                            echo "$$priceUS";
                            ?>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
        <footer class="relative bottom-0 w-full">
        <div class="flex justify-evenly mt-1 space-x-4 bg-green-600 text-white rounded-sm">
            <div>
                <ul class="md:list-outside py-2">
                    <li class="font-bold capitalize">Shop</li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="help/buy.php">How to Buy</a></li>
                    <li><a href="signup.php">Create An Account</a></li>
                </ul>
            </div>
            <div>
                <ul class="md:list-outside py-2">
                    <li class="font-bold capitalize">Sell</li>
                    <li><a href="sell/becomeseller.php">Become a Seller</a></li>
                    <li><a href="sell.php">How to Sell</a></li>
                </ul>
            </div>
            <div>
                <ul class="md:list-outside py-2">
                    <li class="font-bold capitalize">Help</li>
                    <li><a href="help.php">All Articles</a></li>
                    <li><a href="help/refund.php">Refunds</a></li>
                    <li><a href="help/vendor.php">Vendor Guidelines</a></li>
                    <li><a href="help/safety.php">Safety Guidelines</a></li>
                </ul>
            </div>
            <div>
                <ul class="md:list-outside py-2">
                    <li class="font-bold capitalize"><a href="aboutus.php"></a>About Us</li>
                    <li><a href="contact.php">Contact Information</a></li>
                    <li><a href="policies.php">Policies</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</body>


</html>