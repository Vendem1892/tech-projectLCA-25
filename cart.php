<?php 
include_once 'includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Shopping Cart - Sir Arthur Lewis Trading Circle</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js"></script>
</head>
<body>
    <div class="bg-center md:w-fit md:h-fit bg-green-700">
        <?php 
        $sql = "SELECT FROM shoppingcart WHERE accID = $accID;";
        $result = mysqli_query($conn,$accID);
        while ($row = mysqli_fetch_assoc($result)){

        };
        ?>
        <div class="h-full w-0 bg-white md:font-medium" id='cart'>
                <h2 class="text-3xl text-black"> </h2>
                <a href="javascript:void(0)" class="to-red-600 top-0 right-3" id="closeCart">&times;</a>

                <div class=" max-w-sm overflow-hidden shadow-lg">
                    <img href='<?php echo $row['img1_fName'] ?>' alt='<?php echo $row['img1_fName'] ?>'>
                </div>
                <div class="md:text-clip">
                    <h4><?php echo $row['itemName'] ?></h4>
                </div>
                <div>
                    <h6><?php echo $row['itemPrice'] ?></h6>
                </div>
                <div>
                    
                    
                    
                </div>
            </div>
    </div>
    </div>
</body>
</html>