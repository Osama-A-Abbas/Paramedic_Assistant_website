<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Validate form data (you can add more validation if needed)
    if (empty($name) || empty($email) || empty($message)) {
        // If any required field is empty, redirect back to the form page with an error message
        header('Location: contact.html?error=required');
        exit;
    }

    // Create a string with the form data
    $data = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message\n\n";

    // Append the data to a text file
    $file = 'form_data.txt';
    file_put_contents($file, $data, FILE_APPEND);

    // Redirect to a success page
    header('Location: success.html');
    exit;
} else {
    // If the form was not submitted via POST method, redirect back to the form page
    header('Location: contact.html');
    exit;
}
?>
