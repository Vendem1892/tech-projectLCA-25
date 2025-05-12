<?php
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

$itemID = $_POST['itemID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Listing - Sir Arthur Lewis Trading Circle</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="font-sans">
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
    <div class=" flex flex-col p-2  mr-4 ml-8 mt-4 mb-4 bg-white shadow shadow-black rounded-sm ">
        <h2 class="text-xl font-semibold">What we want from your report</h2>
        <div>
            <ul class="list-decimal list-inside">
                <li>Descriptions of the listings(item name, price, description of images).</li>
                <li>Give obvious reasons for the report.</li>
                <li>If you have purchased the item, please specify the need for a refund.</li>
            </ul>
        </div>
    </div>
    <div class="flex place-content-center"> 
    <div class="bg-white border-4 rounded-sm border-black shadow-md text-black h-50vh w-lg">
    
        <h2 class="font-bold text-lg text-center">Write a Report</h2>
        <hr class="border-solid border-2 w-full">        
        <br>

    <form action="includes/newreport.php" method="post" class="m-2">
        <input type="hidden" name="itemID" id="itemID" value="<?php echo $itemID; ?>">
        
        <label for="repReason" class="font-medium block text-base">Report Area<span class="text-red-500">*</span></label><br>
        <textarea name="repReason" id="repReason" placeholder="Type report here..." autofocus required class="flex w-full h-1/2 overflow-auto outline-2 focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
        <br><br>
        <div>
                <div class="text-base font-semibold text-black">
                    <span class="text-red-500">*</span> Required
                </div><br>
        <input type="submit" name="Submit" value="Submit" class="w-full flex justify-center border border-transparent rounded-sm py-2 px-4 bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 text-base text-center text-white">
        </div>
    </form>
    </div>
    </div>
</body>
</html>