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
                        <div class="ibox-title">ADD BRAND</div>
                    </div>
                    <div class="ibox-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="">Enter Brand Name</label>
                                    <input type="text" placeholder = "Brand Name" name ="bname" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" value="save" name="btn" class="btn btn-success">
                                </div>
                            </div>
                        </form>
                        <?php
                        if(isset($_POST["btn"])){
                            $bname = $_POST["bname"];
                            $query = mysqli_query($con , "INSERT INTO `brand`(`brandname`) VALUES ('$bname')");
                            if($query < 0){
                                echo "$bname Your Data Is Save";
                            }
                            else{
                                echo "Your Data Is Not Save";
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