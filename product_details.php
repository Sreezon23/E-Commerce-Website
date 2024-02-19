<!-- connection file -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-quiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.
    0">
    <title>Web Mart</title>
    <!-- bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" 
    referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-info bg-info"> 

    <div class="container-fluid">
        <img src="./images/logo.png" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-shopping-cart"></i><sup><?php cart_item();?></sup></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Total Price: <?php total_cart_price();?>/-</a>
        </li>
        
      </ul>
      <form class="d-flex" action="search_products.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>
<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
    <!-- <li class="nav-item">
        <a class="nav-link" href="#">Welcome Guest</a>
        </li> -->
        <!-- <li class="nav-item">
        <a class="nav-link" href="./users_area/user_login.php">Login</a>
        </li> -->
        <?php
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
          </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a></li>";
        }
if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link' href='./users_area/user_login.php'>Login</a></li>";
}else{
  echo "<li class='nav-item'>
  <a class='nav-link' href='./users_area/logout.php'>Logout</a></li>";
}
        ?>

    </ul>
</nav>

<!-- third child -->
<div class="bg-light">
    <h3 class="text-center">Web Mart</h3>
    <p class="text-center"> Your satisfaction is our concern</p>
</div>

<!-- fourth child -->
<div class="row px-1">
    <div class="col-md-10"> 
    
<!--fetching products-->
    <?php
//calling function
cart();
view_detail();
get_unique_categories();
get_unique_brands();

// $select_query="Select * from `products` order by rand()";
// $result_query=mysqli_query($con,$select_query);
// //$row=mysqli_fetch_assoc($result_query);
// //echo $row['product_name'];
// while($row=mysqli_fetch_assoc($result_query)){
//   $product_id=$row['product_id'];
//   $product_name=$row['product_name'];
//   $product_description=$row['product_description'];
//   $product_image1=$row['product_image1'];
//   $product_price=$row['product_price'];
//   $category_id=$row['category_id'];
//   $brand_id=$row['brand_id'];
//   echo "<div class='col-md-4 mb-2'>
//   <div class='card'>
//               <img class='card-img-top' src='./admin_area/product_img/$product_image1' alt='$product_name'>
//               <div class='card-body'>
//                 <h5 class='card-title'>$product_name</h5>
//                 <p class='card-text'>$product_description</p>
//                 <a href='#' class='btn btn-info'>Add to Cart</a>
//                 <a href='#' class='btn btn-Secondary'>View More</a>
//               </div>
//     </div>
//   </div>";
// }
    ?>
      <!-- <div class="col-md-4 mb-2">
        <div class="card">
                    <img class="card-img-top" src="./images/Black_Wallet.png" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-info">Add to Cart</a>
                      <a href="#" class="btn btn-Secondary">View More</a>
                    </div>
          </div>
        </div> -->

<!--row end-->
</div>
<!--col end-->
</div>
    
<div class="col-md-2 bg-secondary p-0">
  <ul class="navbar-nav me-auto text-center ">
    <!--brands to be displayed-->
    <li class="nav-item bg-info">
      <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
</li>
<?php
getbrands();
// $select_brands="Select * from  `brands`";
// $result_brands=mysqli_query($con,$select_brands);
// // $row_data=mysqli_fetch_assoc($result_brands);
// // echo $row_data['brand_name'];
// while($row_data=mysqli_fetch_assoc($result_brands)){
//   $brand_name=$row_data['brand_name'];
//   $brand_id=$row_data['brand_id'];
//   echo "<li class='nav-item'>
//   <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_name</a>
// </li>";
// }
?>

</ul>
<!--categories to be displayed--> 
<ul class="navbar-nav me-auto text-center ">
    <!--brands to be displayed-->
    <li.nav-item.bg-info>
      <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
</li>
<?php
getcategories();
// $select_categories="Select * from  `categories`";
// $result_categories=mysqli_query($con,$select_categories);
// // $row_data=mysqli_fetch_assoc($result_brands);
// // echo $row_data['brand_name'];
// while($row_data=mysqli_fetch_assoc($result_categories)){
//   $category_name=$row_data['category_name'];
//   $category_id=$row_data['category_id'];
//   echo "<li class='nav-item'>
//   <a href='index.php?category=$category_id' class='nav-link text-light'>$category_name</a>
// </li>";
// }
?>

</ul>
</div>

<!--last child-->
<?php 
include("./includes/footer.php")
?>

</div>
<!--bootstrap js link --> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
<html>