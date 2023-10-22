<?php
include '../connect.php';
$student = mysqli_query($conn, "SELECT * FROM tblsinhvien");
if (isset($_POST['key'])) {
    $key = $_POST['key'];
   
    $student = mysqli_query($conn, "SELECT * FROM tblsinhvien where ho_ten like '%$key%'");
   

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
</head>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8 ">
                <div class="p-2 align-items-center d-flex justify-content-between" >
                    <div>
                        <a href="add.php" class="btn btn-success ">+Thêm sinh viên</a>
                    </div>

                    <div class="card-tools">
                        <form  method="post">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="key" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Ảnh</th>
                            <th>Tên Sinh Viên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Quê quán</th>
                            <th>Tùy chọn</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($student as $key => $value) : ?>
                            <tr>
                                <td scope="row"><?php echo $key + 1 ?></td>
                                <td><img src="../uploads/<?php echo $value['anh'] ?>" width="60px" height="80px"></td>
                                <td><?php echo $value['ho_ten'] ?></td>
                                <td><?php echo $value['ngay_sinh'] ?></td>
                                <?php if ($value['gioi_tinh'] == 1) { ?>
                                    <td>Nam</td>
                                <?php } else { ?>
                                    <td>Nữ</td>
                                <?php } ?>
                                <td><?php echo $value['que_quan'] ?></td>
                                <td title="Sửa"><a href="update.php?masv=<?php echo $value['masv'] ?>"><i class="fas fa-pen"></i></a></td>
                                <td title="Xóa"><a href="delete.php?masv=<?php echo $value['masv'] ?>" class="text-danger"><i class="fas fa-trash"></i></a></td>

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