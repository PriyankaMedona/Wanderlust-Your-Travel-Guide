<?php
// Database connection code
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$district = $_GET["district"];

// SQL query to search for guides in the specified district
$sql = "SELECT name, contact FROM guides WHERE district = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $district);
$stmt->execute();
$result = $stmt->get_result();
$guides = array();

while ($row = $result->fetch_assoc()) {
    $guides[] = $row;
}

$stmt->close();
$conn->close();

header("Content-Type: application/json");
echo json_encode($guides);
?>
