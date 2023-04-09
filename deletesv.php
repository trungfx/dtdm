<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Xoá sinh viên</title>
    </head>
    <body>
        <h3> Xoá sinh viên </h3>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="border">
            ID<BR> <input type="text" name="id" value ="<?php echo $id; ?>"><BR>
            <input type="submit" name="submit" value="submit">
        </form>

        <?php
            $id = "";
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $id=$_POST["id"];
                $MYSQL_ADDON_HOST=getenv('MYSQL_ADDON_HOST');
                $MYSQL_ADDON_PORT=getenv('MYSQL_ADDON_PORT');
                $MYSQL_ADDON_BD=getenv('MYSQL_ADDON_DB');
                $MYSQL_ADDON_USER=getenv('MYSQL_ADDON_USER');
                $MYSQL_ADDON_PASSWORD=getenv('MYSQL_ADDON_PASSWORD');

                $conn = mysqli_connect($MYSQL_ADDON_HOST, $MYSQL_ADDON_USER, $MYSQL_ADDON_PASSWORD, $MYSQL_ADDON_BD, $MYSQL_ADDON_PORT);

                if (!$conn) {
                    echo "<br>" . "Error: Không thể kết nối với cơ sở dữ liệu.";
                } else {
                    echo "<br>" . "Đã kết nối với CSDL.";
                }

                $sql = "DELETE FROM b1910013_qlsv WHERE id='$id'";

                if (mysqli_query($conn, $sql)) {
                    echo "<br>" . "Xoá sinh viên thành công.";
                    echo "<script>alert('Xoá sinh viên thành công.'); window.location.href='index.php';</script>";
                } else {
                    echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn) . "<br>";
                    echo "<script>alert('Không thể tạo bảng.');</script>";
                }
                mysqli_close($conn);
            }
        ?>
        <!-- Thêm thẻ HTML để tạo liên kết trở về trang index.php -->
        <a href="index.php">Quay lại trang chủ</a> <br>
    </body>
</html>