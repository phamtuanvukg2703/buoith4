<div>
    <h2>CẤP TÀI KHOẢN</h2>
    <form method="post">
        <label for="ho">Họ:</label> <br>
        <input type="text" name="ho" placeholder="Nhập họ" required>
        <label for="ten">Tên:</label> 
        <input type="text" name="ten" placeholder="Nhập tên" required> <br>
        <label for="gioitinh">Chọn giới tính:</label> <br>
        <input type="radio" name="gioitinh" id="male" value="male">
        <label for="male">Nam</label>
        <input type="radio" name="gioitinh" id="female" value="female">
        <label for="female">Nữ</label> <br>
        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Nhập Email" required> <br>
        <label for="user">Tài khoản:</label>
        <input type="text" name="user" placeholder="Nhập tài khoản" required> <br>
        <label for="pass">Password:</label>
        <input type="password" name="pass" placeholder="Nhập mật khẩu" required><br>
        <input type="submit" value="Tạo" name="taotk"> 
    </form>
</div>

<?php
    require_once("/xampp/htdocs/buoith4/conn.php");
    if(isset($_POST['taotk'])){
        $ho = $_POST['ho'];
        $ten = $_POST['ten'];
        $gioitinh = $_POST['gioitinh'];
        if ($gioitinh == "male") {
            $gioitinh = 1;
          }else {
            $gioitinh = 0;
          }
        $email = $_POST['email'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $hash = password_hash($pass,PASSWORD_DEFAULT);
        $sqlInsert = "insert into taikhoan(ho, ten, gioitinh, email, user, pass, quyen) values ('$ho', '$ten', '$gioitinh', '$email', '$user', '$hash','1')";
        if(mysqli_query($conn, $sqlInsert))
            echo "Tạo tài khoản thành công";
        else
            echo "Tạo tài khoản thất bại";
    }
?>