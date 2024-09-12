<?php
require 'db_connect.php';
$personal_sql = "SELECT * FROM personal_info LIMIT 1";
$personal_result = $conn->query($personal_sql);
if ($personal_result->num_rows > 0) {
    $personal_info = $personal_result->fetch_assoc();
} else {
    $personal_info = array(); 
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="box">
            <h1><?php echo htmlspecialchars($personal_info['name']); ?></h1>
            <p><strong>Position:</strong> <?php echo htmlspecialchars($personal_info['position']); ?></p>
        </div>
        <div class="box2">
            <p><strong>Phone:</strong> <?php echo htmlspecialchars($personal_info['phone']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($personal_info['email']); ?></p>
            <p><strong>Address:</strong> <?php echo htmlspecialchars($personal_info['address']); ?></p>
            <h2>About Me</h2>
            <p><?php echo htmlspecialchars($personal_info['about']); ?></p>
        </div>
    </div>
</body>
</html>
