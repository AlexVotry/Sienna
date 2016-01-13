<!-- ******************************************
	THIS DELETES THE DRUG BY USING THE URI SEGMENT TO IDENTIFY THE 
	CORRECT ROW
	***************************************** -->

<?php 
session_start();
require_once('../control/include/dbConstants.php');

// get the uri segment so I can use the correct row to edit or delete.

// ****************** from timwickstrom.com ************************
function getUri()
{
	return explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
}

// ****************** from timwickstrom.com ************************

function getUriSegment($n)
{
	$segs = getUri();
	return count($segs)>0&&count($segs)>=($n-1)?$segs[$n]:'';
}

$object = getUriSegment(4);

//****************** Delete record of drug *********************
$sql = "DELETE FROM medications WHERE Drug = '$object';";
$return = mysqli_query($db, $sql);

//****************** Delete record of doctor *********************
$sql = "DELETE FROM doctors WHERE doctors = '$object';";
$return = mysqli_query($db, $sql);

//****************** Delete record of pharmacy *********************
$sql = "DELETE FROM pharmacy WHERE pharmacy = '$object';";
$return = mysqli_query($db, $sql);

if ($db->query($sql) === TRUE) {
	echo $object." deleted successfully<br><br>";
} 
	else {
    echo "Error deleting record: " . $db->error;
}

$db->close();

?>
<a href="../../pages/home.php?theXML=../control/XMLframes/medicationFrame.xml">back to medications</a><br>
<a href="../../pages/home.php?theXML=../control/XMLframes/doctorsFrame.xml">back to doctors</a><br>
<a href="../../pages/home.php?theXML=../control/XMLframes/pharmacyFrame.xml">back to pharmacy</a><br>

