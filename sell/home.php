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
    <script src="../js/main.ts"></script>
</head>


<body>
    <header>
        <div class="bg-green-600 justify-between decoration-solid grid auto-cols-max sticky">
            <div>
                <img src="../img/#" alt="SALCC Trading Circle Logo" class="logo">
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
        </div>
    </header>
    <br><br>
    <?php
    $sql = 'SELECT * items ORDER BY itemDate';
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div id="prodheader">
            <h3 class=" font-semibold">Most Recent Items</h3>
        </div>

        <div class="container flex flex-row columns-4 bg-gray-500">

            <div class=" max-w-sm overflow-hidden shadow-lg">
                <img href='<?php echo $row['img1_fName'] ?>' alt='<?php echo $row['img1_fName'] ?>'>
            </div>
            <div class="md:text-clip">
                <h4><?php echo $row['itemName'] ?></h4>
            </div>
            <div>
                <h6><?php echo $row['itemPrice'] ?></h6>
            </div>
        </div>
    <?php } ?>
    <div class=" bg-white dark:bg-black">
        <div class="items-center">
            <a href="listanitem.php" class="bg-green-700 text-white text-center outline-2">List An Item</a>
        </div>
    </div>
</body>

</html>