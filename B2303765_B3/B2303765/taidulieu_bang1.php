<?php
$conn = new mysqli("localhost", "root", "", "qlsv");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT student.*, major.name_major
        FROM student
        LEFT JOIN major ON student.major_id = major.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_all(MYSQLI_ASSOC);
?>
<h2>Bảng dữ liệu sinh viên</h2>

<table border="1">
<tr>
    <th>ID</th>
    <th>Họ tên</th>
    <th>Email</th>
    <th>Ngày sinh</th>
    <th>Mã chuyên ngành</th>
    <th>Tên chuyên ngành</th>
    <th colspan="2">Hành động</th>
</tr>

<?php
foreach ($data as $row) {
    $date = date_create($row['Birthday']);
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['fullname']}</td>
            <td>{$row['email']}</td>
            <td>".$date->format('d-m-Y')."</td>
            <td>{$row['major_id']}</td>
            <td>{$row['name_major']}</td>
            <td>
                <form method='post' action='form_sua.php'>
                    <input type='hidden' name='id' value='{$row['id']}'>
                    <input type='submit' value='Sửa'>
                </form>
            </td>
            <td>
                <form method='post' action='xoa.php'>
                    <input type='hidden' name='id' value='{$row['id']}'>
                    <input type='submit' value='Xóa'>
                </form>
            </td>
          </tr>";
}
?>
</table>

<?php
} else {
    echo "0 kết quả trả về";
}
$conn->close();
?>
