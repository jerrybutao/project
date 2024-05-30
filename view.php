<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("connection.php");

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id']; 

    $sql = "SELECT id, email, fullname, platenumber, date, contact, vehicle, amount FROM vehicle WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); 

        echo "<h2>Account Details</h2>";
        echo "<p><strong>ID:</strong> " . $row["id"] . "</p>";
        echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
        echo "<p><strong>Fullname:</strong> " . $row["fullname"] . "</p>";
        echo "<p><strong>Platenumber:</strong> " . $row["platenumber"] . "</p>";
        echo "<p><strong>Date:</strong> " . $row["date"] . "</p>";
        echo "<p><strong>Contact:</strong> " . $row["contact"] . "</p>";
        echo "<p><strong>Vehicle:</strong> " . $row["vehicle"] . "</p>";
        echo "<p><strong>Amount:</strong> " . $row["amount"] . "</p>";

    } else {
        echo "Account details not found."; 
    }
} else {
    echo "Invalid request."; 
}
?>
