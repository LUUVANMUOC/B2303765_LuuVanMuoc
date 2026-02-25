<?php
$conn = new mysqli("localhost", "root", "", "qlsv");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$sql = "SELECT * FROM major WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Sửa chuyên ngành</h2>

<form method="post" action="major_edit_save.php">
    ID:
    <input type="text" name="id" value="<?php echo $row['id']; ?>" readonly>
    <br><br>
    Tên chuyên ngành:
    <input type="text" name="name_major" value="<?php echo $row['name_major']; ?>">
    <br><br>
    <input type="submit" value="Lưu">
</form>

</body>
</html>
