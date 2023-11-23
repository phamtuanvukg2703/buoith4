<?php
    require_once("/xampp/htdocs/buoith4/conn.php");
    require_once("func.php");
?>
<form action="" method="post">
    <label for="ten">Tên nhóm:</label>
    <input type="text" name="ten" required>
    <label for="thutu">Thứ tự:</label>
    <input type="number" name="thutu">
    <input type="checkbox" name="noibat" value = "1">
    <label for="noibat">Nổi bật</label>
    <input type="submit" name="taonhom" value="Thêm">
</form>
<?php
if(isset($_POST['taonhom'])){
    $ten = $_POST['ten'];
    $thutu = $_POST['thutu'];
    $noibat = 0;
    if(isset($_POST['noibat'])){
        $noibat = 1;
    }
    $sqlInsert = "insert into loai(ten, noiBat, thuTu) values ('$ten','$noibat','$thutu')";
    if(mysqli_query($conn, $sqlInsert))
        echo "Thêm nhóm thành công";
    else
        echo "Không thể thêm nhóm";
}
?>