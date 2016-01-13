<?php session_start() ?>
<html lang="EN" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/xml; charset=utf-8" />
	<title>login</title>
	<!--<script type="text/javascript" src="control/js/admin.js"></script> -->
	<link rel="stylesheet" type="text/css" href="control/css/Sienna.css" /> 
</head>
<body>
<header>
<h1>Login</h1>
</header>
<?php
$showForm = true;
$title = "Log In";
// Set all important session variables to null.
		// $_SESSION['warning'] = "";
		// $_SESSION['firstName'] = "";
		// $_SESSION['lastName'] = "";
		// $_SESSION['adminLevel'] = "";
		// $_SESSION['loggedIn'] = false;
    


// Start decision Check Number of Attempts...

// check to see if this is the first time the user has attempted to log into the administrative site,
// if so, the session variable will not exist
// use the isset() method to determine if the variable exists
 if (!isset($_SESSION['loginAttempt'])) {
     // create a session variable to determine the number of log in attempts
 	$_SESSION['loginAttempt'] = 0; // this gets added on the login page.
 	$_SESSION['warning'] = "";
 } elseif
 	($_SESSION['loginAttempt'] > 6) {
 	$_SESSION['warning'] = "There's something wrong! Please contact your dad for further help.";
    // to help secure the site, remove the log in form and have the user call the administrator of the site.
 	$showForm = false;
 }
 ?>

<!-- login form -->
<?php if ($showForm == true) { ?>
<form class="content" method="post" action="control/login.php">

<label>Please enter your username</label>
<input type="text" name="username" class="input">
<br><br>
<label>Password:</label>
<input type="password" name="pswWord" class="input">
<br><br>
<button type="submit" >login</button>

</form>
<?php } ?>
<span id="loginWarning">
<?php 
 // Session variable to display login in warning
if (isset($_SESSION['warning'])) {
	echo $_SESSION['warning'];
	$_SESSION['loginAttempt'] = 0;
}
?>
</span>
</body>
</html>

<?php

// $requestArray = $_REQUEST;

// print "<h3>\PHP \$_SERVER Values</h3>";
// print "<p>";
// foreach ($requestArray as $key => $value){
//     echo "\$_REQUEST holds a key name of <span style=\"font-weight:bold; color:red; font-size: smaller;\">$key</span> the value is <span style=\"font-weight:bold; color:red;font-size: smaller;\">$value</span> <br>";
// }
// print "</p>";

// $sessionArray = $_SESSION;

// print "<p>";

// foreach ($sessionArray as $key => $value){
//     echo "\$_SESSION holds a key name of <span style=\"font-weight:bold; color:red; font-size: smaller;\">$key</span> the value is <span style=\"font-weight:bold; color:red;font-size: smaller;\">$value</span> <br>";
// }
// print "</p>";
?>
