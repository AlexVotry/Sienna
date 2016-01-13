<?php 
session_start();
$refer1 = "http://localhost/Sienna/";
$refer2 = "http://localhost/Sienna/index.php";

// if (($_SERVER['HTTP_REFERER'] != $refer1) && ($_SERVER['HTTP_REFERER'] != $refer2)){
// 	$_SESSION['warning'] = "wrong";	
//     header('Location: '."../index.php");  // if coming from somewhere beside index, send it to index.
// } 
// 	else

		if ((!isset($_POST['username'])) && (!isset($_POST['pswWord']))) {
	    header('Location: '."../index.php");
	}
	    elseif ($_POST['pswWord'] == "") {
	    $_SESSION['warning'] = "both fields must be filled in";	
	    header('Location: '."../index.php");
	    }
	 else {
		require_once("include/dbConstants.php"); //go to db so we can check their answers 

		$adminName = $_POST['username'];
		$adminPW = $_POST['pswWord'];     
	    $hash = ""; // used for encrypting the user's password, clear hash if exists
	    $recount = 0;  // set counter to zero.

	 	$sql = "SELECT firstName, lastName, adminLevel, COUNT(*) AS numRecs FROM admin WHERE username = '$adminName' AND password = ";
	    if ($adminPW == "Meds") {
	    	$sql .= "'Meds';";  // first time user.
	    	header('Location:' . 'newUser.php');
	    	
	    } else {
	    	$hash = hash('sha256', 'adminPW'); 
	    	$sql .= "'$hash';";  // encrypt pw.
	    	}
	 		// $sql .= "'$adminPW';"; // replace $hash to login without encryption.
	    	// get user from database, if no matches the 'rows' will be 0.
	    $result = mysqli_query($db, $sql) or die(mysqli_connect_error());
	    	if ($result) {
	    		//The mysqli_fetch_array() function fetches a result row as an associative array, a numeric array, or both.
	    		 while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)){
	    			$recount = $row['numRecs']; // if pw matches the row will be counted, therefore not 0.
	    		}
	    		echo $recount.'<br>';
	    		print_r($result);
	    		echo "<br>";
	    	}
	// if password is incorrect:
	    if ($recount == 0) {
	    	$_SESSION['warning'] = "Your username or password is wrong";
	    	$_SESSION['loginAttempt'] += 1;
	    	$_SESSION['loggedIn'] = false;
	    	header('Location:'. '../index.php');
	    } else {
	    	$result = mysqli_query($db, $sql);
	        if ($result) {
	          	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		    		$_SESSION['firstName'] = $row['firstName'];
		    		$_SESSION['lastName'] = $row['lastName'];
		    		$_SESSION['adminLevel'] = $row['adminLevel'];
		    		$_SESSION['loggedIn'] = true;
		    		echo $_SESSION['firstName'];
		    		echo $_SESSION['lastName'];
		    		echo $_SESSION['adminLevel'];
		    		// echo $_SESSION['loggedIn'];
	    		}
	    		header('Location:' . '../pages/home.php');
	    	}
	    }
	}

 ?>

<?php
$requestArray = $_REQUEST;

print "<h3>\PHP \$_SERVER Values</h3>";
print "<p>";
foreach ($requestArray as $key => $value){
    echo "\$_REQUEST holds a key name of <span style=\"font-weight:bold; color:red; font-size: smaller;\">$key</span> the value is <span style=\"font-weight:bold; color:red;font-size: smaller;\">$value</span> <br>";
}
print "</p>";

$sessionArray = $_SESSION;

print "<p>";

foreach ($sessionArray as $key => $value){
    echo "\$_SESSION holds a key name of <span style=\"font-weight:bold; color:red; font-size: smaller;\">$key</span> the value is <span style=\"font-weight:bold; color:red;font-size: smaller;\">$value</span> <br>";
}
print "</p>";
?>