<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Bakery | Contact Us</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php  require 'partials/_nav.php' ?>
    <div class="container">

        <main>

            <section class="theme-sec">
                <h1>Contacts</h1>
             
                <div class="contact">
                    
                              
                             <form action ="contact.php" method ="post">
    
                                  <input type="text" name="name" placeholder="Your Name" >
                                  <input type="email"   name="email" placeholder="Your Email" >
                                  <input type="number" name="phone"  placeholder="Your Phone-no" >
                                  <textarea type="text"  name="desc" placeholder="Your Message" ></textarea>
                                <button type="submit"  class="btn">Send Message</button>
                                <br>
                                <br>

                                                                
      <?php
           if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone =$_POST['phone'];
            $desc = $_POST['desc'];

        


          //connecting to the database----------------

        
            $server = "localhost";
            $username = "root";
            $password = "";
            $database = "contacts";
       
            //create a connection-----------
           $conn = mysqli_connect($server, $username, $password, $database);

           if(!$conn){
           die("Error". mysqli_connect_error());
           
          }
          else{
            //submit these to database
            
          
           $sql = "INSERT INTO `contactus` (`name`, `email`, `phone`, `concern`, `dt`) VALUES ('$name', '$email', '$phone', '$desc', current_timestamp())";
            $result = mysqli_query($conn,$sql);

            if($result){
              echo "The data has been inserted successfully!";
            }
            else{
              echo "The data was not inserted successfully".mysqli_error($conn);
            }
          }


      } 
     ?>   
  

                             </form>  
    


                        <img src="./src/hot fresh buns.jpg" alt="image">
             
                </div>

            </section>
        </main>

        <footer>
            <h3>New Bakery &copy; All rights reserved.</h3>
        </footer>
    </div>
    
</body>
</html>