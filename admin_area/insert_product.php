<?php
include('../includes/connect.php');
if (isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $product_keywords=$_POST['product_keywords'];
    $product_categories=$_POST['product_categories'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    //accessing images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    //accessing image tmp name
    $tmp_image1=$_FILES['product_image1']['tmp_name'];
    $tmp_image2=$_FILES['product_image2']['tmp_name'];
    $tmp_image3=$_FILES['product_image3']['tmp_name'];

    //checking empty condition
    if ($product_title=='' or $description=='' or $product_keywords=='' or $product_categories=='' or $product_brands=='' 
    or $product_price=='' or $product_image1=='' or $product_image2==''or $product_image3==''){
        echo "<script> alert ('Please fill all available fields') </script>";
        exit();
    }else{
        move_uploaded_file($tmp_image1,"./product_img/$product_image1");
        move_uploaded_file($tmp_image2,"./product_img/$product_image2");
        move_uploaded_file($tmp_image3,"./product_img/$product_image3");

        //insert query
        $insert_products= "insert into `products` (product_name,product_description,product_keywords,category_id,brand_id,product_image1,
        product_image2,product_image3,product_price,insert_date,product_status) values ('$product_title','$description','$product_keywords',
        '$product_categories','$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script>alert('Successfully inserted the products')</script>";

        } 
    }

}
?>
<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-quiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.
    0">
    <title>insert Products-Admin Dashboard</title>
        <!--bootstrap css link--> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<!-- font awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" 
referrerpolicy="no-referrer" />

<!--css file--> 
<link rel="stylesheet" href="../style.css">
</head>
<body class="bg-lite">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!--form-->
        <form actions="" method="post" enctype="multipart/form-data">
            <!--title-->
            <div class="form outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Name</label>
                <input type="text" name="product_title" id="product_name" class="form-control" placeholder="Enter Product Name" autocomplete="off" required="required">
            </div>
            <!--description-->
            <div class="form outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required">
            </div>
            <!--keywords-->
            <div class="form outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Product Keywords" autocomplete="off" required="required">
            </div>
            <!--categories-->
            <div class="form outline mb-4 w-50 m-auto">
                <select name="product_categories" id="" class="form-select">
                    <option value="">Select a Category</option>
                    <?php
                        $select_query="Select * from `categories`";
                        $result_query=mysqli_query($con,$select_query);
                        while ($row=mysqli_fetch_assoc($result_query)){
                            $category_name=$row["category_name"];
                            $category_id=$row["category_id"];
                            echo "<option value='$category_id'>$category_name</option>";
                        }
                    ?>

                </select>
            </div>
            <!--Brands-->
            <div class="form outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                    <option value="">Select a Brand</option>
                    <?php
                        $select_query="Select * from `brands`";
                        $result_query=mysqli_query($con,$select_query);
                        while ($row=mysqli_fetch_assoc($result_query)){
                            $brand_name=$row["brand_name"];
                            $brand_id=$row["brand_id"];
                            echo "<option value='$brand_id'>$brand_name</option>";
                        }
                    ?>
                </select>
            </div>
            <!--Image 1-->
            <div class="form outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>
            <!--Image 2-->
            <div class="form outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>
            <!--Image 3-->
            <div class="form outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>
            <!--price-->
            <div class="form outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required="required">
            </div>
            <!--price-->
            <div class="form outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
            </div>
        </form>
    </div>
</body>
</html>