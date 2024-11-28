<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define database connection parameters
    $host = "localhost"; // Replace with your database host
    $username = "root"; // Replace with your database username
    $password = ""; // Replace with your database password
    $database = "travel"; // Replace with your database name

    // Create a database connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get input from the login form
    $username = $_POST["user_name"];
    $password = $_POST["password"];

    // SQL query to check if the user exists
    $sql = "SELECT * FROM register WHERE user_name = '$username' AND password = '$password'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, redirect to their main page (you should replace "main.html" with the actual URL)
        sleep(5);
        header("Location: index.html");
        exit();
    } else {
        // User does not exist, display error message and redirect to signup.html
        echo "Account does not exist.";
        sleep(3);
        header("Location: signup.html");
        exit();
    }

    // Close the database connection
    $conn->close();
}
?>
