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
    <title>Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- Personal Info Section -->
        <div class="box">
            <h1><?php echo $personal_info['name']; ?></h1>
            <p><strong>Position:</strong> <?php echo $personal_info['position']; ?></p>
        </div>
        
        <!-- Additional Info Section -->
        <div class="box2">
            <p><strong>Phone:</strong> <?php echo $personal_info['phone']; ?></p>
            <p><strong>Email:</strong> <?php echo $personal_info['email']; ?></p>
            <p><strong>Address:</strong> <?php echo $personal_info['address']; ?></p>
            <h2>About Me</h2>
            <p><?php echo $personal_info['about']; ?></p>
        </div>

        <!-- Experience Section -->
        <div class="experience">
            <h2>Experience</h2>
            <?php if (!empty($experience_list)): ?>
                <ul>
                    <?php foreach ($experience_list as $experience): ?>
                        <li>
                            <p><strong><?php echo $experience['job_position']; ?></strong> at <?php echo $experience['company_name']; ?> (<?php echo $experience['start_year']; ?> - <?php echo $experience['end_year']; ?>)</p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No experience available.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
