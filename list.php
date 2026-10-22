<?php
$conn = mysqli_connect("localhost", "root", "" , "mydb");
$result = mysqli_query($conn, "SELECT * FROM users");
?>

<h2>User List</h2>
<a href="add.php">NEW ADD</a>
<br><br>
<table border="1" cellpadding="8">
<tr>
 <th>ID</th>
 <th>Naam</th> 
 <th>Action</th>
</tr>
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?php echo $row["id"]; ?></td>
<td><?php echo htmlspecialchars($row["naam"]); ?></td>
<td> 
 <a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a> |
 <a href="delete.php?id=<?php echo $row["id"]; ?>" onclick="return conform('are you sure?')">Delete</a>
</td>
</tr>
<?php } ?>
</table> 