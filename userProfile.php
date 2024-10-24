<?php

include "connection.php";

session_start();
$user = $_SESSION["e"];

if (isset($_SESSION["e"])) {

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "' ");
    $d = $rs->fetch_assoc();

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <title>Mobile X | User Profile</title>
    </head>

    <body>
        <?php
        include "navbar.php";
        ?>
        <div class="container rounded bg-white mt-5 mb-5 uprfile">
            <div class="row">
                <div class="col-md-2 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <div>
                            <img class=" mt-5" id="i" height="100px" src="<?php
                                                                            if (!empty($d["img_path"])) {
                                                                                echo $d["img_path"];
                                                                            } else {
                                                                                echo ("https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg");
                                                                            }




                                                                            ?>">
                            <input class="form-control mt-3 mb-3" type="file" multiple id="imgUploader">
                        </div>
                        <div class="mt-1 mb-2 text-center"><button class="btn btn-primary profile-button" type="button" onclick="uploadImg();">Upload</button></div>

                        <span class="font-weight-bold">Hi, <?php echo $d["fname"] ?></span>
                    </div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Details</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">First Name</label>
                                <input type="text" class="form-control" placeholder="first name" value="<?php echo $d["fname"] ?>" id="fname">
                            </div>

                            <div class="col-md-6"><label class="labels">Last Name</label>
                                <input type="text" class="form-control" placeholder="last name" value="<?php echo $d["lname"] ?>" id="lname">
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 mb-3"><label class="labels">Email</label>
                                <input type="text" class="form-control" placeholder="enter your email" value="<?php echo $d["email"] ?>" disabled>
                            </div>
                            <div class="col-md-12 mb-3"><label class="labels">Username</label>
                                <input type="text" class="form-control" placeholder="Username" value="<?php echo $d["username"] ?>" id="uname">
                            </div>

                            <div class="col-md-12 mb-3"><label class="labels">Password</label>
                                <input type="password" class="form-control" placeholder="enter your password" value="<?php echo $d["password"] ?>" disabled>
                            </div>

                            <div class="col-md-12 mb-3"><label class="labels">Mobile</label>
                                <input type="text" class="form-control" placeholder="enter your mobile" value="<?php echo $d["mobile"] ?>" id="mobile">
                            </div>



                        </div>
                        <!-- <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div> -->
                    </div>
                </div>

                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Shiping Details</h4>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 mb-3"><label class="labels">Address Line 1</label>
                                <input type="text" class="form-control" placeholder="enter address line 1" value="<?php echo $d["line_1"] ?>" id="line1">
                            </div>

                            <div class="col-md-12 mb-3"><label class="labels">Address Line 2</label>
                                <input type="text" class="form-control" placeholder="enter address line 2" value="<?php echo $d["line_2"] ?>" id="line2">
                            </div>





                            <div class="col-md-12 mb-3"><label class="labels">City</label>
                                <input type="text" class="form-control" placeholder="enter your city" value="<?php echo $d["city"] ?>" id="city">
                            </div>

                            <div class="col-md-12 mb-3"><label class="labels">Postal Code</label>
                                <input type="text" class="form-control" placeholder="enter your postal code" value="<?php echo $d["p_code"] ?>" id="pcode">
                            </div>

                            <div class="d-none" id="msgDiv">
                                <div class="alert alert-danger" id="msg"></div>
                            </div>


                        </div>

                    </div>
                </div>
                <div class="mt-2 mb-3 "><button class="btn btn-primary profile-button offset-10 col-2" type="button" onclick="updateData();">Save Profile</button></div>

            </div>

        </div>

        </div>

        </div>


        <?php
        include "footer.php";
        ?>
    <script src="script.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </body>

    </html>


<?php
} else {
    header("location: signup.php");
}


?>