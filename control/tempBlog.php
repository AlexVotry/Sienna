<!-- creates blog from addBlog -->

<?php 

$_SESSION['title'] = $_POST['title'];
$_SESSION['author'] = $_POST['author'];
$_SESSION['datePub'] = $_POST['datePub'];
$_SESSION['item'] = $_POST['item'];


$title = $_POST["title"];
$author = $_POST['author'];
$datePub = $_POST['datePub'];
$item = $_POST['item'];

if (!file_exists('../pages/postBlog.xml')) {
	$xmlString = "<?xml version=\"1.0\" encoding=\"utf-8\"?><article></article>";	
	// new xml object starting with $xmlString.
	$xml = new SimpleXMLElement($xmlString);
	// returns the sting to postBlog.xml
	$xml->asXML('../pages/postBlog.xml');
 }//end if statement
 // xml document
 $xml = simplexml_load_file('../pages/postBlog.xml');

	$addArticle = $xml->addChild('story');
	$addTitle = $addArticle->addChild('title', $title);
	$addauthor = $addArticle->addChild('author', $author);
	$addDate = $addArticle->addChild('datePub', $datePub);
	$item = $addArticle->addChild('item',$item);
$xml->asXML('../pages/postBlog.xml');
header('location:../pages/home.php');
?>