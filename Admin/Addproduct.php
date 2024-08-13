<?php include('connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">ADD PRODUCT</div>
                        </div>
                        <div class="ibox-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label for="">Product Name</label>
                                        <input type="text" placeholder="Enter Name" required name="ProductName" class="form-control">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="">Product Price</label>
                                        <input type="text" placeholder="Enter Price" required name="ProductPrice" class="form-control">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="">Product Quantity</label>
                                        <input type="text" placeholder="Enter Quantity" required name="ProductQuantity" class="form-control">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="">Product Detail</label>
                                        <input type="text" placeholder="Enter Detail" required name="ProductDetail" class="form-control">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="">Select Category</label>
                                        <select name="SelectCategory" class="form-control" id="">
                                            <?php 
                                                $cat = mysqli_query($con, "SELECT * FROM `category`");
                                                while($row = mysqli_fetch_Array($cat)){
                                                    ?>
                                                        <option value="" hidden="true">Select Category</option>
                                                        <option value="<?php echo $row  [0]?>"><?php echo $row [1]?></option>
                                                <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="">Select Brand</label>
                                        <select name="SelectBrand" id="" class="form-control">
                                            <?php 
                                            $ban = mysqli_query($con , "SELECT * FROM `brand`");
                                            while($row1 = mysqli_fetch_Array($ban)){
                                                ?>
                                                    <option value="" hidden = "true">Select Brand</option>
                                                    <option value="<?php echo $row1[0]?>"><?php echo $row1[1]?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="">Product Image</label>
                                        <input type="file" value="filename"  required name="ProductImage" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">
                                        <input type="submit" value="save"  class="btn btn-success" name="btn">
                                </div>
                            </form>
                            <?php 
                                if(isset($_POST["btn"])){
                                    $ProductName = $_POST['ProductName'];
                                    $ProductPrice = $_POST['ProductPrice'];
                                    $ProductQuantity = $_POST['ProductQuantity'];
                                    $ProductDetail = $_POST['ProductDetail'];
                                    $brand_id = $_POST['SelectBrand'];
                                    $cat_id = $_POST['SelectCategory'];
                                    $ProductImage = $_FILES['ProductImage']['name'];
                                    $tmp_image = $_FILES['ProductImage']['tmp_name'];

                                    $target_dir = "proimage/";
                                    $target_file = $target_dir . basename($ProductImage);

                                    if(move_uploaded_file($tmp_image, $target_file)){
                                        $query = mysqli_query($con , "INSERT INTO `product`(`name`, `cat_id`, `brand_id`, `price`, `quantity`, `detail`, `image`, `status`) VALUES ('$ProductName','$cat_id','$brand_id','$ProductPrice','$ProductQuantity','$ProductDetail','$ProductImage','IN A STOCK')");

                                        if($query > 0){
                                            echo "$ProductName Your Data Save";
                                        }
                                        else
                                        {
                                            echo " Your Data Not Save";
                                        }
                                        }

                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>