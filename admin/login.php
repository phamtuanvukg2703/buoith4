<?php
    if(isset($_POST['user'])) {
        require_once("/xampp/htdocs/buoith4/conn.php");
        require_once("/xampp/htdocs/buoith4/admin/blocks/func.php");
        $user = $_POST['user'];
        $pass = $_POST['pass']; 
        $result = getAccount($conn, $user);
        mysqli_close($conn);
        if(password_verify($pass, $result['pass'])){
            if(session_id() === '')
                session_start();
            $_SESSION['user'] = $_POST['user'];
            echo '<script type="text/javascript">';
            echo 'alert("Login thành công!");';
            echo '</script>';
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta http-equiv="refresh" content="0; url=admin.php">
            </head>
            </html>
            <?php
            exit();
        }else
            echo "đăng nhập thất bại";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <form method="post" autocomplete="off">
        <div class = "container">
            <fieldset>
                <legend>Log in</legend>
                <div class = "user">
                    <label for="user">Username:</label>
                    <input type="text" name="user">
                </div>
                <div class = "password">
                    <label for="pass">Password:</label>
                    <input type="password" name="pass">
                </div>
        </fieldset>
            <div class = submit>
                <input type="submit" value="Go">
            </div>
        </div>
    </form>
</body>
</html>