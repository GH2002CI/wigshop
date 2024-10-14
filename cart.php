<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php
    ob_start();
    include('control.php');
    $getdata = new data();
    session_start();
    ?>
    <!-- Topbar Start -->
    <?php include('topbar.php') ?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php include('menu.php') ?>
    <!-- Navbar End -->


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                    <span class="breadcrumb-item active">Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <?php
            $seItem = $getdata->se_cart($_SESSION['idUser']);
            $subtotal = 0;
            ?>
            <div>
                <div class="col-lg-12 table-responsive mb-5">
                    <table class="table table-light table-borderless table-hover text-center mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Products</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle" id="cart-info">
                            <?php
                            foreach ($seItem as $product) {
                                $subtotal = $subtotal + $product['price'];
                                ?>
                                <tr>
                                    <td class="align-middle"><img
                                            src="bs-advance-admin\advance-admin\img\<?php echo $product['image'] ?>"
                                            style="max-height: 200px;"></td>
                                    <td class="align-middle"><?php echo $product['name'] ?></td>
                                    <td class="align-middle"><span class="total_moneys"><?php echo $product['price'] ?>
                                            VND</span></span></td>
                                    <td class="align-middle">
                                        <a href="del_cart.php?cart=<?php echo $product['id'] ?>">
                                            <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="mb-30" >
                    <form method="post">
                        <div class="input-group">
                            <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                            <div class="input-group-append">
                                <button type="submit" name="coupon" class="btn btn-primary">Apply Coupon</button>
                            </div>
                        </div>
                    </form>
                </div>

                <?php
                $coupon = $_POST['coupon'] ?? '';
                if (isset($_POST['coupon'])) {
                    if (mysqli_num_rows($getdata->get_coupon($coupon)) > 0) {
                        foreach (($getdata->get_coupon($coupon)) as $cp)
                            if ($cp['value'] == "free ship") {
                                $vl_ship = 0;
                            } else {
                                $vl_ship = 10;
                            }
                    } else {
                        $vl_ship = 10;
                    }
                } else {
                    $vl_ship = 10000;
                }
                ?>

                <form method="POST">
                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Subtotal</h6>
                                <h6><?php echo $subtotal ?>VND</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium"><?php echo $vl_ship ?>VND</h6>
                                <input type="hidden" name="coupon" id="" value="<?php echo $coupon ?>">
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Total</h5>
                                <h5><?php echo $subtotal + $vl_ship ?>VND</h5>
                            </div>
                            <button type="submit" name="checkout"
                                class="btn btn-block btn-primary font-weight-bold my-3 py-3">
                                Proceed To Checkout
                            </button>
                        </div>
                    </div>
                </form>
                <?php 
                    if (isset($_POST['checkout'])) {
                        if (isset($_SESSION['subtotal']) && $_SESSION['ship'])
                        {
                            unset($_SESSION['subtotal']);
                            unset($_SESSION['ship']);
                        }
                        $_SESSION['ship'] = $vl_ship;

                        header("Location: checkout.php");
                        exit;
                    }
                    ob_end_flush();
                ?>
            </div>
        </div>
    </div>

    <!-- Cart End -->


    <!-- Footer Start -->
    <?php include('footer.php') ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>
    <script src="js/cart.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>