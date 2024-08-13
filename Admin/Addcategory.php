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
                    <div class="ibox-head"><B>ADD CATEGORY</B></div>
                </div>
                <div class="ibox-body">
                    <form action="" method="Post">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control" name="catname" placeholder="Enter Category Name">
                        </div>
                        <div class="form-group ml-3">
                            <input type="Submit" class="btn btn-success" value="save" name="btn">
                        </div>
                    </div>
                    </form>

                    <?php
                            if(isset($_POST["btn"]))
                            {   
                                $catname = $_POST["catname"];
                                $query = mysqli_query($con , "INSERT INTO `Category` (`categoryname`) value ('$catname')");

                                if($query>0)
                                {
                                    echo "$catname Save Data";
                                }
                                else
                                {
                                   echo "Not Save ";
                                }
                            }
                    
                    
                    
                    
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>