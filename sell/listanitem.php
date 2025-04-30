<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List An Item - Sir Arthur Lewis Trading Circle</title>
    <link rel="stylesheet" href="../css/style.css">    
</head>

<body class="font-sans bg-green-700">
<header>
        <div class="bg-green-600 justify-between decoration-solid grid auto-cols-max sticky">
        <ul>
            <li>
            <img src="../img/logo.webp" alt="SALCC Trading Circle Logo" class="logo">
            </li>
            <li class=" inline-flex border-solid rounded-md">
                <nav>
                    <a href="home.php">Home</a>
                    <a href="#" class="active:text-yellow-500">Dashboard</a>
                    <a href="policies.php">Help</a>
                    <a href="../index.php">Shop</a>
                </nav>
            </li>
        </ul>                               
        </div>
    </header>
    <br><br>    
        <div class="items-center bg-slate-200 md:border-8 self-center border-black md:h-1/2 text-black">
        
        <h2 class="font-bold text-lg">Log In</h2>
        <hr class="border-solid border-2">    
        <br><br>    

        <form action="../includes/listing_handler.php" onsubmit="return listingValidation()" method="post">
                <h1>List An Item</h1>
                <hr>
                <br><br>
        
                    <label for="iName">Item Name</label><br>
                    <input type="text" placeholder="Enter a name for the item" name="iName" id="iName" autofocus required>
        
                <br><br>
        
                    <label for="iDesc">Item Description</label><br>
                    <input type="text" placeholder="Enter a description for the item" name="iDesc" id="iDesc" required>
        
                <br><br>
        
                    <label for="iCat">Item Category</label><br>
                    <input type="text" placeholder="Enter the item's category" name="iCat" id="iCat" required>
        
                <br><br>
        
                    <label for="iPrice">Item Price</label><br>
                    <input type="number" placeholder="Enter a price for the item (Up to $500)" name="iPrice" id="iPrice" min="1" max="500" step=".01" required>
        
                <br><br>
        
                    <label for="iAmt">Item Quantity</label><br>
                    <input type="number" placeholder="Enter the number of this item being sold" name="iAmt" id="iAmt" value="1" required>
        
                <br><br>
        
                    <label for="img1">Item Image 1</label><br>
                    <input type="file" placeholder="Upload an image for the item" name="img1" id="img1" width="300" height="100" required>
        
                <br><br>
        
                    <label for="img1_Alt">Item Image 1 Alt Text</label><br>
                    <input type="text" placeholder="Enter a description for image 1" name="img1_Alt" id="img1_Alt" required>
        
                <br><br>
        
                    <label for="img2">Item Image 2</label><br>
                    <input type="file" placeholder="Upload an image for the item" name="img2" id="img2" width="300" height="100">
        
                <br><br>
        
                    <label for="img2_Alt">Item Image 2 Alt Text</label><br>
                    <input type="text" placeholder="Enter a description for image 2" name="img2_Alt" id="img2_Alt">
        
                <br><br>
        
                    <label for="img3">Item Image 3</label><br>
                    <input type="text" placeholder="Upload an image for the item" name="img3" id="img3" width="300" height="100">
        
                <br><br>
        
                    <label for="img3_Alt">Item Image 3 Alt Text</label><br>
                    <input type="text" placeholder="Enter a description for image 3" name="img3_Alt" id="img3_Alt">
        
                <br><br><br>
                
                <div class="flex-auto">
                    <input type="submit" name="Create Listing" value="Create Listing" class="text-green-700 bg-white"><br><br>
                </div>
        
        </form>
    
    </div>

</body>
<script src="../js/main.js"></script>
</html>