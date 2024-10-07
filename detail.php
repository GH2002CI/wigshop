<?php ob_start(); ?>
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
    <link rel="stylesheet" href="css/menu.css">
</head>

<body>
    <?php
    include('control.php');
    $getdata = new data();
    session_start();
    ?>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="">About</a>
                    <a class="text-body mr-3" href="">Contact</a>
                    <a class="text-body mr-3" href="">Help</a>
                    <a class="text-body mr-3" href="">FAQs</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <div class="btn btn-sm btn-light menudrop">
                            My Account
                            <div class="menudrop-content">
                                <?php
                                if (isset($_SESSION['idUser'])) {
                                    echo '<a class="dropdown-item" href="logout.php" style="text-decoration:none;">Log out</a>';
                                } else {
                                    echo '<a class="dropdown-item" href="login.php" style="text-decoration:none;">Sign in</a>';
                                    echo '<a class="dropdown-item" href="register.php" style="text-decoration:none;">Sign up</a>';
                                }
                                
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group mx-2">
                        <div class="btn btn-sm btn-light menudrop">USD
                            <div class="menudrop-content">
                                <button class="dropdown-item" type="button">EUR</button>
                                <button class="dropdown-item" type="button">GBP</button>
                                <button class="dropdown-item" type="button">CAD</button>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group">
                        <div class="btn btn-sm btn-light menudrop">EN
                            <div class="menudrop-content">
                                <button class="dropdown-item" type="button">FR</button>
                                <button class="dropdown-item" type="button">AR</button>
                                <button class="dropdown-item" type="button">RU</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle"
                            style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle"
                            style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="index.php" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Multi</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Customer Service</p>
                <h5 class="m-0">+012 345 6789</h5>
            </div>
        </div>
    </div>
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
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop Detail</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Detail Start -->
    <?php
    $idProduct = $_GET['idProduct'];
    $getProduct = $getdata->get_product($idProduct);
    foreach ($getProduct as $getpro)
    ?>
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">

                        <div class="carousel-item active">
                            <img class="w-100 h-100"
                                src="bs-advance-admin/advance-admin/img/<?php echo $getpro['image'] ?>" alt="Image">
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3>
                        <?php echo $getpro['name'] ?>
                    </h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">(<?php echo $getpro['number_sell'] ?>)</small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">VND<?php echo $getpro['price'] ?></h3>
                    <p class="mb-4"><?php echo $getpro['deception'] ?></p>
                    <form action="" method="post">
                        <div class="d-flex mb-4">

                        </div>
                        <div class="d-flex align-items-center mb-4 pt-2">
                            <?php
                            if (isset($_SESSION['idUser'])) {
                                ?>
                                <button type="submit" name="add_to_cart" class="btn btn-primary px-3">
                                    <i class="fa fa-shopping-cart mr-1"></i> Cart
                                </button>
                                <button type="submit" name="buy" class="btn btn-primary px-3">
                                    <i class="fa fa-shopping-cart mr-1"></i> Buy
                                </button>
                                <?php
                            } else {
                                ?>
                                <button type="submit" name="buy" class="btn btn-primary px-3">
                                    <i class="fa fa-shopping-cart mr-1"></i> Buy
                                </button>
                                <?php
                            }
                            ?>
                        </div>
                    </form>

                    <?php
                    if (isset($_POST['add_to_cart'])) {

                        if (isset($_SESSION['idUser'])) {

                            $incrart = $getdata->incart($_SESSION['idUser'], $idProduct, $size, $color, $quantity);
                            ob_start();

                            if ($incrart) {
                                echo "alert('Success! Please check in cart')";
                                echo '<script>window.location="index.php"</script>';
                            } else {
                                echo "Fail. Please Try Again!";
                            }
                            ob_end_flush();

                        } else {
                            header("Location:login.php");
                            exit;
                        }
                    }

                    if (isset(($_POST['buy']))) {
                        $_SESSION['product'] = $idProduct;
                        header("Location:checkout.php");
                        exit;
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="mb-4">
                        <div>
                            <div class="nav-item text-dark">Information</div>
                            <div class="tab-pane tab-content">
                                <?php echo $getpro['deception'] ?>
                            </div>
                        </div>
                        <div>
                            <?php
                            $selectReview = $getdata->sereview($idProduct);
                            $row = mysqli_num_rows($selectReview);
                            ?>
                            <div class="nav-item text-dark">
                                Reviews (
                                <?php echo $row ?>)
                            </div>
                            <div class="tab-pane tab-content">
                                <div style="display: flex;">
                                    <div class="col-md-6">
                                        <h4 class="mb-4">
                                            <?php echo $row ?> review for "
                                            <?php echo $getpro['name'] ?>"
                                        </h4>
                                        <?php
                                        //print review
                                        foreach ($selectReview as $review) {
                                            $getUser = $getdata->getuserbyid($review['idUser']);
                                            $result = mysqli_fetch_assoc($getUser);
                                            $star = $review['evaluate'];
                                            ?>
                                            <div class="media mb-4">
                                                <img src="bs-advcance-admin/advance-admin/img/<?php echo $result['avatar'] ?>"
                                                    alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                                <div class="media-body">
                                                    <h6>
                                                        <?php echo $result['last_name'] ?><small> - <i>
                                                                <?php echo $review['date'] ?>
                                                            </i></small>
                                                    </h6>
                                                    <div class="text-primary mb-2">
                                                        <?php
                                                        switch ($star) {
                                                            case 1:
                                                                echo '  <i class="fas fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                    <i class="far fa-star"></i>';
                                                                break;
                                                            case 2:
                                                                echo '  <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                    <i class="far fa-star"></i>';
                                                                break;
                                                            case 3:
                                                                echo '  <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                    <i class="far fa-star"></i>';
                                                                break;
                                                            case 4:
                                                                echo '  <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="far fa-star"></i>';
                                                                break;
                                                            case 5:
                                                                echo '  <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>';
                                                                break;
                                                            default:
                                                                echo '  <i class="far fa-star">
                                                                    <i class="far fa-star">
                                                                    <i class="far fa-star">
                                                                    <i class="far fa-star">
                                                                    <i class="far fa-star">';
                                                                break;
                                                        }
                                                        ?>
                                                    </div>
                                                    <p>
                                                        <?php echo $review['content'] ?>
                                                    </p>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="mb-4">Leave a review</h4>
                                        <form method="POST">
                                            <div class="d-flex my-3">
                                                <label for="message">
                                                    Your Rating * : <i class="fas fa-star"></i>
                                                    <select name="evaluate" id="">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label for="message">Your Review *</label>
                                                <textarea id="message" cols="30" rows="5" class="form-control"
                                                    name="content"></textarea>
                                            </div>
                                            <?php
                                            if (isset($_SESSION['idUser'])) {
                                                echo '<div class="form-group mb-0">
                                                    <input type="submit" name="leaveyourreview" value="Leave Your Review"
                                                        class="btn btn-primary px-3">
                                                </div>';
                                            } else {
                                                echo '<a href="login.php" btn px-3 style="background-color: #FFD333; border-color: #FFD333; color:black; padding: 0.5rem 1rem; !important ">Log In</a>';
                                            }
                                            ?>
                                        </form>
                                        <?php
                                        if (isset($_POST['leaveyourreview'])) {
                                            $evaluate = $_POST['evaluate'];
                                            $content = $_POST['content'];
                                            $time = isset($_POST["time"]) ? $_POST["time"] : date("Y-m-d");
                                            $inreview = $getdata->inreview($_SESSION['idUser'], $idProduct, $evaluate, $content, $time);
                                            ob_start();
                                            if ($inreview) {
                                                echo "alert('Success!')";
                                            } else {
                                                echo "alert('Fail! Try again')";
                                            }
                                            ob_end_flush();
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class="bg-secondary pr-3">You May Also Like</span>
        </h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    <?php
                    $getcategory = $getdata->getcategory($_GET['idProduct']);
                    foreach ($getcategory as $category)
                        $select_product_may_like = $getdata->select5category($category['category']);
                    foreach ($select_product_may_like as $product_may_like) {
                        ?>
                        <div class="product-item bg-light">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" style="height: 350px"
                                    src="bs-advance-admin/advance-admin/img/<?php echo $product_may_like['image'] ?>"
                                    alt="Image">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square"
                                        href="detail.php?idProduct=<?php echo $product_may_like['id'] ?>">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                    <a class="btn btn-outline-dark btn-square" href="">
                                        <i class="far fa-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">
                                    <?php echo $product_may_like['name'] ?>
                                </a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>$123.00</h5>
                                    <h6 class="text-muted ml-2"><del>$
                                            <?php echo $product_may_like['price'] ?>
                                        </del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small>(99)</small>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed dolor.
                    Rebum tempor no vero est magna amet no</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop
                                Detail</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping
                                Cart</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop
                                Detail</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping
                                Cart</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                        <p>Duo stet tempor ipsum sit amet magna ipsum tempor est</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Sign Up</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#">Domain</a>. All Rights Reserved. Designed
                    by
                    <a class="text-primary" href="https://htmlcodex.com">HTML Codex</a>
                    <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
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
<?php ob_end_flush(); ?>