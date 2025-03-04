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

    if (isset($_SESSION['idUser']) && $_SESSION['idUser'] == true) {
        if (isset($_SESSION['page']) && $_SESSION['page'] == 'Admin') {
            ?>
            <script type="text/javascript">
                var r = confirm("Bạn có muốn chuyển đến trang admin không?");
                if (r == true) {
                    window.location.href = "bs-advance-admin/advance-admin/index.php";
                } else {
                    <?php $_SESSION['page'] = 'client' ?>
                }
            </script>
            <?php
        }

    }

    ?>
    <!-- Topbar Start -->
    <?php include('topbar.php') ?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php include('menu.php') ?>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                        <li data-target="#header-carousel" data-slide-to="3"></li>
                        <li data-target="#header-carousel" data-slide-to="4"></li>
                        <li data-target="#header-carousel" data-slide-to="5"></li>
                        <li data-target="#header-carousel" data-slide-to="6"></li>
                    </ol>
                    <div class="carousel-inner">
                        <?php
                        $sql = "SELECT * from category LIMIT 1";
                        $result = $conn->query($sql);
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img class="position-absolute w-100 h-100"
                                src="bs-advance-admin\advance-admin\img\cover\<?php echo $row['cover'] ?>"
                                style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">

                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">
                                        <?php echo $row['category'] ?>
                                    </h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet
                                        lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                        href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <?php
                        foreach ($seCategory as $category) {
                            ?>
                            <div class="carousel-item position-relative" style="height: 430px;">
                                <img class="position-absolute w-100 h-100"
                                    src="bs-advance-admin\advance-admin\img\cover\<?php echo $category['cover'] ?>"
                                    style="object-fit: cover;">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;">
                                        <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">
                                            <?php echo $category['category'] ?>
                                        </h1>
                                        <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet
                                            lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                        <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                            href="#">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="img/offer-1.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="img/offer-2.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
                class="bg-secondary pr-3">Categories</span></h2>
        <div class="row px-xl-5 pb-3">
            <?php
            foreach ($seCategory as $category1) {
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <a class="text-decoration-none" href="category.php?category=<?php echo $category1['category'] ?>">
                        <div class="cat-item d-flex align-items-center mb-4">
                            <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                <img class="img-fluid"
                                    src="bs-advance-admin/advance-admin/img/cover/<?php echo $category1['cover'] ?>" alt="">
                            </div>
                            <div class="flex-fill pl-3">
                                <h6>
                                    <?php echo $category1['category'] ?>
                                </h6>
                                <small class="text-body">100 Products</small>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- Categories End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured
                Products</span></h2>
        <div class="row px-xl-5">
            <?php
            $selectFeatured = $getdata->se_peoduct_featured();
            foreach ($selectFeatured as $topProduct) {
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" style="height: 350px;"
                                src="bs-advance-admin/advance-admin/img/<?php echo $topProduct['image'] ?>" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square"
                                    href="detail.php?idProduct=<?php echo $topProduct['id'] ?>">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">
                                <?php echo $topProduct['name'] ?>
                            </a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>
                                    <?php echo $topProduct['price'] ?>VND
                                </h5>
                                <h6 class="text-muted ml-2"><del>$
                                        <?php echo $topProduct['price'] ?>
                                    </del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(
                                    <?php echo $topProduct['number_sell'] ?>)
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- Products End -->


    <!-- Offer Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="row px-xl-5">
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="img/offer-1.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="img/offer-2.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Recent
                sProducts</span></h2>
        <div class="row px-xl-5">
            <?php
            if (isset($_GET['page']) && $_GET['page'] == true) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $total_page = ceil(mysqli_num_rows($getdata->se_product()) / 16);
            $product_start = (($page - 1) * 16);
            $selectRecent = $getdata->se_recent($product_start);
            foreach ($selectRecent as $recent) {
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" style="height: 350px;"
                                src="bs-advance-admin/advance-admin/img/<?php echo $recent['image'] ?>" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square"
                                    href="detail.php?idProduct=<?php echo $recent['id'] ?>">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <?php
                                if (isset($_SESSION['idUser']) && $_SESSION['idUser'] == true) {
                                    if (mysqli_num_rows($getdata->get_favorite($recent['id'], $_SESSION['idUser'])) > 0) {
                                        echo '
                                        <a href="processing-favorite.php?favorite=unfavorite&idProduct=' . $recent['id'] . '" class="btn btn-outline-dark btn-square">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        ';
                                    } else {
                                        echo '
                                        <a href="processing-favorite.php?favorite=favorite&idProduct=' . $recent['id'] . '" class="btn btn-outline-dark btn-square">
                                            <i class="far fa-heart"></i>
                                        </a>
                                        ';
                                    }
                                } else {
                                    echo '
                                        <a href="" class="btn btn-outline-dark btn-square">
                                            <i class="far fa-heart"></i>
                                        </a>
                                    ';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">
                                <?php echo $recent['name'] ?>
                            </a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>$
                                    <?php echo $recent['price'] ?>
                                </h5>
                                <h6 class="text-muted ml-2"><del>$
                                        <?php echo $recent['price'] ?>
                                    </del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(
                                    <?php echo $recent['number_sell'] ?>)
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
    <!-- Products End -->
    <div class="page">
        <div>
            <?php
            if (($page - 2) > 0) {
                echo '<a class="btn btn-outline-light py-2 px-4 mt-3" href="index.php?page=' . ($page - 2) . '">' . ($page - 2) . '</a>';
            }
            if (($page - 1) > 0) {
                echo '<a class="btn btn-outline-light py-2 px-4 mt-3" href="index.php?page=' . ($page - 1) . '">' . ($page - 1) . '</a>';
            }
            if ($page > 0) {
                echo '<a class="btn btn-primary btn-outline-light py-2 px-4 mt-3" href="index.php?page=' . $page . '">' . $page . '</a>';
            }
            if (($page + 1) <= $total_page) {
                echo '<a class="btn btn-outline-light py-2 px-4 mt-3" href="index.php?page=' . ($page + 1) . '">' . ($page + 1) . '</a>';
            }
            if (($page + 2) <= $total_page) {
                echo '<a class="btn btn-outline-light py-2 px-4 mt-3" href="index.php?page=' . ($page + 2) . '">' . ($page + 2) . '</a>';
            }
            ?>
        </div>

    </div>

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