<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data dari form
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Cek apakah email valid
    if ($email === false) {
        echo "Invalid email format.";
        exit;
    }

    // Pengaturan email
    $to = "yuyudher17@gmail.com.com";  // Ganti dengan email tujuan Anda
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    $email_subject = "Contact Form: " . $subject;
    $email_body = "You have received a new message from $name.\n\n".
                  "Here are the details:\n\nName: $name\n\n".
                  "Email: $email\n\nMessage:\n$message";

    // Kirim email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send the message.";
    }
}
?>
