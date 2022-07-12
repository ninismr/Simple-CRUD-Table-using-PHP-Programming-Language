<?php 
include('conn.php');
$id = $_GET['id'];

$sql = "DELETE FROM product WHERE id = '$id'";
$res = mysqli_query($conn, $sql);

if(!$res) {
    die("Query Error: ".mysqli_errno($conn)." - ".mysqli_error($conn));
} else {
    echo "<script>alert('Data Deleted Successfully!');window.location='index.php';</script>";
}
?>