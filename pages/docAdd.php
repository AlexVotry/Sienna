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
	<link rel="stylesheet" type="text/css" href="../control/css/Sienna.css" /> 
</head>


	<body>
		<div id="container">
		<div id="main">

			<h2>Edit Medication</h2>

			<form method="POST" action="../control/docUpdate.php">

				<label>Doctor's last name?</label>
				<input type="text" name="doctors" /><br>

				<label>Phone number?</label>
				<input type="text" name="phone" /><br>

				<label>Hospital?</label>
				<input type="text" name="Hospital" /><br>

				<label>Next scheduled visit?</label>
				<input type="text" name="nextVisit" /><br>

				<button type="submit">Add Doctor</button>
			</form>
		</div>
		</div>
	</body>
</html>