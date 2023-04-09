<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Danh sách sinh viên</title>
    </head>
    <body>
        <h3> Danh sách sinh viên </h3>
        <?php
            $MYSQL_ADDON_HOST=getenv('MYSQL_ADDON_HOST');
            $MYSQL_ADDON_PORT=getenv('MYSQL_ADDON_PORT');
            $MYSQL_ADDON_DB=getenv('MYSQL_ADDON_DB');
            $MYSQL_ADDON_USER=getenv('MYSQL_ADDON_USER');
            $MYSQL_ADDON_PASSWORD=getenv('MYSQL_ADDON_PASSWORD');

            $conn = mysqli_connect($MYSQL_ADDON_HOST, $MYSQL_ADDON_USER, $MYSQL_ADDON_PASSWORD, $MYSQL_ADDON_DB, $MYSQL_ADDON_PORT);

            if (!$conn) {
                echo "<br>" . "Error: Không thể kết nối với cơ sở dữ liệu.";
            } else {
                echo "<br>" . "Đã kết nối với CSDL.";
                $sql = "SELECT * FROM b1910013_qlsv";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "ID: " . $row["id"] . " - Họ và tên: " . $row["ho_ten"] . " - Năm sinh: " . $row["nam_sinh"] . " - Email: " . $row["email"] . "<br>";
                    }
                } else {
                    echo "<br>" . "0 results";
                }
                mysqli_close($conn);
            }
        ?>
        <!-- Thêm thẻ HTML để tạo liên kết trở về trang index.php -->
        <a href="index.php">Quay lại trang chủ</a> <br>
    </body>
</html>