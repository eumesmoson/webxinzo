<?php
include("datospoboacion.php");

$ano=(date('Y')-1);
//$datos= new datospoboacion();

/*$datos->limpar();

$datos->taboa();*/

//$datos->ver();
function a($ano){
$url="http://www.ige.eu/igebdt/igeapi/datos/100/0:".$ano.",9915:32032";
$datos=explode(',',preg_replace('/[A-Z]|[a-z]|"|32032/',' ', file_get_contents($url)));

for($i=0;$i<count($datos);$i++)
{
if (empty($datos[$i]))
{
array_splice($datos, $i,1);
}
}
return $datos;
}



$dat= new datospoboacion($ano);
echo $dat->limpar();
//echo $dat->ver();
/*echo "<hr>".count($d)."<hr>";
for($j=0;$j<count($d);$j++)
{
echo $j."  ".$d[$j]."<br>";
}
var_dump($d);*/

?>