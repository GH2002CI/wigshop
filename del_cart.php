<?php
include_once("connect.php"); 

if (isset($_GET['cart'])) {
    $cart = $_GET['cart'];

    // Sử dụng prepared statements để ngăn chặn SQL injection
    $stmt = $conn->prepare("DELETE FROM cart WHERE id = ?");
    $stmt->bind_param("i", $cart); // 'i' đại diện cho kiểu số nguyên

    if ($stmt->execute()) {
        $conn->commit();
        ?>
        <script>
            alert("Xóa thành công");
            window.location.href = "cart.php";
        </script>
        <?php
    } else {
        // Trường hợp truy vấn thất bại
        ?>
        <script>
            alert("Có lỗi xảy ra khi xóa");
            window.location.href = "cart.php";
        </script>
        <?php
    }

    $stmt->close(); // Đóng prepared statement

} else {
    ?>
    <script>
        alert("Không có sản phẩm nào được chọn để xóa");
        window.location.href = "cart.php";
    </script>
    <?php
}
$conn->close(); // Đóng kết nối cơ sở dữ liệu
?>
