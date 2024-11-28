<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $complaint = $_POST['complaint'];
    $queryType = $_POST['queryType'];

    // Send confirmation email (you'll need to configure your email settings)
    $to = 'user@example.com'; // Replace with the user's email address
    $subject = 'Complaint Submission Confirmation';
    $message = "Thank you for submitting your complaint. We have received the following information:\n\n";
    $message .= "Complaint: $complaint\n";
    $message .= "Query Type: $queryType\n";

    // Use the following line to send an email (configure your mail server settings)
    // mail($to, $subject, $message);

    // Simulate a successful submission for demonstration purposes
    $success = true;

    echo json_encode(['success' => $success]);
} else {
    // Redirect to the complaint form if accessed directly
    header('Location: complaint_form.html');
    exit;
}
?>
