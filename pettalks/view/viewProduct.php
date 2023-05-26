<style>

.dropdown {
  position: relative;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #ffc226;
  min-width: 160px;
  box-shadow: white;
  z-index: 1;
  padding: 10px;
}

.dropdown-content button {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content button:hover {background-color: #fff;}

.dropdown:hover .dropdown-content {display: block;}
</style>

<?php
   include './config/dbconnect.php';

	$displayquery = "select * from products;";
    $querydisplay = mysqli_query($conn,$displayquery);
?>

<div id="demo" class="carousel slide mb-4" data-ride="carousel">
  <!-- The slideshow -->
  <div class="carousel-inner">
     
    <?php
     if ($querydisplay-> num_rows > 0){
      $count=0;
        while($result = mysqli_fetch_array($querydisplay))
        {
    
        if($count==0){ ?>

    <div class='carousel-item active' >

    <?php }else{ ?>

    <div class='carousel-item ' >

     <?php }   ?>
        <div class="row text-center py-5 pl-5">
            <div class="col pl-5">
                <img src="<?= $result['product_image']?>" style="object-fit:cover;" alt="New Arrivals" height="300px">
            </div>
            <div class="col mr-4">
                <div class="text-left mr-5">
                    <div style="background-color: #ffc226; color: black;" class="alert alert-success mr-5" role="alert">
                        Our Latest Arrivals!
                    </div>
                    <h2><?=$result['product_name']?></h2>
                    <h4>$ <?= $result['unit_price'] ?></h4>
                    <button class="btn btn-primary mt-3" style="height:40px; background-color: black;" onclick="eachDetailsForm('<?= $result['product_id']?>');">
                        View In Details
                    </button>

                </div>
            </div>
            
        </div>
    </div>
    
  <?php
        $count++;
        }
      }else{

        ?>
        <div class='carousel-item active' >

          <div style="height: 300px; display: flex; justify-content: center;  align-items: center; background-color: #cccccc;">
            <h1>New Products will Arrive Soon!!</h2>
          </div>
            

        </div>

        
        <?php
      }
    ?>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev" role="button">
    <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color:#c1de8b; "></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next" role="button">
    <span class="carousel-control-next-icon" aria-hidden="true" style="background-color:#c1de8b; "></span>
    <span class="sr-only">Next</span>
  </a>

</div>

<div class="container-fluid px-5">
    <div style="background-color: #ffc226; border: 2px solid black; color: black;" class="dropdown alert alert-info mx-5">
        <i  class="fa fa-bars" aria-hidden="true"></i> Our Products
        <div class="dropdown-content">
        <button type="submit" class="btn mt-1 mx-1" onclick="search(0)" style="height:40px;" >All</button>
    
        <?php

        $cquery = "SELECT * from category ";
        $all = mysqli_query($conn,$cquery);
        while($cres = mysqli_fetch_array($all))
        {
        ?> 
            <button type="submit" class="btn mt-1 mx-1" onclick="search('<?=$cres['category_id']?>')" style="height:40px;" ><?= $cres['category_name']?></button>
        <?php
        }
        ?>
        </div>
    </div>
   

    <div class="row px-5 py-4 eachCategoryProducts" >
    <?php

	    $query = "SELECT * from products ";
        $all = mysqli_query($conn,$query);
        while($res = mysqli_fetch_array($all))
        {
            $product_id=$res['product_id'];
            
    ?>
    <div class="col-sm-3" >
        <div class="card " style="height:25rem; ">
            <div class="box" >
                <img src="<?= $res['product_image']?>" class="image" >
                <div class="middle">
                    <div style="background-color: #ffc226; color: black; border: 2px solid black;" class="text" onclick="eachDetailsForm('<?= $res['product_id']?>');">View Details</div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis; "><?= $res['product_name']?></h5>
                <p style="color:green;">$ <?= $res['unit_price'] ?></p>
                <p class="card-text">
                    <form action="./controller/addToCartController.php" method="POST">
                        
                        <div class="form-group">
                        <label>Size:</label>
                        <select name="size" >
                            <option disabled selected>Select size</option>
                            <?php

                            $sql="SELECT * from product_size_variation v, products p, sizes s WHERE p.product_id=v.product_id AND v.size_id=s.id AND p.product_id=$product_id";
                            $result = $conn-> query($sql);

                            if ($result-> num_rows > 0){
                                while($row = $result-> fetch_assoc()){
                                echo"<option value='".$row['id']."'>".$row['size_name'] ."</option>";
                                }
                            }
                            ?>
                        </select>
                        </div>
                        <input type="hidden" name="id" value = "<?= $res['product_id'] ?>">
                        <input type="hidden" name="price" value = "<?= $res['unit_price'] ?>">
                        <?php
                        if(isset($_SESSION['user_id']))
                        {
                        ?>
                        <button style="background-color: black; border: 2px solid black;" type="submit" class="btn btn-danger" name="addToCart" style="height:50px;">Add To Cart</button>
                        <?php
                        }else{
                        ?>
                            <!-- Trigger the modal with a button -->
                            <button style="background-color: black; border: 2px solid black;" type="button" class="btn btn-danger" style="height:40px; " data-toggle="modal" data-target="#myModal">
                                Add To Cart
                            </button>
                        <?php
                        }
                        ?>
                    </form>
                </p>
               
            </div>
            
        </div>
    </div>
    <?php
        }
    ?>
   </div>


</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form class="form-signin" action="./controller/loginValidateController.php" method="post">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="usernameemail" class="form-control" placeholder="Username /Email address" required autofocus>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login-submit">Sign in</button>
            </form><!-- /form -->
            <p>Don't have an account? <a href="./register.php">Sign Up</a></p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

