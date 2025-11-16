<?php
ini_set('display_errors',1);
//required PHP scripts
//define('TTF_DIR',__DIR__.'/jpgraph/fonts/');
define('USE_TTF',false);
require_once(__DIR__.'/jpgraph/jpgraph.php');
require_once(__DIR__.'/jpgraph/jpgraph_line.php');


//preparing data
$dataX=array();
$dataY=array();


//https://www.php.net/manual/en/function.sin.php
for($i=0;$i<=360;$i++){
	$dataX[]=$i;
	$dataY[]=sin(deg2rad($i));
}

// Size of the overall graph
$width=700;
$height=500;

//https://jpgraph.net/download/manuals/classref/Graph.html#_GRAPH___CONSTRUCT
//https://jpgraph.net/download/manuals/classref/Graph.html
//https://jpgraph.net/download/manuals/classref/Graph.html#_GRAPH_SETSCALE
// Create the graph and set a scale.
// These two calls are always required
$graph=new Graph($width,$height);
$graph->SetScale('linlin');

//https://jpgraph.net/download/manuals/chunkhtml/ch12.html
//graph title
//https://jpgraph.net/download/manuals/chunkhtml/example_src/common-obj-graph.html
//TextProperty class : https://jpgraph.net/download/manuals/classref/TextProperty.html 

$graph->title->SetFont(FF_FONT1,FS_BOLD,14);
$graph->title->Set('Sin(x)');

$graph->subtitle->SetFont(FF_FONT1,FS_BOLD,10);
$graph->subtitle->Set('x in degrees');

$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD,10);
$graph->xaxis->title->Set('x degrees');

$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD,10);
$graph->yaxis->title->Set('sin(x)');

// Create the linear plot
//https://jpgraph.net/download/manuals/classref/LinePlot.html#_LINEPLOT_LINEPLOT
$linePlot=new LinePlot($dataY,$dataX);




// Add the plot to the graph
//https://jpgraph.net/download/manuals/classref/Graph.html#_GRAPH_ADD
$graph->Add($linePlot);


 
// Display the graph
//https://jpgraph.net/download/manuals/classref/Graph.html#_GRAPH_STROKE
$graph->stroke();





?>



