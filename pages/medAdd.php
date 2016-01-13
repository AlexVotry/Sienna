<!-- **********************************
	THIS IS THE FORM TO ADD A DRUG TO THE TABLE
	****************************************** -->

<?php session_start() ?>
<html lang="EN" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/xml; charset=utf-8" />
	<title><?php echo $title ?></title>
	<script type="text/javascript" src="admin.js"></script>
	<link rel="stylesheet" type="text/css" href="../control/css/Sienna.css" /> 
</head>
	<body>
		<div class="content">
		<div class="article">

			<h2>Add a Drug</h2>

			<form method="POST" action="../control/medUpdate.php">
				<!-- Who's this for?  would be added for additional patients-->
				
				<input type="hidden" name="user" value="Sienna" /><br>

				<label>New Drug?</label>
				<input type="text" name="drug" /><br>

				<label>Dosage?</label>
				<input type="text" name="dosage" /><br>

				<label>How many per day?</label>&nbsp
				<input type="text" name="perDay" /><br>

				<label>How many refills are allowed?</label>
				<input type="text" name="refills" /><br>

				<label>How many come in the bottle?</label>
				<input type="text" name="amtLeft" /><br>

				<label>Date filled?</label>
				<input type="text" name="DateOfRefill" /><br>

				<label>When will this bottle be finished?</label>
				<input type="text" name="DateOfExpire" /><br>

				<label>Who's the doctor?</label>
				<input type="text" name="Doctor" /><br>

				<label>Which Pharmacy?</label>
				<input type="text" name="Pharmacy" value="Bartells" /><br>

				<label>What's the order number?</label>
				<input type="text" name="RXnumber" /><br>

				<button type="submit">Add this drug</button>
			</form>
		</div>
		</div>
	</body>
</html>