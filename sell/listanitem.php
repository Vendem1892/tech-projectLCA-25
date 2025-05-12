<?php 
session_start();
if (isset($_SESSION['sellID'])) {
    $sellID = $_SESSION['sellID'];
    $email = $_SESSION['email'];
} else {
    header("location:../becomeaseller.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List An Item - Sir Arthur Lewis Trading Circle</title>
    <link rel="stylesheet" href="../css/style.css">    
</head>

<body class="font-sans bg-slate-400">
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
                                                <li><a href='dashboard.php' class='hover:text-zinc-400 transition dropdown-item'>Dashboard</a></li>
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
                                <a href="dashboard.php">
                                    <!-- Dashboard Icon -->
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

    <div class="flex place-content-center">
        <div class="bg-white border-4 rounded-sm border-black shadow-md text-black h-50vh w-lg">

            <h2 class="font-bold text-lg text-center">List An Item</h2>
            <hr class="border-solid border-2 w-full">
            <br>

            <form action="../includes/listing_handler.php" onsubmit="return listingValidation()" method="post" enctype="multipart/form-data" class="m-2">
                

                <label for="iName" class="font-medium block text-base">Item Name<span class="text-red-500">*</span></label><br>
                <textarea placeholder="Enter a name for the item" name="iName" id="iName" autofocus required class="w-full outline-2 focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>

                <br><br>

                <label for="iDesc" class="font-medium block text-base">Item Description<span class="text-red-500">*</span></label><br>
                <textarea type="text" placeholder="Enter a description for the item" name="iDesc" id="iDesc" required class="w-full outline-2 focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>

                <br><br>

                <label for="iCat" class="font-medium block text-base">Item Category<span class="text-red-500">*</span></label><br>
                <input type="text" placeholder="Enter the item's category" name="iCat" id="iCat" required class="w-full outline-2 focus:outline-none focus:ring-2 focus:ring-green-500">

                <br><br>

                <label for="iPrice" class="font-medium block text-base">Item Price<span class="text-red-500">*</span></label><br>
                <input type="number" placeholder="Enter a price for the item (Up to $500)" name="iPrice" id="iPrice" min="1" max="500" step=".01" required class="w-full outline-2 focus:outline-none focus:ring-2 focus:ring-green-500">

                <br><br>

                <label for="iAmt" class="font-medium block text-base">Item Quantity<span class="text-red-500">*</span></label><br>
                <input type="number" placeholder="Enter the number of this item being sold" name="iAmt" id="iAmt" value="1" required class="w-full outline-2 focus:outline-none focus:ring-2 focus:ring-green-500">

                <br><br>

                <label for="img1" class="font-medium block text-base">Item Image 1<span class="text-red-500">*</span></label><br>
                <input type="file" placeholder="Upload an image for the item" name="img1" id="img1" required class="w-full outline-2 active:outline-none active:ring-2 active:ring-green-500"><br>


                <br><br>

                <label for="img1_Alt" class="font-medium block text-base">Item Image 1 Alt Text<span class="text-red-500">*</span></label><br>
                <input type="text" placeholder="Enter a description for image 1" name="img1_Alt" id="img1_Alt" required class="w-full outline-2 focus:outline-none focus:ring-2 focus:ring-green-500">

                <br><br>

                <label for="img2" class="font-medium block text-base">Item Image 2</label><br>
                <input type="file" placeholder="Upload an image for the item" name="img2" id="img2" class="w-full outline-2 active:outline-none active:ring-2 active:ring-green-500"><br>


                <br><br>

                <label for="img2_Alt" class="font-medium block text-base">Item Image 2 Alt Text</label><br>
                <input type="text" placeholder="Enter a description for image 2" name="img2_Alt" id="img2_Alt" class="w-full outline-2 focus:outline-none focus:ring-2 focus:ring-green-500">

                <br><br>

                <label for="img3" class="font-medium block text-base">Item Image 3</label><br>
                <input type="file" placeholder="Upload an image for the item" name="img3" id="img3" class="w-full outline-2 active:outline-none active:ring-2 active:ring-green-500"><br>

                <br><br>

                <label for="img3_Alt" class="font-medium block text-base">Item Image 3 Alt Text</label><br>
                <input type="text" placeholder="Enter a description for image 3" name="img3_Alt" id="img3_Alt" class="w-full outline-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                <input type="hidden" name="sellID" id="sellID" value="<?php echo "$sellID"; ?>">
                <br><br>
                <div class="text-base font-semibold text-black">
                    <span class="text-red-500">*</span> Required
                </div><br>
                <div>
                    <input type="submit" name="Submit" value="Submit" class="w-full flex justify-center border border-transparent rounded-sm py-2 px-4 bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 text-base text-center text-white"><br><br>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="../js/main.js"></script>

</html>