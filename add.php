 <?php
$conn = mysqli_connect("localhost", "root", "", "mydb");
if($_SERVER["REQUEST_METHOD"] == "POST"){
$naam = $_POST["naam"];
$stmt = mysqli_prepare($conn, "INSERT INTO users (naam) VALUES (?)");
mysqli_stmt_bind_param($stmt, "s", $naam);
mysqli_stmt_execute($stmt);
echo "saved!<br>";
}
?>

<form method="post">
<input type="text" name="naam" placeholder="Enter The Name">
<button type="submit">Save</button>
</form>
