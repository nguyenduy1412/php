<?php
include '../connect.php';
$user = mysqli_query($conn, "SELECT * FROM tbluser");

// nếu bấm vào nút submit thì thực hiện
if (isset($_POST['fullname'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    
    $sql = "INSERT INTO tbluser(username,password,fullname) Values('$username','$password','$fullname')";
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
                <form role="form" method="post" action="" >
                    <div class="box-body p-5">
                       
                        <div class="form-group">
                            <label for="exampleInputEmail1">FullName</label>
                            <input type="text" class="form-control" name="fullname">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">UserName</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                      
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div> 
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