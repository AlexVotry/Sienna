<!-- ************************************
		THIS PAGE DISPLAYS THE CURRENT DOCTOR INFORMATION
******************************************* -->

<?php 
require_once('../control/include/dbConstants.php');

$sql = "SELECT * FROM doctors;";
$result = mysqli_query($db, $sql);

echo "<table id=doc>";
	echo "<tr>";
	while ($field = mysqli_fetch_field($result)){
		echo "<th>$field->name</th>";
	}
		echo "<th colspan='2'>Action</th>";
	echo "</tr>";	
	
	while ($row = mysqli_fetch_assoc($result)) {
	echo "<tr>";
		echo "<td>".$row['doctors']."</td>";
		echo "<td>".$row['phone']."</td>";
		echo "<td>".$row['Hospital']."</td>";
		echo "<td>".$row['nextVisit']."</td>";
 	?>
		<td><a href="#" onclick="fixIt('docEdit', '<?php echo $row['doctors']; ?>')">Edit </a></td>
  		<td><a href="#" onclick="fixIt('delete', '<?php echo $row['doctors']; ?>')">Delete </a></td>
<?php 
		echo "</tr>";
}
echo "<tr><td colspan='6'><a href='docAdd.php'>Add a Doctor</a></td></tr>";
echo"</table>";
$db->close();
?>



 