<?php
include('connect.php');
class dataadmin
{
    //INSERT
    function inUser($name, $address, $phone, $email, $password, $permission)
    {
        global $conn;
        $sql = "INSERT INTO user (name, address, phone, email, password, permission) values ('$name', '$address', '$phone', '$email', '$password', '$permission')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function inProduct($name, $image, $price, $color, $category, $time, $deception)
    {
        global $conn;
        $sql = "INSERT INTO product (name, image, price, color, category, date, infomation) values ('$name', '$image', '$price', '$color', '$category', '$time', '$deception')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function in_category($name, $image)
    {
        global $conn;
        $sql = "INSERT INTO category (category, cover) VALUES ('$name', '$image')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    //SELECT
    function se_product()
    {
        global $conn;
        $sql = "SELECT * FROM product";
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
    function se_product_cate($category)
    {
        global $conn;
        $sql = "SELECT * FROM product WHERE category = '$category'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_user_permission($permission)
    {
        global $conn;
        $sql = "SELECT * FROM user WHERE permission = '$permission'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_permission()
    {
        global $conn;
        $sql = "SELECT * FROM product";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_cart($idUser)
    {
        global $conn;
        $sql = "SELECT * FROM cart WHERE idUser='$idUser'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    //GET
    function get_product($idProduct)
    {
        global $conn;
        $sql = "SELECT * FROM product WHERE id = '$idProduct'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function get_category($category)
    {
        global $conn;
        $sql = "SELECT * FROM category WHERE category = '$category'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function get_user_mail($email)
    {
        global $conn;
        $sql = "SELECT * FROM user where email='$email'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function get_user_id($idUser)
    {
        global $conn;
        $sql = "SELECT * FROM user where id='$idUser'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function get_user_name($name)
    {
        global $conn;
        $sql = "SELECT * FROM user where name ='$name'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    //UPDATE
    function up_category($category, $cover, $name)
    {
        global $conn;
        $sql = "UPDATE category SET category = '$category', cover='$cover' WHERE category = '$name'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function up_user($avatar, $name, $address, $phone, $email, $password, $permission, $idUser)
    {
        global $conn;
        $sql = "UPDATE user SET avatar = '$avatar', name ='$name', address = '$address', phone = '$phone', email = '$email', password = '$password', permission = '$permission' WHERE id = '$idUser'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    //DELETE
    function del_user($idUser)
    {
        global $conn;
        $sql = "DELETE FROM user WHERE id = '$idUser'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function del_category($name)
    {
        global $conn;
        $sql = "DELETE FROM category WHERE category = '$name'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function del_product($id)
    {
        global $conn;
        $sql = "DELETE FROM product WHERE id = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
}
?>