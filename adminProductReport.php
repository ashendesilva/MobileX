<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {



    $rs = Database::search("SELECT * FROM `product` 
    INNER JOIN `brand` ON `product`.`brand_id`=`brand`.`brand_id` 
    INNER JOIN `color` ON `product`.`color_id`=`color`.`color_id` 
    INNER JOIN `condition` ON `product`.`condition_id`=`condition`.`condition_id` ORDER BY `product`.`id` ASC");


    $num = $rs->num_rows;
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <title>Mobile X | Admin Panel | Product Report</title>
    </head>

    <body class="product_report" id="body12">

            <div class="mb-3 mt-3 container">
                <a href="adminReport.php"><button class="btn btn-light">Back To Reports</button></a>
            </div>

        <div>
            <div class="container mt-3 table-responsive" id="printArea">

                <table class="table text-start align-middle table-bordered table-hover mb-0" >
                    <h2 class="text-center bname mb-3">Product Report</h2>
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Brand Name</th>
                            <th>Color</th>
                            <th>Condition</th>
                            <th>Description</th>
                            <th>Image</th>

                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                        ?>
                            <tr>
                                <td><?php echo $d["id"] ?></td>
                                <td><?php echo $d["name"] ?></td>
                                <td><?php echo $d["brand_name"] ?></td>
                                <td><?php echo $d["color_name"] ?></td>
                                <td><?php echo $d["condition_name"] ?></td>
                                <td><?php echo $d["description"] ?></td>
                                <td><img src="<?php echo $d["path"] ?>" height="100" /></td>
                            </tr>

                        <?php
                        }

                        ?>
                    </tbody>
                </table>
                
            </div>
            <div class="container mt-3 d-flex justify-content-end mb-5">
                    <button class="btn btn-primary col-2" onclick="productReport()">Print</button>
                </div>


        </div>



        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>

    </html>

<?php
} else {
    echo ("You are not a valid admin");
}

?>