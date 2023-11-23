<?php
    require_once("/xampp/htdocs/buoith4/conn.php");
    require_once("func.php");
    $dsLoai = getLoai($conn);
?>
<form action="" method="post" enctype="multipart/form-data">
    Tên: <input type="text" name="ten" required>
    Giá: <input type="number" name="gia" required>
    Hình: <input type="file" name="hinh" id="">
    Mô tả: <textarea name="mota"></textarea>
    Loại sp: <select name="loai">
        <?php while($row = mysqli_fetch_array($dsLoai)) {
        ?>
            <option value="<?php echo $row ['id'];?>"><?php echo $row['ten']; ?> </option>
        <?php }
        ?>
    </select>
    <input type="submit" name="taosp" value="Lưu sản phẩm">
</form>
<?php
    if(isset($_POST["taosp"])) {
        $ten= $_POST['ten'];
        $gia= $_POST['gia'];
        $hinh = $_FILES['hinh']['name'];
        move_uploaded_file($_FILES['hinh']['tmp_name'],"/xampp/htdocs/buoith4/images/".$_FILES['hinh']['name']);
        $mota = $_POST['moTa'];
        $loai = $_POST['loai'];
        $sqlInsert = "insert into sanpham(ten, gia, hinh, moTa, loai) values ('$ten', '$gia', '$hinh', '$mota', '$loai')";
        if(mysqli_query($conn, $sqlInsert))
            echo "Thêm sản phẩm thành công";
        else
            echo "không thể thêm dữ liệu";
    }
?>