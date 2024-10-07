<?php
include('control.php');
$getdata = new dataadmin();
if (($getdata->del_product($_GET['idProduct'])) == true) {
    echo "<script>alert('Success'); location.href='list-product.php'</script>";
} else {
    echo "<script>alert('Fail'); location.href='list-product.php'</script>";
}
?>