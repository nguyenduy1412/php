<?php
include '../connect.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $query=mysqli_query($conn,"DELETE FROM tbluser WHERE id='$id'");
        if($query){
            header('location: index.php');
        }
        else{
            echo "Error";
        }
    }
?>