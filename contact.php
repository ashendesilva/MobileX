
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile X | Contact Details</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="container-fluid">

    <?php
    include "navbar.php";

    ?>
    <div style="width: 500px; display: flex; justify-content: center;">
        <div class="container" style=" font-size:25px; ">

            <div class="mt-5">
                <h1>
                    Contact Us
                </h1>

                <hr>

            </div>

            <div class="">
                <form action="">
                    <label for="" class="mb-2" style="font-weight: 700;">First Name</label>
                    <input type="text" name="" id="" class="form-control mb-4" style="border: 3px solid black;">
                </form>
            </div>

            <div>
                <form action="">
                    <label for="" class="mb-2" style="font-weight: 700;">Last Name</label>
                    <input type="text" name="" id="" class="form-control mb-4" style="border: 3px solid black;">
                </form>
            </div>

            <div>
                <form action="">
                    <label for="" class="mb-2" style="font-weight: 700;">Email</label>
                    <input type="email" name="" id="" class="form-control mb-4" style="border: 3px solid black;">
                </form>
            </div>



            <div>
                <form action="">
                    <label for="" class="mb-2" style="font-weight: 700;">Discription</label>
                    <textarea class="form-control mb-4" style="border: 3px solid black; " name=""></textarea>
                </form>
            </div>




            <div class="container mb-5">
            <button class="btn btn-dark justify-content-center col-12 ">Submit</button>
        </div>
        </div>
        
    </div>

    <?php
    
    include "footer.php";
    ?>




</body>

</html>