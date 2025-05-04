<?php    
    include_once '../includes/dbh.inc.php';    
    
    session_start();
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sir Arthur Lewis Trading Circle</title>
    <link rel="stylesheet" href="../css/style.css"> 
    
    <link rel="stylesheet" href="../css/style.css"> 
    
</head>

<body class="font-sans">
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
    </header>    <br><br>    
    <div id="prodheader">
        <h3 class="font-semibold text-slate-900">Currently Selling Items</h3>
        <h3 class="font-semibold text-slate-900">Currently Selling Items</h3>
    </div>
    <br><br>
    <br><br>
    <?php 
       
    $sql = 'SELECT * items WHERE sellerID = $_SESSION[sellID] ORDER BY itemDate DESC';    
    $sql = 'SELECT * items WHERE sellerID = $_SESSION[sellID] ORDER BY itemDate DESC';    
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_assoc($result)){

    
?>
    <span class="flex flex-row bg-gray-500">        
    <span class="flex flex-row bg-gray-500">        
    
        <div class="max-w-sm overflow-hidden shadow-lg">
            <img href='<?php echo $row['img1_fName']?>' alt='<?php echo $row['img1_altText']?>'>
        <div class="max-w-sm overflow-hidden shadow-lg">
            <img href='<?php echo $row['img1_fName']?>' alt='<?php echo $row['img1_altText']?>'>
        </div>
        <div class="float-left md:text-clip">
        <div class="float-left md:text-clip">
        <h4><?php echo $row['itemName']?></h4>
        </div>
        <div class="float-left">
        <div class="float-left">
            <h6><?php echo $row['itemPrice']?></h6>
        </div>         
        <?php };?>
    </span>    

        <?php };?>
    </span>    

    <div class=" bg-white dark:bg-black">
        <div class="items-center">
            <h3>Would you like to create a new listing?</h3>
            <h3>Would you like to create a new listing?</h3>
            <a href="listanitem.php" class="bg-green-700 text-white text-center outline-2">List An Item</a>
        </div>
    </div>
</body>
</html>