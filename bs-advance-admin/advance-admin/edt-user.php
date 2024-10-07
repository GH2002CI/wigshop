<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="assets/css/register.css" />
</head>

<body>
    <?php
    include('control.php');
    $getdata = new dataadmin();
    $getuser = $getdata->get_user_id($_GET['idUser']);
    foreach ($getuser as $user)
    ?>
    <h1>Edit Form</h1>
    <p>Please fill out this form with the required information</p>
    <form method="POST" enctype="multipart/form-data">
        <fieldset>
            <div style="width:200px; height:200px;">
                <input type="file" name="avatar" onchange="previewImage(event)">
                <img id="preview" class="form-control" src="img/avatar-user/<?php echo $user['avatar'] ?>"
                    alt="Preview Image" style="max-width:200px; max-height:200px; min-height: 100px;">
            </div>
            <label>Name: <input type="text" name="name" value="<?php echo $user['name'] ?>" required /></label>
            <label>Address: <input type="text" name="address" value="<?php echo $user['address'] ?>" required /></label>
            <label>Phone: <input type="text" name="phone" value="<?php echo $user['phone'] ?>" required /></label>
            <label>Email: <input type="email" name="email" value="<?php echo $user['email'] ?>" required /></label>
            <label>Password: <input type="password" name="password" value="<?php echo $user['password'] ?>"
                    required /></label>
            <label>Re Password: <input type="password" name="repassword" value="<?php echo $user['password'] ?>"
                    required /></label>
            <label>Permission:
                <select name="permission" id="">
                    <option value="<?php echo $user['permission'] ?>"><?php echo $user['permission'] ?></option>
                    <option value="Admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </label>
        </fieldset>
        <input type="submit" name="submit" value="Submit" />
        <a href="index.php">Return</a>
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
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $permission = $_POST['permission'];
        if ($_FILES['avatar'] && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
            $avatar = date("Y-m-d H-i-s") . " - " . $_FILES['avatar']['name'];
        } else {
            $avatar = $user['avatar'];
        }
        if (strlen($password < 8)) {
            echo "Password tối thiểu 8 kí tự";
        } elseif ($password !== $repassword) {
            echo "Password sai";
        } else {
            if ($name !== $user['name']) {
                if (mysqli_num_rows($getdata->get_user_name($name)) > 0) {
                    echo "Fail! Again";
                } else {
                    if ($email !== $user['email']) {
                        if (mysqli_num_rows($getdata->get_user_mail($email)) > 0) {
                            echo "Fail! Again";
                        } else {
                            $upuser = $getdata->up_user($avatar, $name, $address, $phone, $email, $password, $permission, $_GET['idUser']);
                            if ($_FILES['avatar'] && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                                move_uploaded_file($_FILES['avatar']['tmp_name'], "img/avatar-user/" . $avatar);
                            }
                            if ($upuser) {
                                echo "<script>alert('Success'); location.href='list-user.php';</script>";
                            } else {
                                echo "<script>alert('Fail'); location.href='list-user.php';</script>";
                            }
                        }
                    } else {
                        $upuser = $getdata->up_user($avatar, $name, $address, $phone, $email, $password, $permission, $_GET['idUser']);
                        if ($_FILES['avatar'] && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                            move_uploaded_file($_FILES['avatar']['tmp_name'], "img/avatar-user/" . $avatar);
                        }
                        if ($upuser) {
                            echo "<script>alert('Success'); location.href='list-user.php';</script>";
                        } else {
                            echo "<script>alert('Fail'); location.href='list-user.php';</script>";
                        }
                    }

                }
            } else {
                $upuser = $getdata->up_user($avatar, $name, $address, $phone, $email, $password, $permission, $_GET['idUser']);
                if ($_FILES['avatar'] && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                    move_uploaded_file($_FILES['avatar']['tmp_name'], "img/avatar-user/" . $avatar);
                }
                if ($upuser) {
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