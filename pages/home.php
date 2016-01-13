<?php 
// Sienna Home
$title = "Sienna's meds";
//get an XML file or load a default
 //determine if an XML file has been sent through the $theXML parameter
// Check the menu to see which href 'theXML' equals

if(filter_has_var(INPUT_GET, "theXML")) {
	$theXML = filter_input(INPUT_GET, "theXML");
} else {
	$theXML = '../control/XMLframes/homeFrame.xml';// if this doesn't load, it returns false.
} //end if

// open XML file
$xml = simplexml_load_file($theXML); 


if (!$xml) {
	echo "there was a problem loading the page";
} else {

	include ($xml->top);
	include ($xml->footer);
	echo "<div class='menuPanel'>";
	include ($xml->menu);
	echo "</div>";

	echo "<div class='content'>";
	include ($xml->content);
	echo "</div>";
}


 // check what I have to work with.
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

