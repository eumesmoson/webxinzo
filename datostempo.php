<?php 
require_once('configuracion.php');
$data=$_POST["data"];
$op=$_POST["opc"];

$d=explode("/",$data);
$meses=array("Xaneiro","Febreiro","Marzo","Abril","Maio","Xuño","Xullo","Agosto","Septembro","Outubro","Novembro","Decembro");

//echo($d[0]." ".$d[1]." ".$d[2]."<hr>");

//header('Content-type: text/html; charset=UTF-8');

//echo($url);
$dia=intval($d[0]);
$mes=intval($d[1]);
$ano=intval($d[2]);
$idia;
$imes;
$iano;

if($mes==1 || $mes==3 || $mes==5 || $mes==7 || $mes==8 || $mes==10){
   if($dia==31 ){$idia=1;$imes=$mes+1;}
   else{$idia=$dia+1;$imes=$mes;}
   $iano=$ano;
}
elseif($mes==12){
   if($dia==31 ){$idia=1;$imes=1;$iano=$ano+1;}
   else{$idia=$dia+1;$imes=$mes;$iano=$ano;}
}

elseif($mes==2){

   if(($ano%4 == 0 && $ano%100 != 0) || $ano%400 == 0 ){
    if($dia==29){$idia=1;$imes=$mes+1;}
    else{$idia=$dia+1;$imes=$mes;}
    
   }
   else{
    if($dia==28){$idia=1;$imes=$mes+1;}
    else{$idia=$dia+1;$imes=$mes;}
   }
   $iano=$ano;
}
elseif ($mes==4 || $mes==6 || $mes==9 || $mes==11){
   if($dia==30 ){$idia=1;$imes=$mes+1;}
   else{$idia=$dia+1;$imes=$mes;}
   $iano=$ano;
}


if($op==1){
echo ("<h5 class='texto centro efectotexto'>Medición en Xinzo de Limia o ".$dia." de ".$meses[$mes-1]." do ".$ano."</h5><hr>");
}
if($op==2){
$valor=$dia."/".$mes."/".$ano."&data2=".$idia."/".$imes."/".$iano;
//header('Content-type: text/html; charset=UTF-8');

$ul=utf8_encode("http://www2.meteogalicia.es/galego/observacion/estacions/contidos/DatosHistoricosXML_diario.asp?est=19027&");
$up=utf8_encode("param=83,84,85,86,9991,10004,10005,10018,10021,10022,10056,10063,10006,10013,10106,81,10003,10015,%2010124,10001,10117,10129,9990&");
$uf=utf8_encode("data1=".$valor."&idprov=2&red=".$redMetereo);
$ut=$ul.$up.$uf;

try {
$medicions=simplexml_load_file($ut);
}
catch (Exception $e) {
    echo 'Produciuse un erro :('.$e->getMessage();
}
/*for($i=0;$i<count($datos);$i++)
{
echo $i."  ".$datos[$i]."<br>";
}*/
//echo "<hr>".file_get_contents($url)."<hr>".$url."<hr>";
//var_dump($medicions);

echo("<div class='table-responsive metade' id='t1'>          
  <table class='table' id='taboavalores'>
    <thead >
      <tr class='textotatt'>
        <th class='textott centro'>MEDIDA</th>
        <th class='textott centro'>VALOR</th>
        <th class='textott centro'>UNIDADE</th>
      </tr>
    </thead>
    <tbody>");
    
    $dato="";

for($i=0;$i<12;$i++) 
     {
      if($medicions->Valores->Medida[$i]['Codigo_validacion']==1){$dato=$medicions->Valores->Medida[$i]['Valor'];}
      else{ $dato="";}
      
      echo("<tr class='textott'>
        <td id='des".$j."' class='textota iz'>".$j." ".htmlspecialchars($medicions->Valores->Medida[$i]['Variable'])."</td>
        <td id='val".$j."' class='textota'>".$dato."</td>
        <td id='uni".$j."' class='textota'>".htmlspecialchars($medicions->Valores->Medida[$i]['Unidades'])."</td></tr>");
      }

echo("</tbody></table></div>");
echo("<div class='table-responsive metade' id='t2' >          
  <table class='table' id='taboavalores'>
    <thead  id='head2'>
      <tr class='textotatt'>
        <th class='textott centro'>MEDIDA</th>
        <th class='textott centro'>VALOR</th>
        <th class='textott centro'>UNIDADE</th>
      </tr>
    </thead>
    <tbody>");
    $j=0;
   for($j=12;$j<=22;$j++) 
     {
      if($medicions->Valores->Medida[$j]['Codigo_validacion']==1){$dato=$medicions->Valores->Medida[$j]['Valor'];}
      else{ $dato="";}
      
      echo("<tr class='textott'>
        <td id='des".$j."' class='textota iz'>".htmlspecialchars($medicions->Valores->Medida[$j]['Variable'])."</td>
        <td id='val".$j."' class='textota'>".$dato."</td>
        <td id='uni".$j."' class='textota'>".htmlspecialchars($medicions->Valores->Medida[$j]['Unidades'])."</td></tr>");
      }

echo("<tr class='textott' >
  <td id='opc".$j."' class='textota der'><button type='submit'  class='botontempo' onclick='grafica()'>Graf Temperatura</button>
  <button type='submit'  class='botontempo' onclick='graficachu()'>Graf Choivas</button></td>
  <td colspan='2'><input type='text' id='datepicker' size='20' placeholder='Elixa data para consulta' class='oscuro centro' readonly value='".$data."' onmouseover='recfecha()'>
  <button type='submit' id='enviarfecha' class='botontempo' style='width:auto'  onmouseover='actboton()' >Ver</button></td></tr>
  </tbody></table></div>");	
}

?>