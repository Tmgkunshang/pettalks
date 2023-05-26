<div id="ordersBtn" >
  <h2>Order Details</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th style="background-color: #ffc226; color: black;">O.N.</th>
        <th style="background-color: #ffc226; color: black;">Customer</th>
        <th style="background-color: #ffc226; color: black;">Contact</th>
        <th style="background-color: #ffc226; color: black;">Order Note</th>
        <th style="background-color: #ffc226; color: black;">OrderDate</th>
        <th style="background-color: #ffc226; color: black;">Payment Method</th>
        <th style="background-color: #ffc226; color: black;">Order Status</th>
        <th style="background-color: #ffc226; color: black;">Payment Status</th>
        <th style="background-color: #ffc226; color: black;">More Details</th>
     </tr>
    </thead>
     <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from orders";
      $result=$conn-> query($sql);
      
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
       <tr>
          <td><?=$row["order_id"]?></td>
          <td><?=$row["delivered_to"]?></td>
          <td><?=$row["phone_no"]?></td>
          <td><?=$row["order_note"]?></td>
          <td><?=$row["order_date"]?></td>
          <td><?=$row["pay_method"]?></td>
           <?php 
                if($row["order_status"]==0){
                            
            ?>
                <td><button style="background-color: #ffc226; color: black; border: 2px solid black;" class="btn btn-danger" onclick="ChangeOrderStatus('<?=$row['order_id']?>')">Pending </button></td>
            <?php
                        
                }else{
            ?>
                <td><button style="background-color: #ffc226; color: black; border: 2px solid black;" class="btn btn-success" onclick="ChangeOrderStatus('<?=$row['order_id']?>')">Delivered</button></td>
        
            <?php
            }
                if($row["pay_status"]==0){
            ?>
                <td><button style="background-color: #ffc226; color: black; border: 2px solid black;" class="btn btn-danger"  onclick="ChangePay('<?=$row['order_id']?>')">Unpaid</button></td>
            <?php
                        
            }else if($row["pay_status"]==1){
            ?>
                <td><button style="background-color: #ffc226; color: black; border: 2px solid black;" class="btn btn-success" onclick="ChangePay('<?=$row['order_id']?>')">Paid </button></td>
            <?php
                }
            ?>
              
        <td><a style="background-color: #ffc226; color: black; border: 2px solid black;" class="btn btn-primary openPopup" data-href="./adminView/viewEachOrder.php?orderID=<?=$row['order_id']?>" href="javascript:void(0);">View</a></td>
        </tr>
    <?php
            
        }
      }
    ?>
     
  </table>
   
</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Order Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="order-view-modal modal-body">
        
        </div>
      </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
  </div>
<script>
     //for view order modal  
    $(document).ready(function(){
      $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
    
        $('.order-view-modal').load(dataURL,function(){
          $('#viewModal').modal({show:true});
        });
      });
    });
 </script>