<?php
    require("/xampp/htdocs/buoith4/conn.php");
    require("/xampp/htdocs/buoith4/admin/blocks/func.php");
    if(session_id() === ''){
        session_start();
    }
    if(!isset($_SESSION['user'])){
        header("Location: login.php");
        exit();
    }
    $user = $_SESSION['user'];
    $result = getAccount($conn, $user);
    if(!isset($result)){
        header("Location: login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Document</title>
</head>
<body>
    <div class ="banner">
        <h2>QUẢN LÝ HỆ THỐNG BÁN HÀNG</h2>
        <img src="../banner/banner.jpg" class ="backgr">
        <img src="../banner/co2.png" class ="co1">
        <img src="../banner/co2.png" class = "co2">
        <img src="../banner/bang.png" class ="bang">
    </div>
    <div>
        <ul>
            <li><a href="admin.php">Trang chủ</a></li>
                <li>
                    <a href="#">Thêm</a>
                    <div class = item>
                        <a href="?page=themsp">Thêm sản phẩm</a>
                        <a href="?page=themNhom">Thêm nhóm</a>
                    </div>
                </li>
                <li><a href="blocks/dssp.php">Cập nhật sản phẩm</a></li>
                <li><a href="blocks/dsl.php">Cập nhật nhóm</a></li>
                <li>Xin chào:<?php echo $result['ho'].' '.$result['ten']; ?></li>
        </ul>
    </div>
    <div>
        <?php
        if(isset($_GET['page'])) {
            $path = "/xampp/htdocs/buoith4/admin/blocks/";
            require($path.$_GET['page'].".php");
        }
        ?>
    </div>
    <div>Footer</div>
</body>
</html>