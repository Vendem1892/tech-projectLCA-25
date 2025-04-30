<?php


function dispProductsShop()
{
    $sortDir = mysqli_real_escape_string($conn,$_POST['sortDirection']);
    if ($sortDir==NULL){
        $sortDir = 'itemDate';
    }    
    $sortOpt = mysqli_real_escape_string($conn,$_POST['sortOption']);
    if ($sortOpt==NULL){
        $sortOpt = 'DESC';
    }
    $sql = "SELECT * FROM items ORDER BY itemDate DESC";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) >= 0){
        echo "<p class='self-center text-black italic'>No Items Available</p>";
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $accID = $_SESSION['id'];
        $itemID = $row['itemID'];
        $iTitle = $row['itemName'];
        $iDesc = $row['itemDescription'];
        $iCat = $row['itemCategory'];
        $iPrice = $row['itemPrice'];
        $iDate = $row['itemDate'];
        $quantity = $row['quantity'];
        $img1 = $row['img1_fName'];
        $imgAlt1 = $row['img1_altText'];
        $img2 = $row['img2_fName'];
        $imgAlt2 = $row['img2_altText'];
        $img3 = $row['img3_fName'];
        $imgAlt3 = $row['img3_altText'];
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
            <form action='cartadd.php' method='post'>
                <input type='hidden' name='ItemID' value='$itemID'>
                <input type='hidden' name='UserID' value='$accID'>
                <input type='submit' class='class='bg-blue-500 text-center hover:bg-blue-600 focus:outine-2 focus:outline-offset-2 focus:outine-blue-600 active:bg-blue-700 float-right add-to-cart-button'>
                <span><img src='img/shopping-cart-icon.svg' alt='Add to Cart Icon' class='w-2 h-2'></span>
                <span class='text-white font-sans add-to-cart'>Add To Cart</span>
                <span class='text-white font-sans added-to-cart'>Added</span>
            </form>
            
        </div>";
                
    }
}

function dispProductsSell()
{

    $sql = "SELECT * FROM items ORDER BY itemDate DESC";    
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $accID = $_SESSION['id'];
        $itemID = $row['itemID'];
        $iTitle = $row['itemName'];
        $iDesc = $row['itemDescription'];
        $iCat = $row['itemCategory'];
        $iPrice = $row['itemPrice'];
        $iDate = $row['itemDate'];
        $quantity = $row['quantity'];
        $img1 = $row['img1_fName'];
        $imgAlt1 = $row['img1_altText'];
        $img2 = $row['img2_fName'];
        $imgAlt2 = $row['img2_altText'];
        $img3 = $row['img3_fName'];
        $imgAlt3 = $row['img3_altText'];
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
}



function dispHeaderShop()
{
    echo "
    <header>
        <nav>    
    <div class='bg-green-600 justify-between decoration-solid sticky text-white'>
            
                <img src='img/saltc_logo.webp' alt='SALCC Trading Circle Logo'>          
        
            <table class='text-green-700 bg-white hover:bg-gray-300 focus:ring-4 focus:ring-gray-400 font-medium float-left px-5 me-2 mb-2 p-2 focus:outline-solid inline-flex border-solid rounded-md'>
                <tr>
        
                        <td><a href='#' class='active:text-yellow-500'>Home</a></td>
                        <td><a href='aboutus.php'>About Us</a></td>
                        <td><a href='policies.php'>FAQ</a></td>
                        <td>
                            <div class='relative inline-block text-left'>
                                <div>
                                    <button type='button' class='inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 shadow-xs ring-gray-300 ring-inset hover:bg-gray-50' id='menu-button' aria-expanded='true' aria-haspopup='true'>
                                        Account
                                        
                                      
                                    </button>
                                </div>
                                <div class='absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white ring-1 shadow-lg ring-black/5 focus:outline-hidden' role='menu' tabindex='-1'>
                                    <div class='py-1' role='none'>                                       
                                        <a href='#' class='block px-4 py-2 text-sm text-gray-700' tabindex='-1' id='menu-item-0'>Profile</a>
                                        <a href='#' class='block px-4 py-2 text-sm text-gray-700' tabindex='-1' id='menu-item-1'>Cart</a>
                                        <a href='#' class='block px-4 py-2 text-sm text-gray-700' tabindex='-1' id='menu-item-2'>License</a>                                       
                                        <a href='logout.php' class='block w-full px-4 py-2 text-left text-sm text-gray-700' tabindex='-1' id='menu-item-3'>Logout</a>
                                       
                                    </div>
                                </div>
                            </div>
                        </td>
        
                
            <td>
            <a href='cart.php'>
            <span><img class='w-3 h-3 object-scale-down box-border size-10' src='img/shopping-cart.svg' alt='Shopping Cart Icon'></span>
            </a></td>
            <td></td><span class='focus:ring-4 focus:ring-yellow-500 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-solid'>
                <a href='logout.php'>Log Out</a>
            </span>    
                </tr>
            </table>
        </div>
        </nav>
    </header>
    <br><br><br>
    ";
}

/*<div class="focus:ring-4 focus:ring-gray-400 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-solid">
                <a href="sell/dashboard.php">
                    <img src="img/dashboard-icon.svg" alt="Dashboard Icon">
                </a>
</div>
*/

function dispFooterShop()
{
    echo "
    <footer>
        <div class='grid grid-cols-4 gap-5'>
            <div>
                <ul class='md:list-outside'>
                    <li class='font-bold capitalize'>Shop</li>
                    <li><a href='#Trending Items'>Trending</a></li>
                    <li><a href='help/buy.php'>How to Buy</a></li>
                    <li><a href='signup.php'>Create An Account</a></li>
                </ul>
            </div>
            <div>
                <ul class='md:list-outside'>
                    <li class='font-bold capitalize'>Sell</li>
                    <li><a href='sell/becomesell.php'>Become a Seller</a></li>
                    <li><a href='sell.php'>How to Sell</a></li>
                    <li><a href='sell/verify.php'>Verification</a></li>
                </ul>
            </div>
            <div>
                <ul class='md:list-outside'>
                    <li class='font-bold capitalize'>Help</li>
                    <li><a href='help.php'>All Articles</a></li>
                    <li><a href='help/refund.php'>Refunds</a></li>
                    <li><a href='help/vendor.php'>Vendor Guidelines</a></li>
                    <li><a href='help/safety.php'>Safety Guidelines</a></li>
                </ul>
            </div>
            <div>
                <ul class='md:list-outside'>
                    <li class='font-bold capitalize'><a href='aboutus.php'></a>About Us</li>
                    <li><a href='contact.php'>Contact Information</a></li>
                    <li><a href='policies.php'>Policies</a></li>
                </ul>
            </div>
        </div>
    </footer>";
}
