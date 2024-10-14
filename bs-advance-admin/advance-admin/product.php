<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>
    <link rel="stylesheet" href="assets/css/style.css">
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
    <?php
    include('control.php');
    $getdata = new dataadmin();
    ?>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">COMPANY NAME</a>
            </div>
        </nav>


        <!-- /. NAV TOP  -->
        <?php include('menu.php') ?>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">PRODUCT</h1>
                        <h1 class="page-subhead-line">
                            <a href="add-product.php">+ New</a>
                        </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Cover</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Time</th>
                                        <th>Star</th>
                                        <th>Number Sell</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $seProduct = $getdata->se_product();
                                    foreach ($seProduct as $product) {
                                        ?>
                                        <tr>
                                            <td><?php echo $product['id'] ?></td>
                                            <td><img class="cover-art-list" src="img/<?php echo $product['image'] ?>"
                                                    alt="">
                                            </td>
                                            <td><?php echo $product['name'] ?></td>
                                            <td><?php echo $product['price'] ?></td>
                                            <td><?php echo $product['category'] ?></td>
                                            <td><?php echo $product['date'] ?></td>
                                            <td><?php echo $product['star'] ?></td>
                                            <td><?php echo $product['number_sell'] ?></td>
                                            <td><a href="edt-product.php?idProduct=<?php echo $product['id'] ?>">UPDATE</a>
                                            </td>
                                            <td><a
                                                    href="detail-product.php?idProduct=<?php echo $product['id'] ?>">DETAIL</a>
                                            </td>
                                            <td><a href="del-product.php?idProduct=<?php echo $product['id'] ?>">DELETE</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--/.Row-->
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>



</body>

</html>