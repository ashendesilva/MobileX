<?php

session_start();
include("connection.php");

if (isset($_SESSION["a"])) {

    $rs = Database::search(" SELECT * FROM `user` INNER JOIN `user_type` ON `user`.`user_type_id` = `user_type`.`utype_id`
        ORDER BY `user`.`id` ASC");
    $num = $rs->num_rows;

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mobile X | Admin Panel | User Report</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
    </head>


    <body class="adminSigninBody" id="body12">

        <div id="content2">
            <div class="container mt-5">
            <div class="mb-3 mt-3 ">
                <a href="adminReport.php"><button class="btn btn-light">Back To Reports</button></a>
            </div>

                <div id="" class="">


                    <div class="container-fluid pt-4 px-4" id="printArea">
                        <div class="bg-light text-center rounded p-4" >
                            <h2 class="text-center " id="">User Report</h2>
                            <div class="table-responsive">
                                <table class="table text-start align-middle table-bordered table-hover mb-0">
                                    <thead>
                                        <tr class="text-dark">
                                            <th scope="col">User ID</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Mobile Number</th>
                                            <th scope="col">User Type</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for ($i = 0; $i < $num; $i++) {
                                            $d = $rs->fetch_assoc();
                                        ?>
                                            <tr>
                                                <td><?php echo $d["id"] ?></td>
                                                <td><?php echo $d["fname"] ?></td>
                                                <td><?php echo $d["lname"] ?></td>
                                                <td><?php echo $d["email"] ?></td>
                                                <td><?php echo $d["mobile"] ?></td>
                                                <td><?php echo $d["type"] ?></td>
                                                <td class=""><?php
                                                                if ($d["status"] == 1) {
                                                                    echo ("Active");
                                                                } else {
                                                                    echo ("Inactive");
                                                                }
                                                                ?></td>
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
            </div>



            <div class="d-flex justify-content-end container mt-5 mb-4">
                <button class="btn btn-primary col-2" onclick="userPrint();">Print</button>
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