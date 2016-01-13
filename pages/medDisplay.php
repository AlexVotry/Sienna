<!-- ************************************
		THIS PAGE DISPLAYS THE CURRENT MEDICATIONS INFORMATION
******************************************* -->


<?php 
require_once('../control/include/dbConstants.php');

$sql = 
"SELECT
	Drug,
	Dosage,
	perDay AS 'Per Day',
	refills AS Refills,
	DateOfRefill AS 'Last Filled',
	DateOfExpire AS 'Next Refill',
	Doctor,
	Pharmacy,
	RXnumber,
	amtLeft AS Remaining
FROM medications;";

$return = mysqli_query($db, $sql);

// print the table
echo "<table id='med'>";
echo "<tr>";
// print the header
while ($field = mysqli_fetch_field($return)) {
	echo "<th> $field->name</th>";
}
echo "<th colspan='2'>Action</th>";
echo "</tr>";

// // print the data.
while ($row = mysqli_fetch_assoc($return)) {
		
		echo "<tr>";
		// echo "<td>$col</td>";
		echo "<td>".$row['Drug']."</td>";
		echo "<td>".$row['Dosage']."</td>";
		echo "<td>".$row['Per Day']."</td>";
		echo "<td>".$row['Refills']."</td>";
		echo "<td>".$row['Last Filled']."</td>";
		echo "<td>".$row['Next Refill']."</td>";
		echo "<td>".$row['Doctor']."</td>";
		echo "<td>".$row['Pharmacy']."</td>";
		echo "<td>".$row['RXnumber']."</td>";
		echo "<td>".$row['Remaining']."</td>";
 	?>
		<td><a href="#" onclick="fixIt('medEdit', '<?php echo $row['Drug']; ?>')">Edit </a></td>
  		<td><a href="#" onclick="fixIt('delete', '<?php echo $row['Drug']; ?>')">Delete </a></td>
 
<?php 
		echo "</tr>";
}
echo "<tr>";
echo "<td colspan='3'><a href='medAdd.php'>I want a new drug</a></td>";
echo "</tr>";
echo "</table>";

$db->close();
?>
<!-- THIS WILL SHOW THE TABLE, BUT DIFFICULT TO WORK WITH INDIVIDUAL ROWS -->
<!--  show medications table.
 $sql = "SELECT * FROM medications;";
 $result = mysqli_query($db, $sql);

 		print "<table border='1'>";

 		//get field names
 		print "<tr>";
 		while ($field = mysqli_fetch_field($result)){
 		  print " <th>$field->name</th>";
 		} // end while
 		print "</tr>";

 		//get row data as an associative array
 		while ($row = mysqli_fetch_assoc($result)){
 		  print "<tr>";
 		  //look at each field
 		  foreach ($row as $col=>$val){
 		    print "  <td>$val</td>";
 		  } // end foreach
 		  print "</tr>";

 		}// end while

 		print "</table>"; -->

 