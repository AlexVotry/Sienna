<!-- ***************************************
	This page is the form to edit the pharmacy
	******************************************** -->

<?php 
session_start();
?>
<html lang="EN" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="content-type" content="text/xml; charset=utf-8" />
		<title><?php echo $title ?></title>
		<script type="text/javascript" src="admin.js"></script>
		<link rel="stylesheet" type="text/css" href="../../control/css/Sienna.css" /> 
	</head>

<?php
require_once("../control/include/dbConstants.php");

// get the uri segment so I can use the correct row to edit.

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

$pharmacy = getUriSegment(4);

$sql = "SELECT * FROM pharmacy WHERE pharmacy = '$pharmacy';";
	$result = mysqli_query($db, $sql) or die(mysqli_connect_error());
	$cols = mysqli_fetch_assoc($result);

$db->close();
 ?>
	<body>
		<form id="pharm" action="../../control/pharmUpdate.php" method="POST">
			<legend>Pharmacy</legend>
			<input type="text" name="pharmacy" value="<?php echo $cols['pharmacy']; ?>" />

			<legend>Phone number</legend>
			<input type="text" name="pharmNum" value="<?php echo $cols['phone']; ?>"/>
			<br>

			<button type="submit">Change it</button>
		</form>
	</body>
</html>

