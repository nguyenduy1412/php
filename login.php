<?php
include './connect.php';

if (isset($_POST['username'])) {
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `tbluser` WHERE username='$username' and password='$password'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);

    if ($count == 1) {
        $_SESSION["loged"] = true;
        $_SESSION['username'] = $username;
        setcookie("success", "Đăng nhập thành công!", time() + 1, "/", "", 0);
        header('location: formchinh.php');
    } else {
        header("location:login.php");
        setcookie("error", "Đăng nhập không thành công!", time() + 1, "/", "", 0);
        echo "Error";
    }
}

mysqli_close($conn);
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <style>
        .btn-login {
            width: 100%;
            font-weight: bold;
        }

        .form-login {
            background-color: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: -9px 12px 5px rgba(25, 42, 70, 0.13);
            ;
        }

        .boxform {
            height: 90vh;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center boxform">
            <div class="col-lg-6 col-md-8 col-sm-10 ">
                <?php
                if (isset($_COOKIE["error"])) {
                ?>
                    <div class="alert alert-danger">
                        <strong>Có lỗi!</strong> <?php echo $_COOKIE["error"]; ?>
                    </div>
                <?php            }
                ?>
                <div class="form-login">
                    <h3 class="text-center pb-3">Đăng nhập</h3>
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Tên tài khoản" name="username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-login">Đăng nhập</button>

                    </form>
                </div>

            </div>
        </div>

    </div>
</body>