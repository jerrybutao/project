<?php
require('./Connections.php');
include("connection.php");
$id = $_GET['id'];
$sql = "DELETE FROM vehicle WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Record deleted successfully'); window.location.href = 'admin.php';</script>";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
