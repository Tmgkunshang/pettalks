<div >
  <h2>All Customers</h2>
  <table class="table ">
    <thead>
      <tr>
        <th style="background-color: #ffc226; color: black;">S.N.</th>
        <th style="background-color: #ffc226; color: black;">Username </th>
        <th style="background-color: #ffc226; color: black;">Email</th>
        <th style="background-color: #ffc226; color: black;">Joining Date</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from users where isAdmin=0";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["username"]?></td>
      <td><?=$row["email"]?></td>
      <td><?=$row["registered_at"]?></td>
    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>
  </table>