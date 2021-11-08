<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Bakery | Home</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
 <div class="container">

    <header>
    <h1>New Bakery</h1>
            <nav>
                <ul>
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="./about.php">About</a></li>
                    <li><a href="./contact.php">Contact</a></li>
                    <li><a href="./cart.php"><img src="./src/icon/cart.svg">Cart</a></li>
                    <li><a href="./login.php">Login</a></li>
                    <li><a href="./signup.php">SignUp</a></li>
                    <li><a href="./logout.php">Logout</a></li>
                   
                </ul>
            </nav>


            
            <div class = "mobile-view">
            <div class="hamberger-menu" onclick ="menu()">
                
            
            </div>  
            <div class = "menu">
                <ul>
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="./about.php">About</a></li>
                    <li><a href="./contact.php">Contact</a></li>
                    <li><a href="./login.php">Login</a></li>
                    <li><a href="./signup.php">SignUp</a></li>
                    <li><a href="./logout.php">Logout</a></li>
                    <li><a href="./cart.php"><img src="./src/icon/cart.svg">Cart</a></li>
                </ul>
            </div>
           </div>
    </header>
   </div>  
   
   <script>
        function menu() {
            document.querySelector('.hambergerIcon').classList.toggle("open")

            if(document.querySelector('.hambergerIcon').classList.contains("open"))                
                document.querySelector('.menu').style.transform = "translateX(0)"
            else
                document.querySelector('.menu').style.transform = "translateX(-100%)"
        }
   </script>
</body>
</html>