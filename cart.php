<?php
include_once 'includes/dbh.inc.php';
?>
<?php
include_once 'includes/dbh.inc.php';
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

<body class='font-sans bg-gray-300'>
    <?php dispHeaderShop(); ?>
    <div class='w-3/4 float-left ml-2 mt-2'>
        <?php
        $accID = $_SESSION['id'];
        $orderPrice = 0;
        $sql = "SELECT FROM shoppingcart WHERE accID = $accID;";
        $sql2 = "SELECT FROM items WHERE itemID = $itemID;";        
        $result = mysqli_query($conn, $sql);
        $resItem = mysqli_query($conn,$sql2);                    
            
            ?>
            <div class='bg-slate-400 font-normal static col-span-3' id='cart'>
            <h2 class='text-3xl text-black'> All Items in Cart</h2>         
        <?php
        if (mysqli_num_rows($result) <= 0) {
            echo "<p class='text-black self-center italic'>No Items in Cart</p>";
            exit();
        }

        while ($row = mysqli_fetch_assoc($result)) {
            $itemID = $row['itemID'];
            while($row2 = mysqli_fetch_assoc($resItem)){

        
            $iTitle = $row['itemName'];
            $iDesc = $row['itemDescription'];
            $iCat = $row['itemCategory'];
            $iPrice = $row['itemPrice'];
            $iDate = $row['itemDate'];
            $img1 = $row['img1_fName'];
            $imgAlt1 = $row['img1_altText'];

        ?>
            
                <ul class='flex flex-row'>
                    <li class=''>                        
                        <div class=' min-h-80 max-h-80 overflow-clip shadow-lg'>
                            <img href='<?php echo $img ?>' alt='<?php echo $imgAlt1 ?>'>
                            <hr>
                            <div class='float-left md:text-clip'>
                                <h4><?php echo $iTitle ?></h4>
                                <br>
                                <h5><?php echo $iDesc ?></h5>
                                <h6><?php echo '$' . $iPrice ?></h6>
                                <br><br>
                            </div>
                        </div>
                        <hr>
                    <?php $orderPrice =+ $iPrice;
            }
                }
             
                ?>
                    </li>
                </ul>
            </div>
            
    </div>
    <div class='bg-slate-300 float-right col-span-2 mt-2 mr-4 w-1/5' id='checkoutPage'>
                <button class='bg-blue-500 hover:bg-blue-600 focus:outine-2 focus:outine-blue-500 active:bg-blue-600 text-center text-white'>
                    <a href='checkout.php'>Checkout</a>
                </button>
                <div>
                <label id='priceXCD'>XCD Price: </label>
                <p class='text-black font-semibold'><?php echo "$ . $orderPrice"; ?></p>
                </div>
                <div>
                <label id='priceUSD'>USD Price: </label>
                <p class='text-black font-semibold'>
                    <?php
                    $priceUS = $orderPrice / 2.7;
                    echo "$ . $priceUS";
            ?>
                </p>
                </div>
                
            </div>
</body>


</html>