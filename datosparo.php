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
else if ($ano >=2011)
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
$urlp="http://www.ige.eu/igebdt/igeapi/datos/742/0:".$ano.$mes.",9915:32032";
$urle="http://www.ige.eu/igebdt/igeapi/datos/744/4:".$ano.$mes.",9915:32032";

if($ano>2011){
$urle3="http://www.ige.eu/igebdt/igeapi/datos/4556/0:".$iano.$imes.",9915:32032";//afiliacion idades ss
$ito=13;
}
else if($ano==2011){
$urle3="http://www.ige.eu/igebdt/igeapi/datos/4557/0:".$iano.$imes.",4:0,9915:32032";//afiliacion idades ss
$ito=13;
}
else{
$urle3="http://www.ige.eu/igebdt/igeapi/datos/3422/0:".$iano.$imes.",9915:32032";
$ito=14;
}
$urle5="http://www.ige.eu/igebdt/igeapi/datos/744/1:0,2:0,4:".$iano.$imes.",9915:32032";
$datosp=explode(',',preg_replace('/"|32032/',' ', file_get_contents($urlp)));
$datose=explode(',',preg_replace('/"|32032/',' ',file_get_contents($urle)));
$datose5=explode(',',preg_replace('/"|32032/',' ',file_get_contents($urle5)));
$datose3=explode(',',preg_replace('/"|32032/',' ',file_get_contents($urle3)));

$meses=array("Xaneiro","Febreiro","Marzo","Abril","Maio","Xuño","Xullo",
"Agosto","Septembro","Outubro","Novembro","Decembro");
//echo ($ano."  ".$mes);
/*var_dump($datose5);
echo "<hr>";
var_dump($datose3);
echo "<hr>";
echo $urle3;
echo "<hr>";
echo $urle5;*/
echo("<div class='table-responsive'> 
  <table class='table'>
    <thead>
      <tr class='textotate'><th colspan='5' class='texto centro oscuro' id='lenda'>Desemprego por réxime mes de "
      .utf8_encode(substr($datosp[8],strpos($datosp[8],"/")+1,strlen($datosp[8])))." do "
      .substr($datosp[8],0,strpos($datosp[8],"/"))."</th><th>
      <a href='#'><img src='imaxes/pie_chart.png' alt='gráfica' title='gráfica' onclick='grafiparo(),grafLineasparo()'></a></th></tr><tr><th colspan='6'></th></tr>
      <tr class='textotate'>
        <th class='textote centro'>REXIME".$ano." | ".$mes."</th>
        <th class='textote centro'>HOMES</th>
        <th class='textote centro'>%</th>
        <th class='textote centro'>MULLERES</th>
        <th class='textote centro'>%</th>
        <th class='textote centro'>TOTAL</th>
      </tr>
    </thead>
    <tbody id='cdesex'>
    <tr class='textote' id='ag' onmouseover=colora(this.id,'#3366CC',0),resaltar(0,0) onmouseout=sincolor(this.id),normal(0)>
        <td id='ra'   class='textote iz'>".$datosp[30]."</td>
        <td id='ha'   class='textote'>".$datosp[41]."</td>
        <td id='pha'  class='textote'>".round(($datosp[41]/$datosp[34])*100,2)."</td>
        <td id='ma'   class='textote'>".$datosp[48]."</td>
        <td id='pma'  class='textote'>".round(($datosp[48]/$datosp[34])*100,2)."</td>
        <td id='at'   class='textote'>".$datosp[34]."</td>
        </tr><tr class='textote' id='ig' onmouseover=colora(this.id,'#DC3912',0),resaltar(1,0) onmouseout=sincolor(this.id),normal(1)>
        <td id='ri'   class='textote iz'>".$datosp[51]."</td>
        <td id='hi'   class='textote'>".$datosp[62]."</td>
        <td id='phi'  class='textote'>".round(($datosp[62]/$datosp[55])*100,2)."</td>
        <td id='mi'   class='textote'>".$datosp[69]."</td>
        <td id='pmi'  class='textote'>".round(($datosp[69]/$datosp[55])*100,2)."</td>
        <td id='it'     class='textote'>".$datosp[55]."</td>
        </tr><tr class='textote' id='cg' onmouseover=colora(this.id,'#FF9900',0),resaltar(2,0) onmouseout=sincolor(this.id),normal(2)>
        <td id='rc'   class='textote iz'>Construcción</td>
        <td id='hc'   class='textote'>".$datosp[83]."</td>
        <td id='phc'  class='textote'>".round(($datosp[83]/$datosp[76])*100,2)."</td>
        <td id='mc'   class='textote'>".$datosp[90]."</td>
        <td id='pmc'  class='textote'>".round(($datosp[90]/$datosp[76])*100,2)."</td>
        <td id='ct'   class='textote'>".$datosp[76]."</td>
        </tr><tr class='textote' id='sg' onmouseover=colora(this.id,'#109618',0),resaltar(3,0) onmouseout=sincolor(this.id),normal(3)>
        <td id='rs'   class='textote iz'>".$datosp[100]."</td>
        <td id='hs'   class='textote'>".$datosp[104]."</td>
        <td id='phs'  class='textote'>".round(($datosp[104]/$datosp[97])*100,2)."</td>
        <td id='ms'   class='textote'>".$datosp[111]."</td>
        <td id='pms'  class='textote'>".round(($datosp[111]/$datosp[97])*100,2)."</td>
        <td id='st'   class='textote'>".$datosp[97]."</td>
        </tr><tr class='textote' id='eg' onmouseover=colora(this.id,'#EFE836',0),resaltar(4,0) onmouseout=sincolor(this.id),normal(4)>
        <td id='re'   class='textote iz'>".$datosp[121]."</td>
        <td id='he'   class='textote'>".$datosp[125]."</td>
        <td id='phe'  class='textote'>".round(($datosp[125]/$datosp[118])*100,2)."</td>
        <td id='me'   class='textote'>".$datosp[132]."</td>
        <td id='pme'  class='textote'>".round(($datosp[132]/$datosp[118])*100,2)."</td>
        <td id='et'   class='textote'>".$datosp[118]."</td>
        </tr>
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
</tbody></table></div>
<div class='table-responsive'>      
  <table class='table'>
    <thead>
     <tr class='textotate'><th colspan='4' class='texto centro oscuro'>Taxa de desemprego "
      .utf8_encode(substr($datose5[10],strpos($datose5[10],"/")+1,strlen($datose5[10])))." do "
      .substr($datose5[10],0,strpos($datose5[10],"/"))."</th>
      <th colspan='2' class='texto centro oscuro'>".round(($datose5[$ito]/($datose5[$ito]+$datose3[11])*100),2)." %</th><thead></table></div>
<div class='table-responsive' id='tdesemp'>      
  <table class='table'>
    <thead>
     <tr class='textotate'><th colspan='5' class='texto centro oscuro' id='lenda1'>Desemprego por idades mes de "
      .utf8_encode(substr($datose[10],strpos($datose[10],"/")+1,strlen($datose[10])))." do "
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
    <tbody id='cdesi'>
    <tr class='textote' id='me25g' onmouseover=colora(this.id,'#DC3912',1),resaltar(0,1) onmouseout=sincolor(this.id),normal(0)>
        <td id='men'   class='textote iz'>".$datose[15]."</td>
        <td id='hme'   class='textote'>".$datose[41]."</td>
        <td id='phme'  class='textote'>".round(($datose[41]/$datose[20])*100,2)."</td>
        <td id='mme'   class='textote'>".$datose[62]."</td>
        <td id='pme'  class='textote'>".round(($datose[62]/$datose[20])*100,2)."</td>
        <td id='met'   class='textote'>".$datose[20]."</td>
        </tr><tr class='textote' id='ma25g' onmouseover=colora(this.id,'#109618',1),resaltar(1,1) onmouseout=sincolor(this.id),normal(1)>
        <td id='mai'   class='textote iz'>Maiores de 25 anos</td>
        <td id='hma'   class='textote'>".$datose[48]."</td>
        <td id='phma'  class='textote'>".round(($datose[48]/$datose[27])*100,2)."</td>
        <td id='mma'   class='textote'>".$datose[69]."</td>
        <td id='pmma'  class='textote'>".round(($datose[69]/$datose[27])*100,2)."</td>
        <td id='mat'   class='textote'>".$datose[27]."</td>
        </tr>
        <tfoot>
        <tr class='textotate'>
        <th class='textote centro'>TOTAIS:</th>
        <th class='textote centro'>".$datose[34]."</th>
        <th class='textote centro'>".round(($datose[34]/$datose[13])*100,2)."</th>
        <th class='textote centro'>".$datose[55]."</th>
        <th class='textote centro'>".round(($datose[55]/$datose[13])*100,2)."</th>
        <th class='textote centro'>".$datose[13]."</th>
      </tr></tfoot></tbody></table>
<div class='form-group text-right'>

<label for='seleap'>Seleccione ano:</label><select id='seleap' name='seleap' class='selectpicker'>");
$selm="";
$sela="";
for($i=2008;$i<=(date('Y'));$i++)
{
if($i==$ano) {$sela="selected";}else{$sela="";}
echo("<option value='".$i."' ".$sela.">".$i."</option>");
}
echo ("</select><label for='selemp'> e mes:</label><select id='selemp' name='selemp' class='selectpicker' >");
for ($i=1;$i<=count($meses);$i++)
{
if($i==$mes) {$selm="selected";}else{$selm="";}
echo ("<option value='".$i."' ".$selm.">".$meses[$i-1]."</option>");
}
echo ("</select><label>para ver os datos.</label>
    <button type='submit' class='btn btn-primary btn-sm' style='margin-top:-5px' 
    onclick=cargar(selemp.value,seleap.value,'taboa','datosparo.php')>Ver</button></div>");

?>
