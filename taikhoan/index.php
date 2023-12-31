<?php
include '../connect.php';
$user = mysqli_query($conn, "SELECT * FROM tbluser");
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
</head>

<body>
<div class="container">
       
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8 ">
                <a href="add.php" class="btn btn-success mt-5">+Thêm tài khoản</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Password</th>
                           
                            <th>Tùy chọn</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user as $key => $value) : ?>
                            <tr>
                                <td scope="row"><?php echo $key + 1 ?></td>
                               
                                <td><?php echo $value['fullname'] ?></td>
                                <td><?php echo $value['username'] ?></td>
                                <td><?php echo $value['password'] ?></td>
                                <td title="Sửa"><a href="update.php?id=<?php echo $value['id'] ?>"><i class="fas fa-pen"></i></a></td>
                                <td title="Xóa"><a href="delete.php?id=<?php echo $value['id'] ?>" class="text-danger"><i class="fas fa-trash"></i></a></td>
                                
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../jquery/jquery.slim.min.js"></script>
    <script src="../bootstrap/bootstrap.min.js"></script>
</body>

</html>