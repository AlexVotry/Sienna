<?php
require_once("../Chart/conf.php");
require_once('../control/include/dbConstants.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>phpChart - Basic Chart</title>
</head>
<body>

<?php
$sql = "SELECT * FROM pilltracking;";
$return = mysqli_query($db, $sql);
$rowCnt = $return->num_rows;
while($cols = mysqli_fetch_assoc($return)){
	$i=0; 
	$i++;
	$mood = $cols['feeling'];
	echo $mood;
 	// echo $mood;
	// array($mood->$l1);
}//end while
	// $date = $cols['trackDate'];
	// $drug1 = $cols['Taken'];
	// $l1 = $date;
    echo "<br>".$rowCnt;
    echo "<br>".$i;
 // }// end while
 	$temp = array(1,2);
	$l2 = array($temp, array(2, 3), array(3, 4));
	$l3 = array(array(2, 1), array(5, 3), array(7, 6));
    // $l2 = array(array(2, 14), array(7, 2), array(8,5));
    // $l3 = array(4, 7, 9, 2, 11, 5, 9, 13, 8, 7);

    $pc = new C_PhpChartX(array($l2,$l3),'chart1');
   	$pc->set_title(array('text'=>'Sienna'."'s".' Progress'));
    $pc->jqplot_show_plugins(true);
    $pc->set_legend(array('show'=>true));
    $pc->set_animate(true);
    $pc->add_series(array('showLabel'=>true, 'linePattern'=>'solid','showMarker'=>true,'shadow'=>false));
    $pc->add_series(array('showLabel'=>true, 'linePattern'=>'dotted','showMarker'=>true,'shadow'=>false));
    $pc->add_series(array('showLabel'=>true, 'linePattern'=>'-.','showMarker'=>false,'shadow'=>false));
    $pc->add_plugins(array('cursor'));
	$pc->set_cursor(array(
	        'show'=>true,
	        'zoom'=>true));
	$pc->set_grid(array(
	    'background'=>'lightyellow', 
	    'borderWidth'=>0, 
	    'borderColor'=>'#000000', 
	    'shadow'=>true, 
	    'shadowWidth'=>10, 
	    'shadowOffset'=>3, 
	    'shadowDepth'=>3, 
	    'shadowColor'=>'rgba(230, 230, 230, 0.07)'
	    ));
	$pc->set_legend(array(
    'show' => true,
    // 'location' => 'e', // locate height of legend
    'placement' => 'outside',
    // 'yoffset' => 30,
    // 'rendererOptions' => array('numberRows'=>100),
    'labels'=>array('Mood', 'Buspirone', 'Latuda')   
    ));
    $pc->set_xaxes(array(
    'yaxis' => array(
        'borderWidth'=>2,
        'borderColor'=>'#000', 
        // 'autoscale'=>true, 
        // 'min'=>'0', 
        // 'max'=>6, 
        'numberTicks'=>1,
        'label'=>'DATE')
    ));
    $pc->set_yaxes(array(
    'yaxis' => array(
        'borderWidth'=>5,
        'borderColor'=>'#ffffff', 
        // 'autoscale'=>true, 
        'min'=>'0', 
        'max'=>6, 
        'numberTicks'=>5,
        'label'=>'Mood : Usage')
    ));
    $pc->draw(600,300);   
    
    ?>
    </body>
</html>
</body>
</html>