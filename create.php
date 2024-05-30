<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require('./Connections.php');
include("connection.php");

if(isset($_POST['create'])) {
    $Email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $platenumber = $_POST['platenumber'];
    $date = ''; // Initialize $date
    $contact = $_POST['contact'];
    $vehicle = $_POST['vehicle'];
    $amount = $_POST['amount'];

    // Check if date is set and not empty
    if(isset($_POST['date']) && !empty($_POST['date'])) {
        $date = $_POST['date'];
    }

    // Prepare and execute the INSERT query
    $queryCreate = "INSERT INTO vehicle (email, fullname, platenumber, date, contact, vehicle, amount) VALUES ('$Email', '$fullname', '$platenumber', '$date', '$contact','$vehicle', '$amount')";
    $sqlCreate = mysqli_query($Connections, $queryCreate);

    // Check if the query executed successfully
    if ($sqlCreate) {
        echo '<script>alert("Successfully Created")</script>';
    } else {
        echo '<script>alert("Error creating account: ' . mysqli_error($Connections) . '")</script>';
    }

    // Redirect to admin.php
    echo '<script>window.location.href = "admin.php"</script>';
} else {
    // Redirect to admin.php
    echo '<script>window.location.href = "admin.php"</script>';
}
?>