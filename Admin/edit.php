<?php include('connection.php'); 

if(isset($_GET["editid"]))
{
    $eid = $_GET["editid"];
    $q = mysqli_query($con , "SELECT  `p`.`pid`,`p`. `name`,`p`. `cat_id`, `p`.`brand_id`,`p`. `price`, `p`.`quantity`, `p`.`detail`,`p`. `image`,`p`. `status`
    FROM `product` AS `p`
    JOIN `category` AS `c` 
    ON c.id = `p`.`cat_id`
    JOIN `brand` AS `b`
    ON `b`.`bid`= `p`. `brand_id` WHERE `p`.`pid` = '$eid'");
    $row = mysqli_fetch_Array($q);
}




?>
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
                        <div class="ibox-title">ADD Product</div>
                    </div>
                    <div class="ibox-body">
                        <form action="" method="Post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label> Product Name</label>
                                    <input type="text" class="form-control" required name="Name" placeholder="Product Name">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label> Product Price</label>
                                    <input type="text" class="form-control" required name="Price" placeholder="Product Price">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label> Product Quantity</label>
                                    <input type="text" class="form-control" required name="Quantity" placeholder="Product Quantity">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label> Product Detail</label>
                                    <input type="text" class="form-control" required name="Detail" placeholder="Product Detail">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label> Select Category </label>
                                    <select name="SelectCategory" id="" class="form-control" >
                                        <?php 
                                            $cat = mysqli_query($con, "SELECT * FROM `Category`");
                                            while ($row1 = mysqli_fetch_Array($cat))
                                            {
                                                ?>
                                                    <option value="" hidden="true">Select Category</option>
                                                    <option value="<?php echo $row1[0] ?>"><?php echo $row1[1] ?></option>
                                            <?php }
                                        
                                        
                                        
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label> Select Brand</label>
                                    <select name="SelectBrand" id="" class="form-control" >
                                        <?php
                                            $fetchcat = mysqli_query($con, "SELECT * FROM `Brand`");
                                            while ($row = mysqli_fetch_Array($fetchcat))
                                            {
                                                ?>
                                                    <option value="" hidden="true">Select Brand</option>
                                                    <option value="<?php echo $row[0]?>"><?php echo $row[1]?></option>
                                            <?php }
                                        
                                        ?>
                                    </select>
                                    
                                </div>
                                <div class="col-sm-6 form-group">
                                <label><b>Image</b></label>
                                <input type="file" value="filename" name="image" class="form-control" placeholder="Enter Image">
                            </div>
                                
                            </div>
                            <div class="col-sm-6 form-group">
                                    <input type="Submit" class="btn btn-success" name="btn" value="Save">
                                </div>
                        </form>
                        <?php 
                            if(isset($_POST["btn"]))
                            {
                                $name = $_POST['Name'];
                                $price = $_POST['Price'];
                                $quantity = $_POST['Quantity'];
                                $detail = $_POST['Detail'];
                                $cat_id = $_POST['SelectCategory'];
                                $brand_id = $_POST['SelectBrand'];
                                $image = $_FILES['image']['name'];
                                $tmp_image = $_FILES['image']['tmp_name'];


                                move_uploaded_file($tmp_image, "proimage/" . $image);

                                $query = mysqli_query($con , "UPDATE `product` SET `name`='$name',`cat_id`=' $cat_id',`brand_id`=' $brand_id ',
                                `price`='$price',`quantity`='$quantity',`detail`='$detail',`image`='$image',`status`='In A Stock' WHERE `pid` = '$eid'");

                                if($query>0)
                                {
                                    echo "$name Save Date";
                                }
                                else
                                {
                                    echo "NOT SAVE DATA";
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