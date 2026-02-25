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

// SQL JOIN student + major
$sql = "SELECT 
            s.id,
            s.fullname,
            s.email,
            s.Birthday,
            s.major_id,
            m.name_major
        FROM student s
        LEFT JOIN major m ON s.major_id = m.id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bảng dữ liệu sinh viên</title>
</head>
<body>

<h2>Bảng dữ liệu sinh viên</h2>

<?php
if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='8' cellspacing='0'>
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Ngày sinh</th>
                <th>Mã chuyên ngành</th>
                <th>Tên chuyên ngành</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        $date = date_create($row['Birthday']);

        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['fullname']}</td>
                <td>{$row['email']}</td>
                <td>".$date->format('d-m-Y')."</td>
                <td>{$row['major_id']}</td>
                <td>{$row['name_major']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Không có dữ liệu";
}

$conn->close();
?>

</body>
</html>
