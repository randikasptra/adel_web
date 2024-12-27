<?php 
include 'database.php'; 
 
$id = $_GET['id']; 
 
// Hapus foto jika ada 
$sql2 = "SELECT image FROM project WHERE id = '$id'"; 
$result2 = $conn->query($sql2); 
$row = $result2->fetch_assoc(); 
$image = $row['image']; 
unlink("assets/images/$image"); 
 
// Hapus data dari database 
$sql2 = "DELETE FROM project WHERE id = '$id'"; 
if ($conn->query($sql2) === TRUE) { 
    header('Location: index.php'); 
} else { 
    echo "Error: " . $conn->error; 
} 
 
$conn->close(); 