<?php
include_once '../includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <!--Swiper stylesheet used for carosel-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
</head>

<header>
        <nav>
            <div class="bg-green-600 text-lg px-2 decoration-solid flex justify-between">
                <div class="flex">
                <div>
                    <img src="../img/logo.webp" alt="Sir Arthur Lewis Trading Circle logo" class="h-25 w-40">
                </div>
                <div class="absolute right-4 flex top-6">
                    <button class="bg-yellow-400 active:bg-yellow-500 hover:bg-yellow-500 focus:ring-2 focus:ring-yellow-500 font-medium rounded-lg text-md  m-2 px-3 py-1 focus:outline-none">
                                <a href="../logout.php">Log Out</a>
                            </button>
                </div>
                
                </div>
            </div>
        </nav>
    </header>
    <br><br>


    <div class="mt-3">
        <h2 class="text-xl ml-2 font-semibold">Seller Registration Images</h2>
        <div class="bg-amber-100 rounded-sm mx-2 swiper">
            <div class="flex justify-center items-center flex-row overflow-hidden swiper-wrapper">
                
                <?php

                $sql1 = "SELECT * FROM sellRegIDs";
                $result1 = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($result1) <= 0) {
                    echo "<p class='self-center text-black italic'>No Tentative Registrations</p>";
                } else {
                    while ($row = mysqli_fetch_assoc($result1)) {
                        $accID = $row['accID'];
                        $salccID = $row['studID_img'];
                        $govID = $row['govID_img'];


                        echo "
    <div class='flex justify-center flex-col bg-slate-200 border-2 border-solid mr-5 md:h-md shadow-black shadow-md swiper-slide'>
        <div class='bg-orange-100'> 
        <div class='flex flex-row justify-center space-x-4'>
        <img src='../img/$salccID' alt='Image of the respective user's SALCC ID card' class='m:size-1/2 h-32'>
        <img src='../img/$govID' alt='Image of the respective user's government ID card' class='w-24 h-32'>
        </div>
        <div class='bg-slate-100 m-2 p-2'>
        <p class='text-lg text-black text-shadow-md text-shadow-slate-200'>User ID: $accID</p>
        </div>
        <div class='flex flex-row float-right bottom-2 space-x-5'>
                            <div class='p-2 relative'>
                                <form action='selleraccept.php' method='post'>
                                    <input type='hidden' name='accID' id='accID' value='$accID'>
                                    <input type='submit' value='Approve' name='Approve' class='p-2 flex justify-center border border-transparent rounded-sm py-2 px-4 bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 text-base text-center text-white'>
                                </form>
                            </div>

                            <div class='relative p-2 w-1/12'>
                                <form action='noseller.php' method='post'>
                                    <input type='hidden' name='accID' id='accID' value='$accID'>
                                    <input type='submit' value='Deny' name='Deny' class='relative p-2 bg-red-500 border-2 rounded-md text-white'>
                                </form>
                            </div>
                        </div>
        </div>
        
        </div>
    </div>
                
    ";
                    }
                    echo "
                <div class='swiper-pagination'></div>

            <div class='swiper-button-prev'></div>
            <div class='swiper-button-next'></div>
                ";
                }
                ?>
            </div>


        </div>
    </div>

    <br><br>
    <hr class="border-2 border-black md:w-full">
    <br><br>

    <div class="mt-3">
        <h2 class="md:text-xl ml-2 font-semibold">Item Reports</h2>
        <div class="bg-amber-100 rounded-sm mx-2 swiper">
            <div class="flex justify-center items-center flex-row overflow-hidden swiper-wrapper">
                <?php
                $sql2 = "SELECT * FROM reports";
                $result2 = mysqli_query($conn, $sql2);
                if (mysqli_num_rows($result2) <= 0) {
                    echo "                       
                    <p class='self-center text-black italic'>No Tentative Reports</p>
                    ";
                } else {                    

                    while ($row = mysqli_fetch_assoc($result2)) {                        
                        $repID = $row['repID'];
                        $repReason = $row['rep_reason'];
                        $itemID = $row['itemID'];                        

                        echo " 
    <div class='flex justify-center flex-col bg-slate-200 border-2 border-solid mr-5 h-md w-md shadow-black shadow-md swiper-slide'>                
        <div class='bg-slate-100 flex flex-col mb-2'>
        <p class='md:text-base ml-2 flex flex-row overflow-y-auto wrap-anywhere'>$repReason </p> <br>
        <div class='p-2 border-y-2 border-black rounded-sm'>
        <h4 class='md:text-lg text-black md:text-shadow-md text-shadow-slate-200'>Item ID: $itemID</h1>
        </div>        
        </div>
        <div class='relative float-right mb-2'>           
            <form action='deletereport.php' method='post'>
            <input type='hidden' name='repID' id='repID' value=$repID>
            <input type='submit' name='Remove' value='Remove' class='bg-red-500 text-center hover:bg-red-600 focus:ring-2 focus:outline-none focus:ring-red-600 active:bg-red-700 rounded-md p-2 relative text-white float-right'>
            </form> 
        </div>
    </div>
    ";
                    }
                    echo "
                <div class='swiper-pagination'></div>

            <div class='swiper-button-prev'></div>
            <div class='swiper-button-next'></div>
                ";
                }
                ?>
            
            </div>


        </div>
    </div>
    <br><br>
    <hr class="border-2 border-black md:w-full">
    <br><br>
    <div class="mt-3">
        <h2 class="text-xl ml-2 font-semibold">Item Listings</h2>
        <div class="p-5 bg-slate-300 flex w-full mx-2 rounded-sm justify-normal flex-wrap space-y-10 space-x-20 container" id="itemContainer">
                                                                                        
        <?php

        $sql3 = "SELECT * FROM items WHERE quantity > 0 ORDER BY itemDate DESC";
        $result3 = mysqli_query($conn, $sql3);
        if (mysqli_num_rows($result3) <= 0) {
            echo "<p class='text-center text-black italic'>No Items Available</p>";
        }
        while ($row = mysqli_fetch_assoc($result3)) {
            $itemID = $row['itemID'];
            $iTitle = $row['itemName'];
            $iDesc = $row['itemDescription'];
            $iCat = $row['itemCategory'];
            $iPrice = $row['itemPrice'];
            $iDate = $row['itemDate'];
            $quantity = $row['quantity'];            
            $sellID = $row['sellerID'];
            $img1 = $row['itemImage1'];
            $imgAlt1 = $row['itemImageAlt1'];

            echo " 

<div class='bg-slate-200 border-transparent rounded-md flex flex-col px-2 mb-2'>
                            <div class=md:'h-1/2 md:w-1/2 relative flex justify-items-center m-2'>
                                <img src='../img/$img1' alt='$imgAlt1'>
                            </div>
                            <div class='p-2 font-sans text-black font-semibold'>
                                
                                <h3 class='text-lg wrap-anywhere overflow-auto' id='itemName'>$iTitle</h3>
                                <span class='hidden'>$iCat</span>
                                <br>
                                <p id='itemDesc' class='text-base  wrap-anywhere overflow-auto'> $iDesc </p>
                                <span id='itemDate' class='hidden'>$iDate</span>
                                <br>
                                <h5 class='text-lg' id='price'>$$iPrice</h5>
                                <br>
                                <h4 id='iID' class='bg-slate-100 border-2 border-black rounded-sm text-lg'>Item ID: $itemID</h4>
                            </div>
                            <div class='relative float-right mb-2'>                            
                            <form action='deleteitem.php' method='post'>                                
                                <input type='hidden' name='itemID' id='itemID' value='$itemID'>                                
                                <input type='submit' name='Remove Listing' value='Remove Listing' class='bg-red-500 text-center hover:bg-red-600 focus:ring-2 focus:outline-none focus:ring-red-600 active:bg-red-700 rounded-md p-2 relative text-white float-right'>
                            </form>
                            </div>
                        </div>";
        }
        ?>
       <!--Swiper Script used for function of carousel-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="../js/swiper.js"></script> 
</body>


</html>