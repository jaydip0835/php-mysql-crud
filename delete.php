<?php
$conn = mysqli_connect("localhost", "root", "", "mydb");

$id = (int) $_GET["id"];
$stmt = mysqli_prepare($conn, "DELETE FROM users WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
 
header("Location: list.php");
exit;
?>