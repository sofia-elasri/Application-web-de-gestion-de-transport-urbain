<?php // content="text/plain; charset=utf-8"

require_once ('C:\wamp\www\finpfe\jpgraph-4.3.4\src\jpgraph.php');
require_once ('C:\wamp\www\finpfe\jpgraph-4.3.4\src\jpgraph_bar.php');
$con=mysqli_connect("localhost","root","","kenibus");

$Soir="select count(horaires) As nmbrS FROM tiket WHERE horaires='soir' ";
$resS=mysqli_query($con,$Soir);
$values=mysqli_fetch_assoc($resS);
$numS=$values['nmbrS'];
//echo"S $numS<br>";

$Matin="select count(horaires) As nmbrM FROM tiket WHERE horaires='matin' ";
$resM=mysqli_query($con,$Matin);
$values=mysqli_fetch_assoc($resM);
$numM=$values['nmbrM'];
//echo " M$numM<br>";

$Amidi="select count(horaires) As nmbrAM FROM tiket WHERE horaires='apres'";
$resAM=mysqli_query($con,$Amidi);
$values=mysqli_fetch_assoc($resAM);
$numAM=$values['nmbrAM'];
//echo  "Am $numAM<br>";


$midi="select count(horaires) As nmbrMd FROM tiket WHERE horaires='midi' ";
$resMd=mysqli_query($con,$midi);
$values=mysqli_fetch_assoc($resMd);
$numMd=$values['nmbrMd'];
//echo  "Am $numMd<br>";
$datay=array($numM,$numMd,$numAM,$numS);



// Create the graph. These two calls are always required
$graph = new Graph(350,220,'auto');
$graph->SetScale("textlin");

//$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// set major and minor tick positions manually
$graph->yaxis->SetTickPositions(array(20,40,60,80,100), array(15,45,75,105,135));
$graph->SetBox(false);

//$graph->ygrid->SetColor('black');
$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels(array('MATIN','MIDI','APRES-MIDI','SOIR'));
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($datay);

// ...and add it to the graPH
$graph->Add($b1plot);


$b1plot->SetColor("black");
$b1plot->SetFillGradient("#4B0082","red",GRAD_LEFT_REFLECTION);
$b1plot->SetWidth(45);
$graph->title->Set("statistique");

// Display the graph
$graph->Stroke();
?>