<?php include('connection.php');

$id = $_GET['deleteid'];
 echo $id;

$q = mysqli_query($con , "DELETE FROM `product` where `pid` = '$id'");
{
    if($q)
    echo "<script>
        alert ('Delete Product Successfully')
        location.assign('index.php?Viewproduct')
    </script>";
}


?>

<?php
    $id = $_GET['deleteid'];
    echo $id;

    $query = mysqli_query($con , "DELETE FROM `product` where `pid` = '$id'");
    if($query){
        echo "<script>
        alert ('Delete Product Successfully')
        location.assign('index.php?Viewproduct')
        </script>";
    }


?>
