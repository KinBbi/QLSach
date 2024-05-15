<?php
// Kết nối tới cơ sở dữ liệu
require 'connectdb.php';

// Truy vấn dữ liệu sách
$query = "SELECT * FROM Sach LIMIT 5";
$result = $conn->query($query);

// Kiểm tra nếu có dữ liệu
if ($result->num_rows > 0) {
    echo "<h1>Danh sách sách</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Số thứ tự</th><th>Tên sách</th><th>Số lượng sách</th></tr>";
    // Hiển thị dữ liệu từ bảng sách
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["MaSach"]."</td><td>".$row["TenSach"]."</td><td>".$row["SoLuong"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "Không có sách nào trong cơ sở dữ liệu.";
}

?>
