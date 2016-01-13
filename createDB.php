<!-- this page only runs once on set up.  I have to run it separately prior to running any other page for the website. -->

<?php 

 $host = 'localhost';
 $user = 'root';
 $password = '';
 $db = 'mysql';

 // make $con the db parameters
	$con = new mysqli($host, $user, $password, $db)
		or die ('Could not connect to the database server' . mysqli_connect_error());
	if (!$con) {
	    die('Could not connect: ' . mysqli_error() . " <br><br>");
	}
	else {
	    echo("Connection has been made <br><br>");
	}

// this removes the database 'Sienna'.  Starts over.  
	$sql = "DROP DATABASE IF EXISTS Sienna;";

	// query (database parameters, command)
	if (mysqli_query($con, $sql))
		echo "database has been dropped. <br><br>";
		else
			echo "<span style='font-weight:bold; color:red;'>database wasn't dropped or didn't exist" . mysqli_error(). "</span><br><br>";

// ****  CREATE DATABASE  SIENNA  ***************************************
	
		$sql = "CREATE DATABASE IF NOT EXISTS Sienna DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";

		if (mysqli_query($con, $sql))
			echo "database has been made.<br><br>";
			else
				echo "<span style='font-weight:bold; color:red;'>database was not made.". mysqli_error(). "</span><br><br>";

		$db = "Sienna";
		$con = new mysqli($host, $user, $password, $db)
			or die ('Could not connect to the database server' . mysqli_connect_error());
		if (!$con) {
		    die('Could not connect: ' . mysqli_error() . " <br><br>");
		}
		else {
		    echo("Connection has been made <br><br>");
		    
}
//*****  CLEAR TABLES  ****************************************
// clear admin table.
	$sql = "DROP TABLE IF EXISTS admin;";
	if (mysqli_query($con, $sql))
		echo "admin dropped.<br><br>";
		else 
			echo " <span style='font-weight:bold; color:red;'>admin wasn't dropped or didn't exist". mysqli_error(). "</span><br><br>";

// clear mediation table
 	$sql = "DROP TABLE IF EXISTS medications;";
	if (mysqli_query($con, $sql))
	 	echo "medications TABLE has been dropped<br><br>";
	 	else
	 		echo "<span style='font-weight:bold; color:red;'>medications TABLE has not been dropped:". mysqli_error(). "</span><br><br>";

// clear doctor table
	$sql = "DROP TABLE IF EXISTS doctors;";
	if (mysqli_query($con, $sql))
		echo "doctors TABLE dropped.<br><br>";
		else
			echo "<span style='font-weight:bold; color:red;'>doctors TABLE not dropped.</span><br><br>";

// clear pharmacy table
	$sql = "DROP TABLE IF EXISTS pharmacy;";
	if (mysqli_query($con, $sql))
		echo "pharmacy dropped.<br><br>";
		else
			echo "<span style='font-weight:bold; color:red;'>pharmacy not dropped.</span><br><br>";

// clear pillTracking
	$sql ="DROP TABLE IF EXISTS pillTracking;";
	if (mysqli_query($con, $sql))
		echo "pillTracking dropped.<br><br>";
		else
			echo "<span style='font-weight:bold; color:red;'>pillTracking not dropped.</span><br><br>";


// ****  CREATE TABLES  ********************************************************************	
// create admin table
		$sql = "CREATE TABLE admin (
			username		CHAR(25) 	NOT NULL,
			firstName		CHAR(25) 	NOT NULL,
			lastName 		CHAR(25) 	NOT NULL,
			password 		CHAR(25) 	NOT NULL,
			adminLevel		INTEGER(1) 	default 3,
			PRIMARY KEY 	(username)
			); ";

		if (mysqli_query($con, $sql))
			echo "admin TABLE was CREATED<br><br>";
			else 
				echo "<span style='font-weight:bold; color:red;'>admin TABLE wasn't CREATED". mysqli_error(). "</span><br><br>";
		
// create doctor table
		$sql = "CREATE TABLE doctors(
			doctors	 	CHAR(25) 	NOT NULL,
			phone 		CHAR(25) 	NOT NULL,
			Hospital 	CHAR(25) 	NULL,
			nextVisit	CHAR(25) 	NULL,
			PRIMARY KEY (doctors)
			);";		
		if (mysqli_query($con, $sql))
				echo "doctors TABLE created.<br><br>";
				else
					echo "<span style='font-weight:bold; color:red;'>doctors TABLE NOT created.</span><br><br>";
	
// create pharmacy table
		$sql = "CREATE TABLE pharmacy(
			pharmacy	CHAR(25) 	NOT NULL,
			phone 		CHAR(25) 	NOT NULL,
			PRIMARY KEY (pharmacy)
			);";	
		if (mysqli_query($con, $sql))
				echo "pharmacy TABLE created.<br><br>";
				else
					echo "<span style='font-weight:bold; color:red;'>pharmacy TABLE NOT created.</span><br><br>";
	
//create medication table
		 $sql = "CREATE TABLE medications (
				Drug 			CHAR(35) 	NOT NULL,  
				username 		CHAR(25) 	NOT NULL,
				Dosage			CHAR(25) 	NOT NULL,
				perDay			INTEGER 	NULL,
				refills			INTEGER 	NOT NULL,
				DateOfRefill	CHAR(25) 	NOT NULL,
				DateOfExpire 	CHAR(25) 	NOT NULL,
				Doctor			CHAR(25) 	NOT NULL,
				Pharmacy		CHAR(25) 	NOT NULL,
				RXnumber 		CHAR(25) 	NOT NULL,
				amtLeft			INTEGER 	NOT NULL, 
				PRIMARY KEY 	(Drug)
				-- FOREIGN key   	(username) 	REFERENCES admin (username),
				-- FOREIGN KEY 	(Doctor) 	REFERENCES doctors (doctors),
				-- FOREIGN KEY 	(Pharmacy) 	REFERENCES pharmacy (pharmacy)
		 	);";

		if(mysqli_query($con, $sql))
			echo "medications TABLE has been created. <br><br>";
			else
				echo "<span style='font-weight:bold; color:red;'>medications TABLE hasn't been created:</span><br><br>";

// create date table
		$sql = "CREATE TABLE pillTracking (
				id 			INTEGER		NOT NULL,
				trackDate 	CHAR(35) 	NOT NULL,
				Drug		CHAR(25) 	NOT NULL,
				Taken	 	INTEGER 	NULL,
				feeling		CHAR(25) 	NULL,	
				PRIMARY KEY (id),
				FOREIGN KEY (Drug) 		REFERENCES medications (Drug)
			);";	

		if (mysqli_query($con, $sql))
				echo "pillTracking TABLE created.<br><br>";
				else
					echo "<span style='font-weight:bold; color:red;'>pillTracking TABLE NOT created.</span><br><br>";


//***********   INSERT DATA  *************************************************
// add users to list
	$sql = "INSERT INTO admin VALUES 
		('Alex', 'Alex', 'Votry', 'Meds', 1),
		('Sienna', 'Sienna', 'Votry', 'Meds', 2),
		('new', 'New', 'User', 'Meds', 3);";

	if (mysqli_query($con, $sql))
		echo "Users were added to admin TABLE.<br><br>";
		else 
			echo "<span style='font-weight:bold; color:red;'>Users weren't added to admin TABLE</span><br><br>";

// add a pharmacy
	$sql = "INSERT INTO pharmacy VALUES 
		('Bartells', '425.670.2860');";

	if (mysqli_query($con, $sql)) 
		echo "pharmacy inserted.<br><br>";
			else
				echo "<span style='font-weight:bold; color:red;'>pharmacy not inserted.</span><br><br>";

// add a medication:
	$sql = "INSERT INTO medications VALUES (
		'Buspirone',
		'Sienna',
		'10 mg',
		2,
		1,
		'12/01/2015',
		'01/01/2016',
		'DeJong',
		'Bartells',
		'0703175',
		60
	);";

	if (mysqli_query($con, $sql))
		echo "medicine inserted.<br><br>";
		else
			echo "<span style='font-weight:bold; color:red;'>medicine not inserted.</span><br><br>";
// add a Doctor
	$sql = "INSERT INTO doctors VALUES 
		('L. DeJong', 'no phone', 'Edmonds Clinic', '01/15/2016');";

	if (mysqli_query($con, $sql)) 
		echo "doctors inserted.<br><br>";
		else
			echo "<span style='font-weight:bold; color:red;'>doctors not inserted.</span><br><br>";
// add pillTracking
	$sql = "INSERT INTO pillTracking VALUES 
		(1, '12/09', 'Buspirone', 2, 'GREAT');";

	if (mysqli_query($con,$sql))
		echo "pillTrackin inserted.<br><br>";
		else
			echo "<span style='font-weight:bold; color:red;'>pillTrackin not inserted.</span><br><br>";
 ?>