<!-- ***********************************************	
	THIS PAGE WILL UPDATE THE PILL COUNT FROM THE HOME PAGE FORM
		AND WILL EDIT OR ADD MEDICATION TO THE MEDICATION TABLE. 
		***********************************************************-->

<?php 
session_start();
require_once('../control/include/dbConstants.php');
echo $_SERVER['HTTP_REFERER'];
// from home page form
if ($_SERVER['HTTP_REFERER'] == "http://localhost/sienna/pages/home.php") {
	$amtTaken1 = mysqli_real_escape_string($db, $_POST['buspirone']);
	$amtTaken2 = mysqli_real_escape_string($db, $_POST['latuda']);
	$feelings = mysqli_real_escape_string($db, $_POST['feelings']);
	$date = mysqli_real_escape_string($db, $_POST['date']);

	// get medications table for Buspirone, change amount of pills available.
	$sql = "SELECT * FROM medications WHERE Drug = 'Buspirone'; ";
	$result = mysqli_query($db, $sql) or die(mysqli_connect_error());
		$pills = mysqli_fetch_assoc($result);
		$newAmt = $pills['amtLeft'] - $amtTaken1;

	// update pills available in medication table.
	$sql = "UPDATE medications SET amtLeft = '$newAmt' WHERE Drug = 'Buspirone';";
	$result = mysqli_query($db, $sql);

	//add new date to Buspirone.
	$sql = "INSERT INTO pilltracking (trackDate, Drug, Taken, feeling) 
		VALUES ('$date', 'Buspirone', '$amtTaken1', '$feelings'); ";
	$result = mysqli_query($db, $sql);
///*********************************

	// get medications table for Latuda, change amount of pills available.
	$sql = "SELECT * FROM medications WHERE Drug = 'Latuda'; ";
	$result = mysqli_query($db, $sql) or die(mysqli_connect_error());
		$pills = mysqli_fetch_assoc($result);
		$newAmt = $pills['amtLeft'] - $amtTaken2;

	// update pills available in medication table.
	$sql = "UPDATE medications SET amtLeft = '$newAmt' WHERE Drug = 'Latuda';";
	$result = mysqli_query($db, $sql);

	//add new date to Latuda.
	$sql = "INSERT INTO pilltracking (trackDate, Drug, Taken, feeling) 
		VALUES ('$date', 'Latuda', '$amtTaken2', '$feelings'); ";
	$result = mysqli_query($db, $sql);

	// go to log out page
	header('Location: ../pages/home.php?theXML=../control/XMLframes/logoutFrame.xml');
} 



else {
// from medEdit or medAdd:
// set all the variables
	$drug = mysqli_real_escape_string($db, $_POST['drug']);
	$user = mysqli_real_escape_string($db, $_POST['user']);
	$dosage = mysqli_real_escape_string($db, $_POST['dosage']);
	$perDay = mysqli_real_escape_string($db, $_POST['perDay']);
	$refills = mysqli_real_escape_string($db, $_POST['refills']);
	$amtLeft = mysqli_real_escape_string($db, $_POST['amtLeft']);
	$DateOfRefill = mysqli_real_escape_string($db, $_POST['DateOfRefill']);
	$DateOfExpire = mysqli_real_escape_string($db, $_POST['DateOfExpire']);
	$Doctor = mysqli_real_escape_string($db, $_POST['Doctor']);
	$Pharmacy = mysqli_real_escape_string($db, $_POST['Pharmacy']);
	$RXnumber = mysqli_real_escape_string($db, $_POST['RXnumber']);

if ($_SERVER['HTTP_REFERER'] == "http://localhost/sienna/pages/medAdd.php") {
// add to medications table.
	$sql = 
	"INSERT INTO medications (
		Drug,
		username,
		Dosage,
		perDay,
		refills,
		amtLeft,
		DateOfRefill,
		DateOfExpire,
		Doctor,
		Pharmacy,
		RXnumber)
	VALUES (
		'$drug',
		'$user',
		'$dosage',
		'$perDay',
		'$refills',
		'$amtLeft',
		'$DateOfRefill',
		'$DateOfExpire',
		'$Doctor',
		'$Pharmacy',
		'$RXnumber');";
$result = mysqli_query($db, $sql);
} else {
	$sql = "UPDATE medications 
		SET 
			Dosage = '$dosage',
			perDay = '$perDay',
			refills = '$refills',
			amtLeft = '$amtLeft',
			DateOfRefill = '$DateOfRefill',
			DateOfExpire = '$DateOfExpire',
			Doctor = '$Doctor',
			Pharmacy = '$Pharmacy',
			RXnumber = '$RXnumber'
		WHERE 
			Drug = '$drug';";
	$result = mysqli_query($db, $sql);
	}
	header('Location: ../pages/home.php?theXML=../control/XMLframes/medicationFrame.xml');

}


?>
 <?php
 // check what I have to work with.
$requestArray = $_REQUEST;

print "<h3>\PHP \$_SERVER Values</h3>";
print "<p>";
foreach ($requestArray as $key => $value){
    echo "\$_REQUEST holds a key name of <span style=\"font-weight:bold; color:red; font-size: smaller;\">$key</span> the value is <span style=\"font-weight:bold; color:red;font-size: smaller;\">$value</span> <br>";
}
print "</p>";

$sessionArray = $_SESSION;

print "<p>";

foreach ($sessionArray as $key => $value){
    echo "\$_SESSION holds a key name of <span style=\"font-weight:bold; color:red; font-size: smaller;\">$key</span> the value is <span style=\"font-weight:bold; color:red;font-size: smaller;\">$value</span> <br>";
}
print "</p>";
?>