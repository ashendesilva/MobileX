<?php

include "connection.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile X | Admin Panel | Product Register</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="adminRegBody">
    <?php
    include "adminNavBar.php";
    ?>

    <div class="pr">
        <h2 class="text-center productmanagement bname">Product Registration</h2>
        <div class="adminReg_Box">


            <div class="mb-3">
                <label class="form-label" for="pname">Product Name</label>
                <input id="pname" type="text" class="form-control">
            </div>

            <div class="row">
                <div class="mb-3 col-6">
                    <label class="form-label" for="brand">Brand</label>
                    <select class="form-select" id="brand">
                        <option value="0">Select</option>

                        <?php
                        $rs = Database::search("SELECT * FROM `brand`");
                        $num = $rs->num_rows;
                        for ($x = 0; $x < $num; $x++) {
                            $data = $rs->fetch_assoc();
                        ?>
                            <option value="<?php echo ($data["brand_id"]); ?>"><?php echo ($data["brand_name"]); ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                


            </div>

            <div class="row">
                <div class="mb-3 col-6">
                    <label class="form-label" for="color">Color</label>
                    <select class="form-select" id="color">
                        <option value="0">Select</option>

                        <?php
                        $rs = Database::search("SELECT*FROM `color`");
                        $num = $rs->num_rows;
                        for ($x = 0; $x < $num; $x++) {
                            $data = $rs->fetch_assoc();
                        ?>
                            <option value="<?php echo ($data["color_id"]); ?>"><?php echo ($data["color_name"]); ?></option>
                        <?php
                        }
                        ?>

                    </select>
                </div>

                <div class="mb-3 col-6">
                    <label class="form-label" for="condition">Condition</label>
                    <select class="form-select" id="condition">
                        <option value="0">Select</option>
                        <?php
                        $rs = Database::search("SELECT*FROM `condition`");
                        $num = $rs->num_rows;
                        for ($x = 0; $x < $num; $x++) {
                            $data = $rs->fetch_assoc();
                        ?>
                            <option value="<?php echo ($data["condition_id"]); ?>"><?php echo ($data["condition_name"]); ?></option>

                        <?php

                        }
                        ?>
                    </select>
                </div>

            </div>
            <div class="mb-3">
                <label for="form-label">Discription</label>
                <textarea class="form-control" name="" id="desc"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label" for="file">Product Image</label>
                <input id="file" class="form-control" type="file" multiple>
            </div>

            <div class="d-none" id="msgDiv5" onclick="reload();">
                    <div class="alert alert-danger" id="msg5"></div>
            </div>

            <div class="d-grid">
                <button class="btn btn-primary" onclick="regProduct();">Register Product</button>
            </div>

            <div>

            </div>

        </div>
    </div>








    <!-- Footer -->
    
    <!-- footer -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="script.js"></script>
</body>

</html>