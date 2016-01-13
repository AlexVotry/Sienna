<?php 
	$xml = simplexml_load_file('postBlog.xml');
 ?>
	<h2> Journal</h2>
	<div class="article">

<?php 
	$counter = 0;
	foreach ($xml->children() as $value) {
		$counter++;
		// increase counter for each article.
		echo strtoupper($value->getName()) . " ". $counter . "<br>";
		//loop through the third generation and display contents
		foreach ($value->children() as $thirdGen) {
			echo $thirdGen."<br>";
		}
		echo "<hr>";
	}
?>

</div>
