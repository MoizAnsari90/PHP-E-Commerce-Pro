<?php include('connection.php');

$id= $_GET["deletbrand"];
echo $id;
$q= mysqli_query($con, "DELETE FROM `brand` WHERE bid = '$id'");

if($q)
{
    echo "<script>
        alert ('Delete Brand Successfully')
        loction.assign('index.php?Viewbrand')
    
    </script>";
}
?>

<?php 

$id = $_GET['deleteid'];
echo $id;

$query = mysqli_query($con , "DELETE FROM `brand` WHERE bid = '$id'");
if($query){
    echo "<script>
        alert ('Delete');
        location.assign('index.php?Viewbrand')
    </script>";
}


?>