<!DOCTYPE HTML>
<html>
<body>

<?php
// Kết nối CSDL
$conn = new mysqli("localhost", "root", "", "qlsv");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy danh sách ngành
$sql = "SELECT * FROM major";
$result = $conn->query($sql);
?>

<form action="luu.php" method="post">
    Name:
    <input type="text" name="fullname" required><br><br>

    E-mail:
    <input type="text" name="email" required><br><br>

    Birthday:
    <input type="date" name="Birthday" required><br><br>

    Chuyên ngành:
    <select name="major_id" required>
        <option value="">-- Chọn chuyên ngành --</option>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id']}'>
                    {$row['name_major']}
                  </option>";
        }
        ?>
    </select>
    <br><br>

    <input type="submit" value="Thêm sinh viên">
</form>

</body>
</html>
