<?php
try {
    // Connect to the database (replace with secure credentials)
    $conn = new PDO("mysql:host=mysql-20cae9ad-st-d93d.l.aivencloud.com;dbname=QUANLYSACH", "avnadmin", "AVNS_HsCLSKy0nSzYkink6zK");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch 5 books from the Sach table
    $stmt = $conn->prepare("SELECT * FROM Sach LIMIT 5");
    $stmt->execute();
    $sachData = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Sách</title>
</head>
<body>
    <h1>Danh sách Sách</h1>
    <table border="1">
        <tr>
            <th>Mã Sách</th>
            <th>Tên Sách</th>
            <th>Số Lượng</th>
        </tr>
        <?php foreach ($sachData as $sach): ?>
            <tr>
                <td><?php echo htmlspecialchars($sach['MaSach']); ?></td>
                <td><?php echo htmlspecialchars($sach['TenSach']); ?></td>
                <td><?php echo htmlspecialchars($sach['SoLuong']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
