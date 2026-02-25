<?php
$conn = new mysqli("localhost", "root", "", "qlsv");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name_major'];
$sql = "INSERT INTO major(name_major) VALUES ('$name')";

if ($conn->query($sql) === TRUE) {
    header("Location: major_index.php");
    exit();
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>
