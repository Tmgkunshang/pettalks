<div class="container">
    
  <h2>Product Reviews</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th style="background-color: #ffc226; color: black;">S.N.</th>
            <th style="background-color: #ffc226; color: black;">Product Image</th>
            <th style="background-color: #ffc226; color: black;">Product Name</th>
            <th style="background-color: #ffc226; color: black;">Reviewed By</th>
            <th style="background-color: #ffc226; color: black;">Review Description</th>
            <th style="background-color: #ffc226; color: black;">Review Date</th>
            <th style="background-color: #ffc226; color: black;">Action</th>
        </tr>
    </thead>
    <?php
        include_once "../config/dbconnect.php";
        $sql="select * from review, users, products where review.user_id=users.user_id and review.product_id=products.product_id";
        $result=$conn-> query($sql);
        $count=1;
        if ($result-> num_rows > 0){
            while ($row=$result-> fetch_assoc()) {
                
    ?>
                <tr>
                    <td><?=$count?></td>
                    
                    <td><img width="100px" height="80px" src="<?=$row["product_image"]?>"></td>
                    <td><?=$row["product_name"] ?></td>
                    <td><?=$row["username"] ?></td>
                    <td><?=$row["review_desc"]?></td>
                    <td><?=$row["review_date"]?></td>
                    <td><button class="btn btn-danger" style="background-color: #ffc226; color: black; border: 2px solid black;" borderonclick="reviewDelete('<?=$row['review_id']?>')">Delete</button></td>
                </tr>
    <?php
                $count=$count+1;
            }
        }else{
            echo "No data";
        }
    ?>
</table>
</div>
