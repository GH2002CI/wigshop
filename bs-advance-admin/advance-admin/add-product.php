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

            <div class="header-right">

                <a href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i
                        class="fa fa-envelope-o fa-2x"></i></a>
                <a href="message-task.html" class="btn btn-primary" title="New Task"><b>40 </b><i
                        class="fa fa-bars fa-2x"></i></a>
                <a href="login.html" class="btn btn-danger" title="Logout"><i
                        class="fa fa-exclamation-circle fa-2x"></i></a>


            </div>
        </nav>

        <!-- /. NAV TOP  -->
        <?php include('menu.php') ?>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Add Product</h1>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="panel panel-info">
                        <div class="panel-heading">

                        </div>
                        <div class="panel-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div style="display: flex;">
                                    <div style="width:250px; height:200px;">
                                        <input type="file" name="image" onchange="previewImage(event)">
                                        <img id="preview" class="form-control" src="#" alt="Preview Image"
                                            style="min-width: 250px; min-height: 200px; display: none;">
                                    </div>
                                    <div class="form-group" style="margin-left: 10px;">
                                        <label>Name:
                                            <input class="form-control" name="name" type="text">
                                        </label>
                                        <br>
                                        <label>Price:
                                            <input class="form-control" name="price" type="accurency">
                                        </label>
                                        <br>
                                        <label>Color:
                                            <input class="form-control" name="color" type="text">
                                        </label>
                                        <br>
                                        <label>Category:
                                            <select class="form-control" name="category" id="category">
                                                <?php
                                                $seCategory = $getdata->se_category();
                                                foreach ($seCategory as $category) { ?>
                                                    <option value="<?php echo $category['category'] ?>">
                                                        <?php echo $category['category'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </label>
                                        <br>
                                        <label>Deception:
                                            <textarea class="form-control" name="deception"></textarea>
                                        </label>
                                    </div>
                                </div>
                                <input type="submit" name='submit' class="btn btn-info" value="Add Product">
                            </form>
                            <script>
                                function previewImage(event) {
                                    var reader = new FileReader();
                                    reader.onload = function () {
                                        var preview = document.getElementById('preview');
                                        preview.src = reader.result;
                                        preview.style.display = "block";
                                    };
                                    reader.readAsDataURL(event.target.files[0]);
                                }
                            </script>
                            <?php
                            if (isset($_POST['submit'])) {
                                if ($_FILES['image'] && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                                    $file_size = $_FILES['image']['size'];
                                    $file_tmp = $_FILES['image']['tmp_name'];
                                    $file_type = $_FILES['image']['type'];
                                    $file_content = file_get_contents($file_tmp);

                                    $file_name_parts = explode('.', $_FILES['image']['name']);
                                    $file_ext = strtolower(end($file_name_parts));
                                    $extensions = array("jpeg", "jpg", "png");

                                    if (in_array($file_ext, $extensions) === false) {
                                        echo "Chỉ được upload file có định dạng JPEG, JPG hoặc PNG.";
                                    } else {
                                        if ($file_size > 2097152) {
                                            echo 'Kích thước file phải nhỏ hơn 2MB';
                                        } else {
                                            $file_dir = "img/";
                                            $file_target = date("YmdHis") . "-" . basename($_FILES['image']['name']);

                                            if (empty($_POST['name'])) {
                                                echo "Nhập tên sản phẩm";
                                            } elseif (empty($_POST['price'])) {
                                                echo "Nhập giá sản phẩm";
                                            } else {
                                                $deception = $_POST['deception'];
                                                $time = isset($_POST["time"]) ? $_POST["time"] : date("Y-m-d H:i:s");

                                                $inProduct = $getdata->inProduct($_POST['name'], $file_target, $_POST['price'], $_POST['color'], $_POST['category'], $time, deception: $deception);

                                                $uploadIMG = move_uploaded_file($file_tmp, $file_dir . $file_target);
                                                if ($inProduct !== false && $uploadIMG !== false) {
                                                    echo "Them moi san pham thanh cong";
                                                } else {
                                                    echo "Them moi san pham that bai";
                                                }
                                            }
                                        }
                                    }
                                } else {
                                    echo "File trống!";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!--/.ROW-->
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