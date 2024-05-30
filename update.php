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
       
        echo "<h2>UPDATE </h2>";
        echo "<form id='updateForm' method='post' action='update_handler.php'>";
        echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
        echo "<label>Email:</label> <input type='text' name='email' value='" . $row["email"] . "'><br>";
        echo "<label>Fullname:</label> <input type='text' name='fullname' value='" . $row["fullname"] . "'><br>";
        echo "<label>Platenumber:</label> <input type='text' name='platenumber' value='" . $row["platenumber"] . "'><br>";
        echo "<label>Date:</label> <input type='text' name='date' value='" . $row["date"] . "'><br>";
        echo "<label>Contact:</label> <input type='text' name='contact' value='" . $row["contact"] . "'><br>";
        echo "<label>Vehicle:</label> <input type='text' name='vehicle' value='" . $row["vehicle"] . "'><br>";
        echo "<label>Amount:</label> <input type='text' name='amount' value='" . $row["amount"] . "'><br>";
        echo "<button type='submit'>Submit</button>";
        echo "</form>";
    } else {
        echo "Record not found.";
    }
} else {
    echo "Invalid request.";
}
?>