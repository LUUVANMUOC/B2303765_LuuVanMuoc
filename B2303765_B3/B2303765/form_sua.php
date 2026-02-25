<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sửa sinh viên</title>
</head>
<body>

<?php
$conn = new mysqli("localhost", "root", "", "qlsv");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy ID sinh viên
$id = $_POST['id'];

// Lấy thông tin sinh viên
$sql_sv = "SELECT * FROM student WHERE id='$id'";
$result_sv = $conn->query($sql_sv);
$row = $result_sv->fetch_assoc();

// Lấy danh sách chuyên ngành
$sql_major = "SELECT * FROM major";
$result_major = $conn->query($sql_major);
?>

<h2>Sửa thông tin sinh viên</h2>

<form action="sua.php" method="post">

    ID:
    <input type="text" name="id" value="<?php echo $row['id']; ?>" readonly>
    <br><br>

    Họ tên:
    <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>" required>
    <br><br>

    Email:
    <input type="text" name="email" value="<?php echo $row['email']; ?>" required>
    <br><br>

    Ngày sinh:
    <input type="date" name="Birthday" value="<?php echo $row['Birthday']; ?>" required>
    <br><br>

    Chuyên ngành:
    <select name="major_id" required>
        <option value="">-- Chọn chuyên ngành --</option>
        <?php
        while ($m = $result_major->fetch_assoc()) {
            $selected = ($m['id'] == $row['major_id']) ? "selected" : "";
            echo "<option value='{$m['id']}' $selected>
                    {$m['name_major']}
                  </option>";
        }
        ?>
    </select>
    <br><br>

    <input type="submit" value="Cập nhật">
</form>

</body>
</html>
