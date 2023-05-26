<div class="container py-4">
<?php
session_start();
    if(isset($_SESSION['user_id']))
    {
      include_once "../config/dbconnect.php";
      $id=$_SESSION['user_id'];
      $sql="SELECT * from cart c, products p, product_size_variation v, sizes s where user_id=$id AND c.variation_id=v.variation_id AND v.product_id=p.product_id AND v.size_id=s.id";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
?>
  <h2>My Cart</h2>
  <table class="table ">
    <thead>
      <tr>
        <th style="background-color: black;" class="text-center">S.N.</th>
        <th style="background-color: black;" class="text-center">Product Image</th>
        <th style="background-color: black;" class="text-center">Product Name </th>
        <th style="background-color: black;" class="text-center">Size</th>
        <th style="background-color: black;" class="text-center">Quantity</th>
        <th style="background-color: black;" class="text-center">Price</th>
        <th style="background-color: black;" class="text-center">Action</th>
      </tr>
    </thead>
    <?php
     
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$count?></td>
      <td><img width='150px' height='100px' src='<?=$row["product_image"]?>'></td>
      <td><?=$row["product_name"]?></td>
      <td><?=$row["size_name"]?></td>
      <td>
        <button class="btn" onclick="quantityPlus('<?=$row['cart_id']?>')">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </button>
        <?=$row["quantity"]?>
        <button class="btn" onclick="quantityMinus('<?=$row['cart_id']?>')">
          <i class="fa fa-minus" aria-hidden="true"></i>
        </button>
      </td>
      <td><?=$row["price"]?></td>
      <td><button class="btn btn-danger" style="height:40px; background-color: black; border: 2px solid black" onclick="cartDelete('<?=$row['cart_id']?>')">Delete</button></td>
    </tr>
    <?php
            $count=$count+1; 
        }
   
    ?>
  </table>
  <button class="btn btn-success mb-4" style="height:40px; background-color: black; border: 2px solid black;" onclick="checkout()">Checkout</button>
<?php
 }else{
?>
  <div class="card-account card-container text-center mt-5 mb-5 py-4">
  Sorry, Your cart is empty!!
  <div class="btn">
      
      <a href="./index.php" title="Back To Home" class="btn btn-success">Continue Shopping</a>
      
  </div>
</div>
<?php
}

}else{
    ?>
    <div class="card-account card-container text-center mt-5 mb-5 py-4">
        Please, Login first to see your Cart Items!!
        <div class="cart-login-btn">
            
            <a href="./login.php" title="Login"><i class="fa fa-sign-in " aria-hidden="true"></i></a>
            
        </div>
    </div>
    <?php
}
    ?>
</div>