<?php
// Database connection code
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Array of guide data (you can customize this data)
$guides = array(
    array("Guide 1", "123-456-7890", "Chennai"),
    array("Guide 2", "987-654-3210", "Madurai"),
    array("Guide 3", "555-555-5555", "Coimbatore"),
);

// SQL query to insert guide data into the database
$sql = "INSERT INTO guides (name, contact, district) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

foreach ($guides as $guide) {
    $name = $guide[0];
    $contact = $guide[1];
    $district = $guide[2];

    $stmt->bind_param("sss", $name, $contact, $district);
    $stmt->execute();
}

$stmt->close();
$conn->close();

echo "Guide records generated and inserted successfully!";
?>
