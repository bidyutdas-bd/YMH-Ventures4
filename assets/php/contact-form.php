<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recipient email
    $to = "bidyut.das@voktis.com";

    // Sanitize inputs
    $name    = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $email   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])));

    // Email subject
    $subject = "New Contact Form Submission - YMH Ventures";

    // Email body
    $body  = "You have received a new enquiry from the YMH Ventures contact form:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message\n";

    // Email headers
    // Always use a domain email for the "From" field
    $headers  = "From: no-reply@ymhventures.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Mail send status
    if (mail($to, $subject, $body, $headers)) {
        echo '<script>
            alert("✅ Thank you, ' . addslashes($name) . '! Your message has been sent successfully.");
            window.location.href = "https://ymhventures.com/";
        </script>';
    } else {
        echo '<script>
            alert("❌ Sorry, something went wrong. Please try again later.");
            window.location.href = "https://ymhventures.com/";
        </script>';
    }

} else {
    echo '<script>
        alert("❌ Invalid request.");
        window.location.href = "https://ymhventures.com/";
    </script>';
}
?>
