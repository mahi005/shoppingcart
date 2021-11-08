


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Bakery|Login</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php  require 'partials/_nav.php' ?> 

    

    <div class="container">
    <main>

  <section class="theme-sec">
    <h1>Login</h1>
 
    <div class="details">
        
    <form action ="/new-bakery/login.php" method ="post">
    <div class="input-details">
     <label for="username" class="label">Username</label>
      <input type="text" class="form-control" id="username" name="username" required >
     </div>
     <div class="input-details">
      <label for="Password" class="label">Password</label>   
      <input type="password" class="form-control" id="Password" name ="password" required>
    </div>
  <button type ="submit" class ="button">Login</button>
  <br>
  <br>
  <?php


          $login = false;
         $showError = false;
         if($_SERVER["REQUEST_METHOD"] == "POST"){
         include 'partials/_dbconnect.php';
         $username = $_POST["username"];
         $password = $_POST["password"];

           $sql = "Select * from users where username = '$username' AND password = '$password'";
           $result = mysqli_query($conn, $sql);
           $num = mysqli_num_rows($result);
           if ($num == 1){
           $login = true;
           session_start();
           $_SESSION['loggedin'] = true;
           $_SESSION['username'] = $username;
           header("location: cart.php");
            }
          else{
             $showError = "Invalid Credentials";
            }

   }  
  ?>

<?php
    if($login){
      echo "Success! Your are logged in";
    }

    if($showError){
      echo "Error!. $showError.";
    }
    
    ?>
   
         </form>

 
    </div>

</section>
</main>

<footer>
<h3>New Bakery &copy; All rights reserved.</h3>
</footer>
</div>
    
</body>
</html>