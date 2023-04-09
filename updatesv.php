<IDOCTYPE html>
<html lang="en">
    <head>
        <title>Cập nhật thông tin sinh viên</title>
    </head>
    <body>
        <h3> Cập nhật thông tin sinh viên </h3>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="border">
            ID<BR> <input type="text" name="id" value ="<?php echo isset($_POST['id']) ? $_POST['id'] : ''; ?>"><BR>
            Họ và tên<BR> <input type="text" name="name" value ="<?php echo $name;?>"><BR>
            Năm sinh<BR> <input type="text" name="birthday" value ="<?php echo $birthday ?>"><BR>
            Email<BR> <input type="text" name="email" value ="<?php echo $email ?>"><BR>
            <input type="submit" name="submit" value="submit">
        </form> 
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $id=$_POST["id"];
                $name = $_POST["name"];
                $birthday = $_POST["birthday"];
                $email = $_POST["email"];
    
                $MYSQL_ADDON_HOST = getenv('MYSQL_ADDON_HOST');
                $MYSQL_ADDON_PORT = getenv('MYSQL_ADDON_PORT');
                $MYSQL_ADDON_DB = getenv('MYSQL_ADDON_DB');
                $MYSQL_ADDON_USER = getenv('MYSQL_ADDON_USER');
                $MYSQL_ADDON_PASSWORD = getenv('MYSQL_ADDON_PASSWORD');
    
                $conn = mysqli_connect($MYSQL_ADDON_HOST, $MYSQL_ADDON_USER, $MYSQL_ADDON_PASSWORD, $MYSQL_ADDON_DB, $MYSQL_ADDON_PORT);
    
                if (!$conn) {
                    echo "<br>" . "Error: Không thể kết nối với cơ sở dữ liệu.";
                } else {
                    echo "<br>" . "Đã kết nối với CSDL." . "<br>";
                }
                
                $sql = "UPDATE b1910013_qlsv SET ho_ten='$name', nam_sinh='$birthday', email='$email' WHERE id='$id'";
                
                if (mysqli_query($conn, $sql)) {
                    echo"<br>" . "Cập nhật sinh viên thành công.";
                    echo "<script>alert('Cập nhật sinh viên thành công.');</script>";
                } else {
                    echo "<br>" . "ERROR: Không thể thực hiện $sql. " . mysqli_error($conn);
                    echo "<script>alert('Không thể thực hiện.');</script>";
                }
                
                mysqli_close($conn);
            }
        ?>
        <!-- Thêm thẻ HTML để tạo liên kết trở về trang index.php -->
        <br> <a href="index.php">Quay lại trang chủ</a> <br>
    </body>
</html> 