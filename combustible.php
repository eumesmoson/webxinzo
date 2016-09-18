<?php
$url="https://sedeaplicaciones.minetur.gob.es/ServiciosRESTCarburantes/PreciosCarburantes/EstacionesTerrestres/FiltroMunicipio/4961";

/*$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
curl_setopt($ch, CURLOPT_PORT, 443);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type:application/xml; charset=utf-8'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36");
curl_exec($ch);
echo 'Curl error: ' . curl_error($ch);
curl_close($ch);*/

//var_dump($xml);
$ctx = stream_context_create(
    array(
      'http'=>array(
        'header'=>"Content-Type: application/xml; charset=utf-8",
        'method'=>'GET'
        )
    )
  );

try {
$gasofa=simplexml_load_string(file_get_contents($url,0,$ctx));
}
catch (Exception $e) {
    echo 'Produciuse un erro :('.$e->getMessage();
}
//var_dump($datos);
echo "<div class='table-responsive' id='datosgasfecha'><table class='table' border='2' id='tabgt'>
<thead ><tr class='colorm'><th class='centro' colspan='2' id='gar'>Prezos actualizados: ".$gasofa->Fecha."</th></tr></thead></table></div>";
$pgA=0;$clasA="";
$pgB=0;
for($i=0;$i<count($gasofa->ListaEESSPrecio->EESSPrecio);$i++)
{
echo"<div class='table-responsive' id='datosgas".$i."'><table class='table' border='0' id='tabgd'>
<thead ><tr class='colorm'><th class='centro' colspan='2' id='gar".$i."'>".$gasofa->ListaEESSPrecio->EESSPrecio[$i]->Rótulo."</th></tr></thead>
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
echo "<tr><td><img src='imaxes/earp.png' alt='coordenadas'></td><td style='text-align:center'><a href='#' id='coorg".$i."'  onclick=engadirMarcador(document.getElementById('coorg".$i."').innerHTML,document.getElementById('gar".$i."').innerHTML,document.getElementById('dirg".$i."').innerHTML)>".preg_replace('/,/','.',$gasofa->ListaEESSPrecio->EESSPrecio[$i]->Latitud).",".preg_replace('/,/','.',$gasofa->ListaEESSPrecio->EESSPrecio[$i]->Longitud_x0020__x0028_WGS84_x0029_)."</a></td></tr>"; 
echo"</table></div>";
}

?>



