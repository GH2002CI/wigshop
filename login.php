<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class="login" method="POST">
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" name="email" class="login__input" placeholder="Email">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" name="password" class="login__input" placeholder="Password">
                    </div>
                    <button class="button login__submit" name="login">
                        <span class="button__text"><a style="text-decoration: none;">LOG IN
                                NOW</a></span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>
                <?php
                include('control.php');
                $getdata = new data();
                session_start();
                
                if (isset($_POST['login'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    
                    if (empty($_POST) || empty($password)) {
                        echo "Điền thông tin đăng nhập";
                    } else {
                        $getUser = $getdata->getuser($email, $password);
                        
                        if (mysqli_num_rows($getUser)>0) {
                            $result = mysqli_fetch_assoc($getUser);
                            $_SESSION['idUser'] = $result['id'];
                            $_SESSION['nameUser'] = $result['last_name'];
                            $_SESSION['permission'] = $result['permission'];
                            $_SESSION['page']="admin";
                            header("Location:index.php");
                        } else {
                            echo "Thông tin sai";
                        }
                    }
                }
                ?>
                <div class="social-login">
                    <h3><a style="text-decoration: none;" href="register.php">Sign up</a></h3>
                    <div class="social-icons">
                        <a href="#" class="social-login__icon fab fa-instagram"></a>
                        <a href="#" class="social-login__icon fab fa-facebook"></a>
                        <a href="#" class="social-login__icon fab fa-twitter"></a>
                    </div>
                </div>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
</body>

</html>