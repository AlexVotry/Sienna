<!-- ********************************************
	THIS PAGE EDITS THE MEDICATION BY USING THE URI SEGMENT I USED FROM THE 
	MEDICATION TABLE

************************************************* -->
	
<?php session_start() ?>

<html lang="EN" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/xml; charset=utf-8" />
	<title><?php echo $title ?></title>
	<script type="text/javascript" src="admin.js"></script>
	<link rel="stylesheet" type="text/css" href="../../control/css/Sienna.css" /> 
</head>

<?php  
require_once('../control/include/dbConstants.php');

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

$doctors = getUriSegment(4);

 	$sql = "SELECT * FROM doctors WHERE doctors = '$doctors';";
	$result = mysqli_query($db, $sql) or die(mysqli_connect_error());
	$cols = mysqli_fetch_assoc($result);
		
$db->close();

?>

	<body>
		<div id="container">
		<div id="main">

			<h2>Edit Medication</h2>

			<form method="POST" action="../../control/docUpdate.php">

				<label>Doctor's name?</label>
				<input type="text" name="doctors" value ='<?php echo $cols['doctors']; ?>'/><br>

				<label>Phone number?</label>
				<input type="text" name="phone" value ='<?php echo $cols['phone']; ?>'/><br>

				<label>Hospital?</label>
				<input type="text" name="Hospital" value ='<?php echo $cols['Hospital']; ?>' /><br>

				<label>Next scheduled visit?</label>
				<input type="text" name="nextVisit" value ='<?php echo $cols['nextVisit']; ?>'/><br>

				<button type="submit">Make changes</button>
			</form>
		</div>
		</div>
	</body>
</html>