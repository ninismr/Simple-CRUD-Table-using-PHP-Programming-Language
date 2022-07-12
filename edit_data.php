<?php 
    include('conn.php');

    $id = $_POST['id'];
    $pdname = $_POST['pdname'];
    $pddesc = $_POST['pddesc'];
    $phprice = $_POST['phprice'];
    $slprice = $_POST['slprice'];
    $pdpic = $_FILES['pdpic']['name'];

    if($pdpic != "") {
        $allowed_extensions = array('png', 'jpg', 'jpeg');
        $x = explode('.', $pdpic);
        $ext = strtolower(end($x));
        $file_tmp = $_FILES['pdpic']['tmp_name'];
        $random_num = rand(1, 999);
        $newpic_name = $random_num.'-'.$pdpic;

        if(in_array($ext, $allowed_extensions) === true) {
            move_uploaded_file($file_tmp, 'pdpic/'.$newpic_name);

            $sql = "UPDATE product SET pdname = '$pdname', pddesc = '$pddesc', phprice = '$phprice', 
            slprice = '$slprice', pdpic = '$newpic_name'";
            $sql .= "WHERE id = '$id'";
            $res = mysqli_query($conn, $sql);

            if(!$res) {
                    die("Query Error: ".mysqli_errno($conn)." - ".mysqli_error($conn));
            } else {
                echo "<script>alert('Data Modified Successfully!');window.location='index.php';</script>";
            }

        } else {
            echo "<script>alert('Image Extension Can Only in PNG, JPG, and JPEG!');window.location='edit_product.php';</script>";
        }

    } else {
        $sql = "UPDATE product SET pdname = '$pdname', pddesc = '$pddesc', phprice = '$phprice', 
        slprice = '$slprice'";
        $sql .= "WHERE id = '$id'";
        $res = mysqli_query($conn, $sql);

        if(!$res) {
                die("Query Error: ".mysqli_errno($conn)." - ".mysqli_error($conn));
        } else {
            echo "<script>alert('Data Modified Successfully!');window.location='index.php';</script>";
        }
    }
?>