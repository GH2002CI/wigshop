<?php
include('control.php');
session_start();
$getdata = new dataadmin();
$cartInfo = array();
if ((mysqli_num_rows($getdata->se_cart($_SESSION['idUser']))) > 0) {
    while ($row = mysqli_fetch_assoc($seItem)) {
        $productId = $row['idProduct'];
        $size = $row['size'];
        $color = $row['color'];
        $quantity = $row['quantity'];
        foreach (($getdata->get_product($productId)) as $pro)
            $price = $pro['price'];
        $image = $pro['image'];
        $name = $pro['name'];
        $total_money = $quantity * $pro['price'];
        $cartInfo[] = array(
            'productId' => $productId,
            'quantity' => $quantity,
            'size' => $size,
            'color' => $color,
            'price' => $price,
            'image' => $image
        );
    }
}
echo json_encode($cartInfo);
?>