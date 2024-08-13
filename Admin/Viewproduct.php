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
                            <div class="ibox-title">View Product</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sno</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Details</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Sno = 1;
                        $fetchpro = mysqli_query($con, "SELECT `pid`, `name`, `categoryname`, `brandname`, `price`, `quantity`, `detail`, `image`, `status` FROM `product` 
                        INNER JOIN 
                        category
                        ON
                        product.cat_id = category.id 
                        INNER JOIN 
                        brand 
                        ON 
                        product.brand_id = brand.bid");

                        while ($row = mysqli_fetch_Array($fetchpro))
                        {
                        ?>
                            <tr>
                                <td><?php echo $Sno; $Sno++ ?></td>
                                <td><?php echo $row[1]?></td>
                                <td><?php echo $row[2]?></td>
                                <td><?php echo $row[3]?></td>
                                <td><?php echo $row[4]?></td>
                                <td><?php echo $row[5]?></td>
                                <td><?php echo $row[6]?></td>
                                <td>
                                    <img src= "proimage/<?php echo $row[7]?>"  alt="" width="80px" height="80px">
                                </td>
                                
                                <td>
                                <a href="index.php?editid=<?php echo $row[0]?>" class="btn btn-success">Edit</a>
                                    <a href="index.php?deleteid=<?php echo $row[0]; ?>" class="btn btn-danger">Delete</a>
                                    
                                </td>
                            </tr>
                            
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
    </div>
</body>
</html>