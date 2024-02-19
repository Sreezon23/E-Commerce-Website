<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    //echo $edit_id;
    $get_data="Select * from `products` where product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_name=$row['product_name'];
    //echo $product_name;
    $product_description=$row['product_description'];
    $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];

    //// fetching category name ////
    $select_category="Select * from `categories` where category_id =$category_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_name=$row_category['category_name'];
    //echo $category_name;

    //// fetching brand name ////
    $select_brand="Select * from `brands` where brand_id =$brand_id";
    $result_brand=mysqli_query($con,$select_brand);
    $row_brand=mysqli_fetch_assoc($result_brand);
    $brand_name=$row_brand['brand_name'];
    //echo $brand_name;
}
?>

<div class="container mt-5">
    <h1 class="text-center">Edit Products</h1>
    <form action="" method="post" enctype="multipart/form-data"></form>
    <div class="form-outline w-50 m-auto mb-4">
        <label for="product_name" class="form-label">Product Title</label>
        <input type="text" id="product_name" value="<?php echo $product_name?>" name="product_name" 
        class="form-control" required="required">
    </div>
    <div class="form-outline w-50 m-auto mb-4">
        <label for="product_description" class="form-label">Product Description</label>
        <input type="text" id="product_description" value="<?php echo $product_description?>" 
        name="product_description" class="form-control" >
    </div>
    <div class="form-outline w-50 m-auto mb-4">
        <label for="product_keywords" class="form-label">Product Keywords</label>
        <input type="text" id="product_keywords" value="<?php echo $product_keywords?>"name="product_keywords" class="form-control">
    </div>
    <div class="form-outline w-50 m-auto mb-4">
    <label for="product_category" class="form-label">Product Categories</label>
        <select name="product_category" class="form-select">
        <option value="<?php echo $category_name?>"><?php echo $category_name?></option>
        <?php
         $select_category_all="Select * from `categories`";
         $result_category_all=mysqli_query($con,$select_category_all);
         while( $row_category_all=mysqli_fetch_assoc($result_category_all)){
            $category_name=$row_category_all['category_name'];
            $category_id=$row_category_all['category_id'];
            echo "<option value='$category_id'>$category_name</option>";
        }
         $category_name=$row_category['category_name'];
        ?>
        </select>
    </div>
    <div class="form-outline w-50 m-auto mb-4">
    <label for="product_brands" class="form-label">Product Brands</label>
        <select name="product_brands" class="form-select">
        <option value="<?php echo $brand_name?>"><?php echo $brand_name?></option>
        <?php
         $select_brand_all="Select * from `brands`";
         $result_brand_all=mysqli_query($con,$select_brand_all);
         while( $row_brand_all=mysqli_fetch_assoc($result_brand_all)){
            $brand_name=$row_brand_all['brand_name'];
            $brand_id=$row_brand_all['brand_id'];
            echo "<option value='$brand_id'>$brand_name</option>";
        }
         $brand_name=$row_brand['brand_name'];
        ?>
        </select>
    </div>
    <div class="form-outline w-50 m-auto mb-4">
        <label for="product_image1" class="form-label">Product Image1</label>
        <div class="d-flex">
        <input type="file" id="product_image1" name="product_image1" class="form-control w-50 m-auto" required="required">
        <img src="./product_images/<?php echo $product_image1?>" alt="" class="product_image">
        </div>
    </div>
    <div class="form-outline w-50 m-auto mb-4">
        <label for="product_image2" class="form-label">Product Image2</label>
        <div class="d-flex">
        <input type="file" id="product_image2" name="product_image2" class="form-control w-50 m-auto" required="required">
        <img src="./product_images/<?php echo $product_image2?>" alt="" class="product_image">
        </div>
    </div>
    <div class="form-outline w-50 m-auto mb-4">
        <label for="product_image3" class="form-label">Product Image3</label>
        <div class="d-flex">
        <input type="file" id="product_image3" name="product_image3" class="form-control w-50 m-auto" required="required">
        <img src="./product_images/<?php echo $product_image3?>" alt="" class="product_image">
    </div>
</div>
<div class="form-outline w-50 m-auto mb-4">
        <label for="product_price" class="form-label">Product Price</label>
        <input type="text" id="product_price" value="<?php echo $product_price?>"name="product_price" class="form-control"
        required="required">
    </div>
    <div class="text-center w-50 m-auto">
        <input type="submit" name="edit_product" value="Update Product"
        class="btn btn-info px-3 mb-3">
    </div>
</form>
</div>

<!-- editing products-->
<?php
if(isset($_POST['edit_product'])){
    $product_name=$_POST['product_name'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keyword'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_image1=$_FILES['product_image1'];
    $product_image2=$_FILES['product_image2'];
    $product_image3=$_FILES['product_image3'];
    $product_price=$_POST['product_price'];
    
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    //checking if field empty or not
    if($product_name=='' or $product_description=='' or $product_category=='' or $product_image1=='' or $product_image2=='' or 
    $product_image3=='' or $product_keywords='' or $product_price=='' or $product_brands==''){
        echo "<script> alert('Please fill all the fields and continue the process')</script>";
    }else{
        move_uploaded_file($temp_image1,"./product_img/$product_image1");
        move_uploaded_file($temp_image2,"./product_img/$product_image2");
        move_uploaded_file($temp_image3,"./product_img/$product_image3");

        //query to update products
        $update_product="update `products` set product_name='$product_name', product_description='$product_description', 
        product_keywords='$product_keywords', category_id='$product_category', brand_id='$product_brands',
        product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3',
        product_price='$product_price', date=NOW() where product_id=$edit_id";
        $result_update=mysqli_query($con,$update_product);
        if($result_update){
            echo"<script>alert('Product updated successfully')</script>";
            echo "<script>window.open('./insert_product.php','_self')</script>";
        }
    }
}
?>