<?php 
 date_default_timezone_set("America/Los_Angeles");
$date = date("m/d"); 
$_SESSION['date'] = $date;

 ?>
 <form id="medUpdate" method="post" action="../control/medUpdate.php">
 <h3>Meds taken on <?php echo $date;  ?></h3>
 <input type="hidden" name='date' value ="<?php echo $date;  ?>">
 <label><b>Busporine</b></label><br>
 	<input type='radio' name="buspirone" value='2'>twice
 	<input type='radio' name="buspirone" value='1'>once
 	<input type='radio' name="buspirone" value='0'>nope</br><br>

 <label><b>Latuda</b></label><br>
	<input type='radio' name='latuda' value='2'>with food
 	<input type='radio' name='latuda' value='1'>without food
 	<input type='radio' name="latuda" value='0'>nope<br><br>
<label><b>I feel..</b></label>
	<select name="feelings">
		<option value="5">GREAT!</option>	
		<option value="4">fine</option>
		<option value="3">meh</option>
		<option value="2">lousy</option>
		<option value="1">Fucked up</option>
	</select> <br><br>

 <button type="submit">submit</button>
 </form>