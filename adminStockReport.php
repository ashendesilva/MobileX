<?php

session_start();
include("connection.php");

if (isset($_SESSION["a"])) {

    $rs = Database::search("SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
    ORDER BY `stock`.`stock_id` ASC ");
    $num = $rs->num_rows;

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mobile X | Admin Panel |Stock Report</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
    </head>


    <body class="adminSigninBody" id="body12">

        <div class="container mt-5">
            <div class="mb-3 mt-3 ">
                <a href="adminReport.php"><button class="btn btn-light">Back To Reports</button></a>
            </div>
            <div id="content1" class="">


                <div class="container-fluid pt-4 px-4">
                    <div class="bg-light text-center rounded p-4">
                        <h2 class="text-center " id="">Stock Report</h2>
                        <div class="table-responsive">
                            <table class="table text-start align-middle table-bordered table-hover mb-0">
                                <thead>
                                    <tr class="text-dark">
                                        <th scope="col">Stock ID</th>
                                        <th scope="col">Stock Name</th>
                                        <th scope="col">Stock Qty</th>
                                        <th scope="col">Unit Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    for ($i = 0; $i < $num; $i++) {

                                        $d = $rs->fetch_assoc();
                                    ?>
                                        <tr>
                                            <td><?php echo $d["stock_id"] ?></td>
                                            <td><?php echo $d["name"] ?></td>
                                            <td><?php echo $d["qty"] ?></td>
                                            <td><?php echo $d["price"] ?></td>
                                        </tr>

                                    <?php
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end container mt-5 mb-4">
                <button class="btn btn-primary col-2" onclick="stock();">Print</button>
            </div>


        </div>


        <!-- <script>
            const printBtn = document.getElementById('print');

            printBtn.addEventListener('click', function() {
                print();
            })
        </script> -->

        <script src="script.js"></script>
    </body>

    </html>


<?php


} else {
    echo ("YOUR NOT A VALID ADMIN");
}


?>