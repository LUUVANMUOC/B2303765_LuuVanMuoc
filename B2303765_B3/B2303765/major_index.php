<?php
$conn = new mysqli("localhost", "root", "", "qlsv");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM major";
$result = $conn->query($sql);
?>

<h2>Danh sách chuyên ngành</h2>
<a href="major_add.php">Thêm chuyên ngành</a>
<br><br>

<table border="1">
<tr>
    <th>ID</th>
    <th>Tên chuyên ngành</th>
    <th colspan="2">Hành động</th>
</tr>

<?php
while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name_major']}</td>
            <td>
                <form method='post' action='major_edit.php'>
                    <input type='hidden' name='id' value='{$row['id']}'>
                    <input type='submit' value='Sửa'>
                </form>
            </td>
            <td>
                <form method='post' action='major_xoa.php'>
                    <input type='hidden' name='id' value='{$row['id']}'>
                    <input type='submit' value='Xóa'>
                </form>
            </td>
          </tr>";
}
$conn->close();
?>
</table>
