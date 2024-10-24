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

<body class="container-fluid ">
    <!-- Navbar -->

    <div class=" d-flex align-items-center ps-3 pe-3 navbar1" style="background-color:#0F094F">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="col-4 nav1">
            <a class="navbar-brand hei ms-2" href="index.php" style="color: white; font-size: 1.5rem;">
                <img src="Image/icon/mobilex.jpeg" class="navimg" height="38" alt=""><a href="" style="color: white; font-size: 1.5rem; text-decoration: none;"></a></a>
        </div>

        <div class="col-4 nav2">
            <ul class="navbar-nav ms-auto " style="display: flex; flex-direction: row; margin-inline: auto; width: fit-content;">
                <li class="nav-item hideMobile">
                    <a class="nav-link  navmx active" aria-current="page" href="index.php" style="color: white; font-size: 1.5rem;">Home</a>
                </li>
                <li class="nav-item hideMobile">
                    <a class="nav-link  navmx" href="products.php" style="color: white; font-size: 1.5rem;">Products</a>
                </li>
                <li class="nav-item hideMobile">
                    <a class="nav-link  navmx" href="orderHistory.php" style="color: white; font-size: 1.5rem;">Order History</a>
                </li>
            </ul>
        </div>
        ``
        <div class="col-4 nav3">

            <ul class="navbar-nav " style="display: flex; flex-direction: row; justify-content: end;">
                <li class="nav-item mx-2 hideMobile">
                    <a class="nav-link text-dark h5 me-3" href="cart.php" target="blank"><img src="Image/icon/cart.png" alt=""></a>
                </li>
                <li class="nav-item mx-2 hideMobile">
                    <a class="nav-link text-dark h5 me-3" href="whichlist.php" target="blank"><img src="Image/icon/heart.png" alt=""></a>
                </li>
                <li class="nav-item mx-2 hideMobile">
                    <a class="nav-link text-dark h5" href="userProfile.php" target="blank"><img src="Image/icon/user.png" alt=""></a>
                </li>
                <li class="nav-item mx-2 hideMobile">
                    <?php
                    if (isset($_SESSION["e"])) {
                    ?>
                        <button class="nav-link text-dark h5"><img src="Image/icon/icons8-logout-32 (1).png" alt="" class="ms-2 d-block" onclick="signOut();" id="so"></button>
                    <?php
                    } else {
                    ?>
                        <button class="nav-link text-dark h5"><img src="Image/icon/icons8-logout-32 (1).png" alt="" class="ms-2 d-none" onclick="signOut();" id="so"></button>
                    <?php
                    }

                    ?>


                </li>
                <li class="nav-item mx-2 me-2" onclick="showSidebar();">
                    <a class="nav-link text-dark h5 me-3" target="blank"><img src="Image/icon/icons8-menu-16.png" height="30px" alt=""></a>
                </li>

            </ul>
        </div>

    </div>


    <!-- side bar  -->
    <ul class="sidebar">
    <li class="nav-item mx-2 me-2" onclick="hideSidbar();">
                    <a class="nav-link text-dark h5 me-3" target="blank"><img src="Image/icon/icons8-close-16.png" height="30px" alt=""></a>
                </li>
        <li style="text-decoration: none;"><a style="text-decoration: none; color: white;" href="">Home</a></li>
        <li><a style="text-decoration: none; color: white;" href="">Products</a></li>
        <li><a style="text-decoration: none; color: white;" href="">Order History</a></li>
        <li><a style="text-decoration: none; color: white;" class="nav-link text-dark h5 me-3" href="cart.php" target="blank"><img src="Image/icon/cart.png" alt=""></a></li>
        <li><a style="text-decoration: none; color: white;" class="nav-link text-dark h5 me-3" href="whichlist.php" target="blank"><img src="Image/icon/heart.png" alt=""></a></li>
        <li><a style="text-decoration: none; color: white;" href="">Log Out</a></li>

    </ul>
    <!-- side bar  -->





    <script>
        function showSidebar(){
            // alert("as");
            const sidbar = document.querySelector('.sidebar')
            sidbar.style.display='flex'
        }
        function hideSidbar(){
            const sidbar = document.querySelector('.sidebar')
            sidbar.style.display='none'
        }
    </script>
    <script src="script.js"></script>
</body>

</html>