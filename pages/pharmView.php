<!-- ************************************
		THIS PAGE DISPLAYS THE CURRENT PHARMACY INFORMATION
******************************************* -->

<?php 
require_once("../control/include/dbConstants.php");

$sql = "SELECT * FROM pharmacy;";
$return = mysqli_query($db, $sql);

echo "<table id='pharma'>";
echo "<tr>";

while ($field = mysqli_fetch_field($return)) {
	echo "<th>$field->name</th>";
}
echo "<th colspan='2'>Action</td>";
echo "</tr>";
echo "<tr>";
while ($row = mysqli_fetch_assoc($return)) {
	echo "<td>".$row['pharmacy']."</td>";
	echo "<td>".$row['phone']."</td>";
?>
		<td><a href="#" onclick="fixIt('pharmEdit', '<?php echo $row['pharmacy']; ?>')">Edit </a></td>
  		<td><a href="#" onclick="fixIt('delete', '<?php echo $row['pharmacy']; ?>')">Delete </a></td>
</tr>
<?php } 
$db->close(); ?>
<tr><td colspan='4'><a href="pharmAdd.php">Add a pharmacy</a></td></tr>
</table>



