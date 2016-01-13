<!-- *********************************************************
update doctor status
******************************************************* -->
<?php 
require_once('../control/include/dbConstants.php');
$doctors = $_POST['doctors'];
$phone = $_POST['phone'];
$hospital = $_POST['Hospital'];
$nextVisit = $_POST['nextVisit'];

if ($_SERVER['HTTP_REFERER'] == "http://localhost/sienna/pages/docAdd.php") {

	$sql = "INSERT INTO doctors (
			doctors,
			phone,
			Hospital,
			nextVisit)
		VALUES (
			'$doctors',
			'$phone',
			'$hospital',
			'$nextVisit');";
	$result = mysqli_query($db, $sql);
	}   else {
			$sql = "UPDATE doctors
			SET phone = '$phone',
				Hospital = '$hospital',
				nextVisit = '$nextVisit'
			WHERE 
				doctors = '$doctors';";
			$result = mysqli_query($db, $sql);
		}
header('Location: ../pages/home.php?theXML=../control/XMLframes/doctorsFrame.xml');

?>

 <?php
 // check what I have to work with.
// $requestArray = $_REQUEST;

// print "<h3>\PHP \$_SERVER Values</h3>";
// print "<p>";
// foreach ($requestArray as $key => $value){
//     echo "\$_REQUEST holds a key name of <span style=\"font-weight:bold; color:red; font-size: smaller;\">$key</span> the value is <span style=\"font-weight:bold; color:red;font-size: smaller;\">$value</span> <br>";
// }
// print "</p>";

// $sessionArray = $_SESSION;

// print "<p>";

// foreach ($sessionArray as $key => $value){
//     echo "\$_SESSION holds a key name of <span style=\"font-weight:bold; color:red; font-size: smaller;\">$key</span> the value is <span style=\"font-weight:bold; color:red;font-size: smaller;\">$value</span> <br>";
// }
// print "</p>";
?>