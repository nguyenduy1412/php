<?php
include '../connect.php';
$student = mysqli_query($conn, "SELECT * FROM tbsinhvien");

// nếu bấm vào nút submit thì thực hiện
if (isset($_GET['masv'])) {
    $masv = $_GET['masv'];
    $data = mysqli_query($conn, "SELECT * FROM tbsinhvien WHERE masv = '$masv'");
    $stu = mysqli_fetch_assoc($data);
}
// nếu bấm vào nút submit thì thực hiện
if (isset($_POST['ho_ten'])) {
    $ho_ten = $_POST['ho_ten'];
    $lop = $_POST['lop'];
    $masv = $_POST['masv'];
    $gioi_tinh = $_POST['gioi_tinh'];
    $que_quan = $_POST['que_quan'];
    if (empty($_FILES['anh']['name'])) {
        $file_name = $stu['anh'];
    } else {
        $anh = $_FILES['anh'];
        $file_name = $anh['name'];
        move_uploaded_file($anh['tmp_name'], '../uploads/' . $file_name);
    }
    $sql = "UPDATE tbsinhvien SET ho_ten='$ho_ten',lop='$lop',que_quan='$que_quan',gioi_tinh=$gioi_tinh,anh='$file_name' WHERE masv='$masv'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        header('location: index.php');
    } else {
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
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <form role="form" method="post" action="" enctype="multipart/form-data">

                    <div class="box-body p-5">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã sinh viên</label>
                            <input type="text" class="form-control" name="masv" value="<?php echo $stu['masv'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Họ tên</label>
                            <input type="text" class="form-control" name="ho_ten" value="<?php echo $stu['ho_ten'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Lớp</label>
                            <input type="text" class="form-control" name="lop" value="<?php echo $stu['lop'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Giới tính</label>
                            <div class="form-check">
                                <input class="form-check-input" name="gioi_tinh" type="radio" <?php echo (($stu['gioi_tinh'] == 1) ? 'checked' : '') ?> value="1">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Nam
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="gioi_tinh" type="radio" value="0" <?php echo (($stu['gioi_tinh'] == 1) ? '' : 'checked') ?>>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Nữ
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Quê quán</label>
                            <input type="text" class="form-control" name="que_quan" value="<?php echo $stu['que_quan'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Ảnh</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="input" name="anh">
                                    <label class="custom-file-label" for="exampleInputFile"><?php echo $stu['anh'] ?></label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Tải ảnh</span>
                                </div>
                            </div>
                        </div>
                        <img id="imgCate" class="mb-3" src="../uploads/<?php echo $stu['anh'] ?>" width="100px">
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </div>
                    </div>

                   
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../jquery/jquery.slim.min.js"></script>
    <script src="../bootstrap/bootstrap.min.js"></script>
    <?php
    include '../comporent/js.php';
    ?>
</body>

</html>