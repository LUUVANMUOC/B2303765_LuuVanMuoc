<?php
$conn = new mysqli("localhost", "root", "", "qlsv");

$id       = $_POST['id'];
$fullname = $_POST['fullname'];
$email    = $_POST['email'];
$birthday = $_POST['Birthday'];
$major_id = $_POST['major_id'];

$sql = "UPDATE student SET
        fullname='$fullname',
        email='$email',
        Birthday='$birthday',
        major_id='$major_id'
        WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: taidulieu_bang1.php");
    exit();
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>
