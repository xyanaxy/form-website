<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    $address = htmlspecialchars($_POST['address']);

    $to = "hello@xyana.xyz";
    $email_subject = "New Form Submission: $subject";
    $email_body = "You have received a new message.\n\n".
                  "Name: $name\n".
                  "Email: $email\n".
                  "Phone: $phone\n".
                  "Subject: $subject\n".
                  "Message: $message\n".
                  "Address: $address\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<h1>Message sent successfully! <a href='form-page.html'>Go back</a></h1>";
    } else {
        echo "<h1>Failed to send the message. <a href='form-page.html'>Try again</a></h1>";
    }
} else {
    header("Location: form-page.html");
    exit();
}
?>
