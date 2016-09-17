<?php
$ano=date("Y");
$mes=date("n");
$dia=date("d");
$imes=$mes;$iano=$ano;
/*if($dia<10 && $mes>1){$imes=$mes-1;} else{$imes=intval($mes)-1;}//para que os datos esten sempre actualizados
if($mes<10){$imes="0".(intval($mes)-1);}
if($mes==1) {$iano=$ano-1;$imes=12;}
$urlp="http://www.ige.eu/igebdt/igeapi/datos/742/0:".$iano.$imes.",9915:32032";
$urlp1="http://www.ige.eu/igebdt/igeapi/datos/744/1:0,2:0,4:201512,9915:32032";//paro mes datos afil
$urle="http://www.ige.eu/igebdt/igeapi/datos/744/4:".$iano.$imes.",9915:32032";
$urle1="http://www.ige.eu/igebdt/igeapi/datos/7133/0:201512,9915:32032";
$urle2="http://www.ige.eu/igebdt/igeapi/datos/8000/0:2012,9915:32032";//pib 2012
$urle3="http://www.ige.eu/igebdt/igeapi/datos/4556/0:201512,9915:32032";//afiliacion réxime
$urle4="http://www.ige.eu/igebdt/igeapi/datos/939/0:2013,9913:32032";//presupostos concello
$urle5="http://www.ige.eu/igebdt/igeapi/datos/744/1:0,2:0,4:201512,9915:32032";//datos para taxa paro
$datosp=explode(',',preg_replace('/"|32032/',' ', file_get_contents($urlp)));
$datosp1=explode(',',preg_replace('/"|32032/',' ',file_get_contents($urlp1)));
$datose=explode(',',preg_replace('/"|32032/',' ',file_get_contents($urle)));
$datose1=explode(',',preg_replace('/"|32032/',' ',file_get_contents($urle1)));
$datose2=explode(',',preg_replace('/"|32032/',' ',file_get_contents($urle2)));
$datose3=explode(',',preg_replace('/"|32032/',' ',file_get_contents($urle3)));
$datose4=explode(',',preg_replace('/"|32032/',' ',file_get_contents($urle4)));
$datose5=explode(',',preg_replace('/"|32032/',' ',file_get_contents($urle5)));*/
$url="http://www.ige.eu/igebdt/igeapi/datos/1558/9915:32032";
$datos=explode(',',preg_replace('/"|[a-zA-Z]/',' ',file_get_contents($url)));


for($i=0;$i<count($datos);$i++)
{
echo $i."  ".$datos[$i]."<br>";
}

$anos="";
$xente="";

    $a=6;
    $num=9;
  
    for ($i=0;$i<(count($datos)/5)-2;$i++){
   
    $anos=$anos."'".$datos[$a]."-12-31',";
    $xente=$xente.$datos[$num].",";
    $a=$a+5;$num=$num+5;   
    }

 
 //echo ("<hr>".$json."<hr>"); 
$anos="['x',".trim($anos, ',')."]";
$xente="['HABITANTES',".substr($xente,0,-1)."]";
/*echo $urle1."<hr>";

for($i=0;$i<count($datose);$i++)
{
echo $i."  ".$datose[$i]."<br>";
}*/
echo "<hr>".$anos."<hr>".$xente."<hr>".count($datos);

?>