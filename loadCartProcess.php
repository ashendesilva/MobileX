<?php

include "connection.php";
session_start();
$user = $_SESSION["e"];
$netTotal = 0;

$rs = Database::search("SELECT * FROM cart INNER JOIN stock ON cart.stock_stock_id = stock.stock_id INNER JOIN
product ON stock.product_id = product.id INNER JOIN color ON product.color_id = color.color_id
INNER JOIN `condition` ON product.condition_id = `condition`.condition_id WHERE cart.user_id = '" . $user["id"] . "' ");



$num = $rs->num_rows;

if ($num > 0) {

?>
    <div class="container">
        <h2 class="mt-3 justify-content-center d-flex">Shoping Cart</h2>
        <hr>
        <br>
    </div>

    <?php

    for ($i = 0; $i < $num; $i++) {
        $d = $rs->fetch_assoc();
        $total = $d["price"] * $d["cart_qty"];
        $netTotal += $total;

    ?>
        <!--cart items  -->

        <div style="display: flex; align-items: center; width: 1200px;" class="cartbox p-3 mt-3 container">
            <div class="me-5"><img src="<?php echo $d["path"] ?>" height="150px" alt=""></div>
            <div class="p-3 me-5">
                <div>
                    <h3><?php echo $d["name"] ?></h3>
                    <p class="mb-0">Color: <?php echo $d["color_name"] ?></p>
                    <p class="mb0">Condition: <?php echo $d["condition_name"] ?></p>

                    <p style="font-size: 27px;"> LKR. <?php echo $d["price"] ?></p>
                </div>

            </div>

            <div class="d-flex align-items-center gap-2 me-5">
                <button class="btn btn-dark btn-sm" onclick="decrementCartQty('<?php echo $d['cart_id'] ?>');">-</button>
                <input type="number" id="qty<?php echo $d['cart_id'] ?>" class="form-control form-control-sm text-center" style="max-width: 100px;" value="<?php echo $d["cart_qty"] ?>" disabled>
                <button class="btn btn-dark btn-sm" onclick="incrementCartQty('<?php echo $d['cart_id'] ?>');">+</button>

            </div>

            <div class="d-flex align-items-center gap-2 me-5 ms-5">
                <h2>Total: <span class="text-danger"><?php echo $total ?></span></h2>


            </div>



            <div class="d-flex align-items-center gap-2 me-5 ms-5">
                <button onclick="removeCart('<?php echo $d['cart_id'] ?>');"><img src="Image/icon/icons8-delete-32.png" alt=""></button>
            </div>
        </div>





        <!-- cart items -->

    <?php
    }

    ?>





    <!-- checkout -->
    <hr>
    <div style=" width: 600px;" class="cartbox p-3 mt-3 container mb-3">
        <div class="d-flex flex-column align-items-center">

            <h5>Number Of Items: <?php echo $num ?><span></span></h5>
            <h5>Delivery Fee <span>Rs: 500</span></h5>
            <h3>Net Total <span>Rs: <?php echo $netTotal + 500 ?></span></h3>


        </div>

    </div>

    <div style="display: flex; align-items: center; width: 800px;" class="cartbox p-3 mt-3 container mb-5">
        <div class="d-flex">
            <div>
                <a href="index.php"><button class="btn btn-dark" style="width: 350px;">Continue To Shoping</button></a>
            </div>
            <div class="offset-1">
                <button class="btn btn-dark" style="width: 350px; " onclick="checkOut();">Check Out</button>
            </div>
        </div>
    </div>

    </div>


<?php

} else {
?>

    <div class="d-none" id="msgDiv">
        <div class="alert alert-danger" id="msg"></div>
    </div>
    <div class="col-12 text-center mt-5 mb-5">
        <h2>Your Cart Empty</h2>
        <a href="index.php"><button class="btn btn-dark" style="width: 350px;">Continue To Shoping</button></a>
    </div>


<?php
}



?>