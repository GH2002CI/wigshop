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
    session_start();
    include('control.php');
    $getdata = new data();
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
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <form action="" method="post">
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <h5 class="section-title position-relative text-uppercase mb-3">
                        <span class="bg-secondary pr-3">Billing Address</span>
                    </h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" required placeholder="Doe">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" name="phone" required
                                    placeholder="+123 456 789">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address</label>
                                <input class="form-control" type="text" name="address" required
                                    placeholder="123 Street">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Detail</label>
                                <input class="form-control" type="text" name="address_detail" required
                                    placeholder="123 Street">
                            </div>
                        </div>
                    </div>

                    <div class="collapse mb-5" id="shipping-address">
                    </div>
                </div>
                <div class="col-lg-4">
                    <h5 class="section-title position-relative text-uppercase mb-3">
                        <span class="bg-secondary pr-3">OrderTotal</span>
                    </h5>

                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom">
                            <h6 class="mb-3">Products</h6>
                            <?php
                            if (isset($_SESSION['idUser']) && $_SESSION['idUser'] == true) {
                                $cart = $_POST['cart'];
                                foreach ($data as $product) {
                                    foreach (($getdata->get_product($product['id'])) as $pro)
                                        echo '
                            <div class="d-flex justify-content-between">
                                <p>' . $pro['name'] . '</p>
                                <p>$' . $pro['price'] . '</p>
                            </div>
                            ';
                                }
                            } else {
                                $getproduct = $getdata->get_product($_SESSION['product']);
                                $result = mysqli_fetch_assoc($getproduct);
                                ?>
                                <div class="d-flex justify-content-between">
                                    <p><?php echo $result['name'] ?></p>
                                    <p><?php echo $result['price'] ?> VND</p>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="border-bottom pt-3 pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Subtotal</h6>
                                <h6><?php echo $result['price'] ?> VND</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">0 VND</h6>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Total</h5>
                                <h5><?php echo $result['price'] ?> VND</h5>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <button name="buy" class="btn btn-block btn-primary font-weight-bold py-3">Buy</button>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </form>
    <?php
    if (isset($_POST['buy'])) {
        if (isset($_SESSION['idUser']) && $_SESSION['idUser'] == true) {

        } else {
            $placeorder = $getdata->place_order(
                $_POST['name'],
                $_POST['phone'],
                $_POST['address'] . $_POST['address_detail'],
                $_SESSION['product']
            );
            unset($_SESSION['product']);
            ?>
            <script>
                alert("Order Success");
                window.location.href = "index.php";
            </script>
            <?php
        }
    }
    ?>
    <!-- Checkout End -->


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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>