<?php
require_once('configuracion.php');
$ano=$_POST["ano"];

try{

$urle6="http://www.ige.eu/igebdt/igeapi/datos/1843/1:".$ano.",9931:".$codIGE;
$urle7="http://www.ige.eu/igebdt/igeapi/datos/3074/0:0:1:188:205,2:".$ano.",9931:".$codIGE;
$urle8="http://www.ige.eu/igebdt/igeapi/datos/777/0:".$ano.",9931:".$codIGE;
$filtro='/"|'.$codIGE.'/';
$datose6=explode(',',preg_replace('/"/',' ',file_get_contents($urle6)));
$datose7=explode(',',preg_replace('/"/',' ',file_get_contents($urle7)));
$datose8=explode(',',preg_replace($filtro,' ',file_get_contents($urle8)));

echo("<div class='table-responsive'>          
  <table class='table '>
  <thead >
  <tr class='textotate'><th colspan='2' class='texto centro oscuro' id='lenda9'>Empresas por Nº de empregad@s ".$ano."</th>
  <th><a href='#''><img src='imaxes/pie_chart.png' onclick='grafEmpresasEmp()' alt='gráfica' title='gráfica'></a></th></tr>
  <tr><th colspan='3'></th></tr>
  <tr class='textotate'>
  <th class='textote centro''>Nª EMPREGADOS</th>
  <th class='textote centro'>%</th>
  <th class='textote centro'>TOTAL</th>
  </tr>
  </thead>
  <tbody id='cdempre'>");

    $ti=18;
    $ni=17;
    for ($i=0;$i<8;$i++){
      echo("<tr class='textote'>
        <td id='iten".$i."'class='textote iz' onmouseover=colora(this.id,salesData[".$i."].color,0),resaltar(".$i.",0) onmouseout=sincolor(this.id),normal(".$i.")>".substr($datose6[$ti],strpos($datose6[$ti],"e")+1)." </td>
        <td class='textote'>".round(($datose6[$ni]/$datose6[11])*100,2)."</td>
        <td id='itet".$i."' class='textote'>".$datose6[$ni]."</td></tr>");
      $ti=$ti+6;$ni=$ni+6;
    }
    echo("</tbody><tfoot>
        <tr class='textotate'>
        <th class='textote centro'>TOTAIS:</th>
        <th class='textote centro'></th>
        <th class='textote centro'>".$datose6[11]."</th>
      </tr>
    </tfoot></table></div>");

echo("<div class='table-responsive'>          
  <table class='table'>
  <thead >
  <tr class='textotate'><th colspan='2' class='texto centro oscuro' id='lenda10'>Empresas por forma Xurídica: ".$ano."</th>
  <th><a href='#''><img src='imaxes/pie_chart.png' onclick='grafEmpresasXuri()' alt='gráfica' title='gráfica'></a></th></tr>
  <tr><th colspan='3'></th></tr>
  <tr class='textotate'>
  <th class='textote centro''>FORMA XURIDICA</th>
  <th class='textote centro'>%</th>
  <th class='textote centro'>TOTAL</th>
  </tr>
  </thead>
  <tbody id='cdemprex'>");

    $ti=15;
    $ni=20;
    for ($i=0;$i<5;$i++){
      echo("<tr class='textote'>
        <td id='itex".$i."'class='textote iz' onmouseover=colora(this.id,salesData[".$i."].color,1),resaltar(".$i.",1) onmouseout=sincolor(this.id),normal(".$i.")>".utf8_encode($datose7[$ti])." </td>
        <td class='textote'>".round(($datose7[$ni]/$datose7[13])*100,2)."</td>
        <td id='itext".$i."' class='textote'>".$datose7[$ni]."</td></tr>");
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
  <th><a href='#''><img src='imaxes/pie_chart.png' onclick='grafEmpresasDemo()' alt='gráfica' title='gráfica'></a></th></tr>
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
        <td id='ited".$i."'class='textote iz' onmouseover=colora(this.id,salesData[".$i."].color,2),resaltar(".$i.",2) onmouseout=sincolor(this.id),normal(".$i.")>".utf8_encode($datose8[$ti])."</td>
        <td class='textote'>".round(($datose8[$ni]/$tot)*100,2)."</td>
        <td id='itetd".$i."' class='textote'>".$datose8[$ni]."</td></tr>");
      $ti=$ti+6;$ni=$ni+6;
    }
    echo("<tfoot>
        <tr class='textotate'>
        <th class='textote centro'>TOTAIS:</th>
        <th class='textote centro'></th>
        <th class='textote centro'>".$tot."</th>
      </tr>
    </tfoot></tbody></table></div></div>");
    }
catch (Exception $e) {
    echo 'Produciuse un erro :('.$e->getMessage();
}

?>
