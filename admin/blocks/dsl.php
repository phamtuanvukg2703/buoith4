<table>
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Nổi bật</th>
    </tr>
<?php
    require_once("/xampp/htdocs/buoith4/admin/blocks/func.php");
    require_once('/xampp/htdocs/buoith4/conn.php');
    $dsl = getLoai($conn);
    $i = 1;
    while($r = mysqli_fetch_array($dsl)){
?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $r['ten']; ?></td>
        <td><a href="?page=capNhatNhom&idsp=<?php echo $r['id']?>">sửa</a>
        <form method= "post">
            <input type="hidden" name="id" value="<?php $r['id']?>">
            <input type="submit" value="Xóa" name="del">
        </form>
        </td>
    </tr>
<?php 
$i++;
    }
?>
</table>
<?php 
    if(isset($_GET['page'])) {
        $path = "/xampp/htdocs/buoith4/admin/blocks/";
        require($path.$_GET['page'].".php");
    }
?>
<?php
    if(isset($_POST['del'])) {
        $id = $_POST['id'];
        $sql = "delete from loai where id='$id'";
        if(mysqli_query($conn, $sql))
            echo "thành công";
        else
            echo "thất bại";
    }
?>