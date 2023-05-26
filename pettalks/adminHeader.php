<?php
   session_start();
   include_once "./config/dbconnect.php";

?>
       
 <!-- nav -->
 <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #ffc226;">
    
    <a class="navbar-brand ml-5" href="./index.php">
        <img src="./assets/images/pettalks.png" width="200" height="70" alt="">
    </a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      
    </ul>
    <div class="user-cart">             
        <a href=" <?php
        
                    if(isset($_SESSION['user_id'])){
                        echo'./profile.php';
                    } else {
                        echo'./login.php';
                    } ?>" style="text-decoration:none;">
            <i class="fa fa-user mr-5" style="font-size:30px; color:black;" aria-hidden="true"></i>
        </a>
    </div> 
  </div>
     
</nav>
