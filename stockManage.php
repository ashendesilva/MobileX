<?php

include "connection.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile X | Product Register | Admin Panel</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="adminRegBody">
    <?php
    include "adminNavBar.php";
    ?>

    <div class="pr">
        <h2 class="text-center productmanagement bname mb-4">Stock Management</h2>
        <div class="adminReg_Box">

            <div class="">

                <div class="mb-3">
                    <label for="" class="form-label">Product Name</label>
                    <select class="form-select" id="selectProduct">
                        <option value="">Select</option>

                        <?php
                        $rs = Database::search("SELECT * FROM `product`");
                        $num = $rs->num_rows;

                        for ($i = 0; $i < $num; $i++) {
                            $data = $rs->fetch_assoc();
                        ?>
                        <option value="<?php echo $data["id"] ?>"><?php echo $data["name"] ?></option>

                        <?php
                        }

                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Qty</label>
                    <input type="text" class="form-control" id="qty">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Unit Price</label>
                    <input type="text" class="form-control" id="uprice">
                </div>

                <div class="d-none" id="msgDiv6" onclick="reload();">
                    <div class="alert alert-danger" id="msg6"></div>
                </div>

                <div class="d-grid">
                    <button class="btn btn-primary" onclick="updateStock();">Update Stock</button>
                </div>


            </div>

        </div>
    </div>








  
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="script.js"></script>
</body>

</html>