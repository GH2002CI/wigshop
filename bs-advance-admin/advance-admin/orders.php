<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

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
                        <h1 class="page-head-line">Đơn hàng</h1>
                    </div>
                </div>

                <!-- /. ROW  -->
                <div class="row">

                    <div class="col-md-4">
                        <div class="main-box mb-red">
                            <a href="#">

                                <h5>Zero Issues</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-dull">
                            <a href="#">

                                <h5>40 Task In Check</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-pink">
                            <a href="#">

                                <h5>200K Pending</h5>
                            </a>
                        </div>
                    </div>

                </div>
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">

                            </div>
                        </div>

                        <!-- /. ROW  -->
                        <hr />

                        <div class="panel panel-default">

                        </div>
                    </div>
                </div>

                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="list-group">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Người đặt</th>
                                        <th>Vourcher</th>
                                        <th>Tổng tiền</th>
                                        <th>Thời gian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    ob_start();
                                    include_once('control.php');
                                    $getdata = new dataadmin();
                                    if (isset($_GET['status'])) {

                                        $status = $_GET['status'];

                                        switch ($_GET['status']) {
                                            case 1:
                                                $btn = "nhận";
                                                break;
                                            case 2:
                                                $btn = "giao";
                                                break;
                                            case 3:
                                                $btn = "đã giao";
                                                break;
                                            case 4:
                                                break;
                                            default:
                                                header("Location: index.php");
                                                exit;
                                        }

                                    }
                                    $orders = $getdata->se_order($status);
                                    foreach ($orders as $order) {
                                        ?>
                                        <tr>

                                            <td><?php echo $order['id'] ?></td>
                                            <td><?php echo $order['name'] ?></td>
                                            <td><?php echo $order['coupon'] ?></td>
                                            <td><?php echo $order['total_money'] ?></td>
                                            <td><?php echo $order['time'] ?></td>
                                            <td>
                                                <div style=";">
                                                    <?php
                                                    if (isset($_GET['status']) && $_GET['status'] < 4) {
                                                        ?>
                                                        <a
                                                            href="process_order.php?id=<?php echo $order['id'] ?>&status=<?php echo $status + 1 ?>"><button
                                                                class="btn btn-primary btn-info"><?php echo $btn ?></button></a>
                                                        <a href=""><button class="btn btn-primary btn-info">Hủy</button></a>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </td>

                                        </tr>
                                        <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <br />
                        <!-- 16:9 aspect ratio -->
                        <div class="embed-responsive embed-responsive-16by9">

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Div
                            </div>

                            <div class="panel-body">
                                <div class="list-group">

                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-twitter fa-fw"></i>3 New Followers
                                        <span class="pull-right text-muted small"><em>12 minutes ago</em></span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-envelope fa-fw"></i>Message Sent
                                        <span class="pull-right text-muted small"><em>27 minutes ago</em></span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        New Task
                                        <span class="pull-right text-muted small"><em>43 minutes ago</em></span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        Server Rebooted
                                        <span class="pull-right text-muted small"><em>11:32 AM</em></span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        Server Crashed!
                                        <span class="pull-right text-muted small"><em>11:13 AM</em></span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-warning fa-fw"></i>Server Not Responding
                                        <span class="pull-right text-muted small"><em>10:57 AM</em></span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        Server Crashed!
                                        <span class="pull-right text-muted small"><em>11:13 AM</em></span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-warning fa-fw"></i>
                                        Server Not Responding
                                        <span class="pull-right text-muted small"><em>10:57 AM</em></span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-shopping-cart fa-fw"></i>
                                        New Order Placed
                                        <span class="pull-right text-muted small"><em>9:49 AM</em></span>
                                    </a>
                                </div>
                                <!-- /.list-group -->
                                <a href="#" class="btn btn-info btn-block">View All Alerts</a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

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
    <?php ob_end_flush() ?>


</body>

</html>