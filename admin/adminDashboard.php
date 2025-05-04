<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg-slate-300 font-sans">
    <div class="mt-3"> 
    <h2 class="text-xl">Seller Registration Images</h2>
    <div class="bg-amber-100" id="sellSlide">
    <ul class="flex flex-row relative overflow-hidden z-0" id="sellSlideInner">
    <?php

    $sql1 = "SELECT * FROM sellRegIDs";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) <= 0) {
                    echo "<p class='self-center text-black italic'>No Tentative Registrations</p>";
                }
                while ($row = mysqli_fetch_assoc($result)) {
                    $accID = $row['accID'];
                    $salccID = $row['studID_img'];
                    $govID = $row['govID_img'];                    
                    

    echo"
    <li class='mr-10 sellSlideItem h-lvh shadow-black shadow-lg'>
        <div class='bg-orange-100'> 
        <div>
        <img src='../img/$salccID' alt='Image of the respective user's SALCC ID card' class='w-1/2'>
        <img src='../img/$govID' alt='Image of the respective user's government ID card' class='w-1/2'>        
        </div>
        <div class='bg-slate-100 m-2 p-2'>
        <p class='text-lg text-black text-shadow-md text-shadow-slate-200'>User ID: $accID</p>
        </div>
        </div>
    </li>
                
    "; }
    ?>
</ul>
<button type="button" id="prev" class="absolute float-left top-1/2 bg-white z-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H6M12 5l-7 7 7 7"/></svg>
</button>
<button type="button" id="prev" class="absolute float-right top-1/2 bg-white z-10">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M12 5l7 7-7 7"/></svg>
</button>
    </div>
    </div>
    
    <br><br>
    <hr class="border-4 border-black md:w-full">
    
    <div class="mt-3"> 
    <h2 class="text-xl">Item Reports</h2>
    <div class="bg-amber-100" id="reportSlide">
    <ul class="flex flex-row relative overflow-hidden z-0" id="reportSlideInner">
    <?php
    $sql1 = "SELECT * FROM reports";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) <= 0) {
        echo "<p class='self-center text-black italic'>No Tentative Reports</p>";
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $repID = $row['itemID'];
        $repReason = $row['rep_reason'];
        
    echo" 
    <li class='mr-10 reportSlideItem h-lvh shadow-lg shadow-black -z-0'>        
        <div class='absolute float-right top-2 z-0'>
            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='#000000' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'><circle cx='12' cy='12' r='10'></circle><line x1='15' y1='9' x2='9' y2='15'></line><line x1='9' y1='9' x2='15' y2='15'></line></svg>
            <form action='deleterecord.php' method='post'>
            <input type='hidden' name='repID' id='repID' value>
            </form> 
        </div>
        <div class='bg-slate-100'> 
        <div class='p-2 border-b-2 border-b-black rounded-b-sm'>
        <h1 class='text-lg text-black text-shadow-md text-shadow-slate-200'>Item ID: $itemID</h1>
        </div>
        <div class='ml-2 p-2'>
        <p class='text-lg text-black text-shadow-md text-shadow-slate-200'>User ID: $accID</p>
        </div>
        </div>
    </li>
    ";}

    ?>
</ul>
<button type="button" id="prev" class="absolute float-left bg-white hover:to-transparent focus:bg-green-500 focus:ring-2 focus:ring-green-600 z-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H6M12 5l-7 7 7 7"/></svg>
</button>
<button type="button" id="next" class="absolute float-right bg-white z-10">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M12 5l7 7-7 7"/></svg>
</button>
    </div>
    </div>
    
    
</body>
<script src="../js/main.js"></script>
</html>