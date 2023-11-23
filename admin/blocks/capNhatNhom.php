<?php
    require_once("/xampp/htdocs/buoith4/conn.php");
    require_once("/xampp/htdocs/buoith4/admin/blocks/func.php");
    $id = $_GET['idsp'];
    $l = getCTL($conn, $id);
    $r = mysqli_fetch_array($l);
?>
<form action="" method="post">
    Tên: <input type="text" name="ten" value="<?php echo $r['ten'] ?>">
    Thứ tự: <input type="number" name="thutu" value="<?php echo $r['thuTu'] ?>">
    Nổi bật: <input type="checkbox" name="noibat" value="<?php echo $r['noiBat'] ?>">
    <input type="submit" value="Cập nhật loại" name = "cnl">
</form>
<?php
if(isset($_POST['cnl'])){
    $ten = $_POST['ten'];
    $thutu = $_POST['thutu'];
    $noibat = $_POST['noibat'];
    $sqlUpdate = "update loai set ('null','$ten','$noibat','$thutu')";
    if(mysqli_query($conn, $sqlUpdate))
        echo "Sửa loại thành công";
    else
        echo "Sửa loại thất bại";
}
?>