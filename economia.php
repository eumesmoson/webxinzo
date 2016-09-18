<!DOCTYPE html>
<html lang="gl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php require_once('configuracion.php'); echo $nomeMunicipio;?></title>
<link rel="icon" href="imaxes/escudob.png"/>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="estilos/estilo.css">
<link rel="stylesheet" href="estilos/c3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="http://d3js.org/d3.v3.min.js"></script>
<script src="scripts/Donut3D.js"></script>
<script src="scripts/c3.js"></script>
</head>
<body>
<div class="container-fluid">
<header>
<nav class="navbar navbar-default fondoheader" id="menu" >
<div class="container-fluid">
<div class="navbar-header">
<img src="imaxes/escudob.png" alt="escudo menu" title="escudo menu" class="navbar-toggle colorp redondo" data-toggle="collapse" data-target="#enpri">
</div>
<div class="collapse navbar-collapse" id="enpri">
<ul class="nav navbar-nav">
<li class="colorx" id="tabindex"><a href="index.php" class="efectotexto"><span class="btn-lg texto">Xeral</span></a></li>
<li class="colorp" id="tabpoboa"><a href="poboacion.php" class="efectotexto"><span  class="btn-lg texto">Poboación</span></a></li>
<li class="colore" id="tabecono"><a href="#" class="efectotexto"><span  class="btn-lg texto">Economía</span></a></li>
<li class="colort" id="tabtempo"><a href="tempo.php" class="efectotexto"><span  class="btn-lg texto">O Tempo</span></a></li>
<li class="colorm" id="tabmapas"><a href="mapas.php" class="efectotexto"><span  class="btn-lg texto">Mapas</span></a></li>
<li class="colori" id="tabimaxe"><a href="#" class="efectotexto"><span  class="btn-lg texto">Imaxes</span></a></li>
</ul>
</div>
</div>
</nav>
</header>

<article>
<div class="row coloref margenarriba" id="mostrar">

<div class="col-md-8 col-lg-9 col-sm-8" id="contdatos" >
<hr>

<ul class="nav nav-tabs" id="listaecon">
<li><a data-toggle="tab" class="colore" href="#des" onclick="cambiaDiv(1),grafiparo(),grafLineasparo()">Desemprego</a></li>
<li><a data-toggle="tab" class="colore" href="#afil" onclick="grafafil()">Afiliación S.S.</a></li>
<li><a data-toggle="tab" class="colore" href="#deb" onclick="cambiaDiv(2),grafLineas(c)">P.I.B. Débeda</a></li>
<li><a data-toggle="tab" class="colore" href="#pres" onclick="grafpres()">Presupostos</a></li>
<li><a data-toggle="tab" class="colore" href="#emp" >Empresas</a></li>
</ul>
<div id="contidotaboas" class="tab-content" >
<div id="des" class="tab-pane fade in active">
<div id="taboa" >
<?php 
header('Content-type: text/html; charset=UTF-8');
$ano=date("Y");
$mes=date("n");
$dia=date("d");
$imes=$mes;
$iano=$ano;
$auxmes;

if($dia<6 && $mes>1){$imes=$mes-1;} 
if(intval($dia)<6){$auxmes="0".(intval($mes)-2);} else{$auxmes="0".(intval($mes)-1);}


//if($mes==1) {$iano=$ano-1;$imes=12;}
if     ($mes>0  && $mes<3) {if($dia<25){$imes="09";}else{$imes="12";}$iano=$ano-1;}
else if($mes>=3 && $mes<6) {if($dia<25){$iano=$ano-1;$imes="12";}else{$imes="03";};}
else if($mes>=6 && $mes<9) {if($dia<25){$imes="03";}else{$imes="06";}$mes="0".(intval($mes)-1);}
else if($mes>=6 && $mes<12){if($dia<25){$imes="06";}else{$imes="09";}$mes="0".(intval($mes)-1);}

$urlp="http://www.ige.eu/igebdt/igeapi/datos/742/0:".$ano.$auxmes.",9915:".$codIGE;
$urlp1="http://www.ige.eu/igebdt/igeapi/datos/744/1:0,2:0,4:".$ano.$auxmes.",9915".$codIGE;//paro mes datos afil
$urle="http://www.ige.eu/igebdt/igeapi/datos/744/4:".$ano.$auxmes.",9915:".$codIGE;
$urle1="http://www.ige.eu/igebdt/igeapi/datos/7133/0:".$iano.$imes.",9915:".$codIGE;
$urle2="http://www.ige.eu/igebdt/igeapi/datos/8000/0:2012,9915:".$codIGE;//pib 2012
$urle3="http://www.ige.eu/igebdt/igeapi/datos/4556/0:".$iano.$imes.",9915:".$codIGE;
$urle31="http://www.ige.eu/igebdt/igeapi/datos/4557/0:".$iano.$imes.",9915:".$codIGE;
$urle4="http://www.ige.eu/igebdt/igeapi/datos/939/0:2013,9913:".$codIGE;//presupostos concello
$urle5="http://www.ige.eu/igebdt/igeapi/datos/744/1:0,2:0,4:".$iano.$imes.",9915:".$codIGE;//datos para taxa paro
$urle6="http://www.ige.eu/igebdt/igeapi/datos/1843/1:2014,9931:".$codIGE;
$urle7="http://www.ige.eu/igebdt/igeapi/datos/3074/0:0:1:188:205,2:2014,9931:".$codIGE;
$urle8="http://www.ige.eu/igebdt/igeapi/datos/777/0:2014,9931:".$codIGE;
$filtro='/"|'.$codIGE.'/';
$datosp=explode(',',preg_replace($filtro,' ', file_get_contents($urlp)));
$datosp1=explode(',',preg_replace($filtro,' ',file_get_contents($urlp1)));
$datose=explode(',',preg_replace($filtro,' ',file_get_contents($urle)));
$datose1=explode(',',preg_replace($filtro,' ',file_get_contents($urle1)));
$datose2=explode(',',preg_replace($filtro,' ',file_get_contents($urle2)));
$datose3=explode(',',preg_replace($filtro,' ',file_get_contents($urle3)));
$datose31=explode(',',preg_replace($filtro,' ',file_get_contents($urle31)));
$datose4=explode(',',preg_replace($filtro,' ',file_get_contents($urle4)));
$datose5=explode(',',preg_replace($filtro,' ',file_get_contents($urle5)));
$datose6=explode(',',preg_replace('/"/',' ',file_get_contents($urle6)));
$datose7=explode(',',preg_replace('/"/',' ',file_get_contents($urle7)));
$datose8=explode(',',preg_replace($filtro,' ',file_get_contents($urle8)));
/*
for($i=0;$i<count($datose31);$i++)
{
echo $i."  ".$datose31[$i]."<br>";
}*/


//echo $ano."  ".$mes."  ".$dia."<hr>";
$meses=array("Xaneiro","Febreiro","Marzo","Abril","Maio","Xuño","Xullo",
"Agosto","Septembro","Outubro","Novembro","Decembro");
$xml=simplexml_load_file("debedaviva.xml");
echo("<br><div class='table-responsive'  > 
  <table class='table'>
    <thead>
      <tr class='textotate'><th colspan='5' class='texto centro oscuro' id='lenda'>Desemprego por réxime mes de "
      .utf8_encode(substr($datosp[8],strpos($datosp[8],"/")+1,strlen($datosp[8])))." do "
      .substr($datosp[8],0,strpos($datosp[8],"/"))."</th><th>
      <a href='#'><img src='imaxes/pie_chart.png' alt='gráfica' title='gráfica' onclick='grafiparo(),grafLineasparo()'></a></th></tr><tr><th colspan='6'></th></tr>
      <tr class='textotate'>
        <th class='textote centro'>REXIME</th>
        <th class='textote centro'>HOMES</th>
        <th class='textote centro'>%</th>
        <th class='textote centro'>MULLERES</th>
        <th class='textote centro'>%</th>
        <th class='textote centro'>TOTAL</th>
      </tr>
    </thead>
    <tbody id='cdesex'>
    <tr class='textote' id='ag' onmouseover=colora(this.id,'#3366CC',0),resaltar(0,0) onmouseout=sincolor(this.id),normal(0)>
        <td id='ra'   class='textoe iz'>".$datosp[30]."</td>
        <td id='ha'   class='textote'>".$datosp[41]."</td>
        <td id='pha'  class='textote'>".round(($datosp[41]/$datosp[34])*100,2)."</td>
        <td id='ma'   class='textote'>".$datosp[48]."</td>
        <td id='pma'  class='textote'>".round(($datosp[48]/$datosp[34])*100,2)."</td>
        <td id='at'   class='textote'>".$datosp[34]."</td>
        </tr><tr class='textote' id='ig' onmouseover=colora(this.id,'#DC3912',0),resaltar(1,0) onmouseout=sincolor(this.id),normal(1)>
        <td id='ri'   class='textoe iz'>".$datosp[51]."</td>
        <td id='hi'   class='textote'>".$datosp[62]."</td>
        <td id='ph'  class='textote'>".round(($datosp[62]/$datosp[55])*100,2)."</td>
        <td id='mi'   class='textote'>".$datosp[69]."</td>
        <td id='pmi'  class='textote'>".round(($datosp[69]/$datosp[55])*100,2)."</td>
        <td id='it'   class='textote'>".$datosp[55]."</td>
        </tr><tr class='textote' id='cg' onmouseover=colora(this.id,'#FF9900',0),resaltar(2,0) onmouseout=sincolor(this.id),normal(2)>
        <td id='rc'   class='textoe iz'>Construcción</td>
        <td id='hc'   class='textote'>".$datosp[83]."</td>
        <td id='phc'  class='textote'>".round(($datosp[83]/$datosp[76])*100,2)."</td>
        <td id='mc'   class='textote'>".$datosp[90]."</td>
        <td id='pmc'  class='textote'>".round(($datosp[90]/$datosp[76])*100,2)."</td>
        <td id='ct'   class='textote'>".$datosp[76]."</td>
        </tr><tr class='textote' id='sg' onmouseover=colora(this.id,'#109618',0),resaltar(3,0) onmouseout=sincolor(this.id),normal(3)>
        <td id='rs'   class='textoe iz'>".$datosp[100]."</td>
        <td id='hs'   class='textote'>".$datosp[104]."</td>
        <td id='phs'  class='textote'>".round(($datosp[104]/$datosp[97])*100,2)."</td>
        <td id='ms'   class='textote'>".$datosp[111]."</td>
        <td id='pms'  class='textote'>".round(($datosp[111]/$datosp[97])*100,2)."</td>
        <td id='st'   class='textote'>".$datosp[97]."</td>
        </tr><tr class='textote' id='eg' onmouseover=colora(this.id,'#EFE836',0),resaltar(4,0) onmouseout=sincolor(this.id),normal(4)>
        <td id='re'   class='textoe iz'>".$datosp[121]."</td>
        <td id='he'   class='textote'>".$datosp[125]."</td>
        <td id='phe'  class='textote'>".round(($datosp[125]/$datosp[118])*100,2)."</td>
        <td id='me'   class='textote'>".$datosp[132]."</td>
        <td id='pme'  class='textote'>".round(($datosp[132]/$datosp[118])*100,2)."</td>
        <td id='et'   class='textote'>".$datosp[118]."</td>
        </tr>
        </tbody>
        <tfoot>
        <tr class='textotate'>
        <th class='textote centro'>TOTAIS:</th>
        <th class='textote centro'>".$datosp[20]."</th>
        <th class='textote centro'>".round(($datosp[20]/$datosp[13])*100,2)."</th>
        <th class='textote centro'>".$datosp[27]."</th>
        <th class='textote centro'>".round(($datosp[27]/$datosp[13])*100,2)."</th>
        <th class='textote centro'>".$datosp[13]."</th>
      </tr>
    </tfoot>
</table></div>
<div class='table-responsive'>      
  <table class='table'>
    <thead>
     <tr class='textotate'><th colspan='4' class='texto centro oscuro'>Taxa de desemprego "
      .utf8_encode(substr($datose5[10],strpos($datose5[10],"/")+1,strlen($datose5[10])))." do "
      .substr($datose5[10],0,strpos($datose5[10],"/"))."</th>
      <th colspan='2' class='texto centro oscuro'>".round(($datose5[13]/($datose5[13]+$datose3[11])*100),2)." %</th><thead></table></div>

<div class='table-responsive' id='tdesemp'>      
  <table class='table'>
    <thead>
     <tr class='textotate'><th colspan='5' class='texto centro oscuro' id='lenda1'>Desemprego por idades mes de "
      .substr($datose[10],strpos($datose[10],"/")+1,strlen($datose[10]))." do "
      .substr($datose[10],0,strpos($datose[10],"/"))."</th>
      <th><a href='#'><img src='imaxes/pie_chart.png' onclick='grafidades(),grafLineasparo()' alt='gráfica' title='gráfica'></a></th></tr><tr><th colspan='6'></th></tr>
      <tr class='textotate'>
        <th class='textote centro'>IDADES</th>
        <th class='textote centro'>HOMES</th>
        <th class='textote centro'>%</th>
        <th class='textote centro'>MULLERES</th>
        <th class='textote centro'>%</th>
        <th class='textote centro'>TOTAL</th>
      </tr>
    </thead>
    <tbody  id='cdesi'>
    <tr class='textote' id='me25g' onmouseover=colora(this.id,'#DC3912',1),resaltar(0,1) onmouseout=sincolor(this.id),normal(0)>
        <td id='men'   class='textoe iz'>".$datose[15]."</td>
        <td id='hme'   class='textote'>".$datose[41]."</td>
        <td id='phme'  class='textote'>".round(($datose[41]/$datose[20])*100,2)."</td>
        <td id='mme'   class='textote'>".$datose[62]."</td>
        <td id='pme'  class='textote'>".round(($datose[62]/$datose[20])*100,2)."</td>
        <td id='met'   class='textote'>".$datose[20]."</td>
        </tr><tr class='textote' id='ma25g' onmouseover=colora(this.id,'#109618',1),resaltar(1,1) onmouseout=sincolor(this.id),normal(1)>
        <td id='mai'   class='textoe iz'>Maiores de 25 anos</td>
        <td id='hma'   class='textote'>".$datose[48]."</td>
        <td id='phma'  class='textote'>".round(($datose[48]/$datose[27])*100,2)."</td>
        <td id='mma'   class='textote'>".$datose[69]."</td>
        <td id='pmma'  class='textote'>".round(($datose[69]/$datose[27])*100,2)."</td>
        <td id='mat'   class='textote'>".$datose[27]."</td>
        </tr>
        </tbody>
        <tfoot>
        <tr class='textotate'>
        <th class='textote'>TOTAIS:</th>
        <th class='textote'>".$datose[34]."</th>
        <th class='textote'>".round(($datose[34]/$datose[13])*100,2)."</th>
        <th class='textote'>".$datose[55]."</th>
        <th class='textote'>".round(($datose[55]/$datose[13])*100,2)."</th>
        <th class='textote'>".$datose[13]."</th>
      </tr>
    </tfoot>
</table></div>
<div class='form-group text-right'>
<label for='seleap'>Seleccione ano:</label><select id='seleap' name='seleap' class='selectpicker'>");
for($i=2008;$i<=(date('Y'));$i++)
{
echo("<option>".$i."</option>");
}
echo ("</select><label for='selemp'> e mes:</label><select id='selemp' name='selemp' class='selectpicker' >");
for ($i=1;$i<=count($meses);$i++)
{
echo ("<option value='".$i."'>".$meses[$i-1]."</option>");
}
echo ("</select><label>para ver os datos.</label>
    <button type='submit' class='btn btn-primary btn-sm' style='margin-top:-5px' 
    onclick=cargar(selemp.value,seleap.value,'taboa','datosparo.php'),recargarGraficas()>Ver</button></div>");
?>

</div>
<hr>
<div  id="chart" class="grafilineas"></div>
    </div>
    <div id="afil" class="tab-pane fade">
    <div id="taboass">

    <?php
/*for($i=0;$i<count($datose1);$i++)
{
echo $i."  ".$datose1[$i]."<br>";
} */
    echo("
    <div class='table-responsive'><table class='table'>
    <thead>
    <tr class='textotate'><th colspan='5' class='texto centro oscuro' id='lenda2'>Afiliación por Idades mes de "
    .utf8_encode(substr($datose1[8],strpos($datose1[8],"/")+1,strlen($datose1[8])))." do "
    .substr($datose1[8],0,strpos($datose1[8],"/"))."</th>
    <th><a href='#'><img src='imaxes/pie_chart.png' onclick='grafafil()' alt='gráfica' title='gráfica'></a></th></tr><tr><th colspan='6'></th></tr>
    <tr class='textotate'>
    <th class='textote centro'>IDADES</th>
    <th class='textote centro'>HOMES</th>
    <th class='textote centro'>%</th>
    <th class='textote centro'>MULLERES</th>
    <th class='textote centro'>%</th>
    <th class='textote centro'>TOTAL</th>
    </tr>
    </thead><tbody id='cassi'>");
    $id=17;
    $h=97;
    $t=20;
    $m=174;
    
    for ($i=0;$i<10;$i++){
      echo("
        <tr class='textote' id='tp".$i."' onmouseover=colora(this.id,salesData[".$i."].color,0),resaltar(".$i.",0) onmouseout=sincolor(this.id),normal(".$i.")>
        <td id='i".$i."'  class='textote' >".$datose1[$id]."</td>
        <td id='h".$i."'  class='textote' >".$datose1[$h]."</td>
        <td id='ph".$i."' class='textote'>".round(($datose1[$h]/$datose1[$t])*100,2)."</td>
        <td id='m".$i."'  class='textote'>".$datose1[$m]."</td>
        <td id='pm".$i."' class='textote'>".round(($datose1[$m]/$datose1[$t])*100,2)."</td>
        <td id='t".$i."'  class='textote'>".$datose1[$t]."</td></tr>");
        $id=$id+7;$h=$h+7;$t=$t+7;$m=$m+7;
      }
    echo("</tbody>
        <tfoot>
        <tr class='textotate'>
        <th class='textote'>TOTAIS:</th>
        <th class='textote'>".$datose1[90]."</th>
        <th class='textote'>".round(($datose1[90]/$datose1[13])*100,2)."</th>
        <th class='textote'>".$datose1[167]."</th>
        <th class='textote'>".round(($datose1[167]/$datose1[13])*100,2)."</th>
        <th class='textote'>".$datose1[13]."</th>
      </tr>
    </tfoot></table></div>
    <div class='table-responsive'>
    <table class='table'>
    <thead>
    <tr class='textotate'><th colspan='2' class='texto centro oscuro' id='lenda3'>Afiliación por Réximes mes de "
    .utf8_encode(substr($datose3[7],strpos($datose3[7],"/")+1,strlen($datose3[7])))." do "
    .substr($datose3[7],0,strpos($datose3[7],"/"))."</th>
    <th><a href='#'><img src='imaxes/pie_chart.png' onclick='grafafilsec()' alt='gráfica' title='gráfica'></a></th></tr>
    <tr><th colspan='3'></th></tr>
    <tr class='textotate'>
    <th class='textote centro'>REXIME</th>
    <th class='textote centro'>AFILIADOS</th>
    <th class='textote centro'>%</th>
    </tr></thead>
    <tbody id='cassr'>
    <tr class='textote' id='ax' onmouseover=colora(this.id,salesData[0].color,1),resaltar(0,1) onmouseout=sincolor(this.id),normal(0)>
        <td id='nx'   class='textoe iz'>".utf8_encode($datose3[14])."</td>
        <td id='numx'   class='textote'>".$datose3[17]."</td>
        <td id='porx'  class='textote'>".round(($datose3[17]/$datose3[11])*100,2)."</td>
    </tr>
    <tr class='textote' id='aa' onmouseover=colora(this.id,salesData[1].color,1),resaltar(1,1) onmouseout=sincolor(this.id),normal(1)>
        <td id='na'   class='textoe iz'>".utf8_encode($datose3[20])."</td>
        <td id='numa'   class='textote'>".$datose3[23]."</td>
        <td id='pora'  class='textote'>".round(($datose3[23]/$datose3[11])*100,2)."</td>
    </tr>
    <tr class='textote' id='aag' onmouseover=colora(this.id,salesData[2].color,1),resaltar(2,1) onmouseout=sincolor(this.id),normal(2)>
        <td id='nag'   class='textoe iz'>".utf8_encode($datose3[26])."</td>
        <td id='numag'   class='textote'>".$datose3[29]."</td>
        <td id='porag'  class='textote'>".round(($datose3[29]/$datose3[11])*100,2)."</td>
    </tr>
    <tr class='textote' id='am' onmouseover=colora(this.id,salesData[3].color,1),resaltar(3,1) onmouseout=sincolor(this.id),normal(3)>
        <td id='nm'   class='textoe iz'>".utf8_encode($datose3[32])."</td>
        <td id='numm'   class='textote'>".$datose3[35]."</td>
        <td id='porm'  class='textote'>".round(($datose3[35]/$datose3[11])*100,2)."</td>
    </tr>
    <tr class='textote' id='af' onmouseover=colora(this.id,salesData[4].color,1),resaltar(4,1) onmouseout=sincolor(this.id),normal(4)>
        <td id='nf'    class='textoe iz'>".utf8_encode($datose3[38])."</td>
        <td id='numf'  class='textote'>".$datose3[41]."</td>
        <td id='porf'  class='textote'>".round(($datose3[41]/$datose3[11])*100,2)."</td>
    </tr>
    </tbody>
     <tfoot>
        <tr class='textotate'>
        <th class='textote'>TOTAIS:</th>
        <th class='textote'>".$datose3[11]."</th>
        <th></th>
      </tr>
    </tfoot>
    </table></div>
<div class='table-responsive'>
 <table class='table'>
    <thead>
    <tr class='textotate'><th colspan='2' class='texto centro oscuro' id='lenda4'>Afiliación por Sectores mes de "
    .utf8_encode(substr($datose31[7],strpos($datose31[7],"/")+1,strlen($datose31[7])))." do "
    .substr($datose31[7],0,strpos($datose31[7],"/"))."</th>
    <th><a href='#'><img src='imaxes/pie_chart.png' onclick='grafafilsecto()' alt='gráfica' title='gráfica'></a></th></tr>
    <tr><th colspan='3'></th></tr>
    <tr class='textotate'>
    <th class='textote centro'>REXIME</th>
    <th class='textote centro'>AFILIADOS</th>
    <th class='textote centro'>%</th>
    </tr></thead>
    <tbody id='cassrs'>
    <tr class='textote' id='axs' onmouseover=colora(this.id,salesData[0].color,2),resaltar(0,2) onmouseout=sincolor(this.id),normal(0)>
        <td id='nxs'   class='textoe iz'>".utf8_encode($datose31[14])."</td>
        <td id='numxs'   class='textote'>".$datose31[17]."</td>
        <td id='porxs'  class='textote'>".round(($datose3[17]/$datose3[11])*100,2)."</td>
    </tr>
    <tr class='textote' id='aas' onmouseover=colora(this.id,salesData[1].color,2),resaltar(1,2) onmouseout=sincolor(this.id),normal(1)>
        <td id='nas'   class='textoe iz'>".utf8_encode($datose3[20])."</td>
        <td id='numas'   class='textote'>".$datose31[23]."</td>
        <td id='poras'  class='textote'>".round(($datose31[23]/$datose31[11])*100,2)."</td>
    </tr>
    <tr class='textote' id='aags' onmouseover=colora(this.id,salesData[2].color,2),resaltar(2,2) onmouseout=sincolor(this.id),normal(2)>
        <td id='nags'   class='textoe iz'>".utf8_encode($datose31[26])."</td>
        <td id='numags'   class='textote'>".$datose31[29]."</td>
        <td id='porags'  class='textote'>".round(($datose31[29]/$datose31[11])*100,2)."</td>
    </tr>
    <tr class='textote' id='ams' onmouseover=colora(this.id,salesData[3].color,2),resaltar(3,2) onmouseout=sincolor(this.id),normal(3)>
        <td id='nms'   class='textoe iz'>".utf8_encode($datose31[32])."</td>
        <td id='numms'   class='textote'>".$datose31[35]."</td>
        <td id='porms'  class='textote'>".round(($datose31[35]/$datose31[11])*100,2)."</td>
    </tr>
    <tr class='textote' id='afs' onmouseover=colora(this.id,salesData[4].color,2),resaltar(4,2) onmouseout=sincolor(this.id),normal(4)>
        <td id='nfs'    class='textoe iz'>".utf8_encode($datose31[38])."</td>
        <td id='numfs'  class='textote'>".$datose31[41]."</td>
        <td id='porfs'  class='textote'>".round(($datose31[41]/$datose31[11])*100,2)."</td>
    </tr>
    </tbody>
     <tfoot>
        <tr class='textotate'>
        <th class='textote'>TOTAIS:</th>
        <th class='textote'>".$datose31[11]."</th>
        <th></th>
      </tr>
    </tfoot>
    </table>
</div>
<div class='form-group text-right'>
<label for='seleas'>Seleccione ano:</label><select id='seleas' name='seleas' class='selectpicker' >");
for($i=2008;$i<=(date('Y'));$i++)
{
echo("<option>".$i."</option>");
}
echo ("</select><label for='selems'> e mes:</label><select id='selems' name='selems' class='selectpicker' >");
for ($i=3;$i<=count($meses)+1;$i+=3)
{
echo ("<option value='".$i."'>".$meses[$i-1]."</option>");
}
echo ("</select><label>para ver os datos.</label>
    <button type='submit' class='btn btn-primary btn-sm' style='margin-top:-5px' 
    onclick=cargar(selems.value,seleas.value,'taboass','datosss.php')>Ver</button></div>");
?>
</div>
</div>
<div id="deb" class="tab-pane fade">
  <?php 
  

   echo("<div class='table-responsive' >      
   <table class='table'>
    <thead>
    <tr class='textotate'>
    <th class='texto centro oscuro' colspan='2' id='lenda5'>".$datose2[10]."de ".$datose2[12]." ano: ".$datose2[8]."</th>
    </tr>
    <tr><th colspan='2'></th></tr>
   </thead>
   <tbody id='cpib'>
   <tr class='textote'>
   <td class='textote iz'>P.I.B. TOTAL (2012)</td>
   <td id='pibt' class='textote der'>".number_format(($datose2[13]*1000), 0, ',', '.')." €</td>
   </tr>
   <tr class='textote'>
   <td class='textote iz'>P.I.B. PER CAPITA (2012)</td>
   <td id='pibpc' class='textote der'>".$datose2[21]." €</td>
   </tr>
   <tr class='textote'>
   <td class='textote iz'>DEBEDA VIVA CONCELLO (2012)</td>
   <td id='pibpc' class='textote der'>".number_format(floatval($xml->datos[4]->deb), 0, ',', '.')." €</td>
   </tr>
   <tr class='textote'>
   <td class='textote iz'>DEBEDA PER CAPITA(2012)</td>
   <td id='pibpc' class='textote der'>".number_format(floatval($xml->datos[4]->deb)/floatval($xml->datos[4]->pob), 0, ',', '.')." €</td>
   </tr>
   <tr class='textote'>
   <td class='textote iz'>PORCENTAXE DEBEDA CONCELLO SOBRE P.I.B.(2012)</td>
   <td id='pibpc' class='textote der'>".round(floatval($xml->datos[4]->deb)/($datose2[13]*10),2)." %</td>
   </tr>
   </tbody>
   </table></div><div class='table-responsive'>
   <table class='table'>
   <thead>
   <tr class='textotate'>
   <th class='texto centro oscuro'  colspan='3' id='lenda6'> Débeda viva ".$nomeMunicipio." ano: ".$xml->datos[count($xml)-1]->ano."</th>
   </tr>
   <tr><th colspan='3'></th></tr>
   </thead>
   <tbody id='corz'>
   <tr class='textote'>
   <td class='textote iz'>DEBEDA VIVA CONCELLO (".$xml->datos[count($xml)-1]->ano.")</td>
   <td id='piico' class='textote der'><a href='#' class='mariz'><img src='imaxes/kchart.png' alt='gráfica' title='gráfica' onclick=grafLineas(c)></a></td>
   <td id='pibpc' class='textote der'>".number_format(floatval($xml->datos[count($xml)-1]->deb), 0, ',', '.')." €</td>
   </tr>
   <tr class='textote'>
   <td class='textote iz'>DEBEDA PER CAPITA(".$xml->datos[count($xml)-1]->ano.")</td>
   <td id='piico1' class='textote der'><a href='#' class='mariz'><img src='imaxes/kchart.png' alt='gráfica' title='gráfica' onclick=grafLineas(ch)></a></td>
   <td id='pibpc' class='textote der'>".number_format(floatval($xml->datos[count($xml)-1]->deb)/floatval($xml->datos[count($xml)-1]->pob), 0, ',', '.')." €</td>


   </tr>
   </tbody></table></div>"); 
   ?>
   <div  id="chart1" class="grafilineas"></div>
    </div>

    <div id="pres" class="tab-pane fade">
    <?php
    /*for($i=0;$i<count($datose4);$i++)
    {
    echo $i."  ".$datose4[$i]."<br>";
    } */
    echo("<div class='table-responsive' >      
    <table class='table'>
    <thead>
    <tr class='textotate'>
    <th class='texto centro oscuro' colspan='6' id='lenda7'>".utf8_encode($datose4[2])." de ".$datose4[10]." ano: ".$datose4[7]."
    <a href='#' ><img src='imaxes/pie_chart.png' alt='gráfica' title='gráfica' onclick=grafpres()></a></th>
    </tr><tr><th colspan='6'></th></tr>
    <tr class='textotate'><th class='texto centro oscuro' colspan='3'>Ingresos</th>
    <th class='texto centro oscuro' colspan='3' >Gastos</th></tr>
    <tr><th colspan='6'></th></tr>
    </thead> <tbody id='cpres'>");
    $di=20;
    $ti=17;
    $dg=74;
    $tg=77;
    
    for ($i=0;$i<8;$i++){
      echo("
       <tr class='textote' id='pre".$i."'  >
        <td id='di".$i."'  class='textote iz' onmouseover=colora(this.id,salesData[".$i."].color,0),resaltar(".$i.",0) onmouseout=sincolor(this.id),normal(".$i.")>".$datose4[$di]."</td>
        <td id='ti".$i."'  class='textote der' onmouseover=colora(this.id,salesData[".$i."].color,0),resaltar(".$i.",0) onmouseout=sincolor(this.id),normal(".$i.")>".number_format($datose4[$ti], 0, ',', '.')."€</td>
        <td id='pi".$i."'  class='textote'>".round(($datose4[$ti]/$datose4[11])*100,2)."%</td>
        <td id='dg".$i."'  class='textote iz' onmouseover=colora(this.id,salesData[".($i+8)."].color,0),resaltar(".($i+8).",0) onmouseout=sincolor(this.id),normal(".($i+8).")>".$datose4[$dg]."</td>
        <td id='tg".$i."'  class='textote der' onmouseover=colora(this.id,salesData[".($i+8)."].color,0),resaltar(".($i+8).",0) onmouseout=sincolor(this.id),normal(".($i+8).")>".number_format($datose4[$tg], 0, ',', '.')."€</td>
        <td id='pg".$i."'  class='textote'>".round(($datose4[$tg]/$datose4[11])*100,2)."%</td></tr>");
        
        $di=$di+6;$ti=$ti+6;$dg=$dg+6;$tg=$tg+6;
      }
    echo("</tbody>
        <tfoot>
        <tr class='textotate'>
        <th class='textote iz'>".$datose4[8]."</th>
        <th class='textote der'>".number_format($datose4[11], 0, ',', '.')."€</th>
        <th></th>
        <th class='textote iz'>".utf8_encode($datose4[68])."</th>
        <th class='textote der'>".number_format($datose4[71], 0, ',', '.')."€</th>
        <th></th></tr><tr><th colspan='6'></th></tr>");
     if($datose4[11]>$datose4[71])
     {echo("<tr class='textotate'><th class='textote iz'>SUPERAVIT</th>
            <th class='textote der'>".number_format(($datose4[11]-$datose4[71]), 0, ',', '.')."€</th>
            <th class='textote der'>".round((($datose4[11]-$datose4[71])/$datose4[11])*100,2)."%</th>
            <th colspan='3'></th></tr>");}
     elseif($datose4[11]<$datose4[71])
     {echo("<tr class='textotate'><th colspan='3'></th><th class='textote iz'>DÉFICIT</th>
            <th class='textote der'>".number_format(($datose4[71]-$datose4[11]), 0, ',', '.')."€</th>
            <th class='textote der'>".round((($datose4[71]-$datose4[11])/$datose4[71])*100,2)."%</th></tr>");}
     else
     {echo("<tr class='textotate'>
            <th class='textote iz' colspan='6'>EQUILIBRIO PRESUPOSTARIO</th>
            </tr>");}
    echo("</tfoot></table></div>");
    $xml2=simplexml_load_file("presupostos.xml");
    $ex=1;
    echo("<div class='table-responsive'>     
    <table class='table'><thead>
    <tr class='textotate'>
    <th class='texto centro oscuro' colspan='5' id='lenda8'>Presupostos ".$nomeMunicipio." ano 2014</th>
    <th><a href='#' class='mariz'><img src='imaxes/pie_chart.png' alt='gráfica' title='gráfica' onclick=grafafideb()></a></th>
    </tr><tr><th colspan='6'></th></tr>
    <tr class='textotate'><th class='texto centro oscuro' colspan='3'>Ingresos</th>
    <th class='texto centro oscuro' colspan='3' >Gastos</th></tr>
    <tr><th colspan='6'></th></tr>
    </thead><tbody>");
    for ($i=0;$i<9;$i++){
    echo("
       <tr class='textote' id=''>
        <td id='dpi".$i."'  class='textote iz' >".$xml2->INGRESOS[0]->concepto[$i]."</td>
        <td id='tdpi".$i."'  class='textote der' >".number_format(strval($xml2->INGRESOS[0]->importe[$i]->exercicio[$ex]), 0, ',', '.')."€</td>
        <td id='pdpi".$i."'  class='textote'>".round(($xml2->INGRESOS[0]->importe[$i]->exercicio[1]/$xml2->INGRESOS[0]->importe[9]->exercicio[$ex])*100,2)."%</td>
        <td id='dpg".$i."'  class='textote iz'>".$xml2->GASTOS[0]->concepto[$i]."</td>
        <td id='tdpg".$i."'  class='textote der'>".number_format(strval($xml2->GASTOS[0]->importe[$i]->exercicio[$ex]), 0, ',', '.')."€</td>
        <td id='pdpg".$i."'  class='textote'>".round(($xml2->GASTOS[0]->importe[$i]->exercicio[1]/$xml2->GASTOS[0]->importe[9]->exercicio[$ex])*100,2)."%</td></tr>");
     }
   echo("</tbody>
        <tfoot>
        <tr class='textotate'>
        <th class='textote iz'>".$xml2->INGRESOS[0]->concepto[9]."</th>
        <th class='textote der'>".number_format(strval($xml2->INGRESOS[0]->importe[9]->exercicio[$ex]), 0, ',', '.')."€</th>
        <th></th>
        <th class='textote iz'>".$xml2->GASTOS[0]->concepto[9]."</th>
        <th class='textote der'>".number_format(strval($xml2->GASTOS[0]->importe[9]->exercicio[$ex]), 0, ',', '.')."€</th>
        <th></th></tr>");
    echo("</tfoot></table></div>");

    ?>
    </div>
    <div id="emp" class="tab-pane fade">
  <?php 
  
echo("<div class='table-responsive'>          
  <table class='table '>
  <thead >
  <tr class='textotate'><th colspan='2' class='texto centro oscuro' id='lenda9'>Empresas por Nº de empregad@s  2014</th>
  <th><a href='#''><img src='imaxes/pie_chart.png' onclick='grafafil()' alt='gráfica' title='gráfica'></a></th></tr>
  <tr><th colspan='3'></th></tr>
  <tr class='textotate'>
  <th class='textote centro''>Nª EMPREGADOS</th>
  <th class='textote centro'>%</th>
  <th class='textote centro'>TOTAL</th>
  </tr>
  </thead>
  <tbody>");

    $ti=18;
    $ni=17;
    for ($i=0;$i<8;$i++){
      echo("<tr class='textote'>
        <td id='iten".$i."'class='textote iz'>".substr($datose6[$ti],strpos($datose6[$ti],"e")+1)."</td>
        <td class='textote'>".round(($datose6[$ni]/$datose6[11])*100,2)."</td>
        <td id='itet".$i."' class='textote'>".$datose6[$ni]."</td></tr>");
      $ti=$ti+6;$ni=$ni+6;
    }
    echo("<tfoot>
        <tr class='textotate'>
        <th class='textote centro'>TOTAIS:</th>
        <th class='textote centro'></th>
        <th class='textote centro'>".$datose6[11]."</th>
      </tr>
    </tfoot></tbody></table></div>");

echo("<div class='table-responsive'>          
  <table class='table'>
  <thead >
  <tr class='textotate'><th colspan='2' class='texto centro oscuro' id='lenda10'>Empresas por forma Xurídica: 2014</th>
  <th><a href='#''><img src='imaxes/pie_chart.png' onclick='grafafil()' alt='gráfica' title='gráfica'></a></th></tr>
  <tr><th colspan='3'></th></tr>
  <tr class='textotate'>
  <th class='textote centro''>FORMA XURIDICA</th>
  <th class='textote centro'>%</th>
  <th class='textote centro'>TOTAL</th>
  </tr>
  </thead>
  <tbody>");

    $ti=15;
    $ni=20;
    for ($i=0;$i<5;$i++){
      echo("<tr class='textote'>
        <td id='iten".$i."'class='textote iz'>".utf8_encode($datose7[$ti])."</td>
        <td class='textote'>".round(($datose7[$ni]/$datose7[13])*100,2)."</td>
        <td id='itet".$i."' class='textote'>".$datose7[$ni]."</td></tr>");
      $ti=$ti+7;$ni=$ni+7;
    }
    echo("<tfoot>
        <tr class='textotate'>
        <th class='textote centro'>TOTAIS:</th>
        <th class='textote centro'></th>
        <th class='textote centro'>".$datose7[13]."</th>
      </tr>
    </tfoot></tbody></table></div>");

  echo("<div class='table-responsive'>          
  <table class='table'>
  <thead >
  <tr class='textotate'><th colspan='2' class='texto centro oscuro' id='lenda11'>".utf8_encode($datose8[2])." de ".$datose8[10]." ano: ".$datose8[7]." </th>
  <th><a href='#''><img src='imaxes/pie_chart.png' onclick='grafafil()' alt='gráfica' title='gráfica'></a></th></tr>
  <tr><th colspan='3'></th></tr>
  <tr class='textotate'>
  <th class='textote centro''>SITUACION</th>
  <th class='textote centro'>%</th>
  <th class='textote centro'>TOTAL</th>
  </tr>
  </thead>
  <tbody>");

    $ti=8;
    $ni=11;
    $tot=$datose8[11]+$datose8[17];
    for ($i=0;$i<3;$i++){
      echo("<tr class='textote'>
        <td id='iten".$i."'class='textote iz'>".utf8_encode($datose8[$ti])."</td>
        <td class='textote'>".round(($datose8[$ni]/$tot)*100,2)."</td>
        <td id='itet".$i."' class='textote'>".$datose8[$ni]."</td></tr>");
      $ti=$ti+6;$ni=$ni+6;
    }
    echo("<tfoot>
        <tr class='textotate'>
        <th class='textote centro'>TOTAIS:</th>
        <th class='textote centro'></th>
        <th class='textote centro'>".$tot."</th>
      </tr>
    </tfoot></tbody></table></div>");
?>
</div>
</div>
</div>
<div id="quesito" class="col-md-4 col-lg-3 col-sm-4">
<hr>
<div id="tituloquesito" class="titulografica">

</div>
</div>
<?php $urlwid="http://www.ige.eu/web/servlet/widgdat?i=24;25;30;31;32;33;26;27;28&l=gl&e=".$codIGE;?>
<div class="col-md-4 col-lg-3 col-sm-4" id="igeeco"> 
<iframe class="conwipoboa"  frameborder="1" scrolling="no" src=<?php echo "'".$urlwid."'"; ?>>
</iframe>
<p style="text-align:center">
<a style="text-decoration: none; border: 0" target="_blank" href="http://www.ige.eu"><img border="0" src="http://www.ige.eu/web/imgs/operacion.gif"/></a>
<a href="http://www.ige.eu" >Instituto Galego de Estatística</a>
</p>
</div>
</article>	
</div>
<script type="text/javascript">
$("#tabecono").removeClass("colorx");
$("#tabecono").css({background:'#D4C380',BorderTopRightRadius: 10,BorderTopLeftRadius: 10,marginBottom:-10,border:'3px white groove'});
$("#tabecono").css("border-bottom","4px #D4C380 solid");

var datos, salesData;
var indice=0;
var indgraf=1;


    //alert(datos [0]);
function actualizaDatos()
{
//datos=[$("#at").html(),$("#it").html(),$("#ct").html(),$("#st").html(),$("#et").html()];
salesData=[
    {label:"Agricultura/Pesca", color:"#3366CC",count:$("#at").html()},
    {label:"Industria", color:"#DC3912",count:$("#it").html()},
    {label:"Construcción", color:"#FF9900",count:$("#ct").html()},
    {label:"Servizos", color:"#109618",count:$("#st").html()},
    {label:"Sen emprego anterior", color:"#EFE836",count:$("#et").html()}];
actGrafica('cdesex');
indice=0;
}
function grafidades()
{
//datos=[$("#at").html(),$("#it").html(),$("#ct").html(),$("#st").html(),$("#et").html()];
salesData=[];
salesData=[
    {label:"Menores de 25", color:"#DC3912",count:$("#met").html()},
    {label:"Maiores de 25", color:"#109618",count:$("#mat").html()}];
//alert($("#lenda1").html());
borraGrafica();
dibujaGrafica();
grafica($("#lenda1").html());  
actGrafica('cdesi');
indice=1;
}
function grafafil()
{
//datos=[$("#at").html(),$("#it").html(),$("#ct").html(),$("#st").html(),$("#et").html()];
salesData=[];
salesData=[
    {label:"< 20", color:"#3366CC",count:$("#t0").html()},
    {label:"20-24", color:"#DC3912",count:$("#t1").html()},
    {label:"25-29", color:"#FF9900",count:$("#t2").html()},
    {label:"30-34", color:"#109618",count:$("#t3").html()},
    {label:"35-39", color:"#EFE836",count:$("#t4").html()},
    {label:"40-44", color:"#9F1CE4",count:$("#t5").html()},
    {label:"45-49", color:"#1CE2E4",count:$("#t6").html()},
    {label:"50-54", color:"#57E41C",count:$("#t7").html()},
    {label:"55-59", color:"#ED8876",count:$("#t8").html()},
    {label:"> 60",  color:"#373A70",count:$("#t9").html()}];
//alert($("#lenda1").html());
borraGrafica();
dibujaGrafica();
grafica($("#lenda2").html());  
actGrafica('cassi');  
indice=0;
}
function grafafilsec()
{
//datos=[$("#at").html(),$("#it").html(),$("#ct").html(),$("#st").html(),$("#et").html()];
salesData=[];
salesData=[
    {label:"Réxime xeral e minería do carbón", color:"#3366CC",count:$("#numx").html()},
    {label:"Réxime especial de autónomos", color:"#DC3912",count:$("#numa").html()},
    {label:"Réxime especial agrario", color:"#FF9900",count:$("#numag").html()},
    {label:"Réxime especial do mar", color:"#109618",count:$("#numm").html()},
    {label:"Réxime especial empregados do fogar", color:"#EFE836",count:$("#numf").html()}];
//alert($("#lenda1").html());
borraGrafica();
dibujaGrafica();
grafica($("#lenda3").html()); 
actGrafica('cassr'); 
indice=1;  
}
function grafafilsecto()
{
//datos=[$("#at").html(),$("#it").html(),$("#ct").html(),$("#st").html(),$("#et").html()];
salesData=[];
salesData=[
    {label:"Agricultura e pesca", color:"#3366CC",count:$("#numxs").html()},
    {label:"Réxime especial de autónomos", color:"#DC3912",count:$("#numas").html()},
    {label:"Construción", color:"#FF9900",count:$("#numags").html()},
    {label:"Servizos", color:"#109618",count:$("#numms").html()},
    {label:"Non consta", color:"#EFE836",count:$("#numfs").html()}];
//alert($("#lenda1").html());
borraGrafica();
dibujaGrafica();
grafica($("#lenda4").html()); 
indice=2;  
actGrafica('cassrs'); 
}
function grafafideb()
{
//datos=[$("#at").html(),$("#it").html(),$("#ct").html(),$("#st").html(),$("#et").html()];
salesData=[];
salesData=[
    {label:"Réxime xeral e minería do carbón", color:"#3366CC",count:(163515000-7354000)},
    {label:"Réxime especial de autónomos", color:"#DC3912",count:7354000}];
    
//alert($("#lenda1").html());
borraGrafica();
dibujaGrafica();
grafica('Porcentaxe debeda sobre P.I.B. ano 2012'); 
//actGrafica();   
}
function grafpres()
{
    //alert($("#ti0").html().replace(/[€.]/gi, '')/2);
//datos=[$("#at").html(),$("#it").html(),$("#ct").html(),$("#st").html(),$("#et").html()];
salesData=[];
salesData=[
    {label:"Impostos indirectos", color:"#109618",count:$("#ti0").html().replace(/[€.]/gi, '')/2},
    {label:"Taxas e outros ingresos", color:"#66FF00",count:$("#ti1").html().replace(/[€.]/gi, '')/2},
    {label:"Transferencias correntes", color:"#71CC51",count:$("#ti2").html().replace(/[€.]/gi, '')/2},
    {label:"Ingresos patrimoniais", color:"#138808",count:$("#ti3").html().replace(/[€.]/gi, '')/2},
    {label:"Alleamento de investimentos reais", color:"#006400",count:$("#ti4").html().replace(/[€.]/gi, '')/2},
    {label:"Transferencias de capital", color:"#98FF98",count:$("#ti5").html().replace(/[€.]/gi, '')/2},
    {label:"Activos financeiros", color:"#39FF14",count:$("#ti6").html().replace(/[€.]/gi, '')/2},
    {label:"Pasivos financeiros", color:"#66DDAA",count:$("#ti7").html().replace(/[€.]/gi, '')/2},
    {label:"Gastos de persoal", color:"#DC3912",count:$("#tg0").html().replace(/[€.]/gi, '')/2},
    {label:"Gastos en bens correntes e servizos",  color:"#FF005A",count:$("#tg1").html().replace(/[€.]/gi, '')/2},
    {label:"Gastos financeiros",  color:"#F08080",count:$("#tg2").html().replace(/[€.]/gi, '')/2},
    {label:"Transferencias correntes",  color:"#D4442F",count:$("#tg3").html().replace(/[€.]/gi, '')/2},
    {label:"Investimentos reais",  color:"#FF0000",count:$("#tg4").html().replace(/[€.]/gi, '')/2},
    {label:"Transferencias de capital",  color:"#820000",count:$("#tg5").html().replace(/[€.]/gi, '')/2},
    {label:"Activos financeiros",  color:"#DC2339",count:$("#tg6").html().replace(/[€.]/gi, '')/2},
    {label:"Pasivos financeiros",  color:"#CC0000",count:$("#tg7").html().replace(/[€.]/gi, '')/2}];
//alert($("#lenda1").html());
borraGrafica();
dibujaGrafica();
grafica($("#lenda5").html()); 
//actGrafica();   
}
function grafiparo()
{
//datos=[$("#at").html(),$("#it").html(),$("#ct").html(),$("#st").html(),$("#et").html()];
salesData=[];
actualizaDatos();
borraGrafica();
dibujaGrafica();
grafica($("#lenda").html());  
actGrafica('cdesex');
indice=0;
}        

function dibujaGrafica()
{
var ancho=$("#quesito").width();
var svg = d3.select("#quesito").append("svg").attr("width",ancho).attr("height",300);

//svg.append("g").attr("id","salesDonut");
svg.append("g").attr("id","quotesDonut");
//Donut3D.draw("salesDonut", randomData(), 150, 150, 130, 100, 30, 0.4);
Donut3D.draw("quotesDonut", randomData(), ancho/2, ancho/3, ancho/2.5, 100, 30, 0);


$("#tituloquesito").html($("#lenda").html());

}
function randomData(){
    return salesData.map(function(d){ 
        return {label:d.label, value:d.count, color:d.color};});
}
function borraGrafica()
{
$("svg").remove();
}


function grafica(titulo){
    
    $("#tituloquesito").html(titulo);  
}

function colora(a,b,index)
{
//alert(a+"  "+b);
if(indice===index){
var color;
color="linear-gradient("+b+" 30%, #F2F2F2 100%)";
//alert(color);
$("#"+a).css({"background": color}); 
}
}
function sincolor(a)
{
//alert(a);
$("#"+a).css({"background": "transparent"}); 
}
function resaltar(i,index)
{

if(indice===index){
//alert(indice+"  "+index+" "+i);
$(".percent").css({"visibility": "hidden"});  
$(".percent").eq(i).css({"visibility": "visible"});   
$(".percent").eq(i).css({"font-size": "2em"});    
$(".percent").eq(i).css({"font-size": "2em"}); 
$(".percent").eq(i).css({"font-weight": "bold"}); 
$(".label").eq(i).css({"visibility": "visible"}); 
//indice=0;
}
}

function normal(i)
{
//alert(a);
$(".percent").eq(i).css({"font-size": "1em"}); 
$(".percent").eq(i).css({"font-weight": "normal"}); 
$(".percent:hover").eq(i).css({"font-weight": "bold"}); 
$(".percent:hover").eq(i).css({"font-size": "2em"});
$(".label").eq(i).css({"visibility": "hidden"});  
$(".percent").css({"visibility": "visible"});

}

function actGrafica(t){


$(".label").each(function(i){
    //alert(t+" "+indice);
    $(".percent").eq(i).mouseover(function () {
    colora($("#"+t+"> tr:eq("+i+")").attr('id'),salesData[i].color,indice);
    resaltar(i,indice);

    });
    $(".percent").eq(i).mouseout(function () {
    sincolor($("#"+t+" > tr:eq("+i+")").attr('id'));
    normal(i);
});
});
}
var c=[
        ['x', '2008-12-31', '2009-12-31', '2010-12-31', '2011-12-31', '2012-12-31', '2013-12-31', '2014-12-31', '2015-12-31'],
        ['IMPORTE TOTAL DEBEDA CONCELLO', 2299000, 4162000, 4141000,3964000, 7354000, 7855000,6343000,5851000 ], 
      ];
var ch=[
        ['x', '2008-12-31', '2009-12-31', '2010-12-31', '2011-12-31', '2012-12-31', '2013-12-31', '2014-12-31', '2015-12-31'],
        ['IMPORTE DEBEDA POR HABITANTE', Math.round(2299000/10033), Math.round(4162000/10161), Math.round(4141000/10245),Math.round(3964000/1032329),
        Math.round(7354000/10358), Math.round(7855000/10307),Math.round(6343000/10200),Math.round(5851000/10043)]
       ];
//alert(c[0][1]);
    
function cambiaDiv(n){
 
    if(n==1){
        $(".grafilineas:eq(0)").attr("id","chart");
        $(".grafilineas:eq(1)").attr("id","chart1");
        indgraf=n;
    }
    if(n==2){
        $(".grafilineas:eq(0)").attr("id","chart1");
        $(".grafilineas:eq(1)").attr("id","chart");
        indgraf=n;
    }

}
function recargarGraficas(){
    if(indgraf==1){grafLineasparo();}
    if(indgraf==2){grafLineas(c);}
}

function grafLineas(x){
    var chart = c3.generate({
    padding: {
        top: 5,
        right: 40,
        bottom: 5,
        left: 55,
    },
    data: {
        x: 'x',
        d: 'IMPORTE DEBEDA CONCELLO',
        columns:x
    },
    color: {
        pattern: ['#E81426']
    },
    grid: {
        x: {
            show: true
        },
        y: {
            show: true
        }
    },
    axis: {
        x: {
            type: 'timeseries',
            tick: {
                format: '%Y'
            }
        
        },
        y: {
            padding: {left:0}

        }
        
}});
<?php
$url="http://www.ige.eu/igebdt/igeapi/datos/744/1:0,2:0,4:200505:200506:200507:200508:200509:200510:200511:200512:200601:200602:200603:200604:200605:200606:200607:200608:200609:200610:200611:200612:200701:200702:200703:200704:200705:200706:200707:200708:200709:200710:200711:200712:200801:200802:200803:200804:200805:200806:200807:200808:200809:200810:200811:200812:200901:200902:200903:200904:200905:200906:200907:200908:200909:200910:200911:200912:201001:201002:201003:201004:201005:201006:201007:201008:201009:201010:201011:201012:201101:201102:201103:201104:201105:201106:201107:201108:201109:201110:201111:201112:201201:201202:201203:201204:201205:201206:201207:201208:201209:201210:201211:201212:201301:201302:201303:201304:201305:201306:201307:201308:201309:201310:201311:201312:201401:201402:201403:201404:201405:201406:201407:201408:201409:201410:201411:201412:201501:201502:201503:201504:201505:201506:201507:201508:201509:201510:201511:201512:201601:201602:201603:201604:201605:201606:201607:201608,9915:".$codIGE;
$datos=explode(',',preg_replace('/"|[a-zA-Z]/',' ',file_get_contents($url)));


/*for($i=0;$i<count($datos);$i++)
{
echo $i."  ".$datos[$i]."<br>";
}*/
$json="";
$datas="";
$desemp="";

    $d=23;
    $c=27;
  
    for ($i=0;$i<(count($datos)/7)-4;$i++){
   
    $datas=$datas."'".substr($datos[$d],0,4)."-".substr($datos[$d],4,strlen($datos[$d]))."-31',";
    $desemp=$desemp.$datos[$c].",";
    $d=$d+7;$c=$c+7;   
    }

 
 //echo ("<hr>".$json."<hr>"); 
$dat="['x',".trim($datas, ',')."]";
$des="['PARADOS',".substr($desemp,0,-1)."]";

?>
}

function grafLineasparo(){
    var chart= c3.generate({
    padding: {
        top: 5,
        right: 40,
        bottom: 5,
        left: 55,
    },
    data: {
        x: 'x',
        columns:[
         <?php echo $dat;?>,
         <?php echo $des;?>,
       ]
    },
    color: {
        pattern: ['#E81426']
    },
    grid: {
        x: {
            show: true
        },
        y: {
            show: true
        }
    },
    axis: {
        x: {
            type: 'timeseries',
            tick: {
                format: '%m-%Y'
            }
        
        },
        y: {
            padding: {left:0}

        }
        
}});
}
function cargar(mes,ano,capa,url){
    //alert(mes+" "+ano+" "+capa+" "+url);
    $.ajax({
        type:  'POST',
        url:    url,
        data:  {"mes":mes,"ano":ano},
         }).done(function( msg ) {
          $(document).ajaxSuccess(function(){
           $("#"+capa).html(msg);
           
         });
         }).fail(function (jqXHR, textStatus, errorThrown){
          $("#"+capa).html("Produciuse un erro: "+ textStatus +" "+ errorThrown);
        });
$(document).ajaxComplete(function(){
    
    switch(url){
        case "datosparo.php":
        grafiparo();
        cambiaDiv(1);
        grafLineasparo(); 
        break;
        case "datosss.php":
        grafafil();
        break;
    }
   
    if($(window).width()>1600){colocaTaboas()}
  
    
}); 

}

actualizaDatos();
dibujaGrafica($("#lenda").html());
actGrafica('cdesex');
function colocaTaboas(){$(".table-responsive").addClass("metade");$("#tdesemp").addClass("marteden");}
function descolocaTaboas(){$(".table-responsive").removeClass("metade");}
function adapan(){


if($(window).width()<=450){
    $("#menu").removeClass("navbar-default");
    $("#menu").addClass("navbar-fixed-top");
    $("#mostrar").addClass("altura");
    $("#contdatos").addClass("margen");
    $("#listaecon li:eq(0) > a").html("Des");
    $("#listaecon li:eq(1) > a").html("S.S.");
    $("#listaecon li:eq(2) > a").html("PIB");
    $("#listaecon li:eq(3) > a").html("Pre");
    $("#listaecon li:eq(4) > a").html("Emp");
    descolocaTaboas();
    }
if($(window).width()>450 && $(window).width()<760){
    $("#menu").removeClass("navbar-default");
    $("#menu").addClass("navbar-fixed-top");
    $("#mostrar").addClass("altura");
    $("#contdatos").addClass("margen");
    $("#listaecon li:eq(0) > a").html("Desemprego");
    $("#listaecon li:eq(1) > a").html("Afiliación S.S.");
    $("#listaecon li:eq(2) > a").html("P.I.B. Débeda");
    $("#listaecon li:eq(3) > a").html("Presupostos");
    $("#listaecon li:eq(4) > a").html("Empresas");
    descolocaTaboas();

}
if($(window).width()>760){
    $("#menu").removeClass("navbar-fixed-top");
    $("#menu").addClass("navbar-default");
    $("#mostrar").removeClass("altura");
    $("#mostrar").height($(window).height()*0.93);
    $("#contidotaboas").height($(window).height()*0.80);
    $("#listaecon li:eq(0) > a").html("Desemprego");
    $("#listaecon li:eq(1) > a").html("Afiliación S.S.");
    $("#listaecon li:eq(2) > a").html("P.I.B. Débeda");
    $("#listaecon li:eq(3) > a").html("Presupostos");
    $("#listaecon li:eq(4) > a").html("Empresas");
    $("#contdatos").removeClass("margen");
    descolocaTaboas();
   }
if($(window).width()>1600){colocaTaboas()}
//$("#mostrar").height($(window).height()*0.95);   
}
$(window).resize(function() {
adapan();
borraGrafica();
dibujaGrafica();
recargarGraficas();
});
adapan();
//cambiaDiv();
grafLineasparo();


</script>

</body>

</html>