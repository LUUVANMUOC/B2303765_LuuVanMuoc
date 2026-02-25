<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlsv";

// Kết nối CSDL
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$fullname = $_POST['fullname'];
$email    = $_POST['email'];
$birth    = $_POST['Birthday'];
$major_id = $_POST['major_id'];

// Định dạng ngày sinh
$date = date_create($birth);

// Câu lệnh INSERT (có major_id)
$sql = "INSERT INTO student (fullname, email, Birthday, major_id)
        VALUES ('$fullname', '$email', '".$date->format('Y-m-d')."', '$major_id')";

if ($conn->query($sql) === TRUE) {
    // Chuyển về trang hiển thị dữ liệu
    header("Location: taidulieu_bang.php");
    exit();
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>
