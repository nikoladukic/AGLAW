<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $firstName = trim($_POST['name']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $message = trim($_POST['message']);

    // Validate form fields
    if (empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    if (strlen($message) < 25) {
        echo "The message must be at least 25 characters long.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Email details
    $to = "dukic291@gmail.com";
    $subject = "Nova poruka sa sajta";
    $body = "Sadrzaj poruke je:\n\n";
    $body .= "Ime: $firstName\n";
    $body .= "Prezime: $lastName\n";
    $body .= "Email: $email\n";
    $body .= "Telefon: $phone\n\n";
    $body .= "Poruka:\n$message\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send the message. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
