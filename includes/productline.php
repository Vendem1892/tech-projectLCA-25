<?php

    include_once 'dbh.inc.php';

    $sql = 'SELECT * items ORDER BY itemDate';
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)){
    echo "
        <div id='prodheader'>
            <h3 class='font-semibold'>Most Recent Items</h3>
        </div>

        <div class='container flex flex-row columns-4 bg-gray-500'>

            <div class=' max-w-sm overflow-hidden shadow-lg'>
                <img href='$row[img1_fName]' alt='$row[img1_fName]'>
            </div>
            <div class='md:text-clip'>
                <h4><?php echo $row[itemName] ?></h4>
            </div>
            <div>
                <h6><?php echo $row[itemPrice] ?></h6>
            </div>
        </div>";
    }
    
    mysqli_close($conn);
?>