<?php
    require_once("/xampp/htdocs/buoith4/conn.php");
    require_once("/xampp/htdocs/buoith4/admin/blocks/func.php");
    $id = $_GET['idsp'];
    $sp = getCTSP($conn, $id);
    $r = mysqli_fetch_array($sp);
?>
<form action="" method="post" enctype="multipart/form-data">
    Tên: <input type="text" name="ten" value="<?php echo $r['ten'] ?>">
    Giá: <input type="number" name="gia" value="<?php echo $r['gia'] ?>">
    Hình: <img src="/buoith4/images/<?php echo $r['hinh'] ?>">
    <input type="hidden" name="hinhtamp" value="<?php echo $r['hinh'] ?>">
    <input type="file" name="hinh">
    Mô tả: <textarea name="mota"><?php echo $r['moTa'] ?></textarea>
    Loại sp: <select name="loai">
        <?php while($row = mysqli_fetch_array($dsLoai)) {
        ?>
            <option value="<?php echo $row ['id'];?>"><?php echo $row['ten']; ?> </option>
        <?php }
        ?>
    </select>
    <input type="submit" name="cnsp" value="Lưu sản phẩm">
</form>
<?php
    if(isset($_POST["cnsp"])) {
        $ten= $_POST['ten'];
        $gia= $_POST['gia'];
        $mota = $_POST['moTa'];
        $loai = $_POST['loai'];
        $hinh = "";
        if(isset($_FILES['hinh'])){
            $hinh = $_FILES['hinh']['name'];
            move_uploaded_file($_FILES['hinh']['tmp_name'],"/xampp/htdocs/buoith4/images/".$_FILES['hinh']['name']);
        }
        else
            $hinh = $_POST['hinhtamp'];
        
        $sqlUpdate = "update sanpham set ('null', '$ten', '$gia', '$hinh', '$mota', '$loai')";
        if(mysqli_query($conn, $sqlUpdate))
            echo "Sửa sản phẩm thành công";
        else
            echo "Sửa sản phẩm thất bại";
    }
?>
