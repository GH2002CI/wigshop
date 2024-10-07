<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="assets/css/register.css" />
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
            <label>Re Password: <input type="password" name="repassword" required /></label>
            <label>Permission:
                <select name="permission" id="">
                    <option value="Admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </label>
        </fieldset>
        <input type="submit" name="submit" value="Submit" />
        <a href="index.php">Return</a>
    </form>
    <?php
    include('control.php');
    $getdata = new dataadmin();
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $permission = $_POST['permission'];
        if (strlen($password < 8)) {
            echo "Password tối thiểu 8 kí tự";
        } elseif ($password !== $repassword) {
            echo "Password sai";
        } else {
            $row = mysqli_num_rows($getdata->get_user_mail($email));
            if ($row > 0) {
                echo "Email đã tồn tại";
            } else {
                $inUser = $getdata->inUser($name, $address, $phone, $email, $password, $permission);
                if ($inUser) {
                    echo "<script>alert('Success'); location.href='list-user.php';</script>";
                } else {
                    echo "<script>alert('Fail'); location.href='list-user.php';</script>";
                }
            }
        }
    }
    ?>
</body>

</html>