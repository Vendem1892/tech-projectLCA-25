<?php
include_once '../includes/dbh.inc.php';
session_start();

if (isset($_SESSION['sellID'])) {
    $sellID = $_SESSION['sellID'];
    $email = $_SESSION['email'];
} else {
    header("location:../becomeseller.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sir Arthur Lewis Trading Circle</title>
    <link rel="stylesheet" href="../css/style.css">
    <!-- Swiper stylesheet -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

</head>

<body class="font-sans">
    <header>
        <nav>
            <div class="bg-green-600 text-lg px-2">
                <div class="flex space-x-80 container">
                    <div>
                        <img src="../img/logo.webp" alt="Sir Arthur Lewis Trading Circle logo" class="h-25 w-40">
                    </div>
                    <div class="flex justify-between items-center py-3 space-x-4 text-white">
                        <a href="home.php" class="hover:text-yellow-400 transition">Home</a>
                        <a href="../aboutus.php" class="hover:text-yellow-400 transition">About Us</a>
                        <a href="../policies.php" class="hover:text-yellow-400 transition">FAQ</a>
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
                                                <li><a href='../profile.php' class='hover:text-zinc-400 transition dropdown-item'>Profile</a></li>
                                                <li><a href='#' class='text-zinc-400 dropdown-item'>Dashboard</a></li>
                                                <li><a href='../logout.php' class='hover:text-zinc-400 transition dropdown-item'>Logout</a></li>
                                                <ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <a href="../index.php" class="hover:text-yellow-400 transition">Shop</a>
                        <div class="flex space-x-24 absolute right-4">
                            <div class="flex items-center">
                                <a href="#">
                                    <!-- Shopping Cart Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="4" y1="21" x2="4" y2="14"></line>
                                        <line x1="4" y1="10" x2="4" y2="3"></line>
                                        <line x1="12" y1="21" x2="12" y2="12"></line>
                                        <line x1="12" y1="8" x2="12" y2="3"></line>
                                        <line x1="20" y1="21" x2="20" y2="16"></line>
                                        <line x1="20" y1="12" x2="20" y2="3"></line>
                                        <line x1="1" y1="14" x2="7" y2="14"></line>
                                        <line x1="9" y1="8" x2="15" y2="8"></line>
                                        <line x1="17" y1="16" x2="23" y2="16"></line>

                                    </svg> </a>
                            </div>
                            <div>
                                <button class="bg-yellow-400 active:bg-yellow-500 hover:bg-yellow-500 focus:ring-2 focus:ring-yellow-500 font-medium rounded-lg text-md  m-2 px-3 py-1 focus:outline-none">
                                    <a href="../logout.php">Log Out</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <br><br>

    <div class="mt-3">
        <h3 class="font-semibold text-2xl ml-2">Currently Selling Items</h3>
        <br>
        <div class="bg-amber-100 mx-2 rounded-sm swiper">
            <div class="swiper-wrapper">

                <?php

                $sql = "SELECT * FROM items WHERE sellerID = '$sellID' ORDER BY itemDate DESC";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) <= 0){
                    echo "<p class='text-center text-black italic swiper-slide'>No Items Currently Listed</p>";
                }else{
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
                    $iPrice=number_format((float)$iPrice, 2, '.', '');
                    echo " <div class='swiper-slide'>
            <div class='bg-slate-200 border-transparent rounded-md flex justify-center flex-col self-center relative px-2 mx-2 my-2'>
                            <div class='h-1/2 w-1/2 relative flex justify-items-center m-2'>
                                <img src='../img/$img1' alt='$imgAlt1'>
                            </div>
                            <div class='p-2 font-sans text-black font-semibold'>
                                <p id='iID' class='hidden'>$itemID</p>
                                <h3 class='text-lg wrap-anywhere overflow-auto' id='itemName'>$iTitle</h3>
                                <span class='hidden'>$iCat</span>
                                <br>
                                <p id='itemDesc' class='text-base wrap-anywhere overflow-auto'> $iDesc </p>
                                <span id='itemDate' class='hidden'>$iDate</span>
                                <br>
                                <h5 class='text-lg' id='price'>$$iPrice</h5>
                                ";?>
                                <?php  
                                if($row['quantity'] <= 0){
                                    echo "
                                <p id='soldOut' class='text-lg text-red-500 font-bold text-center'> Sold Out </p>
                                ";
                                }
                                 ?>
                                <?php echo"
                            </div>
                            <div class='relative float-right mb-2'>   
                            <form action='rmitem.php' method='post'>
                                <input type='hidden' name='itemID' value='$itemID'>
                                <input type='submit' name='Remove Lisiting' value='Remove Lisiting' class='bg-red-500 text-center hover:bg-red-600 focus:ring-2 focus:outline-none focus:ring-red-600 active:bg-red-700 rounded-md p-2 relative text-white float-right'>
                            </form>                                                     
                            </div>                        
                        </div>
                        </div>";
                }
            }?>
            
                
                </div>                                      

            <div class='swiper-pagination'></div>

            <div class='swiper-button-prev'></div>
            <div class='swiper-button-next'></div>
            
        </div>
    </div>
    
    <br><br>
<hr class="border-2 w-full">
    <div class="flex flex-col justify-center items-center mt-3 bg-slate-100">        
            <h3 class="text-xl">Would you like to create a new listing?</h3>
            <a href="listanitem.php" class="w-1/2 py-5 px-2 flex justify-center border border-transparent rounded-sm bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-600 text-lg text-white">List An Item</a>
    </div>
    <br><br>
    <footer class="relative bottom-0 w-full">
        <div class="flex justify-evenly space-x-4 mt-1 bg-green-600 text-white rounded-sm">
            <div>
                <ul class="md:list-outside">
                    <li class="font-bold capitalize">Shop</li>
                    <li><a href="profile.php">Profile</a></li>
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
    <!--Swiper Script used for function of carousel-->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="../js/swiper.js"></script>    
</body>



</html>