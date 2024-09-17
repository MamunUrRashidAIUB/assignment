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
// Fetch education information
$education_sql = "SELECT * FROM education";
$education_result = $conn->query($education_sql);
$education_list = [];
if ($education_result->num_rows > 0) {
    while ($row = $education_result->fetch_assoc()) {
        $education_list[] = $row;
    }
}
//fetch reference information
$reference_sql="SELECT *FROM reference";
$reference_result=$conn->query($reference_sql);
$reference_list=[];
if ($reference_result->num_rows > 0) {
    while ($row = $reference_result->fetch_assoc()) {
        $reference_list[] = $row;
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
            <img src="me.jpeg" alt="Profile Picture">
            <h2>EDUCATION</h2>
            <?php foreach ($education_list as $education) : ?>
                <div class="education-entry">
                    <h3><?php echo $education['degree']; ?></h3>
                    <p><?php echo $education['university_name']; ?></p>
                    <p> Graduation year : <?php echo $education['year']; ?></p>
                </div>
            <?php endforeach; ?>
            <h2>REFERENCE</h2>
<?php foreach ($reference_list as $reference) : ?>
    <div class="reference-entry">
        <p><strong><?php echo $reference['name']; ?></strong></p>
        <p><?php echo $reference['position']; ?> at <?php echo $reference['company name']; ?></p>
        <p>Phone: <?php echo $reference['number']; ?></p>
    </div>
<?php endforeach; ?>

             <h2>Contacts
             </h2>
            <div class="contact-info">
                <p> <?php echo $personal_info['name']; ?></p>
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
                <h3>
                  <?php echo $experience['start_year']; ?> - 
    <?php echo $experience['end_year'] ? $experience['end_year'] : 'Present'; ?>
</h3>
                <p><?php echo $experience['details']; ?></p>
        

             
            <?php endforeach; ?>
           
        </div>
    </div>
</body>
</html>
