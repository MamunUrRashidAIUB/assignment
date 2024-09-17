<?php
require 'db_connect.php';

// Fetch personal information
$personal_sql = "SELECT * FROM personal_info LIMIT 1";
$personal_result = $conn->query($personal_sql);
if ($personal_result->num_rows > 0) {
    $personal_info = $personal_result->fetch_assoc();
} else {
    $personal_info = array(); 
}

// Fetch experience information
$experience_sql = "SELECT * FROM experience";
$experience_result = $conn->query($experience_sql);
$experience_list = [];
if ($experience_result->num_rows > 0) {
    while ($row = $experience_result->fetch_assoc()) {
        $experience_list[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $personal_info['name']; ?> - Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- Left Column -->
        <div class="left-column">
            <img src="path/to/profile-picture.jpg" alt="Profile Picture">
            <h2>EDUCATION</h2>
            <!-- Add education details here -->
            <h2>REFERENCE</h2>
            <!-- Add references here -->
            <div class="contact-info">
                <p>Phone: <?php echo $personal_info['phone']; ?></p>
                <p>Email: <?php echo $personal_info['email']; ?></p>
                <p>Address: <?php echo $personal_info['address']; ?></p>
            </div>
        </div>
        
        <!-- Right Column -->
        <div class="right-column">
            <div class="header">
                <h1><?php echo $personal_info['name']; ?></h1>
                <p><?php echo $personal_info['position']; ?></p>
            </div>
            <h2>ABOUT ME</h2>
            <p><?php echo $personal_info['about']; ?></p>
            <h2>WORK EXPERIENCE</h2>
            <?php foreach ($experience_list as $experience) : ?>
                <h3><?php echo $experience['job_position']; ?> - <?php echo $experience['company_name']; ?></h3>
                <p><?php echo $experience['description']; ?></p>
            <?php endforeach; ?>
            <h2>SOFTWARE SKILLS</h2>
            <!-- Add software skills here -->
        </div>
    </div>
</body>
</html>
