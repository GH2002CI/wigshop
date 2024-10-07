<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li>
                    <div class="user-img-div">
                        <?php
                        session_start();
                        include_once ('control.php');
                        $getdata = new dataadmin();
                        $getUser = $getdata->get_user_id($_SESSION['idUser']);
                        if (isset($_SESSION['idUser']) && $_SESSION['idUser'] == true) {
                            $getdata = new dataadmin();
                            $getUser = $getdata->get_user_id($_SESSION['idUser']);
                            $result = mysqli_fetch_assoc($getUser);
                            ?>
                                <img src="assets/img/<?php echo $result['avatar']?>" class="img-thumbnail" />
                            <?php
                        }
                        ?>
                        
                        <div class="inner-text">
                            <?php
                            if (isset($_SESSION['idUser']) && $_SESSION['idUser'] == true) {
                                echo $_SESSION['nameUser'];
                            }
                            ?>
                            <br />
                            <small>Last Login : 2 Weeks Ago </small>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="../../index.php">Client</a>
                </li>
                <li>
                    <a href="index.php">Dashboard</a>
                </li>
                <li>
                    <a href="#">Đơn hàng<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="list-order.php">Danh sách</a>
                        </li>
                        <li>
                            <a href="list-order-accept.php">Đã chấp nhận</a>
                        </li>
                        <li>
                            <a href="list-order-payment.php">Đã thanh toán</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="product.php">Product</a>
                </li>
                <li>
                    <a href="list-category.php">Category</a>
                </li>
                <li>
                    <a href="user.php">User</a>
                </li>
                <li>
                    <a href="../../logout.php">Đăng xuất</a>
                </li>
            </ul>
        </div>
    </nav>
</body>

</html>