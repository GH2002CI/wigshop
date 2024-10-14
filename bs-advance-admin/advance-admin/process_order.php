<?php
include_once('control.php');

if (isset($_GET['id']) && isset($_GET['status'])) {
    $getdata = new dataadmin;
    $getdata->process_order($_GET['id'], $_GET['status']);
    ?>
    <script>
        window.location.href("orders.php?status=<?php echo $_GET['status'] - 1 ?>")
    </script>
    <?php
} else {
    header("Location: index.php");
    exit;
}

?>