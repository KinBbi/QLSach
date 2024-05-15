<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";
$port = ;

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form đăng nhập
$user = $_POST['username'];
$pass = $_POST['password'];

// Bảo vệ SQL Injection
$user = $conn->real_escape_string($user);
$pass = $conn->real_escape_string($pass);

// Kiểm tra thông tin tài khoản trong cơ sở dữ liệu
$sql = "SELECT * FROM User WHERE TenUser='$user' AND MatKhau='$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Đăng nhập thành công, chuyển hướng đến trang sach.php
    header("Location: sach.php");
    exit();
} else {
    // Đăng nhập không thành công, chuyển hướng lại trang login.php với thông báo lỗi
    header("Location: login.php?error=1");
    exit();
}

?>
