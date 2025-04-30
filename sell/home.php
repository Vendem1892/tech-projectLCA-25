<?php
include_once '../includes/dbh.inc.php';
include_once '../includes/sellerverify.php';
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
        <div class="bg-green-600 justify-between decoration-solid grid auto-cols-max sticky">
            <div>
                <img src="../img/logo.webp" alt="SALCC Trading Circle Logo" class="logo">
            
            </div>
            <div class=" inline-flex border-solid rounded-md">
                <nav>
                    <a href="home.php">Home</a>
                    <a href="#" class="active:text-yellow-500">Dashboard</a>
                    <a href="policies.php">Help</a>
                    <a href="../index.php">Shop</a>
                </nav>
            </div>
        </div>
    </header>
    <br><br>
    <div class='md:bg-slate-500'>
        <section>
            <div>
                <div class='h-6 w-4 float-right'>
                    <img src='img/sortbut.png' alt='Sort button (Downward arrow with steps)'>
                    <h5 class='inline font-sans font-bold'>Sort</h5>
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
            <div class="p-5 bg-slate-300" id="itemContainer">

                <?php
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
                echo "<h3 class='font-bold font-sans text-lg float-left' id='prodHeader'>Most Recent Items</h3>";
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