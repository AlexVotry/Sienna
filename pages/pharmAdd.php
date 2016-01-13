<!--  *************************************
  This is the form to add a Pharmacy
***************************************** -->

<?php session_start() ?>

<html lang="EN" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/xml; charset=utf-8" />
	<title><?php echo $title ?></title>
	<script type="text/javascript" src="admin.js"></script>
	<link rel="stylesheet" type="text/css" href="../control/css/Sienna.css" /> 
</head>

<body>
	<form id="pharm" action="../control/pharmUpdate.php" method="POST">
	<legend>New Pharmacy</legend>
	<input type="text" name="pharmacy" />

	<legend>Phone number</legend>
	<input type="text" name="pharmNum" />
	<br>

	<button type="submit">Add it</button>
		

	</form>

</body>
</html>