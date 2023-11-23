<table>
    <tr>
        <th>STT</th>
        <th>Tên sản phẩm</th>
        <th>Điều chỉnh</th>
    </tr>
    <?php
        require_once("/xampp/htdocs/buoith4/admin/blocks/func.php");
        require_once('/xampp/htdocs/buoith4/conn.php');
        $dssp = getSP($conn);
        $i = 1;
        while ($r = mysqli_fetch_array($dssp)){
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $r['ten']; ?></td>
        <td><a href="?page=chitiet&idsp=<?php echo $r['id']; ?>">Xem chi tiết</a> | <a href="?page=suasp&idsp=<?php echo $r['id']?>">sửa</a> |
        <form method= "post">
        <input type="hidden" name="id" value="<?php $r['id']?>">
        <input type="submit" value="Xóa" name="del">
        </form>


        
        </td>
    </tr>
    <?php $i++;
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
        $sql = "delete from sanpham where id='$id'";
        if(mysqli_query($conn, $sql)){
            echo "thành công";
            $path = $_SERVER["SCRIPT_NAME"];
            if(isset($_SERVER["QUERY_STRING"])&&$_SERVER["QUERY_STRING"]!="")
                $path=$path."?".$_SERVER['QUERY_STRING'];
            echo $path;
            header("Refresh:0, url ='$path'");        
        }
        else
            echo "thất bại";
    }
?>
