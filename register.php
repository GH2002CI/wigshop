<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/register.css" />
</head>

<body>
    <h1>Registration Form</h1>
    <p>Please fill out this form with the required information</p>
    <form method="POST">
        <fieldset>
            <label>Name: <input type="text" name="name" required /></label>
            <label>Address: <input type="text" name="address" required /></label>
            <label>Phone: <input type="text" name="phone" required /></label>
            <label>Email: <input type="email" name="email" required /></label>
            <label>Password: <input type="password" name="password" required /></label>
        </fieldset>
        <input type="submit" name="submit" value="Submit" />
    </form>
    <?php
    include('control.php');
    $getdata = new data();
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $permission = "user";
        if (strlen($password < 8)) {
            echo "Password tối thiểu 8 kí tự";
        } else {
            $getEmail = $getdata->getByEmail($email);
            $row = mysqli_num_rows($getEmail);
            if ($row > 0) {
                echo "Email đã tồn tại";
            } else {
                $inUser = $getdata->inUser($name, $address, $phone, $email, $password, $permission);
                if ($inUser) {
                    echo "<script>alert('Đăng kí thành công'); location.href='login.php';</script>";
                } else {
                    echo "Thất bại";
                }
            }
        }
    }
    ?>
</body>

</html>