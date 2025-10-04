<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');

        if (empty($email) || empty($phone)) {
            http_response_code(400);
            echo "Missing fields";
            exit;
        }

        // You can now save to DB or send an email notification here.
        // Example: file_put_contents('waitlist.txt', \"$email | $phone\\n\", FILE_APPEND);

        echo "Success";
    }