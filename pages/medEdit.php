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

$drug = getUriSegment(4);
//echo $drug;
// $sql = "SELECT * FROM medications WHERE Drug = '$drug';";
// $return = mysqli_query($db, $sql);

// if ($db->query($sql) === TRUE) {
// 	echo "Record deleted successfully<br><br>";
// } 
// 	else {
//     echo "Error editing record: " . $db->error;
// }


 	$sql = "SELECT * FROM medications WHERE Drug = '$drug';";
	$result = mysqli_query($db, $sql) or die(mysqli_connect_error());
	$cols = mysqli_fetch_assoc($result);


 		
$db->close();

?>

	<body>
		<div id="container">
		<div id="main">

			<h2>Edit Medication</h2>

			<form method="POST" action="../../control/medUpdate.php">
				<!-- Who's this for?  would be added for additional patients-->
				
				<input type="hidden" name="user" value="Sienna" /><br>

				<label>New Drug?</label>
				<input type="text" name="drug" value ='<?php echo $cols['Drug']; ?>'/><br>

				<label>Dosage?</label>
				<input type="text" name="dosage" value ='<?php echo $cols['Dosage']; ?>'/><br>

				<label>How many per day?</label>
				<input type="text" name="perDay" value ='<?php echo $cols['perDay']; ?>'/><br>

				<label>How many refills are allowed?</label>
				<input type="text" name="refills" value ='<?php echo $cols['refills']; ?>'/><br>

				<label>How many come in the bottle?</label>
				<input type="text" name="amtLeft" value ='<?php echo $cols['amtLeft']; ?>'/><br>

				<label>Date filled?</label>
				<input type="text" name="DateOfRefill" value ='<?php echo $cols['DateOfRefill']; ?>'/><br>

				<label>When will this bottle be finished?</label>
				<input type="text" name="DateOfExpire" value ='<?php echo $cols['DateOfExpire']; ?>'/><br>

				<label>Who's the doctor?</label>
				<input type="text" name="Doctor" value ='<?php echo $cols['Doctor']; ?>'/><br>

				<label>Which Pharmacy?</label>
				<input type="text" name="Pharmacy" value ='<?php echo $cols['Pharmacy']; ?>' /><br>

				<label>What's the order number?</label>
				<input type="text" name="RXnumber" value ='<?php echo $cols['RXnumber']; ?>'/><br>

				<button type="submit">Make changes</button>
			</form>
		</div>
		</div>
	</body>
</html>