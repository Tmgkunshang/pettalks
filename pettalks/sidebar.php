<link rel="stylesheet" href="./assets/css/style.css">
<!-- Sidebar -->
<div class="sidebar" id="mySidebar" style="background-color: black;">
<div class="side-header">
    <img style="background-color: #ffc226; height: 100px; width: 200px;" src="./assets/images/pettalks.png" width="200" height="70" alt="Logo"> 
    <h5 style="margin-top:10px;">Dashboard</h5>
</div>


<hr style="border:1px solid #ffc226;; background-color: #ffc226;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="./dashboard.php" ><i class="fa fa-home"></i> Dashboard</a>
    <a href="#customers"  onclick="showCustomers()" ><i class="fa fa-users"></i> Customers</a>
    <a href="#category"   onclick="showCategory()" ><i class="fa fa-th-large"></i> Category</a>
    <a href="#sizes"   onclick="showSizes()" ><i class="fa fa-th"></i> Sizes</a>
    <a href="#productsizes"   onclick="showProductSizes()" ><i class="fa fa-th-list"></i> Product Sizes</a>    
    <a href="#products"   onclick="showProductItems()" ><i class="fa fa-th"></i> Products</a>
    <a href="#orders" onclick="showOrders()"><i class="fa fa-list"></i> Orders</a>
    <a href="#reviews" onclick="showReviews()"><i class="fa fa-pencil-square-o"></i> Reviews</a>
  
  <!---->
</div>
 
<div id="main">
    <button class="openbtn" style="background-color: black;" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>


