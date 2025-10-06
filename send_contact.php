<?php
$page_title = 'Contact – BrightPlan Studio';
$meta_desc  = 'Contact form submission handler for BrightPlan Studio.';
include 'header.php';

// Collect and sanitise form data
$name    = isset($_POST['name']) ? strip_tags(trim($_POST['name'])) : '';
$email   = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
$message = isset($_POST['message']) ? strip_tags(trim($_POST['message'])) : '';

// Validate inputs
if ($name === '' || $email === '' || $message === '') {
    echo "<main class='container'><p style='color:red;'>Error: All fields are required. <a href='contact.php'>Go back</a>.</p></main>";
    include 'footer.php';
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<main class='container'><p style='color:red;'>Error: Invalid email address. <a href='contact.php'>Go back</a>.</p></main>";
    include 'footer.php';
    exit;
}

// Build email
$to      = "support@brightplanstudio.com";
$subject = "New Contact Form Submission – BrightPlan Studio";
$body    = "You have received a new message from BrightPlan Studio's website contact form:\n\n" .
           "Name: $name\n" .
           "Email: $email\n\n" .
           "Message:\n$message\n\n" .
           "----\nThis message was sent via the BrightPlan Studio website.";
$headers = "From: BrightPlan Studio <no-reply@brightplanstudio.com>\r\n" .
           "Reply-To: $name <$email>\r\n";

// Attempt to send
if (mail($to, $subject, $body, $headers)) {
    echo "<main class='container'>
            <div style='max-width:600px; margin:40px auto; background:#fff; padding:30px; border-radius:12px; box-shadow:0 8px 28px rgba(0,0,0,.08); text-align:center;'>
              <h2>Message Sent</h2>
              <p>Thank you, <strong>$name</strong>. Your message has been sent successfully.</p>
              <p>We will respond within 1–2 business days.</p>
              <p><a href='index.php' class='btn'>Return Home</a></p>
            </div>
          </main>";
} else {
    echo "<main class='container'>
            <div style='max-width:600px; margin:40px auto; background:#fff; padding:30px; border-radius:12px; box-shadow:0 8px 28px rgba(0,0,0,.08); text-align:center;'>
              <h2>Error</h2>
              <p>Sorry, there was an error sending your message. Please try again later.</p>
              <p><a href='contact.php' class='btn outline'>Go Back</a></p>
            </div>
          </main>";
}

include 'footer.php';
?>

