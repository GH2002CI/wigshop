<?php
include('control.php');
$getdata = new data();
session_start();
if ($_GET['favorite']==="favorite") {
    if ($getdata->in_favorite($_GET['idProduct'], $_SESSION['idUser'])) {
        echo "<script>alert('Đã thêm vào danh sách yêu thích')</script>";
        echo "<script>window.location='index.php'</script>";
    }
}
if ($_GET['favorite']==="unfavorite") {
    if ($getdata->del_favorite($_GET['idProduct'], $_SESSION['idUser'])) {
        echo "<script>alert('Đã xóa khỏi danh sách yêu thích')</script>";
        echo "<script>window.location='index.php'</script>";
    }
}
?>