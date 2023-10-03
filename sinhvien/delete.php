<?php
include '../connect.php';
    if(isset($_GET['masv'])){
        $masv=$_GET['masv'];
        $query=mysqli_query($conn,"DELETE FROM tbsinhvien WHERE masv='$masv'");
        if($query){
            header('location: index.php');
        }
        else{
            echo "Error";
        }
    }
?>