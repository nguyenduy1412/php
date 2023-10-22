<?php
include '../connect.php';
$student = mysqli_query($conn, "SELECT * FROM tblSinhVien");

// nếu bấm vào nút submit thì thực hiện
if (isset($_POST['ho_ten'])) {
    $ho_ten = $_POST['ho_ten'];
    $ngay_sinh= $_POST['ngay_sinh'];
    $gioi_tinh = $_POST['gioi_tinh'];
    $que_quan = $_POST['que_quan'];
    if (isset($_FILES['anh'])) {
        $anh = $_FILES['anh'];
        $file_name = $anh['name'];
        move_uploaded_file($anh['tmp_name'], '../uploads/' . $file_name);
    }
    $sql = "INSERT INTO tblsinhvien(ho_ten,ngay_sinh,que_quan,gioi_tinh,anh) Values('$ho_ten','$ngay_sinh','$que_quan',$gioi_tinh,'$file_name')";
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
                            <label for="exampleInputEmail1">Họ tên</label>
                            <input type="text" class="form-control" name="ho_ten">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngày sinh</label>
                            <input type="date" class="form-control" name="ngay_sinh">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Giới tính</label>
                            <div class="form-check">
                                <input class="form-check-input" name="gioi_tinh" type="radio" checked="checked" value="1">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Nam
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="gioi_tinh" type="radio" value="0">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Nữ
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Quê quán</label>
                            <input type="text" class="form-control" name="que_quan">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="input" name="anh">
                                    <label class="custom-file-label" for="exampleInputFile">Chọn ảnh</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Tải ảnh</span>
                                </div>
                            </div>
                        </div>
                        
                        <img id="imgCate" class="mb-3 d-none" src="../uploads/<?php echo $stu['anh'] ?>" width="100px">
                         
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Thêm</button>
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