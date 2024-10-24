<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <title>NewTech | Login</title>
</head>

<body class="container-fluid">
    <!-- Navbar -->
    <div class="d-flex justify-content-center nav2">
        <nav class="navbar bg-body-tertiar">
            <div class="container-fluid">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="product" onkeyup="searchProduct(0);">
                    <button class="btn " type="submit" style="background-color: #0F094F;"><img src="Image/icon/search.png" alt=""></button>
                    
                 
                </form>
                <button class="btn ms-2" type="submit" style="background-color: #0F094F; color: white;"  onclick="viewFilter();" >Filter</button>

            </div>
        </nav>

    </div>

    <!-- advance search  -->
    <div class="d-none" id="filterId">
        <div class="border border-dark mt-4 p-5 col-10 offset-1 rounded-3">
            <div class="row col-12">
                <div class="col-6">
                    <label for="">Brand</label>
                    <select class=" col-9 form-select" id="brand">
                        <option value="0">Select Brand</option>
                        <?php
                       $adminbrandrs = Database::search("SELECT * FROM `brand`");
                       $adbrandnum = $adminbrandrs->num_rows;

                        for ($l = 0; $l < $adbrandnum; $l++) {
                            $ad = $adminbrandrs->fetch_assoc();
                        ?>

                            <option value="<?php echo $ad['brand_id']; ?>"><?php echo $ad['brand_name']; ?></option>
                        <?php
                        }
                        ?>
                   
                    </select>

                </div>

                <div class="col-6">
                    <label for="">Color</label>
                    <select class=" col-9 form-select" id="color">
                        <option value="0">Select Color</option>
                        <?php
                       $adminbrandrs = Database::search("SELECT * FROM `color`");
                       $adbrandnum = $adminbrandrs->num_rows;

                        for ($l = 0; $l < $adbrandnum; $l++) {
                            $ad = $adminbrandrs->fetch_assoc();
                        ?>

                            <option value="<?php echo $ad['color_id']; ?>"><?php echo $ad['color_name']; ?></option>
                        <?php
                        }
                        ?>
                    </select>

                </div>

            </div>


            <div class="row col-12 mt-4 justify-content-center">
                <div class="col-6">
                    <label for="">Condition</label>
                    <select class=" col-9 form-select" id="condition">
                        <option value="0">Select Condition</option>
                        <?php
                       $adminbrandrs = Database::search("SELECT * FROM `condition`");
                       $adbrandnum = $adminbrandrs->num_rows;

                        for ($l = 0; $l < $adbrandnum; $l++) {
                            $ad = $adminbrandrs->fetch_assoc();
                        ?>

                            <option value="<?php echo $ad['condition_id']; ?>"><?php echo $ad['condition_name']; ?></option>
                        <?php
                        }
                        ?>
                    </select>

                </div>



            </div>

            <div class="mt-4 row col-12">
                <div class="col-5">
                <input type="text" name=""  class="form-control" placeholder="Min Price" id="min">
                </div>

                <div class="col-5">
                <input type="text" name=""  class="form-control" placeholder="Max Price" id="max">
                </div>

                <!-- <div class=""> -->
                    <button class="btn btn-dark col-2" onclick="advSearchProduct(0);">serach</button>
                <!-- </div> -->
               
               

            </div>
        </div>

    </div>
    <!-- advance search  -->





    <script src="script.js"></script>
</body>

</html>