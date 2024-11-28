<?php
// Database connection details
$servername = "localhost"; // Change this to your database server
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "travel"; // Change this to your database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $email = $_POST["email"];
    $user_name = $_POST["user_name"];
    $password = $_POST["password"];


    // SQL query to insert data into the "users" table
    $sql = "INSERT INTO register (email, user_name, password) VALUES ('$email', '$user_name', '$password')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        
        echo'<script>alert("Account successfully created!");</script>';
        sleep(5);
        header("Location:login.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
