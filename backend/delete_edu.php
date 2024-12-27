<?php
include 'database.php';
$id = $_GET['id'];

// Hapus data dari database
$sql1 = "DELETE FROM education WHERE id = '$id'";
if ($conn->query($sql1) === TRUE) {
header('Location: index.php');
} else {
echo "Error: " . $conn->error;
}
$conn->close();
?>