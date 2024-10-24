<?php
session_start();
$user = $_SESSION["e"];
include "connection.php";

if (isset($user)) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mobile X | Order History</title>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <?php
        include "navbar.php";
        ?>
<div class="mb-3 mt-3 container" >
        <a href="index.php"><button class="btn btn-dark">Back To Home</button></a>
    </div>

        <div class="container mt-5" id="all">
            <div class="row">
                <?php
                $rs =  Database::search("SELECT * FROM `order_history` WHERE `user_id` = '" . $user["id"] . "'");
                $num = $rs->num_rows;

                if ($num > 0) {
                ?>
                    <div class="container">
                        <h2 class="mt-3 justify-content-center d-flex">Order History</h2>
                        <hr>
                        <br>
                    </div>
                    <?php
                    while ($d = $rs->fetch_assoc()) {
                    ?>
                        <div class="p-3 border border-3 rounded-3 bg-body-tertiary mb-4" id="printArea">
                            <div>
                                <div>
                                    <h3 class="mt-3">Order Id <span>#<?php echo $d["order_id"] ?></span></h3>
                                </div>
                                <h6><?php echo $d["order_date"] ?></h6>


                                <div class=" table-responsive">
                                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                                        <thead>
                                            <tr class="text-dark">
                                                <th scope="col">Image</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $rs2 = Database::search("SELECT * FROM `order_item` INNER JOIN `stock` ON `order_item`.`stock_stock_id` = `stock`.`stock_id` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` WHERE `order_item`.`order_history_ohid` = '" . $d["ohid"] . "'");
                                            while ($d2 = $rs2->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td><img src="<?php echo $d2["path"] ?>" height="100px" alt=""></td>
                                                    <td><?php echo $d2["name"] ?></td>
                                                    <td><?php echo $d2["oi_qty"] ?></td>
                                                    <td>RS. <?php echo $d2["price"] ?> </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <h6>
                                            Delivary Fee: <span>500</span>
                                        </h6>
                                        <h4>
                                            Net Total: <span><?php echo $d["amount"] ?> </span>
                                        </h4>
                                    </div>
                                    <div class="col-6 d-block" id="prin">
                                        <button onclick="oderhistoryPrint();" class="offset-8 btn btn-primary mt-3" style="width: 210px;">Print</button>
                                    </div>


                                </div>
                            </div>
                        </div>


                    <?php
                    }
                    ?>

                    <div class=" d-block" id="printbnt">
                        <button onclick="PrintallOder();" class="offset-9 btn btn-dark mt-1 mb-3" style="width: 340px;">Print All</button>
                    </div>
                    <?php
                    ?>

                <?php
                } else {
                ?>
                    <div class="col-12 text-center mt-5">
                        <h2>You Have not Placed Any Orders</h2>
                        <a href="index.php" class="btn btn-primary">Start Shopping</a>
                    </div>
                <?php
                }
                ?>

                
            </div>
        </div>


        <?php
                include "footer.php";
                ?>







        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="script.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

    </body>

    </html>



<?php
} else {
    header("location: signup.php");
}



?>