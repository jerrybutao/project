<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("connection.php");

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST['id']) ? sanitize_input($_POST['id']) : "";
    $email = isset($_POST['email']) ? sanitize_input($_POST['email']) : "";
    $fullname = isset($_POST['fullname']) ? sanitize_input($_POST['fullname']) : "";
    $platenumber = isset($_POST['platenumber']) ? sanitize_input($_POST['platenumber']) : "";
    $date = isset($_POST['date']) ? sanitize_input($_POST['date']) : "";
    $contact = isset($_POST['contact']) ? sanitize_input($_POST['contact']) : "";
    $vehicle = isset($_POST['vehicle']) ? sanitize_input($_POST['vehicle']) : "";
    $amount = isset($_POST['amount']) ? sanitize_input($_POST['amount']) : "";

    // No need to check for empty fields

    $sql = "UPDATE vehicle SET email='$email', fullname='$fullname', platenumber='$platenumber', date='$date', contact='$contact', vehicle='$vehicle', amount='$amount' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data updated successfully'); window.location.href = 'admin.php';</script>";
        exit();
    } else {
        echo "Error updating data: " . $conn->error;
    }
} else {
    header("Location: index.php");
    exit();
}
?>