<?php

session_start();
include "connection.php";
$user = $_SESSION["e"];
$orderHistoryId = $_GET["orderId"];

$rs = Database::search("SELECT * FROM `order_history` WHERE `ohid` = '" . $orderHistoryId . "'");
$num = $rs->num_rows;

if ($num > 0) {
    $d = $rs->fetch_assoc();
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mobile X | Invoice</title>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="mb-3 mt-3 container">
            <a href="index.php"><button class="btn btn-dark">Back To Home</button></a>
        </div>
        <div class="container mb-4" id="invoiceprint">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="invoice-title">
                                <h4 class="float-end font-size-15">Invoice #<?php echo $d["order_id"] ?> <span class="badge bg-success font-size-12 ms-2">Paid</span></h4>
                                <div class="mb-4">
                                    <h2 class="mb-1 text-muted">MobileX.lk</h2>
                                </div>
                                <div class="text-muted">
                                    <p class="mb-1">No: 40 Main Road, Dehiwala, Colombo 05.</p>
                                    <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> mobilex@gmail.com</p>
                                    <p><i class="uil uil-phone me-1"></i> +94-76-115-115</p>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="text-muted">
                                        <h5 class="font-size-16 mb-3">Billed To:</h5>
                                        <h5 class="font-size-15 mb-2"><?php echo $user["fname"] ?> <?php echo $user["lname"] ?></h5>
                                        <p class="mb-1"><?php echo $user["line_1"] ?> <?php echo $user["line_2"] ?></p>
                                        <p class="mb-1"><?php echo $user["email"] ?> </p>
                                        <p><?php echo $user["mobile"] ?> </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-muted text-sm-end">
                                        <div>
                                            <h5 class="font-size-15 mb-1">Invoice No:</h5>
                                            <p>#<?php echo $d["order_id"] ?></p>
                                        </div>
                                        <div class="mt-4">
                                            <h5 class="font-size-15 mb-1">Invoice Date:</h5>
                                            <p><?php echo $d["order_date"] ?></p>
                                        </div>

                                    </div>
                                </div>
                                <hr>
                            </div>

                            <div class="py-2">
                                <h5 class="font-size-15">Order Summary</h5>

                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th style="width: 70px;"><?php $p ?></th>
                                                <th>Item</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th class="text-end" style="width: 120px;">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            $rs2 =  Database::search("SELECT * FROM `order_item` INNER JOIN `stock` 
                                        ON `order_item`.`stock_stock_id` = `stock`.`stock_id` 
                                        INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` 
                                        INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`brand_id` 
                                        INNER JOIN `condition` ON `product`.`condition_id` = `condition`.`condition_id` 
                                        WHERE `order_item`.`order_history_ohid` = '" . $orderHistoryId . "'");

                                            $num2 = $rs2->num_rows;

                                            for ($i = 0; $i < $num2; $i++) {
                                                $d2 = $rs2->fetch_assoc();
                                            ?>
                                                <tr>
                                                    <th scope="row"><?php  ?></th>
                                                    <td>
                                                        <div>
                                                            <h5 class="text-truncate font-size-14 mb-1"><?php echo $d2["name"] ?></h5>
                                                        </div>
                                                    </td>
                                                    <td>LKR. <?php echo $d2["price"] ?></td>
                                                    <td><?php echo $d2["oi_qty"] ?></td>
                                                    <td class="text-end">LKR. <?php echo $d2["price"] ?> * <?php echo $d2["oi_qty"] ?></td>
                                                </tr>

                                            <?php
                                            }
                                            ?>






                                            <tr>
                                                <th scope="row" colspan="4" class="border-0 text-end">
                                                    Shipping Charge :</th>
                                                <td class="border-0 text-end">LKR. 500</td>
                                            </tr>

                                            <tr>
                                                <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                                <td class="border-0 text-end">
                                                    <h4 class="m-0 fw-semibold">LKR. <?php echo $d["amount"] ?></h4>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-print-none mt-4">
                                    <div class="float-end">
                                        <button class="btn btn-success me-1 " id="p1" onclick="printInvoice();"> Print</button>
                                        <a href="#" class="btn btn-primary w-md " id="p2">Send</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {
    header("location: index.php");
}


?>