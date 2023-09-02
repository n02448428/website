<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Ensure the email is not empty and has a valid format
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = fopen("email_list.txt", "a"); // Open the text file for appending
        if ($file) {
            fwrite($file, $email . "\n"); // Write the email address to the file
            fclose($file); // Close the file
            echo "Thank you for subscribing!";
        } else {
            echo "Unable to save email address.";
        }
    } else {
        echo "Invalid email address.";
    }
} else {
    echo "Invalid request.";
}
?>
