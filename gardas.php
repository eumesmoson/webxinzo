<?php
include "simple_html_dom.php";

$data=$_POST["DATA"];
$cod=$_POST["COD"];

$request = array(
'http' => array(
    'method' => 'POST',
    'content' => http_build_query(array(
        'buscar' => 1,
        'letra' => '',
        'fecha' => $data,
        'id_municipio' => $cod
    )),
)
);

$context = stream_context_create($request);


$html=file_get_html("http://registro.cofourense.com/publica/ver_guardias.php", false, $context);

$datost=$html->find('div[id=titulo_guardias]');
$datos=$html->find('div[class=datos_guardia]');
//echo "<span class='verben'>GARDAS: ".$data."</span><hr>";
//echo("<div class='table-responsive' id='datosgardas'>");

for($i=0;$i<count($datost);$i++)
{
echo "<table class='table' id='tabguar".$i."'>
<thead ><tr class='colorm'><th class='centro' colspan='2' id='gar".$i."'> ".$data. "&nbsp;&nbsp;".$datost[$i]->plaintext."</th></tr></thead></table>";
//for($j=0;$j<count($datos[$i]->find('p'));$j++){

foreach($datos[$i]->find('p') as $texto) { 
	if($texto->plaintext=="PABLO GARCIA VIVANCO"){echo "<div id='indice".$i."'><input type='hidden' name='nome".$i."' id='nome".$i."' value='14'></div>";}
    else if($texto->plaintext=="ANTONIO GOMEZ PENIN"){echo "<div id='indice".$i."'><input type='hidden' name='nome".$i."' id='nome".$i."' value='15'></div>";}
	else if($texto->plaintext=="MARIA SOLEDAD RODRIGUEZ GARRIDO"){echo "<div id='indice".$i."'><input type='hidden' name='nome".$i."' id='nome".$i."' value='16'></div>";}
	else if($texto->plaintext=="ANA FERNANDEZ ORCAJADA"){echo "<div id='indice".$i."'><input type='hidden' name='nome".$i."' id='nome".$i."' value='17'></div>";}
	else if($texto->plaintext=="MARCO FRANCISCO GUZMAN AREVALO"){echo "<div id='indice".$i."'><input type='hidden' name='nome".$i."' id='nome".$i."' value='18'></div>";}
}

}



$html->clear(); // Liberar la memoria 
unset($html); 
//echo $html;

?>