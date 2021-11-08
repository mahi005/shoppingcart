<?php 
$showAlert = false;
$showError = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    
    
    //check whether this username exists
    $existSql = "SELECT * FROM `users` WHERE username = `$username`";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
    
      $showError ="Username already exists";
    }
    else{
    
    if($password == $cpassword){
     $sql = "INSERT INTO `users` ( `username`, `phone`, `address`, `password`, `dt`) VALUES ('$username', '$phone', '$address', '$password', current_timestamp())";
     $result = mysqli_query($conn, $sql);
     if($result){                                                                                                                                               
         $showeAlert = true;

     }
    }
    else{
      $showError = "password do not match";
    }
  }
}
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Bakery|SignUp</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
  
    <?php  require 'partials/_nav.php' ?>
    
    
    <div class="container">
    <main>

  <section class="theme-sec">
    <h1>SignUp</h1>
 
    <div class="details">

    <form action ="/new-bakery/signup.php" method ="post">
    
    <div class="input-details">
     <label for="username" class="label">Username</label>
      <input type="text" class="form-control" id="username" name="username" required >
     </div>
     <div class="input-details">
     <label for="phone" class="label">Phone no</label>
      <input type="number" class="form-control" id="phone" name="phone" required >
     </div>
     <div class="input-details">
     <label for="address" class="label">Address</label>
      <input type="text" class="form-control" id="address" name="address" required >
     </div>
     <div class="input-details">
      <label for="Password" class="label">Password</label>   
      <input type="password" class="form-control" id="Password" name ="password" required>
    </div>
    <div class="input-details">
      <label for="cpassword" class="label">Confirm Password</label>   
      <input type="password" class="form-control" id="cpassword" name ="cpassword" required>
    </div>
  <button type ="submit" class ="button">SignUp</button>

  <br>
  <?php 
    if($showAlert){
        echo 'Success!! Account is created';
    }
    if($showError){
      echo 'Error!!!';
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