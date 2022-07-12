<?php include('conn.php'); 

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM product WHERE id='$id'";
        $res = mysqli_query($conn, $sql);

        if(!$res) {
            die("Query Error: ".mysqli_errno($conn)." - ".mysqli_error($conn));
        }
        $data = mysqli_fetch_assoc($res);

        if(!count($data)) {
            echo "<script>alert('Data Not Found In Product Table!');window.location='index.php';</script>"; 
        }

    } else {
        echo "<script>alert('Enter the Product ID You Want to Edit!');window.location='index.php';</script>"; 
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD TABLE</title>
    <style type="text/css">
        * {
            font-family: "Trebuchet MS";
        }
        h1 {
            text-transform: uppercase;
            color: salmon;
        }
        .base {
            width: 400px;
            padding: 20px;
            margin-left: auto;
            margin-right: auto;
            background-color: #ededed;
        }
        label {
            margin-top: 10px;
            float: left;
            text-align: left;
            width: 100%;
        }
        input {
            padding: 6px;
            width: 100%;
            box-sizing: border-box;
            background-color: #f8f8f8;
            border: 2px solid #ccc;
            outline-color: salmon;
        }
        button {
            background-color: salmon;
            color: #fff;
            padding: 10px;
            font-size: 15px;
            border: 0;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <center><h1>EDIT PRODUCT <?php echo $data['pdname']; ?></h1></center>
    <form method="POST" action="edit_data.php" enctype="multipart/form-data">
    <section class="base">
        <div>
            <label>Product Name</label>
            <input type="text"  name="pdname" autofocus="" required="" value="<?php echo $data['pdname']; ?>" />
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
        </div>
        <div>
            <label>Product Description</label>
            <input type="text"  name="pddesc" value="<?php echo $data['pddesc']; ?>" />
        </div>
        <div>
            <label>Purchase Price</label>
            <input type="text"  name="phprice" required="" value="<?php echo $data['phprice']; ?>" />
        </div>
        <div>
            <label>Selling Price</label>
            <input type="text"  name="slprice" required="" value="<?php echo $data['slprice']; ?>" />
        </div>
        <div>
            <label>Product Picture</label>
            <img src="pdpic/<?php echo $data['pdpic']; ?>" style="width: 120px; float: left; margin-bottom: 5px;">
            <input type="file"  name="pdpic" />
            <i style="float: left; font-size: 11px; color: red;">Ignore If You Do Not Want to Change the Product Picture!</i>
        </div>
        <div>
            <br>
            <button type="submit">Save Changes</button>
        </div>
    </section>
    </form>
</body>
</html>