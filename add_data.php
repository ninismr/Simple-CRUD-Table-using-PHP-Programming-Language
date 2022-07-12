<?php 
    include('conn.php');

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

            $sql = "INSERT INTO product (pdname, pddesc, phprice, slprice, pdpic) VALUES 
            ('$pdname', '$pddesc', '$phprice', '$slprice', '$newpic_name')";
            $res = mysqli_query($conn, $sql);

            if(!$res) {
                    die("Query Error: ".mysqli_errno($conn)." - ".mysqli_error($conn));
            } else {
                echo "<script>alert('Product Data Added Successfully!');window.location='index.php';</script>";
            }

        } else {
            echo "<script>alert('Image Extension Can Only in PNG, JPG, and JPEG!');window.location='add_product.php';</script>";
        }

    } else {
        $sql = "INSERT INTO product (pdname, pddesc, phprice, slprice) VALUES 
        ('$pdname', '$pddesc', '$phprice', '$slprice')";
        $res = mysqli_query($conn, $sql);

        if(!$res) {
                die("Query Error: ".mysqli_errno($conn)." - ".mysqli_error($conn));
        } else {
            echo "<script>alert('Product Data Added Successfully!');window.location='index.php';</script>";
        }
    }
?>