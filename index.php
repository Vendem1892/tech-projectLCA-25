<?php
include_once 'includes/dbh.inc.php';
session_start();
//Is the user is logged in
if (isset($_SESSION['email'])) {
    $uName = $_SESSION['name'];
    $id = $_SESSION['id'];

    if (isset($_SESSION['sellID'])) {
        $sellID = $_SESSION['sellID'];
    } else {
        $sellID = null;
    }
} else {
    header("location:login.php");
    exit();
}



$itemHead = 'Most Recent Items';
$sortOpt = 'itemDate';
$sortDir = 'DESC';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sortOpt = mysqli_escape_string($conn, $_POST['sortOpt']);
    if ($sortOpt == NULL) {
        $sortOpt = 'itemDate';
    }

    $sortDir = mysqli_escape_string($conn, $_POST['sortDir']);
    if ($sortDir == NULL) {
        $sortDir = 'DESC';
    }

    if (($sortDir == 'DESC') && ($sortOpt == 'itemDate')) {
        $itemHead = 'Most Recent Items';
    } else if (($sortDir == 'ASC') && ($sortOpt == 'itemDate')) {
        $itemHead = 'Oldest Items';
    } else if (($sortDir == 'DESC') && ($sortOpt == 'itemPrice')) {
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
    <!--Swiper stylesheet used for carosel-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body class="font-sans bg-slate-400 ">

    <header>
        <nav>
            <div class="bg-green-600 text-lg px-2">
                <div class="flex space-x-80 container">
                    <div>
                        <img src="img/logo.webp" alt="Sir Arthur Lewis Trading Circle logo" class="h-25 w-40">
                    </div>
                    <div class="flex justify-between items-center py-3 space-x-4 text-white">
                        <a href="index.php" class="text-yellow-400">Home</a>
                        <a href="aboutus.php" class="hover:text-yellow-400 transition">About Us</a>
                        <a href="policies.php" class="hover:text-yellow-400 transition">FAQ</a>
                        <?php
                        if ($sellID != null) {
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
                                            <li><a href='cart.php' class='hover:text-yellow-400 transition dropdown-item'>Cart</a></li>
                                            <li><a href='logout.php' class='hover:text-yellow-400 transition dropdown-item'>Logout</a></li>
                                            <ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        ";
                        } else {
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
                                <a class='text-md active:font-bold hover:text-zinc-400 text-lg
text-center w-full no-underline sm:w-auto px-2 py-2 sm:py-1 transition'>

                                    Account
                                </a>
                            </div>
                            <div class='absolute z-10 hidden bg-grey-200 group-hover:flex hover:transition'>
                                <div class='px-6 pt-2 pb-4 bg-slate-400 shadow-lg'>
                                    <div class='dropdown-menu'>
                                        <ul class='flex flex-col justify-between space-y-1'>
                                            <li><a href='profile.php' class='hover:text-zinc-400 transition dropdown-item'>Profile </a></li>
                                            <li><a href='cart.php' class='hover:text-zinc-400 transition dropdown-item'>Cart</a></li>
                                            <li><a href='logout.php' class='hover:text-zinc-400 transition dropdown-item'>Logout</a></li>
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
                                <a href="cart.php">
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

    <div>
        <div class="float-right flex mr-4">
            <div class="flex flex-row space-x-2">
                <img src='img/sortbut.png' alt='Sort button (Downward arrow with steps)' class="size-5">
                <h5 class='font-bold'>Sort</h5>
                <div class="flex justify-between space-x-4">
                    <form action='index.php' method='post'>
                        <select name='sortOpt' id='sortOpt'>
                            <option value='itemDate'>Recency</option>
                            <option value='itemPrice'>Price</option>
                        </select>
                        <select name='sortDir' id='sortDir'>
                            <option value="ASC">Ascending</option>
                            <option value="DESC">Descending</option>
                        </select>
                        <input type="submit" value="Sort" class="text-center rounded-md bg-blue-500 hover:bg-blue-600 focus:outine-none focus:ring-2 focus:ring-blue-600 active:bg-blue-700 text-white px-4 py-1">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <?php
    echo "
                <h3 class='font-bold text-xl float-left ml-2' id='prodHeader'>$itemHead</h3>";
    ?><br>

    <div class="p-3 mx-2 bg-slate-300 flex flex-wrap justify-between space-y-10 space-x-20 container" id="itemContainer">

        <?php
        $sql = "SELECT * FROM items WHERE quantity > 0 ORDER BY $sortOpt $sortDir";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) <= 0) {
            echo "<p class='text-center text-black italic'>No Items Available</p>";
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                $itemID = $row['itemID'];
                $iTitle = $row['itemName'];
                $iDesc = $row['itemDescription'];
                $iCat = $row['itemCategory'];
                $iPrice = $row['itemPrice'];
                $iDate = $row['itemDate'];
                $quantity = $row['quantity'];
                $sellerID = $row['sellerID'];
                $sqlImg = "SELECT * from item_images WHERE itemID = '$itemID'";
                $resImg = mysqli_query($conn, $sqlImg);
                if (mysqli_num_rows($resImg) <= 0) {
                    $img1 = $row['img1_fName'];
                    $imgAlt1 = $row['img1_altText'];
                    $img2 = null;
                    $imgAlt2 = null;
                    $img3 = null;
                    $imgAlt3 = null;
                } else {
                    while ($row2 = mysqli_fetch_assoc($resImg)) {
                        $img1 = $row2['img1_fName'];
                        $imgAlt1 = $row2['img1_altText'];
                        if ($row2['img2_fName'] != null) {
                            $img2 = $row2['img2_fName'];
                        } else {
                            $img2 = '#';
                        }
                        if ($row2['img2_altText'] != null) {
                            $imgAlt2 = $row2['img2_altText'];
                        } else {
                            $imgAlt2 = 'N/A';
                        }
                        if ($row2['img3_fName'] != null) {
                            $img3 = $row2['img3_fName'];
                        } else {
                            $img3 = '#';
                        }
                        if ($row2['img3_altText'] != null) {
                            $imgAlt3 = $row2['img3_altText'];
                        } else {
                            $imgAlt3 = 'N/A';
                        }
                    }
                }
                $iPrice = number_format((float)$iPrice, 2, '.', '');

                if (($img2 == '#') && ($img3 == '#')) {
                    echo " 
                            <div class='bg-slate-200 border-transparent rounded-md flex flex-col px-2 mb-2 w-64'>
                            <div class='w-1/2 h-32 flex justify-center items-center m-2 overflow-auto'>
                                <img src='img/$img1' alt='$imgAlt1'>
                            </div>
                            <br>
                            <div class='p-2 font-sans text-black font-semibold'>
                                <p id='iID' class='hidden'>$itemID</p>
                                <h3 class='text-lg wrap-anywhere overflow-auto' id='itemName'>$iTitle</h3>
                                <span class='hidden'>$iCat</span>
                                <br>
                                <p id='itemDesc' class='text-base wrap-anywhere overflow-auto'> $iDesc </p>
                                <span id='itemDate' class='hidden'>$iDate</span>
                                <br>
                                <h5 class='text-lg' id='price'>$$iPrice</h5>
                            </div>
                            <div class='relative flex flex-row space-x-4 float-right mb-2'>   
                            <form action='report.php' method='post'>
                                <input type='hidden' name='itemID' value='$itemID'>
                                <input type='submit' name='Report Listing' value='Report Listing' class='bg-red-500 text-center hover:bg-red-600 focus:ring-2 focus:outline-none focus:ring-red-600 active:bg-red-700 rounded-md p-2 relative text-white float-right'>
                            </form>                         
                            <form action='includes/addcart.php' method='post'>
                                <input type='hidden' name='accID' id='accID' value='$id'>
                                <input type='hidden' name='itemID' id='itemID' value='$itemID'>                                
                                <input type='submit' name='Add to Cart' value='Add to Cart' class='bg-blue-500 text-center hover:bg-blue-600 focus:ring-2 focus:outline-none focus:ring-blue-600 active:bg-blue-700 rounded-md p-2 relative text-white float-right'>
                            </form>
                            </div>
                        </div>                          
                        
                            ";
                } else {
                    echo "
                            <div class='bg-slate-200 border-transparent rounded-md flex flex-col px-2 mb-2 w-72'>                            
                            <div class='swiper w-64 h-48'>
                            <div class='flex overflow-hidden justify-center items-center swiper-wrapper'> 
                                    <div class='swiper-slide'>
                                    <img src='img/$img1' alt='$imgAlt1'>
                                    </div>
                                    <div class='swiper-slide'>
                                    <img src='img/$img2' alt='$imgAlt2'>
                                    </div>
                                    <div class = 'swiper-slide'>
                                    <img src='img/$img3' alt='$imgAlt3'>
                                    </div>
                            </div>                            

                            <div class='swiper-pagination'></div>                                
                            <div class='swiper-button-prev'></div>
                            <div class='swiper-button-next'></div>

                            </div>                            
                            <div class='p-2 font-sans text-black font-semibold wrap-anywhere overflow-auto'>
                                <h3 class='text-lg' id='itemName'>$iTitle</h3>
                                <span class='hidden'>$iCat</span>
                                <br>
                                <p id='itemDesc' class='text-base'> $iDesc </p>
                                <span id='itemDate' class='hidden'>$iDate</span>
                                <br>
                                <h5 class='text-lg' id='price'>$$iPrice</h5>
                            </div>
                            <div class='relative flex flex-row float-right space-x-4 mb-2'>   
                            <form action='report.php' method='post'>
                                <input type='hidden' name='itemID' value='$itemID'>
                                <input type='submit' name='Report Listing' value='Report Listing' class='bg-red-500 text-center hover:bg-red-600 focus:ring-2 focus:outline-none focus:ring-red-600 active:bg-red-700 rounded-md p-2 relative text-white float-right'>
                            </form>                         
                            <form action='includes/addcart.php' method='post'>
                                <input type='hidden' name='accID' id='accID' value='$id'>
                                <input type='hidden' name='itemID' id='itemID' value='$itemID'>                                
                                <input type='submit' name='Add to Cart' value='Add to Cart' class='bg-blue-500 text-center hover:bg-blue-600 focus:ring-2 focus:outline-none focus:ring-blue-600 active:bg-blue-700 rounded-md p-2 relative text-white float-right'>
                            </form>
                            </div>
                        </div>
                    ";
                }
            }
        }
        ?>

    </div>

    <br><br>
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

    <!--Swiper Script used for function of carousel-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    

     <script>
        //Swiper.js library configuration 
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            loop : true,            
            grabCursor: true,
            speed: 300,
            observer: true,
            observeParents: true,
            parallax:true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

            // Navigation arrows
            navigation: {                                
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },            

        });
    </script> 
</body>

</html>