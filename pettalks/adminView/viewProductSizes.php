
<div >
  <h2>Product Items</h2>
  <table class="table ">
    <thead>
      <tr>
        <th style="background-color: #ffc226; color: black;">S.N.</th>
        <th style="background-color: #ffc226; color: black;">Product Name</th>
        <th style="background-color: #ffc226; color: black;">Size</th>
        <th style="background-color: #ffc226; color: black;">Stock Quantity</th>
        <th style="background-color: #ffc226; color: black;" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from product_size_variation v, products p, sizes s WHERE p.product_id=v.product_id AND v.size_id=s.id ";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["product_name"]?></td>
      <td><?=$row["size_name"]?></td>      
      <td><?=$row["stock_quantity"]?></td>     
      <td><button style="background-color: #ffc226; color: black; border: 2px solid black;" class="btn btn-primary" onclick="variationEditForm('<?=$row['variation_id']?>')">Edit</button></td>
      <td><button style="background-color: #ffc226; color: black; border: 2px solid black;" class="btn btn-danger" onclick="variationDelete('<?=$row['variation_id']?>')">Delete</button></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button style="background-color: #ffc226; color: black; border: 2px solid black;" type="button" class="btn btn-success " style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Size Variation
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Product Size Variation</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="./controller/addVariationController.php" method="POST">
            
            <div class="form-group">
              <label>Product:</label>
              <select name="product" >
                <option disabled selected>Select product</option>
                <?php

                  $sql="SELECT * from products";
                  $result = $conn-> query($sql);

                  if ($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                      echo"<option value='".$row['product_id']."'>".$row['product_name'] ."</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Size:</label>
              <select name="size" >
                <option style="color: black;" disabled selected>Select size</option>
                <?php

                  $sql="SELECT * from sizes";
                  $result = $conn-> query($sql);

                  if ($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                      echo"<option value='".$row['id']."'>".$row['size_name'] ."</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="qty">Stock Quantity:</label>
              <input type="number" class="form-control" name="qty" required>
            </div>
            <div class="form-group">
              <button style="background-color: #ffc226; color: black; border: 2px solid black;" type="submit" class="btn btn-success" name="upload" style="height:40px">Add Variation</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  
</div>
   