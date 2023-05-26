<div class="container py-4">
    <div class="row">
        <div class="col-md-7">
            <?php
            session_start();
            if(isset($_SESSION['user_id']))
            {
            include_once "../config/dbconnect.php";
            $id=$_SESSION['user_id'];
            $sql="SELECT * from cart c, products p, product_size_variation v, sizes s where user_id=$id AND c.variation_id=v.variation_id AND v.product_id=p.product_id AND v.size_id=s.id";
            $result=$conn-> query($sql);
            $price=0;
            $total=0;
            $count=1;
            $product_id;
            if ($result-> num_rows > 0){
            ?>
            <h2>Checkout</h2>
            <table class="table ">
                <thead>
                <tr>
                    <td style="background-color: #ffc226;" class="text-center">S.N.</td>
                    <td style="background-color: #ffc226;" class="text-center">Product Image</td>
                    <td style="background-color: #ffc226;" class="text-center">Product Name </td>
                    <td style="background-color: #ffc226;" class="text-center">Size</td>
                    <td style="background-color: #ffc226;" class="text-center">Quantity</td>
                    <td style="background-color: #ffc226;" class="text-center">Price</td>
                </tr>
                </thead>
                <?php
                
                    while ($row=$result-> fetch_assoc()) {
                    
                ?>
                <tr>
                <td><?=$count?></td>
                <td><img width='150px' height='100px' src='<?=$row["product_image"]?>'></td>
                <td><?=$row["product_name"]?></td>
                <td><?=$row["size_number"]?></td>
                <td><?=$row["quantity"]?></td>
                <td><?=$row["price"]?></td>
                </tr>
                <?php
                        $count=$count+1; 
                        $price=$row["quantity"]*$row["price"];
                        $total=$total+$price;

                        $product_id=$row["product_id"];
                    }
                    
                    
                ?>
            </table>
            <?php
             }
            }
            ?>
        </div>
        <div class="col-md-5">
            <div class="card-account card-container py-5">
                <form class="form-signin" action="./controller/confirmOrderController.php" method="post">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Delivered to" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" class="form-control" placeholder="Address" required autofocus>
                    </div>
                    <div class="form-group">
                        <input type="number" name="contact" class="form-control" placeholder="Contact Number" required>
                    </div>
                    <div class="form-group">
                        <textarea name="note" class="form-control" placeholder="Order Note (if any)"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Total Price: $ <?= $total ?></label>
                    </div>
                    <div class="form-group">
                        <label>SELECT PAYMENT METHOD<label>
                    </div>
                    
                    <div class="form-group">
                        <input type="radio" id="show" name="pay" value="Debit or Credit" required> Debit or Credit card <br> 
                           
                         
                    </div>
                    <button class="btn btn-primary"  style="height:40px; display:none; background-color: black; border: 2px solid black;" type="submit" id="by-cash" name="orderConfirm">Confirm Order</button>
                 
                   </form><!-- /form -->
                   <button class="btn btn-primary" style="height:40px; display:none; background-color: black; border: 2px solid black;" id="payment-button">Confirm Order</button>
     
   
    <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_c8b467f707854a4095980ce976e95624",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "credit or debit",

                ],
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    console.log(payload);                    
                    window.location.href = "http://localhost/pettalks/payment_success.php";
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            
            checkout.show({amount: <?= $total ?>});
        }



        var cash = document.getElementById("by-cash");

        function handleRadioClick() {
        if (document.getElementById('show').checked) {
            btn.style.display = 'none';
            cash.style.display = 'block';
        } 
        }

        const radioButtons = document.querySelectorAll('input[name="pay"]');
        radioButtons.forEach(radio => {
        radio.addEventListener('click', handleRadioClick);
        });
    </script>
    
            </div><!-- /container -->
        
        </div><!-- /col-md-5 -->
    </div><!-- /row -->
</div>