<?php include('connection.php');

$id = $_GET["deletcat"];
echo $id;
$q= mysqli_query($con, "DELETE FROM  `category` WHERE id = '$id'");
if($q)
{
    echo "<script>
        alert ('Delete Successfuly')
        location.assign('index.php?Viewcategory')
    </script>";
}


?>