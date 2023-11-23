<?php
require_once("/xampp/htdocs/buoith4/conn.php");
require_once("/xampp/htdocs/buoith4/admin/blocks/func.php");
$id = $_GET['idsp'];
$sp = getCTSP($conn,$id);
$r = mysqli_fetch_array($sp);
?>
<div>
    <div><?php echo $r['ten'] ?> </div>
    <div><?php echo $r['gia'] ?> </div>
    <div><img src="../../images/<?php echo $r['hinh'] ?>"> </div>
    <div><?php echo $r['moTa'] ?> </div>
</div>