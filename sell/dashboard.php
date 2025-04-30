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
    
</head>

<body class="font-sans">
<header>
        <div class="bg-green-600 justify-between decoration-solid grid auto-cols-max sticky">
            <div>
                <img src="../img/saltc_logo.webp" alt="SALCC Trading Circle Logo" class="logo">                
                <h2 class="capitalize absolute h-1 m-5 text-white">Sir Arthur Lewis Trading Circle</h1>
            </div>
            <div class=" inline-flex border-solid rounded-md">
                <nav>
                <a href="home.php">Home</a>
                <a href="#" class="active:text-yellow-500">Dashboard</a>
                <a href="policies.php">Help</a>
                <a href="../index.php">Shop</a>
                </nav>
            </div>                
            <div>                
                <div class="text-green-700 bg-white hover:bg-gray-300 focus:ring-4 focus:ring-gray-400 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-slate-300 dark:hover:bg-slate-400 focus:outline-solid">
                    <a href="signup.php">Sign Up</a>
                </div>
                <div class="text-white bg-yellow-500 hover:bg-yellow-700 focus:ring-4 focus:ring-yellow-500 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-amber-700 dark:hover:bg-amber-900 focus:outline-solid">
                    <a href="login.php">Log In</a>
                </div>
            </div>        
        </div>                                        
    </header>    
    <br><br>    
    <div id="prodheader">
        <h3 class="font-semibold text-slate-900">Currently Selling Items</h3>
    </div>
    <br><br>
    <?php 
       
    $sql = 'SELECT * items WHERE sellerID = $_SESSION[sellID] ORDER BY itemDate DESC';    
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_assoc($result)){

    
?>
    <span class="flex flex-row bg-gray-500">        
    
        <div class="max-w-sm overflow-hidden shadow-lg">
            <img href='<?php echo $row['img1_fName']?>' alt='<?php echo $row['img1_altText']?>'>
        </div>
        <div class="float-left md:text-clip">
        <h4><?php echo $row['itemName']?></h4>
        </div>
        <div class="float-left">
            <h6><?php echo $row['itemPrice']?></h6>
        </div>         
        <?php };?>
    </span>    

    <div class=" bg-white dark:bg-black">
        <div class="items-center">
            <h3>Would you like to create a new listing?</h3>
            <a href="listanitem.php" class="bg-green-700 text-white text-center outline-2">List An Item</a>
        </div>
    </div>
</body>
</html>