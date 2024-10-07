<?php
include('connect.php');
class data
{
    //INSERT
    function inUser($name, $address, $phone, $email, $password, $permission)
    {
        global $conn;
        $sql = "INSERT INTO user (name, address, phone, email, password, permission) values ('$name', '$address', '$phone', '$email', '$password', '$permission')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function incart($idUser, $idProduct, $size, $color, $quantity)
    {
        global $conn;
        $sql = "INSERT INTO cart (idUser, idProduct, size, color, quantity) VALUES ('$idUser', '$idProduct', '$size', '$color', '$quantity')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function inreview($idUser, $idProduct, $evaluate, $content, $date)
    {
        global $conn;
        $sql = "INSERT INTO review(idUser, idProduct, evaluate, content, date) VALUES ('$idUser', '$idProduct', '$evaluate', '$content', '$date')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function in_favorite($idProduct, $idUser){
        global $conn;
        $sql = "INSERT INTO favorite (idUser, idProduct) VALUES ('$idUser', '$idProduct')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function place_order($name, $phone, $address, $product){
        global $conn;
        $sql = "INSERT INTO order_product (name, phone, address) VALUES ('$name', '$phone', '$address')";
        $conn->query($sql);
        $last_id = $conn->insert_id;
        $sql2 = "INSERT INTO order_detail (idorder, idProduct) values ('$last_id', '$product')";
        $run = $conn->query($sql2);
        $conn->commit();   
        return $run;
    }
    //SELECT
    function se_peoduct_featured()
    {
        global $conn;
        $sql = "SELECT * FROM product ORDER BY number_sell DESC LIMIT 8";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_product()
    {
        global $conn;
        $sql = "SELECT * FROM product ORDER BY number_sell DESC";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_product_category($category)
    {
        global $conn;
        $sql = "SELECT * FROM product WHERE category = '$category' ORDER BY number_sell DESC";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    function se_recent($product_start)
    {
        global $conn;
        $sql = "SELECT * FROM product ORDER BY date DESC LIMIT $product_start,16";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_recent_category($category, $product_start)
    {
        global $conn;
        $sql = "SELECT * FROM product WHERE category = '$category' ORDER BY date DESC LIMIT $product_start, 16";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function select5category($category)
    {
        global $conn;
        $sql = "SELECT * FROM product WHERE category = '$category' ORDER BY number_sell DESC LIMIT 5";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_category()
    {
        global $conn;
        $sql = "SELECT * FROM category";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_cart($idUser)
    {
        global $conn;
        $sql = "SELECT * FROM cart WHERE idUser = '$idUser'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_favorite($idUser)
    {
        global $conn;
        $sql = "SELECT * FROM favorite WHERE idUser = '$idUser'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function sereview($idProduct)
    {
        global $conn;
        $sql = "SELECT * FROM review WHERE idProduct = '$idProduct'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    //GET
    function getuser($email, $password)
    {
        global $conn;
        $sql = "SELECT * FROM user where email='$email' and password = '$password'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function getByEmail($email)
    {
        global $conn;
        $sql = "SELECT * FROM user where email='$email'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function get_product($id)
    {
        global $conn;
        $sql = "SELECT * FROM product WHERE id = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function getuserbyid($idUser)
    {
        global $conn;
        $sql = "SELECT * FROM user WHERE id = '$idUser'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function getcategory($idProduct)
    {
        global $conn;
        $sql = "SELECT * FROM product WHERE id = '$idProduct'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function get_favorite ($idProduct, $idUser){
        global $conn;
        $sql = "SELECT * FROM favorite WHERE idProduct = '$idProduct' AND idUser = '$idUser'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function get_coupon($name)
    {
        global $conn;
        $sql = "SELECT * FROM coupon where code='$name'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    //DELETE
    function del_favorite ($idProduct, $idUser){
        global $conn;
        $sql = "DELETE FROM favorite WHERE idProduct = '$idProduct' AND idUser = '$idUser'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

}
?>