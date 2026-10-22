<?php
$conn = mysqli_connect("localhost", "root", "", "mydb");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int) $_POST["id"];
    $naam = $_POST["naam"];
    $stmt = mysqli_prepare($conn, "UPDATE users SET naam = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "si", $naam, $id);
    mysqli_stmt_execute($stmt);
    header("Location: list.php");
    exit;
}

$id = (int) $_GET["id"];
$stmt = mysqli_prepare($conn, "SELECT naam FROM users WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
?>

<h2>UPDATE NAME</h2>
<form method="post">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <input type="text" name="naam" value="<?php echo htmlspecialchars($row["naam"]); ?>">
  <button type="submit">Update</button>
</form>
<a href="list.php">BACK</a>