<?php
session_start();
//Is the user is logged in
if(isset($_SESSION['email'])){
    $uName = $_SESSION['accfName'] + ' ' + $_SESSION['acclName'];
    $id = $_SESSION['accID'];
} else {    
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - SALCC Scheduler</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    
        <header>
            <div class="head">
                <div class="register">
                    <a href="signup.php">Sign Up</a>
                </div>
                <div class="logIn">
                    <a href="login.php">Log In</a>
                </div>
            </div>
            <img src="" alt="SALCC Trading Circle Logo" class="logo">
            <h1 class="cName">Sir Arthur Lewis Trading Circle</h1>
            <br><br>
            <div class="main-menu"></div>
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="about.php">About Us</a>
                </li>
                <li>
                    <a href="help.php">Help</a>
                </li>
                <li>
                    <a href="sell.php">Sell</a>
                </li>
            </ul>

        </header>
        <br><br>
    <div><h3>Most Recent Items</h3></div>
    <ul>
        <li>
            <div>
                <a href="">
                    <div><img src="" alt="Image Description"></div>
                    <div>
                        <h4>Product Title</h4>
                        <br>
                        <h5>Price</h5>
                    </div>                    
                </a>
            </div>
        </li>
        <li>
            <div>
                <a href="">
                    <div><img src="" alt="Image Description"></div>
                    <div>
                        <h4>Product Title</h4>
                        <br>
                        <h5>Price</h5>
                    </div>                    
                </a>
            </div>
        </li>
        <li>
            <div>
                <a href="">
                    <div><img src="" alt="Image Description"></div>
                    <div>
                        <h4>Product Title</h4>
                        <br>
                        <h5>Price</h5>
                    </div>                    
                </a>
            </div>
        </li>
        <li>
            <div>
                <a href="">
                    <div><img src="" alt="Image Description"></div>
                    <div>
                        <h4>Product Title</h4>
                        <br>
                        <h5>Price</h5>
                    </div>                    
                </a>
            </div>
        </li>
    </ul>
    <ul>
        <li>
            <div>
                <a href="">
                    <div><img src="" alt="Image Description"></div>
                    <div>
                        <h4>Product Title</h4>
                        <br>
                        <h5>Price</h5>
                    </div>                    
                </a>
            </div>
        </li>
        <li>
            <div>
                <a href="">
                    <div><img src="" alt="Image Description"></div>
                    <div>
                        <h4>Product Title</h4>
                        <br>
                        <h5>Price</h5>
                    </div>                    
                </a>
            </div>
        </li>
        <li>
            <div>
                <a href="">
                    <div><img src="" alt="Image Description"></div>
                    <div>
                        <h4>Product Title</h4>
                        <br>
                        <h5>Price</h5>
                    </div>                    
                </a>
            </div>
        </li>
        <li>
            <div>
                <a href="">
                    <div><img src="" alt="Image Description"></div>
                    <div>
                        <h4>Product Title</h4>
                        <br>
                        <h5>Price</h5>
                    </div>                    
                </a>
            </div>
        </li>
    </ul>
    <ul>
        <li>
            <div>
                <a href="">
                    <div><img src="" alt="Image Description"></div>
                    <div>
                        <h4>Product Title</h4>
                        <br>
                        <h5>Price</h5>
                    </div>                    
                </a>
            </div>
        </li>
        <li>
            <div>
                <a href="">
                    <div><img src="" alt="Image Description"></div>
                    <div>
                        <h4>Product Title</h4>
                        <br>
                        <h5>Price</h5>
                    </div>                    
                </a>
            </div>
        </li>
        <li>
            <div>
                <a href="">
                    <div><img src="" alt="Image Description"></div>
                    <div>
                        <h4>Product Title</h4>
                        <br>
                        <h5>Price</h5>
                    </div>                    
                </a>
            </div>
        </li>
        <li>
            <div>
                <a href="">
                    <div><img src="" alt="Image Description"></div>
                    <div>
                        <h4>Product Title</h4>
                        <br>
                        <h5>Price</h5>
                    </div>                    
                </a>
            </div>
        </li>
    </ul>
    <div>
        Page
        <br>
        <button disabled="disabled">1</button> <button>2</button> <button>3</button>
    </div>
    <br><br> 
    <footer>
        <table>
            <tr>
                <th style="font-style: oblique;">Buy</th>
                <td><a href=""></a></td>
                <td><a href=""></a></td>
                <td><a href=""></a></td>
            </tr>
            <tr>
            <th style="font-style: oblique;">Sell</th>
                <td><a href=""></a></td>
                <td><a href=""></a></td>
                <td><a href=""></a></td>
            </tr>
            <tr>
            <th style="font-style: oblique;">Help</th>
                <td><a href=""></a></td>
                <td><a href=""></a></td>
                <td><a href=""></a></td>
            </tr>
            <tr>
            <th style="font-style: oblique;">About Us</th>
                <td><a href=""></a></td>
                <td><a href=""></a></td>
                <td><a href=""></a></td>
            </tr>
            
        </table>
    </footer>  
</body>

</html>