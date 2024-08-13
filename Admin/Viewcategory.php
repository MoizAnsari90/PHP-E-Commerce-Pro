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
                        <div class="ibox-title"> <b>View Category</b></div>
                    </div>
                </div>
                <div class="ibox-body">
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sno</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $Sno = 1;
                                $cat = mysqli_query($con, "SELECT * FROM `Category` ");
                                while ($row = mysqli_fetch_Array($cat))
                                {
                                    ?>
                                        <tr>
                                            <td><?php echo $Sno; $Sno++?></td>
                                            <td><?php echo $row[1]?></td>
                                            <td>
                                                <a href="" class="btn btn-success">Edit</a>
                                                <a href="index.php?deletcat=<?php echo $row[0]?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                <?php } ?>
                        </tbody>
                      
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>