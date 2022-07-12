<?php include('conn.php'); ?>

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
        table {
            border: 1px solid #ddeeee;
            border-collapse: collapse;
            border-spacing: 0;
            width: 80%;
            margin: 10px auto 10px auto;
        }
        table thead th {
            background-color: #ddefef;
            border: 1px solid #ddeeee;
            color: #336b6b;
            padding: 10px;
            text-align: center;
            text-shadow: 1px 1px 1px #fff;
        }
        table tbody td {
            border: 1px solid #ddeeee;
            color: #333;
            padding: 15px;
            text-align: center;
        }
        a {
            background-color: salmon;
            color: #fff;
            padding: 10px;
            font-size: 15px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <center><h1>Product Data</h1></center>
    <center><a href="add_product.php">+ &nbsp; Add New Product</a></center> 
    <br>
    <table>
        <thead>
            <tr>
                <th>Number</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Purchase Price</th>
                <th>Selling Price</th>
                <th>Product Picture</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $sql = "SELECT * FROM product ORDER BY id ASC";
                $res = mysqli_query($conn, $sql);

                if(!$res) {
                    die("Query Error: ".mysqli_errno($conn)." - ".mysqli_error($conn));
                }
                $no = 1;

                while ($row = mysqli_fetch_assoc($res)) {
            ?>

            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row['pdname']; ?></td>
                <td><?php echo substr($row['pddesc'], 0, 20); ?>...</td>
                <td>IDR<?php echo number_format($row['phprice'], 0,',',','); ?>.00</td>
                <td>IDR<?php echo number_format($row['slprice'], 0,',',','); ?>.00</td>
                <td><img style="width: 120px;" src="pdpic/<?php echo $row['pdpic']; ?>"></td>
                <td>
                    <a href="edit_product.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="delete_data.php?id=<?php echo $row['id']; ?>" 
                    onclick="return confirm('Are you sure want to delete this product data?')">Delete</a>
                </td>
            </tr> 
            <?php

                $no++;
            }

            ?>

        </tbody>
    </table>
</body>
</html>