<?php
include_once '../includes/dbh.inc.php';
$itemHead = 'Cheapest Items';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sortOpt = $_POST['sortOption'];
    if ($sortOpt == NULL) {
        $sortOpt = 'itemDate';
    }
    $sortDir = $_POST['sortDirection'];
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
    <title>Home - Sir Athur Lewis Trading Circle</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/main.js"></script>
</head>


<body class="font-sans">
    <header>
        <div class="bg-green-600 decoration-solid sticky">
            <div>
                <img src="../img/logo.webp" alt="SALCC Trading Circle Logo" class="logo">

            </div>
            <div class="border-solid rounded-md text-white">
                <nav>
                    <a href="home.php" class="text-yellow-500">Home</a>
                    <a href="listanitem.php">List An Item</a>
                    <a href="../policies.php">Help</a>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3" />
                            <circle cx="12" cy="10" r="3" />
                            <circle cx="12" cy="12" r="10" />
                        </svg>
                        <select class="flex justify-center rounded-md bg-zinc-400 p-10 font-semibold focus:ring-1 focus:ring-zinc-500 hover:bg-zinc-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
                            <option value="account">Account</option>
                            <option value="profile"><a href="profile.php">Profile</a></option>
                            <option value="dashboard"><a href="dashboard.php">Dashboard</a></option>
                            <option value="logout"><a href="logout.php">Logout</a></option>
                        </select>
                    </div>
                    <a href="../index.php">Shop</a>
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
                        <a href="dashboard.php"></a>
                    </svg>
                    <button class="bg-yellow-400 active:bg-yellow-500 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-500 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-solid">
                        <a href="../logout.php">Log Out</a>
                    </button>
            </div>


            </nav>
        </div>
        </div>
    </header>
    <br><br>
    <div class='bg-slate-500'>
        <section>
            <div>
                <div class='h-6 w-4 float-right'>
                    <img src='img/sortbut.png' alt='Sort button (Downward arrow with steps)'>
                    <h5 class='inline font-sans font-bold'>Sort</h5>
                    <div>
                        <form action='home.php' method='post'>
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
            <div class="p-5 bg-slate-300" id="itemContainer">

                <?php

                echo "<h3 class='font-bold font-sans text-lg float-left' id='prodHeader'>$itemHead</h3>";
                $sql = "SELECT * FROM items ORDER BY $sortOpt $sortDir";
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
    
<div class='bg-zinc-100 w-20 float-left'>
<div>
<img src='img/$img1' alt='$imgAlt1' class='w-10 h-14 border-b-4 border-gray-700 p-2'>
</div>
<div class='w-10 h-9 p-2 font-san'>
<h4 class='itemName'>$iTitle</h4>
<span class='category sr-only'>$iCat</span>
<br>
<p class='itemDesc'> $iDesc </p>
<span class='itemDate'>$iDate</span>
<br>
<h5 class='price'> '$'. $iPrice</h5>
</div>
</div>";
                }
                ?>

            </div>

        </section>

    </div>
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