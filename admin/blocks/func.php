<?php
    require_once("/xampp/htdocs/buoith4/conn.php");
    function getLoai($conn){
        $sql = "select * from loai";
        return mysqli_query($conn, $sql);
    };
    function getCTL($conn, $id){
        $sql = "select * from loai where id = '$id'";
        return mysqli_query($conn, $sql);
    }
    function getSP($conn){
        $sql = "select * from sanpham";
        return mysqli_query($conn, $sql);
    };
    function getCTSP($conn, $id){
        $sql = "select * from sanpham where id='$id'";
        return mysqli_query($conn, $sql);
    }
    function getAccount($conn, $user){
        $sql = "select * from taikhoan where user ='$user'";
        $result = null;
        if($sql_result = mysqli_query($conn, $sql)){
            if($row = mysqli_fetch_assoc($sql_result)) {
                $result = $row;
            }
        }
        mysqli_free_result($sql_result);
        return $result;
    };
?>