<?php 
session_start();


require_once('../control/include/dbConstants.php');

	$pharmacy = $_POST['pharmacy'];
	$pharmNum = $_POST['pharmNum'];
// from add a pharmacy page...
if ($_SERVER['HTTP_REFERER'] == 'http://localhost/sienna/pages/pharmAdd.php') {
	$sql = "INSERT INTO pharmacy (
				pharmacy,
				phone)
			VALUES (
				'$pharmacy',
				'$pharmNum');";
	$return = mysqli_query($db, $sql);
} else {
// from edit pharmacy page
	$sql = "UPDATE pharmacy SET phone = '$pharmNum' WHERE pharmacy = '$pharmacy'; ";
	$result = mysqli_query($db, $sql);
}

header('location: ../pages/home.php?theXML=../control/XMLframes/pharmacyFrame.xml');

$db->close();
?>