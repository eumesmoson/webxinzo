<!doctype html>
<html lang="es">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="estilos/estilo.css">
<link rel="stylesheet" href="estilos/c3.css">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<div style="width:25%;margin:auto;background-color:yellow">
<?php
$url="https://sedeaplicaciones.minetur.gob.es/ServiciosRESTCarburantes/PreciosCarburantes/EstacionesTerrestres/FiltroMunicipio/4961";

try {
$gasofa=simplexml_load_file("com.xml");
}
catch (Exception $e) {
    echo 'Produciuse un erro :('.$e->getMessage();
}
//var_dump($gasofa);
echo "<table class='table' border='2' id='tabgt'>
<thead ><tr class='colorm'><th class='centro' colspan='2' id='gar'>Prezos actualizados: ".$gasofa->Fecha."</th></tr></thead></table></center>";
$pgA=0;$clasA="";
$pgB=0;
for($i=0;$i<count($gasofa->ListaEESSPrecio->EESSPrecio);$i++)
{
echo"<center><div class='table-responsive' id='datosgas'><table class='table' border='2' id='tabgd'>
<thead ><tr class='colorm'><th class='centro' colspan='2' id='gar'>".$gasofa->ListaEESSPrecio->EESSPrecio[$i]->Rótulo."</th></tr></thead>
<tr><td><img src='imaxes/homep.png' alt='dirección'></td><td id='dirg".$i."' style='text-align:center'>".$gasofa->ListaEESSPrecio->EESSPrecio[$i]->Dirección."</td></tr>
<tr><td><img src='imaxes/reloxo.png' alt='horario'></td><td id='horg".$i."' style='text-align:center'><b>".$gasofa->ListaEESSPrecio->EESSPrecio[$i]->Horario."</b></td></tr>";
if($gasofa->ListaEESSPrecio->EESSPrecio[$i]->Precio_x0020_Gasoleo_x0020_A!=''){

//if($pgA < intval($gasofa->ListaEESSPrecio->EESSPrecio[$i]->Precio_x0020_Gasoleo_x0020_A)){$pgA=$gasofa->ListaEESSPrecio->EESSPrecio[$i]->Precio_x0020_Gasoleo_x0020_A;$clasA="btn-success";}

echo"<tr><td><img src='imaxes/gas.png' alt='gasolinera'></td><td id='pga".$i."' style='text-align:right' class='".$clasA."'>GASOLEO A: <b>".$gasofa->ListaEESSPrecio->EESSPrecio[$i]->Precio_x0020_Gasoleo_x0020_A."</b> €</td></tr>";
}
if($gasofa->ListaEESSPrecio->EESSPrecio[$i]->Precio_x0020_Gasoleo_x0020_B!=''){

//if($pgB < intval($gasofa->ListaEESSPrecio->EESSPrecio[$i]->Precio_x0020_Gasoleo_x0020_B)){$pgB=$gasofa->ListaEESSPrecio->EESSPrecio[$i]->Precio_x0020_Gasoleo_x0020_B;}

echo"<tr><td><img src='imaxes/gas.png' alt='gasolinera'></td><td id='pgb".$i."' style='text-align:right'>GASOLEO B: <b>".$gasofa->ListaEESSPrecio->EESSPrecio[$i]->Precio_x0020_Gasoleo_x0020_B."</b> €</td></tr>";
}
if($gasofa->ListaEESSPrecio->EESSPrecio[$i]->Precio_x0020_Gasolina_x0020_95_x0020_Protección!=''){
echo"<tr><td><img src='imaxes/gas.png' alt='gasolinera'></td><td id='pg95-".$i."' style='text-align:right'>GASOLINA 95: <b>".$gasofa->ListaEESSPrecio->EESSPrecio[$i]->Precio_x0020_Gasolina_x0020_95_x0020_Protección."</b> €</td></tr>";
}
if($gasofa->ListaEESSPrecio->EESSPrecio[$i]->Precio_x0020_Gasolina_x0020__x0020_98!=''){
echo"<tr><td><img src='imaxes/gas.png' alt='gasolinera'></td><td id='pg98-".$i."' style='text-align:right'>GASOLINA 98: <b>".$gasofa->ListaEESSPrecio->EESSPrecio[$i]->Precio_x0020_Gasolina_x0020__x0020_98."</b> €</td></tr>";
}
if($gasofa->ListaEESSPrecio->EESSPrecio[$i]->Precio_x0020_Gasolina_x0020__x0020_98!=''){
echo"<tr><td><img src='imaxes/gas.png' alt='gasolinera'></td><td id='pg98-".$i."' style='text-align:right'>GASOLINA 98: <b>".$gasofa->ListaEESSPrecio->EESSPrecio[$i]->Precio_x0020_Gasolina_x0020__x0020_98."</b> €</td></tr>";
}
if($gasofa->ListaEESSPrecio->EESSPrecio[$i]->Precio_x0020_Nuevo_x0020_Gasoleo_x0020_A!=''){
echo"<tr><td><img src='imaxes/gas.png' alt='gasolinera'></td><td id='pgan".$i."' style='text-align:right'>NOVO GASOLEO A: <b>".$gasofa->ListaEESSPrecio->EESSPrecio[$i]->Precio_x0020_Nuevo_x0020_Gasoleo_x0020_A."</b> €</td></tr>";
}
echo "<tr><td><img src='imaxes/earp.png' alt='coordenadas'></td><td style='text-align:center'><a href='#' id='coor".$i."'  onclick=engadirMarcador(document.getElementById('coor".$i."').innerHTML,document.getElementById('nom".$i."').innerHTML,document.getElementById('dir".$i."').innerHTML)>".$gasofa->ListaEESSPrecio->EESSPrecio[$i]->Latitud.",".$gasofa->ListaEESSPrecio->EESSPrecio[$i]->Longitud_x0020__x0028_WGS84_x0029_."</a></td></tr>"; 
echo"</table></div>".$pgB."</center>";
}

?>
</div>
</body>
</html>