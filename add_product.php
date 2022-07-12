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
    <center><h1>ADD NEW PRODUCT</h1></center>
    <form method="POST" action="add_data.php" enctype="multipart/form-data">
    <section class="base">
        <div>
            <label>Product Name</label>
            <input type="text"  name="pdname" autofocus="" required="" />
        </div>
        <div>
            <label>Product Description</label>
            <input type="text"  name="pddesc" />
        </div>
        <div>
            <label>Purchase Price</label>
            <input type="text"  name="phprice" required="" />
        </div>
        <div>
            <label>Selling Price</label>
            <input type="text"  name="slprice" required="" />
        </div>
        <div>
            <label>Product Picture</label>
            <input type="file"  name="pdpic" required="" />
        </div>
        <div>
            <button type="submit">Save Data</button>
        </div>
    </section>
    </form>
</body>
</html>