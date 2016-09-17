<?php 
$mes=$_POST["mes"];
$ano=$_POST["ano"];
$iano=$ano;
$imes=$mes;
$iti;
$ito;

if ($mes<10)
{
$mes="0".$mes;
}

if($ano <2011)
{
if($mes>0 && $mes<6)
{
$iano=$ano-1;
$imes="12";
}
else if($mes>=6 && $mes<12)
{
$iano=$ano;
$imes="06";
}
}

if ($ano >=2011)
{

if($mes>0 && $mes<3)
{
$iano=$ano-1;
$imes="12";

}
else if($mes>=3 && $mes<6)
{
$imes="03";
$iano=$ano;
if($ano==2011){$imes="04";}
}
else if($mes>=6 && $mes<9)
{
$imes="06";
$iano=$ano;
if($ano==2011){$imes="07";}
}
else if($mes>=9 && $mes<12)
{
$imes="09";
$iano=$ano;
if($ano==2011){$imes="10";}
}

}
header('Content-type: text/html; charset=UTF-8');

if($ano<=2010)
{
$urle1="http://www.ige.eu/igebdt/igeapi/datos/3421/0:".$iano.$imes.",9915:32032";
$urle3="http://www.ige.eu/igebdt/igeapi/datos/3422/0:".$iano.$imes.",9915:32032";
$urle31="http://www.ige.eu/igebdt/igeapi/datos/3423/0:".$iano.$imes.",9915:32032";
}
else{
$urle1="http://www.ige.eu/igebdt/igeapi/datos/7133/0:".$iano.$imes.",9915:32032";
$urle3="http://www.ige.eu/igebdt/igeapi/datos/4556/0:".$iano.$imes.",9915:32032";
$urle31="http://www.ige.eu/igebdt/igeapi/datos/4557/0:".$iano.$imes.",9915:32032";
}
$datose1=explode(',',preg_replace('/"|32032/',' ',file_get_contents($urle1)));
$datose3=explode(',',preg_replace('/"|32032/',' ',file_get_contents($urle3)));
$datose31=explode(',',preg_replace('/"|32032/',' ',file_get_contents($urle31)));


$meses=array("Xaneiro","Febreiro","Marzo","Abril","Maio","Xuño","Xullo",
"Agosto","Septembro","Outubro","Novembro","Decembro");
$ocultar="";
if($datose31[7]==""){$ocultar="style='display: none;'";}

//echo ($ano."  ".$mes);
/*var_dump($datose1);
echo "<hr>";
var_dump($datose3);
echo "<hr>";
echo $urle1;
echo "<hr>";
echo $urle3;*/
 echo("
    <div class='table-responsive'><table class='table'>
    <thead>
    <tr class='textotate'><th colspan='5' class='texto centro oscuro' id='lenda2'>Afiliación por Idades mes de "
    .utf8_encode(substr($datose1[8],strpos($datose1[8],"/")+1,strlen($datose1[8])))." do "
    .substr($datose1[8],0,strpos($datose1[8],"/"))."</th>
    <th><a href='#'><img src='imaxes/pie_chart.png' onclick='grafafil()' alt='gráfica' title='gráfica'></a></th></tr><tr><th colspan='6'></th></tr>
    <tr class='textotate'>
    <th class='textote centro'>IDADES".$imes." ".$iano."</th>
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
        <th class='textote centro'>TOTAIS:</th>
        <th class='textote centro'>".$datose1[90]."</th>
        <th class='textote centro'>".round(($datose1[90]/$datose1[13])*100,2)."</th>
        <th class='textote centro'>".$datose1[167]."</th>
        <th class='textote centro'>".round(($datose1[167]/$datose1[13])*100,2)."</th>
        <th class='textote centro'>".$datose1[13]."</th>
      </tr>
    </tfoot></table></div>
    <div class='table-responsive' ".$ocultar.">
    <table class='table'>
    <thead>
    <tr class='textotate'><th colspan='2' class='texto centro oscuro' id='lenda2'>Afiliación por Réximes mes de "
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
        <td id='nx'   class='textote iz'>".utf8_encode($datose3[14])."</td>
        <td id='numx'   class='textote'>".$datose3[17]."</td>
        <td id='porx'  class='textote'>".round(($datose3[17]/$datose3[11])*100,2)."</td>
    </tr>
    <tr class='textote' id='aa' onmouseover=colora(this.id,salesData[1].color,1),resaltar(1,1) onmouseout=sincolor(this.id),normal(1)>
        <td id='na'   class='textote iz'>".utf8_encode($datose3[20])."</td>
        <td id='numa'   class='textote'>".$datose3[23]."</td>
        <td id='pora'  class='textote'>".round(($datose3[23]/$datose3[11])*100,2)."</td>
    </tr>
    <tr class='textote' id='aag' onmouseover=colora(this.id,salesData[2].color,1),resaltar(2,1) onmouseout=sincolor(this.id),normal(2)>
        <td id='nag'   class='textote iz'>".utf8_encode($datose3[26])."</td>
        <td id='numag'   class='textote'>".$datose3[29]."</td>
        <td id='porag'  class='textote'>".round(($datose3[29]/$datose3[11])*100,2)."</td>
    </tr>
    <tr class='textote' id='am' onmouseover=colora(this.id,salesData[3].color,1),resaltar(3,1) onmouseout=sincolor(this.id),normal(3)>
        <td id='nm'   class='textote iz'>".utf8_encode($datose3[32])."</td>
        <td id='numm'   class='textote'>".$datose3[35]."</td>
        <td id='porm'  class='textote'>".round(($datose3[35]/$datose3[11])*100,2)."</td>
    </tr>
    <tr class='textote' id='af' onmouseover=colora(this.id,salesData[4].color,1),resaltar(4,1) onmouseout=sincolor(this.id),normal(4)>
        <td id='nf'    class='textote iz'>".utf8_encode($datose3[38])."</td>
        <td id='numf'  class='textote'>".$datose3[41]."</td>
        <td id='porf'  class='textote'>".round(($datose3[41]/$datose3[11])*100,2)."</td>
    </tr>
    </tbody>
     <tfoot>
        <tr class='textotate'>
        <th class='textote centro'>TOTAIS:</th>
        <th class='textote centro'>".$datose3[11]."</th>
        <th></th>
      </tr>
    </tfoot>
    </table></div>
<div class='table-responsive' ".$ocultar.">
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
        <td id='nxs'   class='textote iz'>".utf8_encode($datose31[14])."</td>
        <td id='numxs'   class='textote'>".$datose31[17]."</td>
        <td id='porxs'  class='textote'>".round(($datose3[17]/$datose3[11])*100,2)."</td>
    </tr>
    <tr class='textote' id='aas' onmouseover=colora(this.id,salesData[1].color,2),resaltar(1,2) onmouseout=sincolor(this.id),normal(1)>
        <td id='nas'   class='textote iz'>".utf8_encode($datose3[20])."</td>
        <td id='numas'   class='textote'>".$datose31[23]."</td>
        <td id='poras'  class='textote'>".round(($datose31[23]/$datose31[11])*100,2)."</td>
    </tr>
    <tr class='textote' id='aags' onmouseover=colora(this.id,salesData[2].color,2),resaltar(2,2) onmouseout=sincolor(this.id),normal(2)>
        <td id='nags'   class='textote iz'>".utf8_encode($datose31[26])."</td>
        <td id='numags'   class='textote'>".$datose31[29]."</td>
        <td id='porags'  class='textote'>".round(($datose31[29]/$datose31[11])*100,2)."</td>
    </tr>
    <tr class='textote' id='ams' onmouseover=colora(this.id,salesData[3].color,2),resaltar(3,2) onmouseout=sincolor(this.id),normal(3)>
        <td id='nms'   class='textote iz'>".utf8_encode($datose31[32])."</td>
        <td id='numms'   class='textote'>".$datose31[35]."</td>
        <td id='porms'  class='textote'>".round(($datose31[35]/$datose31[11])*100,2)."</td>
    </tr>
    <tr class='textote' id='afs' onmouseover=colora(this.id,salesData[4].color,2),resaltar(4,2) onmouseout=sincolor(this.id),normal(4)>
        <td id='nfs'    class='textote iz'>".utf8_encode($datose31[38])."</td>
        <td id='numfs'  class='textote'>".$datose31[41]."</td>
        <td id='porfs'  class='textote'>".round(($datose31[41]/$datose31[11])*100,2)."</td>
    </tr>
    </tbody>
     <tfoot>
        <tr class='textotate'>
        <th class='textote centro'>TOTAIS:</th>
        <th class='textote centro'>".$datose31[11]."</th>
        <th></th>
      </tr>
    </tfoot>
    </table>
    </div>
<div class='form-group text-right'>
<label for='seleas'>Seleccione ano:</label><select id='seleas' name='seleas' class='selectpicker' >");
$selm="";
$sela="";
for($i=2008;$i<=(date('Y'));$i++)

{
if($i==$ano) {$sela="selected";}else{$sela="";}
echo("<option value='".$i."' ".$sela.">".$i."</option>");
}
echo ("</select><label for='selems'> e mes:</label><select id='selems' name='selems' class='selectpicker' >");
for ($i=3;$i<=count($meses)+1;$i+=3)
{
if($i==$mes) {$selm="selected";}else{$selm="";}
echo ("<option value='".$i."' ".$selm.">".$meses[$i-1]."</option>");
}
echo ("</select><label>para ver os datos.</label>
    <button type='submit' class='btn btn-primary btn-sm' style='margin-top:-5px' 
    onclick=cargar(selems.value,seleas.value,'taboass','datosss.php')>Ver</button></div>");

?>