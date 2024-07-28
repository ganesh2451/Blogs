<?php
include 'dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $country = $_POST['country'];
    $subject = $_POST['subject'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO contact_form (firstname, lastname, country, subject) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $firstname, $lastname, $country, $subject);

    if ($stmt->execute()) {
        echo "New record created successfully";
        header("Location: contact.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
