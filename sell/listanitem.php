<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List An Item - Sir Arthur Lewis Trading Circle</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <div class="bg-green-600 justify-between decoration-solid grid auto-cols-max">
            <div>
                <img src="" alt="SALCC Trading Circle Logo" class="logo">
                <h2 class="capitalize absolute h-1 m-5 text-white">Sir Arthur Lewis Trading Circle</h1>
            </div>
        </div>
    </header>
    <br><br>
    <div class="grid columns-7">
        <div class="bg-green-700 border-2 border-amber-50 text-stone-900 py-4 px-2 col-span-3 col-end-6">
            <form action="../includes/listing_handler.php" onsubmit="return limitPrice()" method="post">
                <h1>Log In</h1>
                <hr>
                <br><br>
                <div>
                    <label for="iName">Item Name</label>
                    <input type="text" placeholder="Enter a name for the item" name="iName" id="iName" required>
                </div>
                <br>
                <div> 
                    <label for="iDesc">Item Description</label>
                    <input type="text" placeholder="Enter a description for the item" name="iDesc" id="iDesc" required>
                </div>
                <br>
                <div> 
                    <label for="iCat">Item Category</label>
                    <input type="text" placeholder="Enter the item's category" name="iCat" id="iCat" required>
                </div>
                <br>
                <div> 
                    <label for="iPrice">Item Price</label>
                    <input type="number" placeholder="Enter a price for the item (Up to $500)" name="iPrice" id="iPrice" max="500" required>
                </div>
                <br>
                <div> 
                    <label for="iAmt">Item Quantity</label>
                    <input type="number" placeholder="Enter the number of this item being sold" name="iAmt" id="iAmt" required>
                </div>
                <br>
                <div> 
                    <label for="img1">Item Image 1</label>
                    <input type="file" placeholder="Upload an image for the item" name="img1" id="img1" required>
                </div>
                <br>
                <div> 
                    <label for="img1_Alt">Item Image 1 Alt Text</label>
                    <input type="text" placeholder="Enter a description for image 1" name="img1_Alt" id="img1_Alt" required>
                </div>
                <br>
                <div> 
                    <label for="img2">Item Image 2</label>
                    <input type="file" placeholder="Upload an image for the item" name="img2" id="img2">
                </div>
                <br>
                <div> 
                    <label for="img2_Alt">Item Image 2 Alt Text</label>
                    <input type="text" placeholder="Enter a description for image 2" name="img2_Alt" id="img2_Alt">
                </div>
                <br>
                <div> 
                    <label for="img3">Item Image 3</label>
                    <input type="text" placeholder="Upload an image for the item" name="img3" id="img3">
                </div>
                <br>
                <div> 
                    <label for="img3_Alt">Item Image 3 Alt Text</label>
                    <input type="text" placeholder="Enter a description for image 3" name="img3_Alt" id="img3_Alt">
                </div>
                <br>
                
                <div class="flex-auto">
                    <button type="submit" class="text-green-700 bg-white">Create Listing</button><br><br>
                </div>
        </div>
        </form>
    </div>
    </div>
</body>

</html>